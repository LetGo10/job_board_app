<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Cancelled - Job Board</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-red-50 via-orange-50 to-yellow-50 min-h-screen">
    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="max-w-md w-full">
            <!-- Cancel Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center">
                <!-- Cancel Icon -->
                <div class="mx-auto flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>

                <!-- Cancel Message -->
                <h1 class="text-2xl font-bold text-gray-900 mb-3">
                    Payment Cancelled
                </h1>

                <p class="text-gray-600 mb-6">
                    Your payment was cancelled and no charges were made.
                    Your job posting remains inactive until payment is completed.
                </p>

                <!-- Info Card -->
                <div class="bg-orange-50 border border-orange-200 rounded-lg p-4 mb-6 text-left">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-orange-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-semibold text-orange-800">Job Posting Status</h3>
                            <p class="text-sm text-orange-700 mt-1">
                                Your job draft is saved but remains inactive. Complete payment to make it visible to candidates.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3">

                    <!-- View My Job Posts -->
                    <a href="{{ route('my.job.posts') }}"
                       class="w-full inline-flex items-center justify-center px-6 py-3 bg-gray-100 border border-gray-300 rounded-lg font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        View My Job Posts
                    </a>

                    <!-- Back to Home -->
                    <a href="{{ route('home') }}"
                       class="w-full inline-block text-center px-6 py-2 text-gray-500 hover:text-gray-700 transition-colors duration-200">
                        ← Back to Home
                    </a>
                </div>
            </div>
            <!-- Common Reasons -->
            <div class="mt-4 text-center">
                <div class="bg-gray-50 rounded-lg p-4 text-left">
                    <h3 class="font-medium text-gray-900 mb-3">
                        Common reasons for payment cancellation
                    </h3>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Insufficient funds in account</li>
                        <li>• Card expired or invalid details</li>
                        <li>• Browser closed during payment</li>
                        <li>• Network connection issues</li>
                        <li>• Decided to review job details first</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Auto redirect option -->
    <script>
        // Optional: Auto redirect to job posts after 30 seconds
        // Uncomment if you want this feature
        /*
        let countdown = 30;
        const redirectTimer = setInterval(() => {
            countdown--;
            if (countdown <= 0) {
                clearInterval(redirectTimer);
                window.location.href = "{{ route('my.job.posts') }}";
            }
        }, 1000);
        */
    </script>
</body>
</html>
