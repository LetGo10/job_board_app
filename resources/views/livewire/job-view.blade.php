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
                    Job Details
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
                <!-- Job Title -->
                <h3 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                    {{ $job?->title }}
                </h3>

                <!-- Company Information -->
                <div class="mb-6">
                    <div class="flex items-center mb-3">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                            {{ $job?->company }}
                        </span>
                    </div>

                    <div class="flex items-center mb-3">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-gray-600 dark:text-gray-300">
                            {{ $job?->location }}
                        </span>
                    </div>

                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Posted on {{ $job?->created_at->format('F j, Y') }}
                    </div>
                </div>

                <!-- Job Description -->
                <div class="mb-6">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-3">
                        Job Description
                    </h4>
                    <div class="prose prose-gray dark:prose-invert max-w-none">
                        <div class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            {!! $job?->description !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end p-6 border-t border-gray-200 dark:border-gray-700 space-x-3">
                <button wire:click="closeModal"
                        class="px-4 py-2 text-sm font-medium text-purple-700 dark:text-purple-300 bg-purple-100 dark:bg-purple-800 hover:bg-purple-200 dark:hover:bg-purple-700 rounded-lg transition-colors">
                    Close
                </button>
                <button wire:click="applyForJob({{ $job?->id }})"
                        class="px-6 py-2 text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 rounded-lg transition-colors">
                    Apply Now
                </button>
            </div>
        </div>
    </div>
</div>
