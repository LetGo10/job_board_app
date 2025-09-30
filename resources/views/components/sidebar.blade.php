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
        <a href="{{ route('admin.dashboard') }}"
        class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            📊 <span class="ml-3">Dashboard</span>
        </a>

        <!-- <a href="#"
        class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
            📄 <span class="ml-3">My Jobs</span>
        </a>

        <a href="#"
        class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
            ➕ <span class="ml-3">Submit Jobs</span>
        </a> -->

        <a href="{{ route('job.application') }}"
        class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200
                {{ request()->routeIs('job.application') ? 'bg-gray-100 text-gray-900 font-semibold cursor-default' : 'hover:bg-gray-100 hover:text-gray-800' }}">
            👥 <span class="ml-3">Applicants Jobs</span>
        </a>
    </nav>
</aside>
