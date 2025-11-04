<div>
    <!-- Flash Messages -->
    @if (session()->has('message'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 5000)"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="mb-4 p-4 text-green-700 bg-green-100 border border-green-300 rounded-lg" role="alert">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    {{ session('message') }}
                </div>
                <button @click="show = false" class="ml-4 text-green-600 hover:text-green-800">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 5000)"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="mb-4 p-4 text-red-700 bg-red-100 border border-red-300 rounded-lg" role="alert">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    {{ session('error') }}
                </div>
                <button @click="show = false" class="ml-4 text-red-600 hover:text-red-800">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <!-- Summary Overview -->
    <div class="mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Application Statistics</h3>
                <span class="text-sm text-gray-500 dark:text-gray-400">Total: {{ $jobsapply->count() }} Applications</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Pending Stats -->
                <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-4 border border-yellow-200 dark:border-yellow-800">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-yellow-800 dark:text-yellow-300">Pending</p>
                            <p class="text-2xl font-bold text-yellow-900 dark:text-yellow-200">{{ $jobsapply->where('status', 'pending')->count() }}</p>
                        </div>
                        <div class="p-2 bg-yellow-100 dark:bg-yellow-800 rounded-full">
                            <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Hired Stats -->
                <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-200 dark:border-green-800">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-green-800 dark:text-green-300">Hired</p>
                            <p class="text-2xl font-bold text-green-900 dark:text-green-200">{{ $jobsapply->where('status', 'hired')->count() }}</p>
                        </div>
                        <div class="p-2 bg-green-100 dark:bg-green-800 rounded-full">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Rejected Stats -->
                <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4 border border-red-200 dark:border-red-800">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-red-800 dark:text-red-300">Rejected</p>
                            <p class="text-2xl font-bold text-red-900 dark:text-red-200">{{ $jobsapply->where('status', 'rejected')->count() }}</p>
                        </div>
                        <div class="p-2 bg-red-100 dark:bg-red-800 rounded-full">
                            <svg class="w-6 h-6 text-red-600 dark:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Applicants Table -->
    <div class="mb-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-yellow-800">Pending Job Applicants</h3>
                        <p class="text-yellow-700">Applications awaiting review and decision</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-semibold rounded-full">
                            {{ $jobsapply->where('status', 'pending')->count() }} Pending
                        </span>
                    </div>
                </div>
            </div>
            
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-yellow-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Applicant
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Applied Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $pendingApplicants = $jobsapply->where('status', 'pending');
                    @endphp
                    @forelse($pendingApplicants as $app)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($app['full_name']) }}&size=40&background=random"
                                         alt="{{ $app['name'] }}" class="w-10 h-10 rounded-full">
                                    <div>
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $app['full_name'] }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $app['email'] }}</div>
                                    </div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $app->job->title }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $app->job->company }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($app['created_at'])->format('M j, Y') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center space-x-2">
                                    <!-- View Button -->
                                    <button wire:click="viewJobApplicant({{ $app->id }})" 
                                            title="View Applicant Details" 
                                            class="p-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-full transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>

                                    <!-- Hire Button (untuk pending applicants) -->
                                    <button wire:click="hireApplicant({{ $app->id }})" 
                                            wire:loading.attr="disabled"
                                            title="Hire Applicant" 
                                            class="p-2 text-white bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:outline-none rounded-full transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>

                                    <!-- Reject Button (untuk pending applicants) -->
                                    <button wire:click="rejectApplicant({{ $app->id }})" 
                                            wire:loading.attr="disabled"
                                            title="Reject Applicant" 
                                            class="p-2 text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:outline-none rounded-full transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500">No pending applications</p>
                                    <p class="text-xs text-gray-400">Applications awaiting review will appear here</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Hired Applicants Table -->
    <div class="mb-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-green-800">Hired Applicants</h3>
                        <p class="text-green-700">Successfully hired candidates for your positions</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-semibold rounded-full">
                            {{ $jobsapply->where('status', 'hired')->count() }} Hired
                        </span>
                    </div>
                </div>
            </div>
            
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-green-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Applicant
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Applied Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Hired Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $hiredApplicants = $jobsapply->where('status', 'hired');
                    @endphp
                    @forelse($hiredApplicants as $app)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($app['full_name']) }}&size=40&background=random"
                                         alt="{{ $app['name'] }}" class="w-10 h-10 rounded-full">
                                    <div>
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $app['full_name'] }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $app['email'] }}</div>
                                    </div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $app->job->title }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $app->job->company }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($app['created_at'])->format('M j, Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($app['updated_at'])->format('M j, Y') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <!-- View Button Only for Hired -->
                                <button wire:click="viewJobApplicant({{ $app->id }})" 
                                        title="View Applicant Details" 
                                        class="p-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-full transition-all duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                                <!-- Reconsider Button (Optional - to move back to pending) -->
                                <button wire:click="reconsiderApplicant({{ $app->id }})" 
                                        wire:loading.attr="disabled"
                                        title="Reconsider Applicant" 
                                        class="p-2 text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-2 focus:ring-yellow-500 focus:outline-none rounded-full transition-all duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500">No hired applicants yet</p>
                                    <p class="text-xs text-gray-400">Hired candidates will appear here</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Rejected Applicants Table -->
    <div class="mb-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-red-800">Rejected Applicants</h3>
                        <p class="text-red-700">Applicants who were not selected for positions</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="px-3 py-1 bg-red-100 text-red-800 text-sm font-semibold rounded-full">
                            {{ $jobsapply->where('status', 'rejected')->count() }} Rejected
                        </span>
                    </div>
                </div>
            </div>
            
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-red-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Applicant
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Applied Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rejected Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $rejectedApplicants = $jobsapply->where('status', 'rejected');
                    @endphp
                    @forelse($rejectedApplicants as $app)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($app['full_name']) }}&size=40&background=random"
                                         alt="{{ $app['name'] }}" class="w-10 h-10 rounded-full">
                                    <div>
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $app['full_name'] }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $app['email'] }}</div>
                                    </div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $app->job->title }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $app->job->company }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($app['created_at'])->format('M j, Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($app['updated_at'])->format('M j, Y') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center space-x-2">
                                    <!-- View Button -->
                                    <button wire:click="viewJobApplicant({{ $app->id }})" 
                                            title="View Applicant Details" 
                                            class="p-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none rounded-full transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>

                                    <!-- Reconsider Button (Optional - to move back to pending) -->
                                    <button wire:click="reconsiderApplicant({{ $app->id }})" 
                                            wire:loading.attr="disabled"
                                            title="Reconsider Applicant" 
                                            class="p-2 text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-2 focus:ring-yellow-500 focus:outline-none rounded-full transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"></path>
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500">No rejected applicants</p>
                                    <p class="text-xs text-gray-400">Rejected candidates will appear here</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
