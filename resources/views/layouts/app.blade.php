<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content goes here -->
</head>
<body>
    <!-- Include the sidebar partial -->
    @include('includes.sidebar')
    @incl

    <!-- Main content section -->
    <div class="main-content" style="background-color: lightblue;">
        @yield('content')
    </div>

    <!-- Include any JavaScript assets -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
