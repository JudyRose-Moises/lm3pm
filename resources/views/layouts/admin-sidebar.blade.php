<style>
    
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
            background-color: #495057; 
        }
        
        .sidebar ul li:last-child {
            margin-top: 100px;
        }

        .sidebar ul li.logout-link a {
            background-color: #dc3545; 
        }

        .sidebar ul li.logout-link a:hover {
            background-color: #c82333; 
        }
</style>
<div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/adulogo.png') }}" alt="Logo">
        </div>
        <ul>
        <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/addbook">Add Book</a></li>
            <li><a href="{{ route('admin.library') }}">Library</a></li>
            <li><a href="/admin/view">Borrowed Books</a></li>
            <li class="logout-link"><a href="{{ route('logout') }}">Logout</a></li>
        </ul>