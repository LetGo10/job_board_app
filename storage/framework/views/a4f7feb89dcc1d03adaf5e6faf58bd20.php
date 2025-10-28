<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-100 via-pink-50 to-blue-100">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <!-- Header -->
        <div class="mb-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900">Welcome Back 👋</h2>
            <p class="text-sm text-gray-500">Login to your account</p>
        </div>

        <!-- Form -->
        <form wire:submit.prevent="login" class="space-y-6">
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input
                    id="email"
                    type="email"
                    wire:model="email"
                    autofocus
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                           focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                    placeholder="you@example.com"
                >
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    id="password"
                    type="password"
                    wire:model="password"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                           focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                    placeholder="••••••••"
                >
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <!-- Remember Me & Forgot -->
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" wire:model.defer="remember" class="h-4 w-4 text-purple-600 rounded border-gray-300">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
                <a href="#" class="text-sm text-purple-600 hover:underline">Forgot password?</a>
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg
                       text-sm font-medium text-white bg-purple-600 hover:bg-purple-700
                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                Login
            </button>
        </form>

        <!-- Divider & Register -->
        <div class="my-6 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
            <span class="px-3 text-sm text-gray-400">OR</span>
            <div class="w-full border-t border-gray-300"></div>
        </div>

        <p class="text-center text-sm text-gray-600">
            Don’t have an account?
            <a href="<?php echo e(route('register2')); ?>" class="font-medium text-purple-600 hover:underline">
                Create one
            </a>
        </p>
    </div>
</div>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/livewire/auth2/login2.blade.php ENDPATH**/ ?>