<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class OpenAiService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function summarizeLogs($logData)
    {
        try {
            $response = $this->client->post('https://api.openai.com/v1/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'text-davinci-003',
                    'prompt' => "Summarize the following log data:\n\n" . $logData,
                    'max_tokens' => 150,
                ],
            ]);
            dd($response);
            $result = json_decode($response->getBody(), true);
            dd($result);
            return $result['choices'][0]['text'] ?? 'No response from AI';
        } catch (\Exception $e) {
            Log::error('OpenAI API Error: ' . $e->getMessage());
            return 'Error processing request.';
        }
    }
}
