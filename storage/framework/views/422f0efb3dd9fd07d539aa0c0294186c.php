<div class="lg:col-span-3 space-y-6">
    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="bg-white border border-gray-100 rounded-2xl shadow-md hover:shadow-lg transition p-6">
        <div class="flex flex-col md:flex-row md:items-start md:justify-between">
            <!-- Job Info -->
            <div class="flex-1">
            <h3 class="text-xl font-semibold text-gray-900"><?php echo e($job['title']); ?></h3>
            <p class="mt-2 text-gray-600"> <?php echo e($job['description']); ?></p>
            <div class="mt-3 flex gap-2 flex-wrap">
                <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs"><?php echo e($job['company']); ?></span>
                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs"> <?php echo e($job['location']); ?></span>
            </div>
            </div>

            <!-- Vertical Buttons with gap -->
            <div class="flex flex-col items-start gap-3 mt-6 md:mt-0 md:ml-6">

                <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $job)): ?>
                <button wire:click="editJob(<?php echo e($job->id); ?>)"
                    class="flex items-center gap-1 px-3 py-1.5 rounded-md bg-blue-50 text-blue-600 hover:bg-blue-100 text-sm">
                    ✏️ <span>Edit</span>
                </button>
                <?php endif; ?> -->

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $job)): ?>
                <button wire:click="viewJob(<?php echo e($job->id); ?>)"
                    class="px-6 py-2.5 bg-purple-600 text-white font-medium rounded-full shadow-md
                        hover:bg-purple-700 hover:shadow-lg transition-all duration-200
                        flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Apply Now</span>
                </button>
                <?php endif; ?>

                <!--  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $job)): ?>
                <button wire:click="confirmDelete(<?php echo e($job->id); ?>)"
                    class="flex items-center gap-1 px-3 py-1.5 rounded-md bg-red-50 text-red-600 hover:bg-red-100 text-sm">
                    🗑️ <span>Delete</span>
                </button>
                <?php endif; ?> -->


                <!-- <button wire:click="viewJob(<?php echo e($job->id); ?>)"
                    class="px-5 py-2 bg-purple-600 text-white font-medium rounded-full shadow
                        hover:bg-purple-700 hover:shadow-lg transition-all duration-200">
                    <span>Apply Now</span>
                </button>
                -->

            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-12 text-center">
        <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m-8 0V6a2 2 0 00-2 2v6m0 0v4a2 2 0 002 2h12a2 2 0 002-2v-4"></path>
        </svg>
        <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-2">No jobs found</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-4">
            We couldn’t find any job listings right now. Try checking back later or adjust your filters.
        </p>
    </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Delete Modal -->
    <div x-data="{ open: <?php if ((object) ('showDeleteModal') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showDeleteModal'->value()); ?>')<?php echo e('showDeleteModal'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showDeleteModal'); ?>')<?php endif; ?> }" x-cloak>
        <div x-show="open"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            x-transition:enter="transition-all duration-500 ease-out"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition-all duration-300 ease-in"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">

            <!-- Backdrop -->
            <div class="fixed inset-0 bg-gray-500/70" @click="open = false"></div>

            <!-- Modal Content -->
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 z-10">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirm Delete</h2>
                <p class="text-gray-600 mb-6">
                    Are you sure you want to delete this job listing? This action cannot be undone.
                </p>
                <div class="flex justify-end gap-3">
                    <button wire:click="closeDeleteModal"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Cancel
                    </button>
                    <button wire:click="deleteJob(<?php echo e($jobToDelete); ?>)"
                        class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/livewire/job-list.blade.php ENDPATH**/ ?>