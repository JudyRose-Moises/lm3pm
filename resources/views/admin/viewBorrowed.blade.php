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

    .table-responsive {
        margin-top: 30px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #5261b8;
        color: #fff;
        font-weight: bold;
    }

    .table td {
        color: #333;
    }

    .table tbody tr:hover {
        background-color: #f2f2f2;
    }

    .empty-message {
        text-align: center;
        margin-top: 20px;
        color: #999;
    }
</style>

<div class="main-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h2 class="card-title">Borrowed Books</h2>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Published Date</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Cost</th>
                                    <th scope="col">Borrowed By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($books as $book)
                                <tr>
                                    <td>{{ $book->book_name }}</td>
                                    <td>{{ $book->publish_date }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->cost }}</td>
                                    <td>{{ $book->user_id }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="empty-message">No borrowed books found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
