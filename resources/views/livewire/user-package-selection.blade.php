<div class="min-h-screen bg-gray-50">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-purple-600 to-pink-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Choose Your Package</h1>
            <p class="text-xl opacity-90">Select the perfect plan for your hiring needs</p>
        </div>
    </div>

    <!-- Pricing Cards -->
    <div class="container mx-auto px-4 -mt-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">

            @foreach($packages as $package)
            <div class="bg-white rounded-lg shadow-lg p-6 relative hover:shadow-xl border border-gray-200">

                @if($package['popular'])
                <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                    <span class="bg-purple-500 text-white px-4 py-1 rounded-full text-sm font-semibold">Most Popular</span>
                </div>
                @endif

                <div class="mb-4 {{ $package['popular'] ? 'mt-4' : '' }}">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $package['name'] }}</h3>
                </div>

                <div class="mb-6">
                    <span class="text-3xl font-bold text-purple-600">{{ $package['price'] }}</span>
                    <span class="text-gray-600">/month</span>
                </div>

                <ul class="space-y-3 mb-6 text-sm">
                    @foreach($package['features'] as $feature)
                    <li class="flex items-center">
                        <span class="text-green-500 mr-3 flex-shrink-0">✓</span>
                        <span class="text-gray-700">{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>

                <div class="mt-auto">
                    <button class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition font-semibold">
                        {{ $package['name'] }} Package
                    </button>
                </div>
            </div>
            @endforeach

        </div>

        <!-- FAQ Section -->
        <div class="mt-16 mb-16 max-w-4xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-600">Everything you need to know about our packages</p>
            </div>

            <div class="space-y-4">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-gray-900 mb-2">Can I change my plan anytime?</h3>
                    <p class="text-gray-600">Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-gray-900 mb-2">What payment methods do you accept?</h3>
                    <p class="text-gray-600">We accept all major credit cards, debit cards, and online banking through our secure payment processor.</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-gray-900 mb-2">Is there a setup fee?</h3>
                    <p class="text-gray-600">No setup fees! You only pay the monthly subscription fee for your chosen package.</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-gray-900 mb-2">Can I cancel anytime?</h3>
                    <p class="text-gray-600">Yes, you can cancel your subscription at any time. Your access will continue until the end of your current billing period.</p>
                </div>
            </div>
        </div>
    </div>
</div>
