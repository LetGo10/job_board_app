<div x-data="{ showModal: <?php if ((object) ('showModal') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showModal'->value()); ?>')<?php echo e('showModal'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showModal'); ?>')<?php endif; ?> }" x-cloak>
    <!-- Professional Resume Modal -->
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
             class="fixed inset-0 bg-purple-900/80 transition-opacity animate-in fade-in duration-300"
             wire:click="closeModal">
        </div>

        <!-- Resume Content -->
        <div x-transition:enter="transition-all duration-600 ease-out delay-100"
             x-transition:enter-start="opacity-0 translate-y-8 scale-95 rotate-1"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100 rotate-0"
             x-transition:leave="transition-all duration-400 ease-in"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100 rotate-0"
             x-transition:leave-end="opacity-0 translate-y-8 scale-95 -rotate-1"
             class="relative bg-white dark:bg-gray-800 rounded-lg shadow-2xl max-w-5xl w-full max-h-[95vh] overflow-hidden">

            <!-- Close Button -->
            <button wire:click="closeModal"
                    class="absolute top-4 right-4 z-10 p-2 rounded-full bg-purple-100 dark:bg-purple-800 text-purple-600 hover:text-purple-800 dark:hover:text-purple-300 hover:bg-purple-200 dark:hover:bg-purple-700 transition-all duration-200 shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Professional Resume Header -->
            <div class="bg-gradient-to-r from-purple-800 to-purple-900 text-white p-8 rounded-t-lg">
                <div class="flex items-start space-x-6">
                    <!-- Professional Photo -->
                    <div class="flex-shrink-0">
                        <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($jobsapply?->full_name)); ?>&size=120&background=8b5cf6&color=ffffff&bold=true"
                             alt="<?php echo e($jobsapply?->full_name); ?>"
                             class="w-24 h-24 rounded-full border-4 border-purple-300/30 shadow-lg object-cover">
                    </div>

                    <!-- Header Information -->
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold mb-2"><?php echo e($jobsapply?->full_name); ?></h1>
                        <p class="text-xl text-purple-200 mb-3">Candidate for <?php echo e($jobsapply?->job?->title); ?></p>

                        <!-- Contact Information Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span><?php echo e($jobsapply?->email); ?></span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span><?php echo e($jobsapply?->phone_number); ?></span>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php if($jobsapply?->linkedin_url): ?>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-purple-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                                <a href="<?php echo e($jobsapply->linkedin_url); ?>" target="_blank" class="hover:text-purple-200 underline">LinkedIn Profile</a>
                            </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><?php if($jobsapply?->portfolio_url): ?>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03-3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                </svg>
                                <a href="<?php echo e($jobsapply->portfolio_url); ?>" target="_blank" class="hover:text-purple-200 underline">Portfolio Website</a>
                            </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>

                    <!-- Application Status Badge -->
                    <div class="text-right">
                        <span class="inline-block px-3 py-1 bg-purple-600 text-purple-100 text-sm font-medium rounded-full">
                            Applied <?php echo e($jobsapply?->created_at?->diffForHumans()); ?>

                        </span>
                    </div>
                </div>
            </div>

            <!-- Resume Body - Two Column Layout -->
            <div class="flex overflow-y-auto max-h-[75vh]">
                <!-- Left Sidebar -->
                <div class="w-80 bg-purple-50 dark:bg-purple-900/20 p-6 space-y-6 border-r border-purple-200 dark:border-purple-700">
                    
                    <!-- Application Details -->
                    <div>
                        <h3 class="text-sm font-bold text-purple-800 dark:text-purple-300 uppercase tracking-wide mb-3 border-b border-purple-300 dark:border-purple-600 pb-2">
                            📋 Application Details
                        </h3>
                        <div class="space-y-3 text-sm">
                            <div class="bg-white dark:bg-purple-800/30 p-3 rounded-lg">
                                <span class="text-purple-600 dark:text-purple-400 font-medium">Applied For:</span>
                                <p class="font-semibold text-purple-900 dark:text-purple-100"><?php echo e($jobsapply?->job?->title); ?></p>
                            </div>
                            <div class="bg-white dark:bg-purple-800/30 p-3 rounded-lg">
                                <span class="text-purple-600 dark:text-purple-400 font-medium">Company:</span>
                                <p class="font-semibold text-purple-900 dark:text-purple-100"><?php echo e($jobsapply?->job?->company); ?></p>
                            </div>
                            <div class="bg-white dark:bg-purple-800/30 p-3 rounded-lg">
                                <span class="text-purple-600 dark:text-purple-400 font-medium">Location:</span>
                                <p class="font-semibold text-purple-900 dark:text-purple-100"><?php echo e($jobsapply?->job?->location); ?></p>
                            </div>
                            <div class="bg-white dark:bg-purple-800/30 p-3 rounded-lg">
                                <span class="text-purple-600 dark:text-purple-400 font-medium">Applied Date:</span>
                                <p class="font-semibold text-purple-900 dark:text-purple-100"><?php echo e($jobsapply?->created_at?->format('M d, Y \a\t H:i')); ?></p>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php if($jobsapply?->updated_at && $jobsapply->updated_at != $jobsapply->created_at): ?>
                            <div class="bg-white dark:bg-purple-800/30 p-3 rounded-lg">
                                <span class="text-purple-600 dark:text-purple-400 font-medium">Last Updated:</span>
                                <p class="font-semibold text-purple-900 dark:text-purple-100"><?php echo e($jobsapply?->updated_at?->format('M d, Y \a\t H:i')); ?></p>
                            </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>

                    <!-- Employment Preferences -->
                    <div>
                        <h3 class="text-sm font-bold text-purple-800 dark:text-purple-300 uppercase tracking-wide mb-3 border-b border-purple-300 dark:border-purple-600 pb-2">
                            💼 Employment Preferences
                        </h3>
                        <div class="space-y-3 text-sm">
                            <div class="bg-white dark:bg-purple-800/30 p-3 rounded-lg">
                                <span class="text-purple-600 dark:text-purple-400 font-medium">Expected Salary:</span>
                                <p class="font-bold text-green-600 dark:text-green-400 text-lg">💰 RM <?php echo e($jobsapply?->expected_salary ?: 'Negotiable'); ?></p>
                            </div>
                            <div class="bg-white dark:bg-purple-800/30 p-3 rounded-lg">
                                <span class="text-purple-600 dark:text-purple-400 font-medium">Available Start:</span>
                                <p class="font-semibold text-purple-900 dark:text-purple-100">📅 <?php echo e($jobsapply?->available_start_date?->format('M d, Y')); ?></p>
                            </div>
                            <div class="bg-white dark:bg-purple-800/30 p-3 rounded-lg">
                                <span class="text-purple-600 dark:text-purple-400 font-medium">Willing to Relocate:</span>
                                <p class="font-semibold <?php echo e($jobsapply?->willing_to_relocate ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'); ?>">
                                    <?php echo e($jobsapply?->willing_to_relocate ? '✅ Yes' : '❌ No'); ?>

                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Documents -->
                    <div>
                        <h3 class="text-sm font-bold text-purple-800 dark:text-purple-300 uppercase tracking-wide mb-3 border-b border-purple-300 dark:border-purple-600 pb-2">
                            📁 Documents
                        </h3>
                        <div class="space-y-3">
                            <div class="bg-white dark:bg-purple-800/30 p-3 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <span class="text-purple-600 dark:text-purple-400 font-medium">Resume:</span>
                                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->resume_path): ?>
                                        <a href="<?php echo e(Storage::url($jobsapply->resume_path)); ?>" target="_blank"
                                           class="px-3 py-1.5 text-xs font-medium text-purple-600 bg-purple-100 hover:bg-purple-200 dark:bg-purple-800 dark:text-purple-300 dark:hover:bg-purple-700 rounded-lg transition-colors">
                                            📄 View Resume
                                        </a>
                                    <?php else: ?>
                                        <span class="text-xs bg-red-100 text-red-500 px-2 py-1 rounded">❌ Not provided</span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                            <div class="bg-white dark:bg-purple-800/30 p-3 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <span class="text-purple-600 dark:text-purple-400 font-medium">Cover Letter File:</span>
                                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->cover_letter_path): ?>
                                        <a href="<?php echo e(Storage::url($jobsapply->cover_letter_path)); ?>" target="_blank"
                                           class="px-3 py-1.5 text-xs font-medium text-purple-600 bg-purple-100 hover:bg-purple-200 dark:bg-purple-800 dark:text-purple-300 dark:hover:bg-purple-700 rounded-lg transition-colors">
                                            📝 View File
                                        </a>
                                    <?php else: ?>
                                        <span class="text-xs bg-red-100 text-red-500 px-2 py-1 rounded">❌ Not provided</span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Information -->
                    <div class="bg-purple-100 dark:bg-purple-900/40 p-3 rounded-lg">
                        <h4 class="text-xs font-semibold text-purple-800 dark:text-purple-300 mb-2">🔗 System References</h4>
                        <div class="text-xs text-purple-600 dark:text-purple-400 space-y-1">
                            <p><span class="font-medium">Application ID:</span> #<?php echo e($jobsapply?->id); ?></p>
                            <p><span class="font-medium">Job ID:</span> #<?php echo e($jobsapply?->job_id); ?></p>
                            <p><span class="font-medium">User ID:</span> #<?php echo e($jobsapply?->user_id); ?></p>
                        </div>
                    </div>
                </div>

                    <!-- Career Objective Section -->
                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->why_interested): ?>
                    <section>
                        <h2 class="text-lg font-bold text-purple-800 dark:text-purple-300 mb-3 pb-2 border-b-2 border-purple-300 dark:border-purple-600">
                            🎯 CAREER OBJECTIVE
                        </h2>
                        <div class="bg-purple-50 dark:bg-purple-900/30 p-4 rounded-lg">
                            <div class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                <p class="whitespace-pre-line"><?php echo e($jobsapply?->why_interested); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Cover Letter Section -->
                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->cover_letter): ?>
                    <section>
                        <h2 class="text-lg font-bold text-purple-800 dark:text-purple-300 mb-3 pb-2 border-b-2 border-purple-300 dark:border-purple-600">
                            💌 COVER LETTER
                        </h2>
                        <div class="bg-purple-50 dark:bg-purple-900/30 p-4 rounded-lg">
                            <div class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                <p class="whitespace-pre-line"><?php echo e($jobsapply?->cover_letter); ?></p>
                            </div>
                        </div>
                    </section>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Professional Links Section -->
                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->linkedin_url || $jobsapply?->portfolio_url): ?>
                    <section>
                        <h2 class="text-lg font-bold text-purple-800 dark:text-purple-300 mb-3 pb-2 border-b-2 border-purple-300 dark:border-purple-600">
                            🌐 PROFESSIONAL LINKS
                        </h2>
                        <div class="flex flex-wrap gap-3">
                            <!--[if BLOCK]><![endif]--><?php if($jobsapply?->linkedin_url): ?>
                            <a href="<?php echo e($jobsapply->linkedin_url); ?>" target="_blank"
                               class="px-4 py-2 text-sm font-medium text-purple-600 bg-purple-100 hover:bg-purple-200 dark:bg-purple-800 dark:text-purple-300 dark:hover:bg-purple-700 rounded-lg transition-colors">
                                💼 LinkedIn Profile
                            </a>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><?php if($jobsapply?->portfolio_url): ?>
                            <a href="<?php echo e($jobsapply->portfolio_url); ?>" target="_blank"
                               class="px-4 py-2 text-sm font-medium text-purple-600 bg-purple-100 hover:bg-purple-200 dark:bg-purple-800 dark:text-purple-300 dark:hover:bg-purple-700 rounded-lg transition-colors">
                                🎨 Portfolio
                            </a>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </section>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Complete Database Information -->
                    <section>
                        <h2 class="text-lg font-bold text-purple-800 dark:text-purple-300 mb-3 pb-2 border-b-2 border-purple-300 dark:border-purple-600">
                            📊 COMPLETE APPLICATION DATA
                        </h2>
                        
                        <div class="bg-purple-50 dark:bg-purple-900/30 p-4 rounded-lg space-y-6">
                            <!-- Personal Information Grid -->
                            <div>
                                <h3 class="text-md font-semibold text-purple-700 dark:text-purple-400 mb-3">Personal Information</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                                    <div class="bg-white dark:bg-purple-800/40 p-3 rounded border border-purple-200 dark:border-purple-600">
                                        <span class="text-purple-600 dark:text-purple-400 font-medium">Full Name:</span>
                                        <p class="font-semibold text-purple-900 dark:text-purple-100"><?php echo e($jobsapply?->full_name); ?></p>
                                    </div>
                                    <div class="bg-white dark:bg-purple-800/40 p-3 rounded border border-purple-200 dark:border-purple-600">
                                        <span class="text-purple-600 dark:text-purple-400 font-medium">Email:</span>
                                        <p class="font-semibold text-purple-900 dark:text-purple-100"><?php echo e($jobsapply?->email); ?></p>
                                    </div>
                                    <div class="bg-white dark:bg-purple-800/40 p-3 rounded border border-purple-200 dark:border-purple-600">
                                        <span class="text-purple-600 dark:text-purple-400 font-medium">Phone:</span>
                                        <p class="font-semibold text-purple-900 dark:text-purple-100"><?php echo e($jobsapply?->phone_number); ?></p>
                                    </div>
                                    <div class="bg-white dark:bg-purple-800/40 p-3 rounded border border-purple-200 dark:border-purple-600">
                                        <span class="text-purple-600 dark:text-purple-400 font-medium">LinkedIn:</span>
                                        <p class="font-semibold text-purple-900 dark:text-purple-100 text-xs break-all"><?php echo e($jobsapply?->linkedin_url ?: '❌ Not provided'); ?></p>
                                    </div>
                                    <div class="bg-white dark:bg-purple-800/40 p-3 rounded border border-purple-200 dark:border-purple-600">
                                        <span class="text-purple-600 dark:text-purple-400 font-medium">Portfolio:</span>
                                        <p class="font-semibold text-purple-900 dark:text-purple-100 text-xs break-all"><?php echo e($jobsapply?->portfolio_url ?: '❌ Not provided'); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- File Information -->
                            <div>
                                <h3 class="text-md font-semibold text-purple-700 dark:text-purple-400 mb-3">Document Files</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                                    <div class="bg-white dark:bg-purple-800/40 p-3 rounded border border-purple-200 dark:border-purple-600">
                                        <span class="text-purple-600 dark:text-purple-400 font-medium">Resume File Path:</span>
                                        <p class="font-mono text-xs text-purple-900 dark:text-purple-100 break-all">
                                            <?php echo e($jobsapply?->resume_path ?: '❌ No file uploaded'); ?>

                                        </p>
                                    </div>
                                    <div class="bg-white dark:bg-purple-800/40 p-3 rounded border border-purple-200 dark:border-purple-600">
                                        <span class="text-purple-600 dark:text-purple-400 font-medium">Cover Letter File Path:</span>
                                        <p class="font-mono text-xs text-purple-900 dark:text-purple-100 break-all">
                                            <?php echo e($jobsapply?->cover_letter_path ?: '❌ No file uploaded'); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Text Content Information -->
                            <div>
                                <h3 class="text-md font-semibold text-purple-700 dark:text-purple-400 mb-3">Text Content</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                                    <div class="bg-white dark:bg-purple-800/40 p-3 rounded border border-purple-200 dark:border-purple-600">
                                        <span class="text-purple-600 dark:text-purple-400 font-medium">Cover Letter Length:</span>
                                        <p class="font-semibold text-purple-900 dark:text-purple-100">
                                            <?php echo e($jobsapply?->cover_letter ? strlen($jobsapply->cover_letter) . ' characters' : '❌ No cover letter text'); ?>

                                        </p>
                                    </div>
                                    <div class="bg-white dark:bg-purple-800/40 p-3 rounded border border-purple-200 dark:border-purple-600">
                                        <span class="text-purple-600 dark:text-purple-400 font-medium">Why Interested Length:</span>
                                        <p class="font-semibold text-purple-900 dark:text-purple-100">
                                            <?php echo e($jobsapply?->why_interested ? strlen($jobsapply->why_interested) . ' characters' : '❌ No why interested text'); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Timestamps -->
                            <div>
                                <h3 class="text-md font-semibold text-purple-700 dark:text-purple-400 mb-3">Timestamps</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                                    <div class="bg-white dark:bg-purple-800/40 p-3 rounded border border-purple-200 dark:border-purple-600">
                                        <span class="text-purple-600 dark:text-purple-400 font-medium">Created At:</span>
                                        <p class="font-semibold text-purple-900 dark:text-purple-100"><?php echo e($jobsapply?->created_at?->format('Y-m-d H:i:s')); ?> (<?php echo e($jobsapply?->created_at?->diffForHumans()); ?>)</p>
                                    </div>
                                    <div class="bg-white dark:bg-purple-800/40 p-3 rounded border border-purple-200 dark:border-purple-600">
                                        <span class="text-purple-600 dark:text-purple-400 font-medium">Updated At:</span>
                                        <p class="font-semibold text-purple-900 dark:text-purple-100"><?php echo e($jobsapply?->updated_at?->format('Y-m-d H:i:s')); ?> (<?php echo e($jobsapply?->updated_at?->diffForHumans()); ?>)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>

            <!-- Professional Footer -->
            <div class="flex items-center justify-between p-6 border-t border-purple-200 dark:border-purple-700 bg-purple-50 dark:bg-purple-900/20">
                <div class="flex items-center space-x-3">
                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->resume_path): ?>
                    <a href="<?php echo e(Storage::url($jobsapply->resume_path)); ?>" target="_blank"
                       class="px-4 py-2 text-sm font-medium text-purple-600 bg-purple-100 hover:bg-purple-200 dark:bg-purple-800 dark:text-purple-300 dark:hover:bg-purple-700 rounded-lg transition-colors">
                        📄 Download Resume
                    </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->cover_letter_path): ?>
                    <a href="<?php echo e(Storage::url($jobsapply->cover_letter_path)); ?>" target="_blank"
                       class="px-4 py-2 text-sm font-medium text-purple-600 bg-purple-100 hover:bg-purple-200 dark:bg-purple-800 dark:text-purple-300 dark:hover:bg-purple-700 rounded-lg transition-colors">
                        📝 Download Cover Letter
                    </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->linkedin_url): ?>
                    <a href="<?php echo e($jobsapply->linkedin_url); ?>" target="_blank"
                       class="px-4 py-2 text-sm font-medium text-purple-600 bg-purple-100 hover:bg-purple-200 dark:bg-purple-800 dark:text-purple-300 dark:hover:bg-purple-700 rounded-lg transition-colors">
                        💼 LinkedIn Profile
                    </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($jobsapply?->portfolio_url): ?>
                    <a href="<?php echo e($jobsapply->portfolio_url); ?>" target="_blank"
                       class="px-4 py-2 text-sm font-medium text-purple-600 bg-purple-100 hover:bg-purple-200 dark:bg-purple-800 dark:text-purple-300 dark:hover:bg-purple-700 rounded-lg transition-colors">
                        🎨 Portfolio
                    </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="text-sm text-purple-600 dark:text-purple-400">
                    Application ID: #<?php echo e($jobsapply?->id ?? 'N/A'); ?>

                </div>
                <button wire:click="closeModal"
                        class="px-6 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 dark:bg-purple-700 dark:hover:bg-purple-600 rounded-lg transition-colors shadow-md">
                    ✖️ Close
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/livewire/job-apply-view.blade.php ENDPATH**/ ?>