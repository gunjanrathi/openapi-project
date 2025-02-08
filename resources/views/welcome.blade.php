<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-light p-4">
                <h4 class="mb-4">AI Dashboard</h4>
                <ul class="nav flex-column">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('insights.index') }}">Home</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('summarize_logs') }}">Summarize Logs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('history') }}">History</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 p-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>