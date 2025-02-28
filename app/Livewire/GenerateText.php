<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\ConnectionException;

class GenerateText extends Component
{
    public $inputText = '';
    public $generatedText = '';

    public function generate()
    {
        $this->validate([
            'inputText' => 'required|string|min:1',
        ]);

        $this->generatedText = ''; 

        $apiKey = env('OPENROUTER_API_KEY');
        $apiEndpoint = 'https://openrouter.ai/api/v1/chat/completions';

        $predefinedPrompt = "Rewrite the following text to sound like it was written by a human for an academic audience. Keep a formal tone, but make it simple and easy to read. Avoid long sentences and complex words to prevent detection by AI tools.

To do this, please:
1. Use short sentences, under 15 words each. And Give a liitle long senteces after 3 to 4 short lines 
2. Use basic, common words that everyone knows. Avoid big or fancy words unless they're really needed.
3. Make every sentence clear and simple, with one idea only.
4. Break up long sentences into shorter ones.
5. Use active voice to keep it direct.
6. Add transitions like 'also' or 'next' to connect ideas smoothly.
7. Change words and phrases so it doesn't sound like AI wrote it.
8. Keep it formal, but not too complicated or hard to follow.
9. Give the output from the beginnig of the input text and don't add like that (Here's a rewritten version of the text, following your guidelines:)

Focus on making the text easy to read and understand for a general academic audience.\n\n";

        $fullPrompt = $predefinedPrompt . $this->inputText;

        try {
            $response = Http::timeout(30)->withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'HTTP-Referer' => env('APP_URL'),
                'X-Title' => env('APP_NAME'),
                'Content-Type' => 'application/json',
            ])->post($apiEndpoint, [
                'model' => 'google/gemini-2.0-pro-exp-02-05:free',  // Updated to the new model
                'messages' => [
                    ['role' => 'user', 'content' => $fullPrompt]
                ],
                'max_tokens' => 1000,
                'temperature' => 0.7,
            ]);
            $data = $response->json();
            Log::info('OpenRouter API Response:', $data ?? ['no_data' => true]);

            if (!isset($data['choices'][0]['message']['content'])) {
                Log::error('Invalid API Response', ['response' => $data]);
                $this->generatedText = 'Oops, the API gave us something weird. Try again!';
            } else {
                $this->generatedText = $data['choices'][0]['message']['content'];
            }
        } catch (ConnectionException $e) {
            Log::error('API Timeout:', ['message' => $e->getMessage()]);
            $this->generatedText = 'Request timed out. Give it another shot later!';
        } catch (\Exception $e) {
            Log::error('Exception:', ['message' => $e->getMessage()]);
            $this->generatedText = 'Something broke: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.generate-text');
    }
}