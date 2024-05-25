@extends('layouts.admin')

@section('content')
<style>
    .main-content {
        margin-left: 270px;
        padding: 20px;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .card-title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th, .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .table th {
        background-color: #5261b8;
        color: #fff;
    }

    .table tbody tr:hover {
        background-color: #f2f2f2;
    }

    .btn-edit {
        background-color: #5261b8;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 8px 16px;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .btn-edit:hover {
        background-color: #3d4b99;
    }

    .btn-delete {
        background-color: #dc3545;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 8px 16px;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }
</style>

<div class="main-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <h2 class="card-title">Library Books</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Published Date</th>
                                    <th scope="col">Cost</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->book_name }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publish_date }}</td>
                                    <td>{{ $book->cost }}</td>
                                    <td>
                                        <a href="{{ route('admin.editbook', ['id' => $book->id]) }}" class="btn btn-edit">Edit</a>
                                        <form method="POST" action="{{ route('admin.deletebook', ['id' => $book->id]) }}" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
