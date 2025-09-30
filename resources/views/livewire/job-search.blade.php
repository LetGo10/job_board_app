<div>
    <aside class="bg-white shadow-lg rounded-2xl p-6 space-y-6 border border-gray-100">
        <h2 class="text-lg font-semibold text-gray-900">Filters</h2>

        <!-- Keyword -->
        <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Keyword</label>
        <input type="text" wire:model.live="search" placeholder="Search..."
            class="w-full rounded-lg border-gray-300 px-3 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500">
        </div>

        @if($search)
            <div class="mt-3 flex items-center text-sm text-gray-600 dark:text-gray-400">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Searching for: "{{ $search }}"
                <button wire:click="$set('search', '')" class="ml-2 text-blue-500 hover:text-blue-700 text-xs">
                    Clear
                </button>
            </div>
        @endif

        <!-- Location -->
        <!--
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
            <select
                class="w-full rounded-lg border-gray-300 px-3 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                <option value="">All Locations</option>
                <option value="kl">Kuala Lumpur</option>
                <option value="selangor">Selangor</option>
                <option value="penang">Penang</option>
            </select>
        </div>
        -->
    </aside>
</div>

