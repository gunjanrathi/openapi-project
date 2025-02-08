<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Log Summarization</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">AI Log Summarization</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('insights.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="log_data" class="form-label">Enter Log Data:</label>
                <textarea class="form-control" name="log_data" id="log_data" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Summarize</button>
        </form>

        <hr>

        <h3>Previous Summaries</h3>
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
    </div>
</body>
</html>
