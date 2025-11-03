<?php

namespace App\Livewire;

use App\Jobs\SendAiPrompt;
use App\Models\AiPrompt;
use Illuminate\Support\Str;
use League\CommonMark\CommonMarkConverter;
use Livewire\Attributes\On;
use Livewire\Component;

class AiDescriptionModal extends Component
{
    public bool $showModal = false;

    public string $prompt = 'Generate professional job description for Laravel Developer position in Malaysia with requirements and responsibilities.';

    public ?AiPrompt $currentPrompt = null;

    public string $requestId = '';

    #[On('openAiDescriptionModal')]
    public function openModal(): void
    {
        $this->showModal = true;
        $this->resetData();
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetData();
    }

    public function resetData(): void
    {
        $this->currentPrompt = null;
        $this->requestId = '';
    }

    public function generatePrompt(): void
    {
        if (!auth()->check()) {
            session()->flash('error', 'Please login first.');
            return;
        }

        $this->requestId = Str::uuid();

        $this->currentPrompt = AiPrompt::create([
            'user_id' => auth()->id(),
            'request_id' => $this->requestId,
            'prompt' => $this->prompt,
            'status' => 'Pending',
        ]);

        // Dispatch AI job
        SendAiPrompt::dispatch(
            $this->requestId,
            $this->prompt,
            auth()->id()
        );
    }

    public function checkStatus(): void
    {
        if ($this->currentPrompt) {
            $this->currentPrompt->refresh();
        }
    }

    public function useResponse(): void
    {
        if ($this->currentPrompt && $this->currentPrompt->status === 'Completed') {
            // Dispatch event to send HTML formatted response back to PostJob component
            $this->dispatch('aiResponseGenerated', [
                'response' => $this->currentPrompt->getFormattedResponse()
            ]);

            // Close modal
            $this->closeModal();

            session()->flash('message', 'AI response has been applied to job description!');
        }
    }

    public function render()
    {
        return view('livewire.ai-description-modal');
    }
}
