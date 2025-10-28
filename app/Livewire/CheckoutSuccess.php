<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Cashier;
use Livewire\Component;

class CheckoutSuccess extends Component
{
    public $sessionId;

    public $orderDetails;

    public $paymentStatus;

    public $errorMessage;

    public function mount()
    {
        $this->sessionId = request('session_id');

        if (! $this->sessionId) {
            $this->errorMessage = 'Invalid session ID';

            return;
        }

        try {
            // Retrieve session
            $session = Cashier::stripe()->checkout->sessions->retrieve($this->sessionId);
            $this->paymentStatus = $session->payment_status;

            if ($this->paymentStatus === 'paid') {
                $this->handleSuccessfulPayment($session);
            } else {
                $this->errorMessage = 'Payment was not completed successfully';
            }

        } catch (\Exception $e) {
            Log::error('Checkout success error: '.$e->getMessage());
            $this->errorMessage = 'Unable to verify payment status';
        }
    }

    protected function handleSuccessfulPayment($session)
    {
        // Extract order details from session
        $this->orderDetails = [
            'order_id' => $session->metadata->order_id ?? 'N/A',
            'amount' => $session->amount_total / 100,
            'currency' => strtoupper($session->currency),
            'customer_email' => $session->customer_details->email ?? 'N/A',
            'payment_method' => 'Card Payment',
            'created_at' => date('F j, Y \a\t g:i A', $session->created),
        ];
        Log::info('Successful payment processed', [
            'session_id' => $this->sessionId,
            'order_id' => $this->orderDetails['order_id'],
            'amount' => $this->orderDetails['amount'],
        ]);
    }

    public function goToDashboard()
    {
        $this->redirect(route('user.dashboard'));
    }

    public function render()
    {
        return view('livewire.checkout-success');
    }
}
