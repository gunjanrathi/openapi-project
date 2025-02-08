@extends('layouts.app')

@section('content')
    <h2>Log Summary</h2>

    <h4>Original Log Data</h4>
    <p>{{ $logData }}</p>

    <h4>AI Generated Summary</h4>
    <p>{{ $summary }}</p>

    <a href="{{ route('summarize_logs') }}" class="btn btn-primary">Back to Dashboard</a>
@endsection
