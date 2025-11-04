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
        @can('is-admin')
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v0"></path>
            </svg>
            <span class="ml-3">Dashboard</span>
        </a>

        <a href="{{ route('post.job') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('post.job') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span class="ml-3">Post New Job</span>
        </a>

        <a href="{{ route('my.job.posts') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('my.job.posts') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span class="ml-3">My Job Posts</span>
        </a>

        <a href="{{ route('admin.job.management') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('admin.job.management') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <span class="ml-3">All Job Management</span>
        </a>

        <a href="{{ route('job.application') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('job.application') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span class="ml-3">Job Applications</span>
        </a>

        <a href="{{ route('user.applications') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('user.applications') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="ml-3">My Applications</span>
        </a>

        <a href="{{ route('users.list') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('users.list') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
            </svg>
            <span class="ml-3">User Management</span>
        </a>
        @endcan

        @can('is-employer')
        <a href="{{ route('user.dashboard') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('user.dashboard') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v0"></path>
            </svg>
            <span class="ml-3">Dashboard</span>
        </a>

        <a href="{{ route('post.job') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('post.job') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span class="ml-3">Post New Job</span>
        </a>

        <a href="{{ route('my.job.posts') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('my.job.posts') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span class="ml-3">My Job Posts</span>
        </a>
        
        <a href="{{ route('job.application') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('job.application') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span class="ml-3">Job Applications</span>
        </a>

        <a href="{{ route('user.applications') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('user.applications') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="ml-3">My Applications</span>
        </a>
        @endcan

        @can('is-author')
        <a href="{{ route('user.dashboard') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('user.dashboard') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v0"></path>
            </svg>
            <span class="ml-3">Dashboard</span>
        </a>

        <a href="{{ route('user.applications') }}"
            class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('user.applications') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="ml-3">My Applications</span>
        </a>
        @endcan
    </nav>
</aside>
