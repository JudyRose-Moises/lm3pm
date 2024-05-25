<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Add any additional CSS or scripts here -->
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar -->
                @include('layouts.admin-sidebar')
            </div>
            <div class="col-md-9">
                <!-- Content -->
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
