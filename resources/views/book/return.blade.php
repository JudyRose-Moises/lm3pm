<!DOCTYPE html>
<html>
<head>
    <title>Return Books</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .borrowed-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }
        .borrowed-container h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .borrowed-container .book-item {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .borrowed-container .book-item h3 {
            margin: 0;
        }
        .borrowed-container .book-item p {
            margin: 5px 0 0 0;
            color: #555;
        }
        .return-button {
            background-color: #dc3545;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .return-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="borrowed-container">
        <h1>Borrowed Books</h1>
            @foreach($borrowedBooks as $book)
            @if($book->user_id == Auth::id())
            @if(count($borrowedBooks) > 0)
                <div class="book-item">
                    <div>
                        <h3>{{ $book->book_name }}</h3>
                        <p>Author: {{ $book->author }}</p>
                        <p>Published: {{ $book->publish_date }}</p>
                    </div>
                    
                    <form method="POST" action="{{ route('book.return', $book->id) }}">
                        @csrf
                        <button type="submit" class="return-button">Return</button>
                    </form>
                    @endif
                </div>
            
        @else
            <p>No books currently borrowed.</p>
        @endif
        @endforeach
    </div>
</body>
</html>
