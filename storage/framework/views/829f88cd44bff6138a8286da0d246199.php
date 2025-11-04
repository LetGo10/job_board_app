<div wire:poll.10s>
<!--[if BLOCK]><![endif]--><?php if($applications->count() > 0): ?>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Job Details
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Company
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Applied Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div>
                                <div class="font-medium text-gray-900 dark:text-white"><?php echo e($application->job->title); ?></div>
                                <div class="text-sm text-gray-500 dark:text-gray-400"><?php echo e(Str::limit($application->job->description, 60)); ?></div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900 dark:text-white"><?php echo e($application->job->company); ?></div>
                            <div class="text-sm text-gray-500 dark:text-gray-400"><?php echo e($application->job->location); ?></div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                            <?php echo e($application->created_at->format('F j, Y')); ?>

                        </td>
                        <td class="px-6 py-4">
                            <!--[if BLOCK]><![endif]--><?php if($application->status === 'pending'): ?>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            <?php elseif($application->status === 'hired'): ?>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Hired
                                </span>
                            <?php elseif($application->status === 'rejected'): ?>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Rejected
                                </span>
                            <?php else: ?>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    <?php echo e(ucfirst($application->status)); ?>

                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button wire:click="viewJobApplicant2(<?php echo e($application->id); ?>)" 
                                    title="View Applicant Details" 
                                    class="p-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-full transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
<?php else: ?>
    <!-- Empty State -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center">
        <div class="text-6xl mb-4">📋</div>
        <h3 class="text-lg font-semibold text-gray-900 mb-2">No Applications Yet</h3>
        <p class="text-gray-600 mb-6">
            You haven't applied to any jobs yet. Start browsing jobs and apply to positions that interest you.
        </p>
        <a href="<?php echo e(route('jobs')); ?>"
            class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
            Browse Jobs
        </a>
    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/livewire/user-job-applied-list.blade.php ENDPATH**/ ?>