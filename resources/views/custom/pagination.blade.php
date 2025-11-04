@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center">
        <div class="flex items-center space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 
                           border border-gray-200 rounded-lg cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-600">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Previous
                </span>
            @else
                <button wire:click="previousPage" rel="prev" 
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-purple-600 bg-white 
                               border border-purple-200 rounded-lg hover:bg-purple-50 hover:border-purple-300 
                               transition-all duration-200 shadow-sm hover:shadow-md dark:bg-gray-800 dark:border-gray-600 
                               dark:text-purple-400 dark:hover:bg-gray-700">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Previous
                </button>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white 
                               border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                        {{ $element }}
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="inline-flex items-center px-4 py-2 text-sm font-bold text-white 
                                       bg-gradient-to-r from-purple-500 to-indigo-500 border border-purple-500 
                                       rounded-lg shadow-lg transform scale-105 dark:from-purple-600 dark:to-indigo-600">
                                {{ $page }}
                            </span>
                        @else
                            <button wire:click="gotoPage({{ $page }})" 
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white 
                                           border border-gray-200 rounded-lg hover:bg-gray-50 hover:border-gray-300 
                                           transition-all duration-200 hover:shadow-md dark:bg-gray-800 dark:border-gray-600 
                                           dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:border-gray-500">
                                {{ $page }}
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" rel="next" 
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-purple-600 bg-white 
                               border border-purple-200 rounded-lg hover:bg-purple-50 hover:border-purple-300 
                               transition-all duration-200 shadow-sm hover:shadow-md dark:bg-gray-800 dark:border-gray-600 
                               dark:text-purple-400 dark:hover:bg-gray-700">
                    Next
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            @else
                <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 
                           border border-gray-200 rounded-lg cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-600">
                    Next
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
            @endif
        </div>
    </nav>
@endif