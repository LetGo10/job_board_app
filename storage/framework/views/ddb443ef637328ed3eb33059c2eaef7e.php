<!-- Navbar -->
<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Brand & Links -->
        <div class="flex items-center space-x-8">
            <a href="<?php echo e(route('home')); ?>" class="text-xl font-extrabold text-purple-700">JobPortal</a>
            <div class="hidden md:flex space-x-6">
                <a href="<?php echo e(route('home')); ?>" class="text-gray-600 hover:text-purple-700 <?php echo e(request()->routeIs('home') ? 'font-semibold text-purple-700' : ''); ?>">Home</a>
                <a href="<?php echo e(route('companies')); ?>" class="text-gray-600 hover:text-purple-700 <?php echo e(request()->routeIs('companies') ? 'font-semibold text-purple-700' : ''); ?>">Companies</a>
                <!--<a href="<?php echo e(route('select.package')); ?>" class="text-gray-600 hover:text-purple-700 <?php echo e(request()->routeIs('select.package') ? 'font-semibold text-purple-700' : ''); ?>">Packages</a>-->
                <a href="#about" class="text-gray-600 hover:text-purple-700">About</a>
                <a href="<?php echo e(route('jobs')); ?>" class="text-gray-600 hover:text-purple-700 <?php echo e(request()->routeIs('jobs') ? 'font-semibold text-purple-700' : ''); ?>">Jobs</a>
                <?php if(auth()->guard()->check()): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('is-admin')): ?>
                        <a href="<?php echo e(route('user.dashboard')); ?>" class="text-gray-600 hover:text-purple-700 <?php echo e(request()->routeIs('user.dashboard') ? 'font-semibold text-purple-700' : ''); ?>">Dashboard</a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
                 <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-gray-600 hover:text-purple-700 <?php echo e(request()->routeIs('admin.dashboard') ? 'font-semibold text-purple-700' : ''); ?>">Dashboard</a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right Side -->
        <?php if(auth()->guard()->check()): ?>
            <div class="flex items-center space-x-4">
                <!-- Create Job Button -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
                    <!--<button
                        x-data
                        @click="$dispatch('open-job-modal')"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-white font-medium
                            bg-gradient-to-r from-purple-600 to-pink-600
                            hover:opacity-90 shadow-md hover:shadow-lg
                            transition duration-200"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Create Job
                    </button>-->
                    <a href="<?php echo e(route('post.job')); ?>"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-white font-medium
                            bg-gradient-to-r from-purple-600 to-pink-600
                            hover:opacity-90 shadow-md hover:shadow-lg
                            transition duration-200"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Create Job
                    </a>
                <?php endif; ?>
                <a href="" class="text-sm text-purple-700 hover:underline <?php echo e(request()->routeIs('profile') ? 'font-bold underline' : ''); ?>">
                    Profile
                </a>
                <span class="text-sm text-gray-600">Hello, <?php echo e(Auth::user()->name); ?></span>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('auth2.logout-button', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3371345463-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        <?php else: ?>
            <!-- Auth + Register -->
            <div class="flex items-center space-x-3">
                <a href="<?php echo e(route('login2')); ?>" class="px-4 py-2 border border-purple-600 text-purple-600 rounded-md hover:bg-purple-50 transition">
                    Login
                </a>
                <a href="<?php echo e(route('register2')); ?>" class="px-4 py-2 rounded-md text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:opacity-90 transition">
                    Register
                </a>
            </div>
        <?php endif; ?>
    </div>
</nav>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/components/navbar.blade.php ENDPATH**/ ?>