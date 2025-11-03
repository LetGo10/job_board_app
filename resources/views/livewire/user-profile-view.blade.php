<div x-data="{ showModal: @entangle('showModal') }" x-cloak>
    <!-- Modal -->
    <div x-show="showModal"
        x-transition:enter="transition-all duration-500 ease-out"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition-all duration-300 ease-in"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
    >
        <!-- Modal Backdrop -->
        <div
            x-transition:enter="transition-opacity duration-300 ease-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-200 ease-in"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-500/80 transition-opacity animate-in fade-in duration-300"
            wire:click="closeModal">
        </div>

        <!-- Modal Content -->
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">

            <!-- Modal Header -->
            <div
                x-transition:enter="transition-all duration-600 ease-out delay-100"
                x-transition:enter-start="opacity-0 translate-y-8 scale-95 rotate-1"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100 rotate-0"
                x-transition:leave="transition-all duration-400 ease-in"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100 rotate-0"
                x-transition:leave-end="opacity-0 translate-y-8 scale-95 -rotate-1"
                class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">

                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                    User Profile
                </h2>
                <button wire:click="closeModal"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <!-- User Name & Avatar -->
                <div class="flex items-center mb-6">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user?->name) }}&size=80&background=3B82F6&color=ffffff&bold=true"
                         alt="{{ $user?->name }}"
                         class="w-20 h-20 rounded-full border-4 border-blue-100 dark:border-blue-900 mr-6">
                    <div>
                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">
                            {{ $user?->name }}
                        </h3>
                        <div class="flex items-center mb-1">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                                {{ ucfirst($user?->role ?? 'User') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- User Information -->
                <div class="mb-6">
                    <div class="flex items-center mb-3">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                            {{ $user?->email }}
                        </span>
                    </div>

                    <div class="flex items-center mb-3">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V9a2 2 0 00-2-2h-2"></path>
                        </svg>
                        <span class="text-gray-600 dark:text-gray-300">
                            Member since {{ $user?->created_at?->format('F Y') }}
                        </span>
                    </div>

                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Joined on {{ $user?->created_at?->format('F j, Y') }}
                    </div>
                </div>

                <!-- Activity Statistics -->
                <div class="mb-6">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-3">
                        Activity Statistics
                    </h4>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                                {{ $user?->jobs?->count() ?? 0 }}
                            </div>
                            <p class="text-sm text-blue-600 dark:text-blue-400 font-medium">Jobs Posted</p>
                        </div>
                        <div class="text-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                            <div class="text-2xl font-bold text-green-600 dark:text-green-400">
                                {{ $user?->jobApplications?->count() ?? 0 }}
                            </div>
                            <p class="text-sm text-green-600 dark:text-green-400 font-medium">Applications</p>
                        </div>
                    </div>
                </div>

                <!-- Account Status -->
                <!-- <div class="mb-6">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-3">
                        Account Status
                    </h4>
                    <div class="flex items-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            Active User
                        </span>
                        <span class="ml-4 text-sm text-gray-500 dark:text-gray-400">
                            Last updated {{ $user?->updated_at?->diffForHumans() }}
                        </span>
                    </div>
                </div> -->
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end p-6 border-t border-gray-200 dark:border-gray-700 space-x-3">
                <button wire:click="closeModal"
                        class="px-4 py-2 text-sm font-medium text-purple-700 dark:text-purple-300 bg-purple-100 dark:bg-purple-800 hover:bg-purple-200 dark:hover:bg-purple-700 rounded-lg transition-colors">
                    Close
                </button>
            </div>
            </div>
        </div>
