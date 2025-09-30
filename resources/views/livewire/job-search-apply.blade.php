<div class="mb-6 flex flex-col space-y-2">
    <!-- Search Input -->
    <div class="relative w-full max-w-sm">
        <input type="text" placeholder="Search applicants..."
               wire:model.live="searchjobapplicant"
               class="w-full rounded-lg border border-gray-300 pl-10 pr-3 py-2 focus:border-purple-500 focus:ring-purple-500 text-sm">
        <span class="absolute left-3 top-2.5 text-gray-400">🔍</span>
    </div>

    <!-- Searching Info -->
    @if($searchjobapplicant)
        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Searching for: "{{ $searchjobapplicant }}"
            <button wire:click="$set('searchjobapplicant', '')" class="ml-2 text-blue-500 hover:text-blue-700 text-xs">
                Clear
            </button>
        </div>
    @endif
</div>
