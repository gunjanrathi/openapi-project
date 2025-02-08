<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Insight;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsightTest extends TestCase
{
    use RefreshDatabase; // Ensures a fresh database for each test

    /** @test */
    public function it_can_create_an_insight()
    {
        $insight = Insight::create([
            'type'       => 'summarize_logs',
            'input_data' => 'This is a sample log input',
            'ai_response'=> 'This is a summary of the log input'
        ]);

        $this->assertDatabaseHas('insights', [
            'type'       => 'summarize_logs',
            'input_data' => 'This is a sample log input',
            'ai_response'=> 'This is a summary of the log input'
        ]);
    }

    /** @test */
    public function it_has_fillable_attributes()
    {
        $insight = new Insight();
        $this->assertEquals(['type', 'input_data', 'ai_response'], $insight->getFillable());
    }
}
