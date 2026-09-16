<!doctype html>
<html><head><title>Result System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body>
<nav class="navbar navbar-dark bg-dark px-3">
<a class="navbar-brand" href="/">Result System</a>
<div>
<a href="/" class="btn btn-sm btn-light me-1">🏠 Home </a>
<a href="/dashboard" class="btn btn-sm btn-primary me-1">📊 Dashboard</a>
<a href="/students" class="btn btn-sm btn-light me-1">Students</a>
<a href="/results" class="btn btn-sm btn-warning me-1">All Results</a>
<a href="/results/create" class="btn btn-sm btn-info">Add Result</a>
</div>
</nav>
<div class="container mt-3">
@if(session('success'))<div class="alert alert-success">{{session('success')}}</div>@endif
@if(session('error'))<div class="alert alert-danger">{{session('error')}}</div>@endif
@yield('content')
</div>
</body></html>