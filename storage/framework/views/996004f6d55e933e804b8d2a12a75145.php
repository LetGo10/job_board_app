<aside class="w-72 bg-white border-r border-gray-200 min-h-screen hidden md:flex flex-col">
    <!-- Profile Card -->
    <div class="p-6 flex flex-col items-center text-center border-b border-gray-200">
        <img src="https://ui-avatars.com/api/?name=Tech+Corp&size=120&background=random"
            class="w-20 h-20 rounded-full shadow" alt="Company Logo">
        <h3 class="mt-4 text-lg font-semibold">Tech Corp</h3>
        <p class="text-sm text-gray-500">Innovating the Future</p>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-6 space-y-2 text-sm">
        <a href="<?php echo e(route('admin.dashboard')); ?>"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800'); ?>">
            📊 <span class="ml-3">Dashboard</span>
        </a>
        <a href="<?php echo e(route('user.dashboard')); ?>"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                <?php echo e(request()->routeIs('user.dashboard') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800'); ?>">
            📊 <span class="ml-3">Dashboard</span>
        </a>

        <a href="<?php echo e(route('job.application')); ?>"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                <?php echo e(request()->routeIs('job.application') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800'); ?>">
            👥 <span class="ml-3">Applicants Jobs</span>
        </a>

        <a href="<?php echo e(route('user.applications')); ?>"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                <?php echo e(request()->routeIs('user.applications') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800'); ?>">
            📋 <span class="ml-3">My Applications</span>
        </a>

    </nav>
</aside>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/components/sidebar.blade.php ENDPATH**/ ?>