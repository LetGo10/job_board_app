<div>
    <h2 class="text-3xl font-bold mb-8 text-gray-800">Admin Dashboard</h2>

    <!-- Welcome Message -->
    <div class="bg-gradient-to-r from-indigo-50 to-blue-50 p-6 rounded-2xl shadow-sm mb-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Welcome back, Admin! 👋</h3>
        <p class="text-gray-600">Here's an overview of your job board management system.</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
            <div class="text-green-600 text-4xl">📄</div>
            <p class="mt-3 text-3xl font-extrabold text-gray-800">{{ $totalJobs ?? 0 }}</p>
            <p class="text-sm text-gray-600">Total Jobs</p>
        </div>
        <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
            <div class="text-yellow-500 text-4xl">🔖</div>
            <p class="mt-3 text-3xl font-extrabold text-gray-800">{{ $totalJobsApply ?? 0 }}</p>
            <p class="text-sm text-gray-600">Total Applications</p>
        </div>
        <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
            <div class="text-purple-500 text-4xl">�</div>
            <p class="mt-3 text-3xl font-extrabold text-gray-800">{{ \App\Models\User::count() ?? 0 }}</p>
            <p class="text-sm text-gray-600">Total Users</p>
        </div>
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-2xl shadow hover:shadow-lg transition text-center">
            <div class="text-blue-500 text-4xl">�</div>
            <p class="mt-3 text-3xl font-extrabold text-gray-800">{{ \App\Models\JobApplication::whereDate('created_at', today())->count() ?? 0 }}</p>
            <p class="text-sm text-gray-600">Today's Applications</p>
        </div>
    </div>

    <!-- Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Applications -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition lg:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-gray-700 flex items-center gap-2">
                    � Recent Applications
                </h3>
                <a href="{{ route('job.application') }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                    View All →
                </a>
            </div>

            @php
                $recentApplications = \App\Models\JobApplication::with('job')->latest()->limit(5)->get();
            @endphp

            @if($recentApplications->count() > 0)
                <div class="space-y-3">
                    @foreach($recentApplications as $application)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($application->full_name) }}&size=40&background=random"
                                     alt="{{ $application->full_name }}" class="w-10 h-10 rounded-full">
                                <div>
                                    <h4 class="font-medium text-gray-800">{{ $application->full_name }}</h4>
                                    <p class="text-sm text-gray-600">{{ $application->job->title ?? 'Job Title' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full">
                                    New
                                </span>
                                <p class="text-xs text-gray-500 mt-1">{{ $application->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <div class="text-4xl mb-2">📋</div>
                    <p class="text-gray-500">No applications yet</p>
                </div>
            @endif
        </div>

        <!-- Quick Actions -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="font-semibold mb-4 text-gray-700 flex items-center gap-2">
                ⚡ Quick Actions
            </h3>
            <div class="space-y-3">
                <a href="{{ route('job.application') }}"
                   class="flex items-center gap-3 p-3 rounded-lg bg-indigo-50 hover:bg-indigo-100 transition">
                    <span class="text-indigo-600">📋</span>
                    <span class="text-gray-800">View Applications</span>
                </a>
                <a href="{{ route('jobs') }}"
                   class="flex items-center gap-3 p-3 rounded-lg bg-green-50 hover:bg-green-100 transition">
                    <span class="text-green-600">�</span>
                    <span class="text-gray-800">Manage Jobs</span>
                </a>
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 p-3 rounded-lg bg-purple-50 hover:bg-purple-100 transition">
                    <span class="text-purple-600">📊</span>
                    <span class="text-gray-800">View Analytics</span>
                </a>
                <a href="{{ route('companies') }}"
                   class="flex items-center gap-3 p-3 rounded-lg bg-yellow-50 hover:bg-yellow-100 transition">
                    <span class="text-yellow-600">🏢</span>
                    <span class="text-gray-800">Companies</span>
                </a>
            </div>
        </div>
    </div>
</div>
