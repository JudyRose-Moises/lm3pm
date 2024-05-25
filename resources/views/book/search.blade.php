<!DOCTYPE html>
<html>
<head>
    <title>Book Search</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 600px;
            height: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .search-container {
            background-color: #fff;
            padding: 30px;
            border-bottom: 1px solid #ccc;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }
        .search-container h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .search-container form {
            display: flex;
            justify-content: center;
        }
        .search-container input[type="text"] {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        .search-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #0056b3;
        }
        .results-container {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            width: 100%;
            box-sizing: border-box;
        }
        .book-item {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .book-item h3 {
            margin: 0;
        }
        .book-item p {
            margin: 5px 0 0 0;
            color: #555;
        }
        .borrow-button {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .borrow-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="search-container">
            <h1>Book Search</h1>
            <form method="GET" action="{{ route('book.search') }}">
                <input type="text" name="query" placeholder="Enter book title or author" required value="{{ $query ?? '' }}">
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="results-container">
            @if(isset($results) && count($results) > 0)
            @foreach($results as $book)
                <div class="book-item">
                    <h3>{{ $book->book_name }}</h3>
                    <p>Author: {{ $book->author }}</p>
                    <p>Published: {{ $book->publish_date }}</p>
                    @if($book->is_borrowed)
                        @if($book->user_id == Auth::id())
                            <p style="color: red;">You have borrowed this book.</p>
                        @else
                            <p style="color: red;">This book is currently borrowed by someone else.</p>
                        @endif
                    @else
                        <form method="POST" action="{{ route('book.borrow', $book->id) }}">
                            @csrf
                            <button type="submit" class="borrow-button">Borrow</button>
                        </form>
                    @endif
                </div>
            @endforeach
            @else
                @if(isset($query))
                    <p>No results found for "{{ $query }}".</p>
                @endif
            @endif
        </div>
    </div>
</body>
</html>
