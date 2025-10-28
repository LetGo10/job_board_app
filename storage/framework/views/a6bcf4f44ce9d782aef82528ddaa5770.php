<div>
    <h2 class="text-3xl font-bold mb-8 text-gray-800">User Dashboard</h2>

    <!-- Welcome Message -->
    <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-2xl shadow-sm mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Welcome back, <?php echo e(auth()->user()->name); ?>! 👋</h3>
        <p class="text-gray-600">Here's an overview of your job search activity.</p>
    </div>

    <!-- User Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
            <div class="text-blue-600 text-4xl">📄</div>
            <p class="mt-3 text-3xl font-extrabold text-gray-800"><?php echo e(auth()->user()->jobApplications()->count() ?? 0); ?></p>
            <p class="text-sm text-gray-600">Jobs Applied</p>
        </div>
        <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
            <div class="text-green-500 text-4xl">🔖</div>
            <p class="mt-3 text-3xl font-extrabold text-gray-800"><?php echo e(\App\Models\Job::count() ?? 0); ?></p>
            <p class="text-sm text-gray-600">Available Jobs</p>
        </div>
        <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
            <div class="text-purple-500 text-4xl">⭐</div>
            <p class="mt-3 text-3xl font-extrabold text-gray-800"><?php echo e(auth()->user()->jobApplications()->count() > 0 ? 'Active' : 'New'); ?></p>
            <p class="text-sm text-gray-600">Profile Status</p>
        </div>
    </div>

    <!-- Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Applications -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition lg:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-gray-700 flex items-center gap-2">
                    📋 Recent Applications
                </h3>
                <a href="<?php echo e(route('user.applications')); ?>" class="text-sm text-purple-600 hover:text-purple-800">
                    View All →
                </a>
            </div>

            <!--[if BLOCK]><![endif]--><?php if(auth()->user()->jobApplications()->count() > 0): ?>
                <div class="space-y-3">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = auth()->user()->jobApplications()->with('job')->latest()->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <h4 class="font-medium text-gray-800"><?php echo e($application->job->title); ?></h4>
                                <p class="text-sm text-gray-600"><?php echo e($application->job->company); ?></p>
                            </div>
                            <div class="text-right">
                                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full">
                                    Applied
                                </span>
                                <p class="text-xs text-gray-500 mt-1"><?php echo e($application->created_at->diffForHumans()); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php else: ?>
                <div class="text-center py-8">
                    <div class="text-4xl mb-2">📋</div>
                    <p class="text-gray-500 mb-4">No applications yet</p>
                    <a href="<?php echo e(route('jobs')); ?>"
                       class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                        Browse Jobs
                    </a>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <!-- Quick Actions -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="font-semibold mb-4 text-gray-700 flex items-center gap-2">
                ⚡ Quick Actions
            </h3>
            <div class="space-y-3">
                <a href="<?php echo e(route('jobs')); ?>"
                   class="flex items-center gap-3 p-3 rounded-lg bg-purple-50 hover:bg-purple-100 transition">
                    <span class="text-purple-600">🔍</span>
                    <span class="text-gray-800">Browse Jobs</span>
                </a>
                <a href="<?php echo e(route('user.applications')); ?>"
                   class="flex items-center gap-3 p-3 rounded-lg bg-blue-50 hover:bg-blue-100 transition">
                    <span class="text-blue-600">📋</span>
                    <span class="text-gray-800">My Applications</span>
                </a>
                <a href="<?php echo e(route('settings.profile')); ?>"
                   class="flex items-center gap-3 p-3 rounded-lg bg-green-50 hover:bg-green-100 transition">
                    <span class="text-green-600">⚙️</span>
                    <span class="text-gray-800">Update Profile</span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/livewire/user-dashboard.blade.php ENDPATH**/ ?>