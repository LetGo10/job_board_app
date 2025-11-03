<div class="bg-gray-50 py-6 px-4 pb-6">
    <div class="max-w-3xl mx-auto">
        <!-- Cancel Card - Compact Horizontal Layout -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[400px]">

                <!-- Left Side - Cancel Message & Icon -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 p-6 lg:p-8 flex flex-col justify-center items-center text-white">
                    <!-- Cancel Icon -->
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>

                    <!-- Cancel Message -->
                    <h1 class="text-2xl font-bold text-center mb-3">Payment Cancelled</h1>
                    <p class="text-orange-100 text-center text-sm">
                        No charges were made to your account. You can try again anytime.
                    </p>
                </div>

                <!-- Right Side - Details & Actions -->
                <div class="p-6 lg:p-8">
                    <!-- Order Number -->
                    <div class="mb-4">
                        <p class="text-sm text-gray-500">Order No. #{{ $orderDetails['order_id'] }}</p>
                    </div>

                    <!-- What Happened -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">What Happened?</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center">
                                <span class="text-orange-500 mr-2">✗</span>
                                <span class="text-gray-700">Payment cancelled</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-green-500 mr-2">✓</span>
                                <span class="text-gray-700">No charges made</span>
                            </div>
                        </div>
                    </div>

                    <!-- Plan Details -->
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <h4 class="font-semibold text-gray-900 mb-3 text-sm">You Were Upgrading To:</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Plan:</span>
                                <span class="font-medium">Professional</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Price:</span>
                                <span class="font-medium text-purple-600">{{ strtoupper($orderDetails['currency']) }} {{ number_format($orderDetails['amount'], 2) }}/month</span>
                            </div>
                            @if($orderDetails['customer_email'] !== 'N/A')
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Email:</span>
                                <span class="font-medium">{{ $orderDetails['customer_email'] }}</span>
                            </div>
                            @endif
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Date:</span>
                                <span class="font-medium">{{ $orderDetails['created_at'] }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-2">
                        <button wire:click="tryAgain"
                               class="w-full bg-purple-600 text-white py-2.5 px-4 rounded-lg hover:bg-purple-700 transition font-medium text-center text-sm">
                            Try Payment Again
                        </button>
                        <div class="grid grid-cols-3 gap-2">
                            <a href=""
                               class="border border-gray-300 text-gray-700 py-2 px-2 rounded-lg hover:bg-gray-50 transition font-medium text-center inline-block text-xs">
                                Current
                            </a>
                            <button wire:click="goToDashboard"
                               class="border border-gray-300 text-gray-700 py-2 px-2 rounded-lg hover:bg-gray-50 transition font-medium text-center text-xs">
                                Dashboard
                            </button>
                            <a href="mailto:support@jobboard.com"
                               class="border border-gray-300 text-gray-700 py-2 px-2 rounded-lg hover:bg-gray-50 transition font-medium text-center inline-block text-xs">
                                Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
