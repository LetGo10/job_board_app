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
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-blue-800">
                                pending
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="inline-flex items-center gap-2 px-3 py-1.5 text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-200">
                                View
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
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/livewire/user-job-applied-list.blade.php ENDPATH**/ ?>