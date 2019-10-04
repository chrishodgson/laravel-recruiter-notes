<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recruiter Notes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="{{ route('home') }}">Recruiter Notes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('summary.index') }}">Summary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('companies.index') }}">Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recruiters.index') }}">Recruiters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('notes.index') }}">Notes</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>