<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GenerateText extends Component
{
    public $inputText = '';
    public $generatedText = '';

    public function generate()
    {
        $this->validate([
            'inputText' => 'required|string|min:1',
        ]);

        $this->generatedText = ''; // Clear previous result

        $apiKey = env('OPENROUTER_API_KEY');
        $apiEndpoint = 'https://openrouter.ai/api/v1/chat/completions';

        $predefinedPrompt = "Rewrite this text to make it sound like a human wrote it, not an AI. Think like a university student: use a mix of formal and casual language, vary your sentence structures, and avoid sounding too perfect. Sometimes start sentences with conjunctions like 'But,' 'And,' or 'So.' Use simple words instead of jargon (e.g., 'use' instead of 'utilize'). Occasionally add a colloquial phrase or a personal touch, but only if it feels natural. The goal is to make the text feel authentic and dodge AI detection.\n\n";

        $fullPrompt = $predefinedPrompt . $this->inputText;

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'HTTP-Referer' => env('APP_URL'),
                'X-Title' => env('APP_NAME'),
                'max_tokens' => 1000, // Make sure this is enough for your text
                'temperature' => 0.7,
                'Content-Type' => 'application/json',
            ])->post($apiEndpoint, [
                'model' => 'cognitivecomputations/dolphin3.0-r1-mistral-24b:free',
                'messages' => [
                    ['role' => 'user', 'content' => $fullPrompt]
                ]
            ]);

            $data = $response->json();
            Log::info('OpenRouter API Response:', $data);

            if (!isset($data['choices'][0]['message']['content'])) {
                Log::error('Invalid API Response', ['response' => $data]);
                $this->generatedText = 'Invalid API response.';
            } else {
                $this->generatedText = $data['choices'][0]['message']['content'];
            }

        } catch (\Exception $e) {
            Log::error('Exception:', ['message' => $e->getMessage()]);
            $this->generatedText = 'Exception: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.generate-text');
    }
}
