<div x-data="{ showModal: <?php if ((object) ('showModal') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showModal'->value()); ?>')<?php echo e('showModal'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showModal'); ?>')<?php endif; ?> }" x-cloak>
    <!-- Candidate Detail Modal -->
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

            <!-- Resume Header -->
            <div class="relative bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 text-white p-8 rounded-t-lg overflow-hidden">
                <div class="flex items-start space-x-6">
                    <!-- Profile Photo -->
                    <div class="flex-shrink-0">
                        <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($jobsapply?->full_name)); ?>&size=120&background=4f46e5&color=ffffff&bold=true"
                             alt="<?php echo e($jobsapply?->full_name); ?>"
                             class="w-24 h-24 rounded-full border-4 border-white/20 shadow-lg object-cover">
                    </div>

                    <!-- Header Info -->
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold mb-2"><?php echo e($jobsapply?->full_name); ?></h1>
                        <p class="text-xl text-blue-200 mb-3">Candidate for <?php echo e($jobsapply?->job?->title); ?></p>

                        <!-- Contact Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span><?php echo e($jobsapply?->email); ?></span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span><?php echo e($jobsapply?->phone_number); ?></span>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php if($jobsapply?->linkedin_url): ?>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                                <a href="<?php echo e($jobsapply->linkedin_url); ?>" target="_blank" class="hover:text-blue-200 underline">LinkedIn Profile</a>
                            </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><?php if($jobsapply?->portfolio_url): ?>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                </svg>
                                <a href="<?php echo e($jobsapply->portfolio_url); ?>" target="_blank" class="hover:text-blue-200 underline">Portfolio</a>
                            </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!-- Application Status -->
                        <div class="mt-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-200">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Applied <?php echo e($jobsapply?->created_at?->diffForHumans()); ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Resume Content -->
            <div class="flex">
                <!-- Left Column -->
                <div class="w-1/3 bg-gray-50 dark:bg-gray-800 p-6 space-y-6">
                    <!-- Professional Links -->
                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->linkedin_url || $jobsapply?->portfolio_url): ?>
                    <div>
                        <h3 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wide mb-3 border-b pb-2">
                            Professional Links
                        </h3>
                        <div class="space-y-2 text-sm">
                            <!--[if BLOCK]><![endif]--><?php if($jobsapply?->linkedin_url): ?>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-600 rounded flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </div>
                                <a href="<?php echo e($jobsapply->linkedin_url); ?>" target="_blank" class="text-blue-600 hover:underline font-medium">
                                    LinkedIn Profile
                                </a>
                            </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><?php if($jobsapply?->portfolio_url): ?>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-orange-500 rounded flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9 3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                    </svg>
                                </div>
                                <a href="<?php echo e($jobsapply->portfolio_url); ?>" target="_blank" class="text-orange-600 hover:underline font-medium">
                                    Portfolio Website
                                </a>
                            </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Documents Submitted -->
                    <div>
                        <h3 class="text-sm font-bold text-gray-800 dark:text-white uppercase tracking-wide mb-3 border-b pb-2">
                            DOCUMENTS
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Resume:</span>
                                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->resume_path): ?>
                                        <a href="<?php echo e(Storage::url($jobsapply->resume_path)); ?>" target="_blank"
                                        class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded hover:bg-blue-200">
                                            📄 View
                                        </a>
                                    <?php else: ?>
                                        <span class="text-xs bg-gray-100 text-gray-500 px-2 py-1 rounded">Not provided</span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Cover Letter File:</span>
                                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->cover_letter_path): ?>
                                        <a href="<?php echo e(Storage::url($jobsapply->cover_letter_path)); ?>" target="_blank"
                                        class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded hover:bg-green-200">
                                            📝 View
                                        </a>
                                    <?php else: ?>
                                        <span class="text-xs bg-gray-100 text-gray-500 px-2 py-1 rounded">Not provided</span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Main Content -->
                <div class="flex-1 p-6 space-y-6">

                    <!-- Application Details -->
                    <section>
                        <h2 class="text-lg font-bold text-gray-800 dark:text-white mb-3 pb-2 border-b-2 border-blue-200">

                             Application Details
                        </h2>
                        <div class="space-y-2 text-sm">
                            <div>
                                <span class="text-gray-600 dark:text-gray-300">Applied For: </span>
                                <span class="font-medium text-gray-900 dark:text-white"><?php echo e($jobsapply?->job?->title); ?></span>
                            </div>
                            <div>
                                <span class="text-gray-600 dark:text-gray-300">Company: </span>
                                <span class="font-medium text-gray-900 dark:text-white"><?php echo e($jobsapply?->job?->company); ?></span>
                            </div>
                            <div>
                                <span class="text-gray-600 dark:text-gray-300">Location: </span>
                                <span class="font-medium text-gray-900 dark:text-white"><?php echo e($jobsapply?->job?->location); ?></span>
                            </div>
                            <div>
                                <span class="text-gray-600 dark:text-gray-300">Application Date: </span>
                                <span class="font-medium text-gray-900 dark:text-white"><?php echo e($jobsapply?->created_at?->format('M d, Y')); ?></span>
                            </div>
                        </div>
                    </section>

                    <!-- Objective / Why Interested -->
                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->why_interested): ?>
                    <section>
                        <h2 class="text-lg font-bold text-gray-800 dark:text-white mb-3 pb-2 border-b-2 border-blue-200">
                            Why Interested
                        </h2>
                        <div class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            <p class="whitespace-pre-line"><?php echo e($jobsapply?->why_interested); ?></p>
                        </div>
                    </section>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Employment Preferences -->
                    <section>
                        <h2 class="text-lg font-bold text-gray-800 dark:text-white mb-3 pb-2 border-b-2 border-blue-200">
                            Employment Preferences
                        </h2>
                        <div class="space-y-2 text-sm">
                            <div>
                                <span class="text-gray-600 dark:text-gray-300">Expected Salary: </span>
                                <span class="font-medium text-green-600 dark:text-green-400">RM <?php echo e(number_format($jobsapply?->expected_salary ?: 0) ?: 'Negotiable'); ?></span>
                            </div>
                            <div>
                                <span class="text-gray-600 dark:text-gray-300">Available Start: </span>
                                <span class="font-medium text-gray-900 dark:text-white"><?php echo e($jobsapply?->available_start_date?->format('M d, Y') ?: 'Not specified'); ?></span>
                            </div>
                            <div>
                                <span class="text-gray-600 dark:text-gray-300">Willing to Relocate: </span>
                                <span class="font-medium <?php echo e($jobsapply?->willing_to_relocate ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'); ?>">
                                    <?php echo e($jobsapply?->willing_to_relocate ? 'Yes' : 'No'); ?>

                                </span>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end p-6 border-t border-gray-200 dark:border-gray-700">
                <button wire:click="closeModal"
                        class="px-4 py-2 text-sm font-medium text-purple-700 dark:text-purple-300 bg-purple-100 dark:bg-purple-800 hover:bg-purple-200 dark:hover:bg-purple-700 rounded-lg transition-colors">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/livewire/job-apply-view.blade.php ENDPATH**/ ?>