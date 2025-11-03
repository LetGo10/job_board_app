<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <section class="py-12 bg-purple-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">Companies</h1>
            <p class="mt-3 text-gray-600">Explore top employers and discover new career opportunities.</p>
        </div>
    </section>

    <!-- Companies List -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Dummy Company Card -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <img src="https://ui-avatars.com/api/?name=Tech+Corp&size=120&background=random"
                         alt="Tech Corp"
                         class="w-20 h-20 rounded-full mx-auto">
                    <h3 class="mt-4 text-lg font-semibold text-center">Tech Corp</h3>
                    <p class="text-sm text-gray-500 text-center">Innovating the Future</p>
                    <div class="mt-4 text-center">
                        <a href="#" class="text-purple-600 hover:underline text-sm font-medium">View Jobs</a>
                    </div>
                </div>

                <!-- Repeat Dummy Cards -->
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <img src="https://ui-avatars.com/api/?name=Green+Solutions&size=120&background=random"
                         alt="Green Solutions"
                         class="w-20 h-20 rounded-full mx-auto">
                    <h3 class="mt-4 text-lg font-semibold text-center">Green Solutions</h3>
                    <p class="text-sm text-gray-500 text-center">Sustainable Growth</p>
                    <div class="mt-4 text-center">
                        <a href="#" class="text-purple-600 hover:underline text-sm font-medium">View Jobs</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <img src="https://ui-avatars.com/api/?name=Health+Plus&size=120&background=random"
                         alt="Health Plus"
                         class="w-20 h-20 rounded-full mx-auto">
                    <h3 class="mt-4 text-lg font-semibold text-center">Health Plus</h3>
                    <p class="text-sm text-gray-500 text-center">Care with Innovation</p>
                    <div class="mt-4 text-center">
                        <a href="#" class="text-purple-600 hover:underline text-sm font-medium">View Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/companies.blade.php ENDPATH**/ ?>