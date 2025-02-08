<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OpenAiTestController extends Controller
{
    protected $client;
    protected $apiKey;
    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY'); // Ensure the API key is set in .env
    }
    public function testConnection()
    {
        try {
            
            $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
                'json' => [
                    'model' => 'gpt-3.5-turbo',  // Use a new model
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                        ['role' => 'user', 'content' => 'Please summarize the following log: ']
                    ],
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
            ]);

            $responseData = json_decode($response->getBody(), true);
            
            if ($responseData) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Connected to OpenAI successfully!',
                    'response' => $responseData,
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to connect to OpenAI after multiple attempts.',
                ]);
            }

        } catch (\Exception $e) {
            // Handle errors
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to connect to OpenAI: ' . $e->getMessage(),
            ]);
        }
    }


}
