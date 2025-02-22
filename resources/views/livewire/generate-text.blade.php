<div class="bg-gray-100 flex items-center justify-center p-4">
    <div class="w-full bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Humanize AI Text</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Input Section -->
            <div>
                <form wire:submit.prevent="generate" class="space-y-4">
                    @csrf
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-3">Input your Text here:</h2>
                        <div class="relative">
                            <textarea
                                wire:model="inputText"
                                id="inputText"
                                rows="6"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-y text-gray-700 placeholder-gray-400"
                                placeholder="Type your text here..."></textarea>
                            <!-- Input Word Count (Bottom-Right Corner) -->
                            <span class="absolute bottom-2 right-2 text-xs text-gray-500 bg-white px-1 rounded">
                                {{ $inputText ? str_word_count($inputText) : 0 }}
                            </span>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg mt-5 hover:bg-indigo-700 transition duration-200 disabled:bg-gray-400 disabled:cursor-not-allowed"
                        wire:loading.attr="disabled"
                        wire:target="generate">
                        <span wire:loading.remove wire:target="generate">Humanize Text</span>
                        <span wire:loading wire:target="generate">Humanizing...</span>
                    </button>
                </form>
            </div>

            <!-- Output Section -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Humanized Text:</h2>
                <div wire:loading.class="hidden" wire:target="generate" class="relative">
                    @if($generatedText)
                        <p class="text-gray-700 bg-gray-50 p-3 rounded-lg border border-gray-300 h-43 overflow-y-auto">{{ $generatedText }}</p>
                        <!-- Output Word Count (Bottom-Right Corner) -->
                        <span class="absolute bottom-2 right-2 text-xs text-gray-500 bg-gray-50 px-1 rounded">
                            {{ str_word_count($generatedText) }}
                        </span>
                    @else
                        <div class="text-gray-500 bg-gray-50 p-3 rounded-lg border border-gray-300 h-43 overflow-y-auto flex items-center justify-center italic relative">
                            Waiting for input...
                            <!-- Default Word Count (Bottom-Right Corner) -->
                            <span class="absolute bottom-2 right-2 text-xs text-gray-500 bg-gray-50 px-1 rounded">0</span>
                        </div>
                    @endif
                </div>
                <div wire:loading wire:target="generate" class="">
                    <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-indigo-500 mr-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
