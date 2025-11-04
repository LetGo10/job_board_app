<div x-data="{ showModal: @entangle('showModal') }" x-cloak>
    <!-- Job View Modal -->
    <div x-show="showModal"
        x-transition:enter="transition-all duration-500 ease-out"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition-all duration-300 ease-in"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 z-50 flex items-center justify-center p-4">

        <!-- Modal Backdrop -->
        <div x-transition:enter="transition-opacity duration-300 ease-out"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity duration-200 ease-in"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-500/80 transition-opacity animate-in fade-in duration-300"
             wire:click="closeModal">
        </div>

        <!-- Modal Content -->
        <div x-transition:enter="transition-all duration-600 ease-out delay-100"
             x-transition:enter-start="opacity-0 translate-y-8 scale-95 rotate-1"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100 rotate-0"
             x-transition:leave="transition-all duration-400 ease-in"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100 rotate-0"
             x-transition:leave-end="opacity-0 translate-y-8 scale-95 -rotate-1"
             class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">

            <!-- Floating Close Button -->
            <button wire:click="closeModal"
                    class="absolute top-4 right-4 z-10 p-2 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200 shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Modal Body -->
            <div class="p-8">
                <!-- Job Title Section -->
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-3">
                        {{ $job?->title }}
                    </h2>
                    <div class="flex items-center justify-center text-gray-600 dark:text-gray-400 mb-4">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Posted on {{ $job?->created_at?->format('F j, Y') }}</span>
                    </div>
                </div>

                <!-- Company & Location Section -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700 rounded-xl p-6 mb-8">
                    <div class="flex items-center justify-between">
                        <!-- Company Info -->
                        <div class="flex items-center space-x-4">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($job?->company) }}&size=64&background=random"
                                 alt="{{ $job?->company }}" class="w-16 h-16 rounded-full border-4 border-white shadow-lg">
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                    {{ $job?->company }}
                                </h3>
                                <div class="flex items-center text-gray-600 dark:text-gray-300 mt-1">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $job?->location }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Details Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <!-- Job Type -->
                    <div class="text-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                        <div class="text-blue-600 dark:text-blue-400 mb-2">
                            <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v6m-8-6v6m0 0v.01M8 12v.01"></path>
                            </svg>
                        </div>
                        <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Job Type</p>
                        <p class="font-semibold text-gray-900 dark:text-white">{{ ucfirst(str_replace('-', ' ', $job?->job_type)) }}</p>
                    </div>

                    <!-- Work Type -->
                    <div class="text-center p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                        <div class="text-purple-600 dark:text-purple-400 mb-2">
                            <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Work Type</p>
                        <p class="font-semibold text-gray-900 dark:text-white">{{ ucfirst(str_replace('-', ' ', $job?->work_type)) }}</p>
                    </div>

                    <!-- Status -->
                    <div class="text-center p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                        <div class="mb-2">
                            @if($job?->status === 'pending')
                                <div class="w-8 h-8 mx-auto bg-yellow-100 dark:bg-yellow-900/50 rounded-full flex items-center justify-center">
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full animate-pulse"></div>
                                </div>
                            @elseif($job?->status === 'active')
                                <div class="w-8 h-8 mx-auto bg-green-100 dark:bg-green-900/50 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @else
                                <div class="w-8 h-8 mx-auto bg-gray-200 dark:bg-gray-600 rounded-full flex items-center justify-center">
                                    <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                                </div>
                            @endif
                        </div>
                        <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Status</p>
                        @if($job?->status === 'pending')
                            <p class="font-semibold text-yellow-700 dark:text-yellow-400">Pending</p>
                        @elseif($job?->status === 'active')
                            <p class="font-semibold text-green-700 dark:text-green-400">Active</p>
                        @else
                            <p class="font-semibold text-gray-700 dark:text-gray-300">{{ ucfirst($job?->status) }}</p>
                        @endif
                    </div>

                    <!-- Salary -->
                    @if($job?->salary_range)
                    <div class="text-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                        <div class="text-green-600 dark:text-green-400 mb-2">
                            <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Salary</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-sm">{{ $job?->salary_range }}</p>
                    </div>
                    @endif
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

                <!-- Requirements -->
                @if($job?->requirements)
                <div class="mb-6">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-3">
                        Requirements
                    </h4>
                    <div class="prose prose-gray dark:prose-invert max-w-none">
                        <div class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            {!! $job?->requirements !!}
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end p-6 border-t border-gray-200 dark:border-gray-700 space-x-3">
                <button wire:click="closeModal"
                        class="px-4 py-2 text-sm font-medium text-purple-700 dark:text-purple-300 bg-purple-100 dark:bg-purple-800 hover:bg-purple-200 dark:hover:bg-purple-700 rounded-lg transition-colors">
                    Close
                </button>

                @if($job?->status === 'pending')
                <button wire:click="$dispatch('activateJobFromModal', { jobId: {{ $job?->id }} })"
                        class="px-6 py-2 text-sm font-medium text-white bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 rounded-lg transition-colors">
                    Activate Job
                </button>
                @endif
            </div>
        </div>
    </div>
</div>
