<div class="flex flex-col space-y-3">
    <div class="flex flex-col space-y-3">
        <!-- Modern Search Input -->
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="text"
                   placeholder="Search by name, email, or position..."
                   wire:model.live="searchjobapplicant"
                   class="block w-full pl-10 pr-4 py-3 text-sm text-gray-900 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-500 shadow-sm hover:shadow-md">

            <!-- Clear Button -->
            <!--[if BLOCK]><![endif]--><?php if($searchjobapplicant): ?>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <button wire:click="$set('searchjobapplicant', '')"
                            class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <!-- Search Status with Animation -->
        <!--[if BLOCK]><![endif]--><?php if($searchjobapplicant): ?>
            <div class="flex items-center justify-between bg-blue-50 border border-blue-200 rounded-lg px-4 py-2 animate-fade-in">
                <div class="flex items-center text-sm text-blue-700">
                    <svg class="w-4 h-4 mr-2 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">Searching for:</span>
                    <span class="ml-1 font-semibold">"<?php echo e($searchjobapplicant); ?>"</span>
                </div>
                <button wire:click="$set('searchjobapplicant', '')"
                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 transition-colors duration-200">
                    Clear
                </button>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-4px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fade-in 0.2s ease-out;
        }
    </style>
</div>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/livewire/job-search-apply.blade.php ENDPATH**/ ?>