<div class="bg-gray-50 py-6 px-4 pb-6">
    <div class="max-w-3xl mx-auto">
        @if($errorMessage)
            {{-- Error State --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[400px]">
                    {{-- Left Side - Error Icon --}}
                    <div class="bg-gradient-to-br from-red-500 to-red-600 p-6 lg:p-8 flex flex-col justify-center items-center text-white">
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-center mb-3">Payment Error!</h1>
                        <p class="text-red-100 text-center text-sm">
                            Something went wrong with your payment. Please try again.
                        </p>
                    </div>

                    {{-- Right Side - Error Details & Actions --}}
                    <div class="p-6 lg:p-8">
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Error Details</h3>
                            <p class="text-gray-600 text-sm">{{ $errorMessage }}</p>
                        </div>

                        <div class="space-y-2">
                            <a href="{{ route('packages') }}"
                               class="w-full bg-red-600 text-white py-2.5 px-4 rounded-lg hover:bg-red-700 transition font-medium inline-block text-center text-sm">
                                Try Again
                            </a>
                            <a href="{{ route('home') }}"
                               class="w-full border border-gray-300 text-gray-700 py-2.5 px-4 rounded-lg hover:bg-gray-50 transition font-medium inline-block text-center text-sm">
                                Back to Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @elseif($paymentStatus === 'paid' && $orderDetails)
            {{-- Success State --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[400px]">
                    {{-- Left Side - Success Message & Icon --}}
                    <div class="bg-gradient-to-br from-green-500 to-green-600 p-6 lg:p-8 flex flex-col justify-center items-center text-white">
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-center mb-3">Payment Successful!</h1>
                        <p class="text-green-100 text-center text-sm">
                            Thank you for your subscription. Your payment has been processed successfully.
                        </p>
                    </div>

                    {{-- Right Side - Details & Actions --}}
                    <div class="p-6 lg:p-8">
                        {{-- Order Number --}}
                        <div class="mb-4">
                            <p class="text-sm text-gray-500">Order No. #{{ $orderDetails['order_id'] }}</p>
                        </div>

                        {{-- Subscription Details --}}
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Plan:</span>
                                    <span class="font-medium">Professional</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Amount:</span>
                                    <span class="font-medium">{{ strtoupper($orderDetails['currency']) }} {{ number_format($orderDetails['amount'], 2) }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Payment Method:</span>
                                    <span class="font-medium">{{ $orderDetails['payment_method'] }}</span>
                                </div>
                                <div class="flex justify-between items-center border-t pt-3">
                                    <span class="text-gray-900 font-semibold">Total Paid:</span>
                                    <span class="font-semibold text-green-600">{{ strtoupper($orderDetails['currency']) }} {{ number_format($orderDetails['amount'], 2) }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Date:</span>
                                    <span class="font-medium">{{ $orderDetails['created_at'] }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- What's Next --}}
                        <div class="bg-purple-50 rounded-lg p-4 mb-6">
                            <h4 class="font-semibold text-purple-900 mb-2 text-sm">What's Next?</h4>
                            <div class="grid grid-cols-2 gap-2 text-xs text-purple-800">
                                <div class="flex items-center">
                                    <span class="text-purple-600 mr-1">✓</span>
                                    Subscription active
                                </div>
                                <div class="flex items-center">
                                    <span class="text-purple-600 mr-1">✓</span>
                                    Post up to 20 jobs
                                </div>
                                <div class="flex items-center">
                                    <span class="text-purple-600 mr-1">✓</span>
                                    Advanced features
                                </div>
                                <div class="flex items-center">
                                    <span class="text-purple-600 mr-1">✓</span>
                                    Receipt sent
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="space-y-2">
                            <button wire:click="goToDashboard"
                                   class="w-full bg-purple-600 text-white py-2.5 px-4 rounded-lg hover:bg-purple-700 transition font-medium text-sm">
                                Go to Dashboard
                            </button>
                            <div class="grid grid-cols-2 gap-2">
                                <a href=""
                                   class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition font-medium inline-block text-center text-xs">
                                    Manage
                                </a>
                                <a href="mailto:support@jobboard.com"
                                   class="border border-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-50 transition font-medium inline-block text-center text-xs">
                                    Support
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @else
            {{-- Loading State --}}
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="min-h-[400px] flex flex-col justify-center items-center p-8">
                    <div class="animate-spin w-12 h-12 border-4 border-blue-500 border-t-transparent rounded-full mb-4"></div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Processing Payment...</h3>
                    <p class="text-gray-600 text-center">Please wait while we verify your payment status</p>
                </div>
            </div>
        @endif
    </div>
</div>
