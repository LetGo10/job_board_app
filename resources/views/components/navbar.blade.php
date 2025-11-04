<!-- Navbar -->
<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Brand & Links -->
        <div class="flex items-center space-x-8">
            <a href="{{ route('home') }}" class="text-xl font-extrabold text-purple-700">JobPortal</a>
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-purple-700 {{ request()->routeIs('home') ? 'font-semibold text-purple-700' : '' }}">Home</a>
                <a href="{{ route('companies') }}" class="text-gray-600 hover:text-purple-700 {{ request()->routeIs('companies') ? 'font-semibold text-purple-700' : '' }}">Companies</a>
                <!--<a href="{{ route('select.package') }}" class="text-gray-600 hover:text-purple-700 {{ request()->routeIs('select.package') ? 'font-semibold text-purple-700' : '' }}">Packages</a>-->
                <a href="#about" class="text-gray-600 hover:text-purple-700">About</a>
                <a href="{{ route('jobs') }}" class="text-gray-600 hover:text-purple-700 {{ request()->routeIs('jobs') ? 'font-semibold text-purple-700' : '' }}">Jobs</a>
                @auth
                    @cannot('is-admin')
                        <a href="{{ route('user.dashboard') }}" class="text-gray-600 hover:text-purple-700 {{ request()->routeIs('user.dashboard') ? 'font-semibold text-purple-700' : '' }}">Dashboard</a>
                    @endcannot
                @endauth
                @can('is-admin')
                 <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-purple-700 {{ request()->routeIs('admin.dashboard') ? 'font-semibold text-purple-700' : '' }}">Dashboard</a>
                @endcan
            </div>
        </div>

        <!-- Right Side -->
        @auth
            <div class="flex items-center space-x-4">
                <!-- Create Job Button -->
                @can('is-admin')
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
                    <a href="{{ route('post.job') }}"
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
                @endcan
                <a href="" class="text-sm text-purple-700 hover:underline {{ request()->routeIs('profile') ? 'font-bold underline' : '' }}">
                    Profile
                </a>
                <span class="text-sm text-gray-600">Hello, {{ Auth::user()->name }}</span>
                <livewire:auth2.logout-button />
            </div>
        @else
            <!-- Auth + Register -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('login2') }}" class="px-4 py-2 border border-purple-600 text-purple-600 rounded-md hover:bg-purple-50 transition">
                    Login
                </a>
                <a href="{{ route('register2') }}" class="px-4 py-2 rounded-md text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:opacity-90 transition">
                    Register
                </a>
            </div>
        @endauth
    </div>
</nav>
