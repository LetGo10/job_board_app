<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($jobsapply as $app)
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
                        {{ \Carbon\Carbon::parse($app['created_at'])->format('F j, Y') }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $app['phone_number'] }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <button wire:click="viewJobApplicant({{ $app->id }})"
                            class="inline-flex items-center gap-2 px-3 py-1.5 text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-200">
                            View
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-6 text-center text-sm text-gray-500 dark:text-gray-400">
                        No applications found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
