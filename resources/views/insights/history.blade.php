@extends('layouts.app')

@section('content')
    <h2>Insights History</h2>
    
    @if($insights->isEmpty())
        <p>No insights available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Input Data</th>
                    <th>AI Response</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($insights as $insight)
                    <tr>
                        <td>{{ $insight->type }}</td>
                        <td>{{ Str::limit($insight->input_data, 50) }}</td>
                        <td>{{ Str::limit($insight->ai_response, 50) }}</td>
                        <td>{{ $insight->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
