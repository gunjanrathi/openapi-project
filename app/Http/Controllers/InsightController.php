<?php
namespace App\Http\Controllers;

use App\Models\Insight;
use App\Services\OpenAiService;
use Illuminate\Http\Request;

class InsightController extends Controller
{
    protected $openAiService;

    public function __construct(OpenAiService $openAiService)
    {
        $this->openAiService = $openAiService;
    }

    // Display form and list of insights
    public function index()
    {
        $insights = Insight::latest()->get();
        return view('insights.index', compact('insights'));
    }

    // Process AI Summarization Request
    public function store(Request $request)
    {
        try {
            $request->validate([
                'log_data' => 'required|string',
            ]);
    
            $logData = $request->input('log_data');
            $summary = $this->openAiService->summarizeLogs($logData);
    
            // Store in database
            $insight = Insight::create([
                'type' => 'summarize_logs',
                'input_data' => $logData,
                'ai_response' => $summary,
            ]);
    
            return view('insights.result', compact('logData', 'summary'));
    
        } catch (\Exception $e) {
            // Log the error message for debugging
            \Log::error('Error processing request: ' . $e->getMessage());
    
            // Optionally, you can return a user-friendly error message or a redirect
            return redirect()->back()->with('error', 'Error processing request.');
        }
    }
    public function showSummarizeLogsPage()
    {
        return view('insights.summarize');
    }
    public function showHistory()
    {
        $insights = Insight::latest()->get();
        return view('insights.history', compact('insights'));
    }

    
}
