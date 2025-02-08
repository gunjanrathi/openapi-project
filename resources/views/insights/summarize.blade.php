@extends('layouts.app')

@section('content')
    <h2>Summarize Logs</h2>
    <form action="{{ route('insights.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="log_data" class="form-label">Enter Log Data:</label>
            <textarea class="form-control" name="log_data" id="log_data" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Summarize</button>
    </form>
@endsection
