<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-100 via-pink-50 to-blue-100">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <!-- Header -->
        <div class="mb-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900">Create Account ✨</h2>
            <p class="text-sm text-gray-500">
                Already have an account?
                <a href="{{ route('login') }}" class="text-purple-600 font-medium hover:underline">
                    Login here
                </a>
            </p>
        </div>

        <!-- Form -->
        <form wire:submit.prevent="register" class="space-y-6">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input
                    id="name"
                    type="text"
                    wire:model="name"
                    placeholder="John Doe"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                           focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                >
                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input
                    id="email"
                    type="email"
                    wire:model="email"
                    placeholder="you@example.com"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                           focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                >
                @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    id="password"
                    type="password"
                    wire:model="password"
                    placeholder="••••••••"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                           focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                >
                @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input
                    id="password_confirmation"
                    type="password"
                    wire:model="password_confirmation"
                    placeholder="••••••••"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm
                           focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                >
                @error('password_confirmation') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Terms -->
            <div class="flex items-center">
                <input
                    id="terms"
                    type="checkbox"
                    wire:model="terms"
                    class="h-4 w-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
                >
                <label for="terms" class="ml-2 block text-sm text-gray-600">
                    I agree to the
                    <a href="#" class="text-purple-600 hover:underline">Terms</a> and
                    <a href="#" class="text-purple-600 hover:underline">Privacy Policy</a>
                </label>
            </div>
            @error('terms') <p class="text-sm text-red-600">{{ $message }}</p> @enderror

            <!-- Button -->
            <button
                type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg
                       text-sm font-medium text-white bg-purple-600 hover:bg-purple-700
                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                Create Account
            </button>
        </form>
    </div>
</div>
