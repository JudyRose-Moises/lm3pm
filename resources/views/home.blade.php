<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }
        .navbar {
            background-color: #007bff; /* Bootstrap primary blue */
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin-right: 15px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .sidebar {
            background-color: #343a40; /* Bootstrap dark */
            color: #fff;
            width: 250px;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 15px;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar ul li a:hover {
            background-color: #495057; /* Bootstrap dark gray */
        }
        .main-content {
            margin-left: 270px;
            padding: 20px;
            background-color: #fff;
            min-height: 100vh;
        }
        .container h1 {
            color: #007bff;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div>
            <a href="#">Home</a>
        </div>
        <div class="profile">
            <a href="/profile">Profile</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/adulogo.png') }}" alt="Logo">
        </div>
        <ul>
            <li><a href="home">Home</a></li>
            <li><a href="/book/search">Book Search</a></li>
            <li><a href="/book/borrowed">Return Book</a></li>
            <li><a href="#">History</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <div class="container">
            <h1>Welcome to the Home Page</h1>
            <!-- Your main content here -->
        </div>
    </div>

</body>
</html>