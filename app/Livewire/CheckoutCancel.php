<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Cashier;
use Livewire\Component;

class CheckoutCancel extends Component
{
    public $sessionId;
    public $orderDetails;
    public $errorMessage;

    public function mount()
    {
        $this->sessionId = request('session_id');

        // For cancel page, we can still try to get session info if available
        if ($this->sessionId) {
            try {
                $session = Cashier::stripe()->checkout->sessions->retrieve($this->sessionId);

                // Extract details even though payment was cancelled
                $this->orderDetails = [
                    'order_id' => $session->metadata->order_id ?? 'N/A',
                    'amount' => $session->amount_total / 100,
                    'currency' => strtoupper($session->currency),
                    'customer_email' => $session->customer_details->email ?? 'N/A',
                    'created_at' => date('F j, Y \a\t g:i A', $session->created),
                ];

                Log::info('Payment cancelled', [
                    'session_id' => $this->sessionId,
                    'order_id' => $this->orderDetails['order_id'],
                ]);

            } catch (\Exception $e) {
                Log::error('Checkout cancel error: '.$e->getMessage());
                // Don't show error, just use default data
                $this->orderDetails = [
                    'order_id' => 'N/A',
                    'amount' => 20.00,
                    'currency' => 'MYR',
                    'customer_email' => 'N/A',
                    'created_at' => now()->format('F j, Y \a\t g:i A'),
                ];
            }
        } else {
            // No session ID, use default data
            $this->orderDetails = [
                'order_id' => 'N/A',
                'amount' => 20.00,
                'currency' => 'MYR',
                'customer_email' => 'N/A',
                'created_at' => now()->format('F j, Y \a\t g:i A'),
            ];
        }
    }

    public function tryAgain()
    {
        $this->redirect(route('packages'));
    }

    public function goToDashboard()
    {
        $this->redirect(route('user.dashboard'));
    }

    public function render()
    {
        return view('livewire.checkout-cancel');
    }
}
