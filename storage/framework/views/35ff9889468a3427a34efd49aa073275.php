<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">AI Job Description Generator</h2>

        <div class="mb-4">
            <label for="prompt" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Prompt
            </label>
            <textarea
                wire:model="prompt"
                id="prompt"
                rows="3"
                class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400"
                placeholder="Enter your prompt here..."
            ></textarea>
        </div>

        <button
            wire:click="generatePrompt"
            wire:loading.attr="disabled"
            <?php if($currentPrompt && $currentPrompt->status === 'Pending'): ?> disabled <?php endif; ?>
            class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-4 py-2 rounded-md disabled:opacity-50 transition-colors"
        >
            <!--[if BLOCK]><![endif]--><?php if($currentPrompt && $currentPrompt->status === 'Pending'): ?>
                <span>Generating...</span>
            <?php else: ?>
                <span>Generate Response</span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </button>

        <!--[if BLOCK]><![endif]--><?php if($currentPrompt): ?>
            <div class="mt-6 p-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700"
                wire:poll.1s="checkStatus">

                <div class="flex items-center mb-2">
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Status:</span>
                    <span class="ml-2 px-2 py-1 text-xs rounded-full
                        <?php if($currentPrompt->status === 'Pending'): ?> bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                        <?php elseif($currentPrompt->status === 'Completed'): ?> bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                        <?php else: ?> bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 <?php endif; ?>">
                        <?php echo e(ucfirst($currentPrompt->status)); ?>

                    </span>
                </div>

                <!--[if BLOCK]><![endif]--><?php if($currentPrompt->status === 'Pending'): ?>
                    <div class="flex items-center text-gray-600 dark:text-gray-300">
                        <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-blue-600 dark:border-blue-400 mr-2"></div>
                        Generating response...
                    </div>
                <?php elseif($currentPrompt->status === 'Completed'): ?>
                    <div class="mt-4">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-medium text-gray-900 dark:text-gray-100">Generated Response:</h3>
                            <button
                                wire:click="useResponse"
                                class="bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors"
                            >
                                Use This Response
                            </button>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-md border dark:border-gray-600">
                            <pre class="whitespace-pre-wrap text-sm text-gray-900 dark:text-gray-100"><?php echo $currentPrompt->getFormattedResponse(); ?></pre>
                        </div>
                    </div>
                <?php elseif($currentPrompt->status === 'Failed'): ?>
                    <div class="mt-4 text-red-600 dark:text-red-400">
                        <strong>Error:</strong> <?php echo e($currentPrompt->error_message); ?>

                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/livewire/ai-text-generate-component.blade.php ENDPATH**/ ?>