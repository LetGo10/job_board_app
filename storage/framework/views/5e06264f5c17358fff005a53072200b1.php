<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Applicant
                </th>
                <th scope="col" class="px-6 py-3">
                    Position
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
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $jobsapply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($app['full_name'])); ?>&size=40&background=random"
                                 alt="<?php echo e($app['name']); ?>" class="w-10 h-10 rounded-full">
                            <div>
                                <div class="font-medium text-gray-900 dark:text-white"><?php echo e($app['full_name']); ?></div>
                                <div class="text-sm text-gray-500 dark:text-gray-400"><?php echo e($app['email']); ?></div>
                            </div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900 dark:text-white"><?php echo e($app->job->title); ?></div>
                        <div class="text-sm text-gray-500 dark:text-gray-400"><?php echo e($app->job->company); ?></div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                        <?php echo e(\Carbon\Carbon::parse($app['created_at'])->format('F j, Y')); ?>

                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-blue-800">
                            pending
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <button wire:click="viewJobApplicant(<?php echo e($app->id); ?>)"
                            class="inline-flex items-center gap-2 px-3 py-1.5 text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-200">
                            View
                        </button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="px-6 py-6 text-center text-sm text-gray-500 dark:text-gray-400">
                        No applications found.
                    </td>
                </tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
</div>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/livewire/job-apply-list.blade.php ENDPATH**/ ?>