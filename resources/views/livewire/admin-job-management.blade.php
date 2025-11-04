<div>
    <!-- Success/Error Messages -->
    @if (session()->has('message'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <!-- Summary Overview -->
    <div class="mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Job Management Overview</h3>
                <span class="text-sm text-gray-500 dark:text-gray-400">Total: {{ $totalCounts['all'] }} Jobs</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Pending Stats -->
                <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-4 border border-yellow-200 dark:border-yellow-800">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-yellow-800 dark:text-yellow-300">Pending Jobs</p>
                            <p class="text-2xl font-bold text-yellow-900 dark:text-yellow-200">{{ $totalCounts['pending'] }}</p>
                            <p class="text-xs text-yellow-600 dark:text-yellow-400">Awaiting payment</p>
                        </div>
                        <div class="p-2 bg-yellow-100 dark:bg-yellow-800 rounded-full">
                            <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Active Stats -->
                <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-200 dark:border-green-800">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-green-800 dark:text-green-300">Active Jobs</p>
                            <p class="text-2xl font-bold text-green-900 dark:text-green-200">{{ $totalCounts['active'] }}</p>
                            <p class="text-xs text-green-600 dark:text-green-400">Currently live</p>
                        </div>
                        <div class="p-2 bg-green-100 dark:bg-green-800 rounded-full">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Navigation -->
    @if($jobs->count() > 0)
        <div class="mb-6">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <nav class="-mb-px flex space-x-8">
                    <button wire:click="setActiveTab('all')"
                            class="py-2 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'all' ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        All Jobs ({{ $totalCounts['all'] }})
                    </button>
                    <button wire:click="setActiveTab('active')"
                            class="py-2 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'active' ? 'border-green-500 text-green-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Active ({{ $totalCounts['active'] }})
                    </button>
                    <button wire:click="setActiveTab('pending')"
                            class="py-2 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'pending' ? 'border-yellow-500 text-yellow-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Pending ({{ $totalCounts['pending'] }})
                    </button>
                </nav>
            </div>
        </div>

        <!-- All Jobs Table -->
        <div x-show="$wire.activeTab === 'all'" x-transition>
            <div class="bg-white dark:bg-gray-900 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-blue-50 dark:bg-blue-900 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Job Details</th>
                            <th scope="col" class="px-6 py-3">Owner</th>
                            <th scope="col" class="px-6 py-3">Type</th>
                            <th scope="col" class="px-6 py-3">Posted Date</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    <div>
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $job->title }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $job->company }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm">
                                    <div class="font-medium text-gray-900 dark:text-white">{{ $job->user->name ?? 'N/A' }}</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">{{ $job->user->email ?? 'N/A' }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                    {{ ucfirst(str_replace('-', ' ', $job->job_type ?? 'N/A')) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                {{ $job->created_at->format('M j, Y') }}
                            </td>
                            <td class="px-6 py-4">
                                @if($job->status === 'pending')
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                        Pending
                                    </span>
                                @elseif($job->status === 'active')
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                        Active
                                    </span>
                                @elseif($job->status === 'inactive')
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                        Inactive
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                        {{ ucfirst($job->status) }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center space-x-2">
                                    @if($job->status === 'pending')
                                        <button wire:click="confirmActivate({{ $job->id }})"
                                                wire:loading.attr="disabled"
                                                title="Activate Job"
                                                class="p-2 text-white bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:outline-none rounded-full transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </button>
                                    @endif

                                    <button wire:click="$dispatch('openJobView', { jobId: {{ $job->id }} })" title="View Job" class="p-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-full transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>

                                    <a href="{{ route('edit-job', $job->id) }}" title="Edit Job" class="p-2 text-white bg-gray-600 hover:bg-gray-700 focus:ring-2 focus:ring-gray-500 focus:outline-none rounded-full transition-all duration-200 inline-block">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>

                                    <button wire:click="confirmDelete({{ $job->id }})"
                                            wire:loading.attr="disabled"
                                            title="Delete Job"
                                            class="p-2 text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:outline-none rounded-full transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                {{ $jobs->links() }}
            </div>
            </div>
        </div>

        <!-- Active Jobs Table -->
        <div x-show="$wire.activeTab === 'active'" x-transition style="display: none;">
            <div class="bg-white dark:bg-gray-900 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-green-50 dark:bg-green-900 dark:text-green-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Job Details</th>
                                <th scope="col" class="px-6 py-3">Owner</th>
                                <th scope="col" class="px-6 py-3">Type</th>
                                <th scope="col" class="px-6 py-3">Posted Date</th>
                                <th scope="col" class="px-6 py-3">Applications</th>
                                <th scope="col" class="px-6 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jobs as $job)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <div>
                                            <div class="font-medium text-gray-900 dark:text-white">{{ $job->title }}</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $job->company }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $job->user->name ?? 'N/A' }}</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $job->user->email ?? 'N/A' }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                        {{ ucfirst(str_replace('-', ' ', $job->job_type ?? 'N/A')) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                    {{ $job->created_at->format('M j, Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                                        {{ $job->applications_count ?? 0 }} applications
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center space-x-2">
                                        <button wire:click="$dispatch('openJobView', { jobId: {{ $job->id }} })" title="View Job" class="p-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-full transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                        <a href="{{ route('edit-job', $job->id) }}" title="Edit Job" class="p-2 text-white bg-gray-600 hover:bg-gray-700 focus:ring-2 focus:ring-gray-500 focus:outline-none rounded-full transition-all duration-200 inline-block">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <button wire:click="confirmDelete({{ $job->id }})"
                                                wire:loading.attr="disabled"
                                                title="Delete Job"
                                                class="p-2 text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:outline-none rounded-full transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                        <p class="text-lg font-medium text-gray-900 mb-2">No Active Jobs</p>
                        <p class="text-gray-500">No active job postings found.</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination for Active Jobs -->
<div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
    {{ $jobs->links() }}
</div>
</div>
</div>        <!-- Pending Jobs Table -->
        <div x-show="$wire.activeTab === 'pending'" x-transition style="display: none;">
            <div class="bg-white dark:bg-gray-900 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-yellow-50 dark:bg-yellow-900 dark:text-yellow-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Job Details</th>
                                <th scope="col" class="px-6 py-3">Owner</th>
                                <th scope="col" class="px-6 py-3">Type</th>
                                <th scope="col" class="px-6 py-3">Posted Date</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jobs as $job)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full animate-pulse"></div>
                                        <div>
                                            <div class="font-medium text-gray-900 dark:text-white">{{ $job->title }}</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $job->company }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $job->user->name ?? 'N/A' }}</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $job->user->email ?? 'N/A' }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                        {{ ucfirst(str_replace('-', ' ', $job->job_type ?? 'N/A')) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                    {{ $job->created_at->format('M j, Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                            Awaiting Payment
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center space-x-2">
                                        <button wire:click="confirmActivate({{ $job->id }})"
                                                wire:loading.attr="disabled"
                                                title="Activate Job"
                                                class="p-2 text-white bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:outline-none rounded-full transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </button>
                                        <button wire:click="$dispatch('openJobView', { jobId: {{ $job->id }} })" title="View Job" class="p-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-full transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                        <a href="{{ route('edit-job', $job->id) }}" title="Edit Job" class="p-2 text-white bg-gray-600 hover:bg-gray-700 focus:ring-2 focus:ring-gray-500 focus:outline-none rounded-full transition-all duration-200 inline-block">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <button wire:click="confirmDelete({{ $job->id }})"
                                                wire:loading.attr="disabled"
                                                title="Delete Job"
                                                class="p-2 text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:outline-none rounded-full transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-lg font-medium text-gray-900 mb-2">No Pending Jobs</p>
                                        <p class="text-gray-500">No jobs are currently awaiting approval.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination for Pending Jobs -->
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-12">
            <div class="text-center">
                <div class="max-w-md mx-auto">
                    <!-- Icon -->
                    <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-gray-100 dark:bg-gray-800 mb-6">
                        <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>

                    <!-- Content -->
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                        No job posts found
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-8">
                        No job postings match your current filters. Try adjusting your search criteria or status filter.
                    </p>
                </div>
            </div>
        </div>
    @endif

    <!-- Activate Confirmation Modal -->
    <div x-data="{ open: @entangle('showActivateModal') }" x-cloak>
        <div x-show="open"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            x-transition:enter="transition-all duration-300 ease-out"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition-all duration-200 ease-in"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">

            <!-- Backdrop -->
            <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm" @click="$wire.closeActivateModal()"></div>

            <!-- Modal Content -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full p-6 z-10">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            Activate Job Posting
                        </h3>
                    </div>
                </div>

                <div class="mb-6">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                        Proceed to payment to activate this job posting? The job will become visible to candidates after successful payment.
                    </p>

                    <!-- Job Details Preview -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Activation Fee:</span>
                            <span class="font-semibold text-green-600">RM 50.00</span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button wire:click="closeActivateModal"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-300 dark:hover:bg-gray-500 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Cancel
                    </button>
                    <button wire:click="proceedToPayment"
                            wire:loading.attr="disabled"
                            class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span wire:loading.remove wire:target="proceedToPayment">Proceed to Payment</span>
                        <span wire:loading wire:target="proceedToPayment" class="flex items-center">
                            <svg class="w-4 h-4 mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Processing...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-data="{ open: @entangle('showDeleteModal') }" x-cloak>
        <div x-show="open"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            x-transition:enter="transition-all duration-300 ease-out"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition-all duration-200 ease-in"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">

            <!-- Backdrop -->
            <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm" @click="$wire.closeDeleteModal()"></div>

            <!-- Modal Content -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full p-6 z-10">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                            Confirm Delete
                        </h3>
                    </div>
                </div>

                <div class="mb-6">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Are you sure you want to delete this job posting? This action cannot be undone and will permanently remove the job from the system.
                    </p>
                </div>

                <div class="flex justify-end gap-3">
                    <button wire:click="closeDeleteModal"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-300 dark:hover:bg-gray-500 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Cancel
                    </button>
                    <button wire:click="deleteJob"
                            wire:loading.attr="disabled"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span wire:loading.remove wire:target="deleteJob">Delete Job</span>
                        <span wire:loading wire:target="deleteJob" class="flex items-center">
                            <svg class="w-4 h-4 mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Deleting...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
