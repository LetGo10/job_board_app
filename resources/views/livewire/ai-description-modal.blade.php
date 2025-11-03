<!-- AI Description Modal -->
<div>
    @if($showModal)
        <!-- Modal Backdrop -->
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75" wire:click="closeModal">
            <!-- Modal panel -->
            <div class="relative w-full max-w-lg mx-4" wire:click.stop>

                <div class="bg-white rounded-lg px-6 py-6 text-left overflow-hidden shadow-xl transform transition-all">
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            AI Description Generator
                        </h3>
                        <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Modal Content -->
                    <div class="py-4">
                        <!-- Prompt Input -->
                        <div class="mb-6">
                            <label for="aiPrompt" class="block text-sm font-medium text-gray-700 mb-2">
                                AI Prompt
                            </label>
                            <textarea
                                wire:model="prompt"
                                id="aiPrompt"
                                rows="3"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter your prompt for AI generation..."
                            ></textarea>
                        </div>

                        <!-- Generate Button -->
                        <div class="mb-6">
                            <button
                                wire:click="generatePrompt"
                                wire:loading.attr="disabled"
                                @if($currentPrompt && $currentPrompt->status === 'Pending') disabled @endif
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium disabled:opacity-50 transition-colors"
                            >
                                @if($currentPrompt && $currentPrompt->status === 'Pending')
                                    <span class="flex items-center justify-center">
                                        <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Generating...
                                    </span>
                                @else
                                    Generate Job Description
                                @endif
                            </button>
                        </div>

                        <!-- AI Response Section -->
                        @if($currentPrompt)
                            <div class="border border-gray-200 rounded-lg p-4 bg-gray-50"
                                 wire:poll.2s="checkStatus">

                                <!-- Status Badge -->
                                <div class="flex items-center mb-3">
                                    <span class="text-sm font-medium text-gray-600">Status:</span>
                                    <span class="ml-2 px-2 py-1 text-xs rounded-full
                                        @if($currentPrompt->status === 'Pending') bg-yellow-100 text-yellow-800
                                        @elseif($currentPrompt->status === 'Completed') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($currentPrompt->status) }}
                                    </span>
                                </div>

                                @if($currentPrompt->status === 'Pending')
                                    <div class="flex items-center text-gray-600">
                                        <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-blue-600 mr-2"></div>
                                        AI is generating your job description...
                                    </div>
                                @elseif($currentPrompt->status === 'Completed')
                                    <div>
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-medium text-gray-900">Generated Response:</h4>
                                            <button
                                                wire:click="useResponse"
                                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-md text-sm font-medium transition-colors"
                                            >
                                                Use This Response
                                            </button>
                                        </div>
                                        <div class="bg-white p-3 rounded border text-sm max-h-48 overflow-y-auto">
                                            <pre class="whitespace-pre-wrap text-gray-900">{!! $currentPrompt->getFormattedResponse() !!}</pre>
                                        </div>
                                    </div>
                                @elseif($currentPrompt->status === 'Failed')
                                    <div class="text-red-600">
                                        <strong>Error:</strong> {{ $currentPrompt->error_message }}
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex justify-center space-x-3">
                        <button
                            wire:click="closeModal"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors"
                        >
                            Close Modal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
