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

        <!-- Backdrop -->
        <div class="fixed inset-0 bg-gray-700/70 transition-opacity"
             wire:click="closeModal"></div>

        <!-- Modal Content -->
        <div class="relative bg-white dark:bg-gray-900 rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">

            <!-- Header Banner -->
            <div class="relative bg-gradient-to-r from-purple-600 to-pink-500 rounded-t-2xl h-32">
                <button wire:click="closeModal"
                        class="absolute top-4 right-4 text-white hover:text-gray-200 text-2xl font-bold">
                    ✕
                </button>
            </div>

            <!-- Profile Section -->
            <div class="relative -mt-16 px-6 lg:px-10">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 flex flex-col lg:flex-row items-center lg:items-start gap-6">
                    <!-- Avatar -->
                    <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($jobsapply?->full_name)); ?>&size=150&background=random"
                         alt="<?php echo e($jobsapply?->full_name); ?>"
                         class="w-32 h-32 rounded-full border-4 border-white shadow-md object-cover">

                    <!-- Info -->
                    <div class="flex-1 text-center lg:text-left">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            <?php echo e($jobsapply?->full_name); ?>

                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">
                            <?php echo e($jobsapply?->job?->title); ?> @ <?php echo e($jobsapply?->job?->company); ?>

                        </p>
                        <div class="mt-3 flex flex-wrap justify-center lg:justify-start gap-3">
                            <span class="px-3 py-1 rounded-full text-sm bg-purple-100 text-purple-700 dark:bg-purple-700 dark:text-purple-100">
                                <?php echo e($jobsapply?->job?->location); ?>

                            </span>
                            <span class="px-3 py-1 rounded-full text-sm bg-pink-100 text-pink-700 dark:bg-pink-700 dark:text-pink-100">
                                Applied: <?php echo e($jobsapply?->created_at?->format('M d, Y')); ?>

                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Body -->
            <div class="p-6 lg:p-10 space-y-6">

                <!-- First Row: Personal + Preferences -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Personal Info -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                            👤 Personal Information
                        </h3>
                        <div class="grid grid-cols-1 gap-y-3 text-gray-700 dark:text-gray-300 text-sm">
                            <div><span class="font-medium">Email:</span> <?php echo e($jobsapply?->email); ?></div>
                            <div><span class="font-medium">Phone:</span> <?php echo e($jobsapply?->phone_number); ?></div>
                            <div><span class="font-medium">Location:</span> <?php echo e($jobsapply?->job?->location); ?></div>
                        </div>
                    </div>

                    <!-- Preferences -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                            ⚙️ Preferences
                        </h3>
                        <ul class="space-y-2 text-gray-700 dark:text-gray-300 text-sm">
                            <li>
                                <span class="font-medium">Expected Salary:</span>
                                RM <?php echo e(!empty($jobsapply?->expected_salary) ? $jobsapply->expected_salary : '0.00'); ?>

                            </li>
                            <li><span class="font-medium">Available Start:</span> <?php echo e($jobsapply?->available_start_date->format('M d, Y')); ?></li>
                            <li><span class="font-medium">Willing to Relocate:</span> <?php echo e($jobsapply?->willing_to_relocate ? 'Yes' : 'No'); ?></li>
                        </ul>
                    </div>
                </div>

                <!-- Second Row: Documents + Motivation -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Documents -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                            📄 Professional Information
                        </h3>
                        <ul class="space-y-2 text-sm">
                            <li>
                                <span class="font-medium">Resume:</span>
                                <!--[if BLOCK]><![endif]--><?php if($jobsapply?->resume_path): ?>
                                    <a href="<?php echo e(Storage::url($jobsapply->resume_path)); ?>" target="_blank"
                                       class="text-purple-600 hover:underline ml-1">View</a>
                                <?php else: ?>
                                    <span class="text-gray-500">No file</span>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </li>
                            <li>
                                <div><span class="font-medium">Cover Letter:</span> <?php echo e($jobsapply?->cover_letter); ?></div>
                            </li>
                        </ul>
                    </div>

                    <!-- Motivation -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 flex items-center gap-2">
                            💡 Motivation
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line text-sm">
                            <?php echo e($jobsapply?->why_interested ?? 'No motivation provided.'); ?>

                        </p>
                    </div>
                </div>

            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 p-6 border-t border-gray-200 dark:border-gray-700">
                <!--[if BLOCK]><![endif]--><?php if($jobsapply?->resume_path): ?>
                <a href="<?php echo e(Storage::url($jobsapply->resume_path)); ?>" target="_blank"
                   class="px-4 py-2 text-sm font-medium text-purple-600 bg-purple-50 hover:bg-purple-100 rounded-lg shadow-sm">
                    Download Resume
                </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <button wire:click="closeModal"
                        class="px-5 py-2 text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 rounded-lg shadow-md transition-colors">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/livewire/job-apply-view.blade.php ENDPATH**/ ?>