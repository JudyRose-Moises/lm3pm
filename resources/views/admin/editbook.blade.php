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

    .form-group {
        margin-bottom: 25px;
    }

    .form-control {
        height: 50px;
        border-radius: 8px;
        font-size: 16px;
    }

    .form-label {
        position: absolute;
        top: 18px;
        left: 70px;
        color: #5261b8;
        font-size: 16px;
        pointer-events: none;
        transition: 0.2s ease all;
    }

    .form-control:focus + .form-label,
    .form-control:not(:placeholder-shown) + .form-label {
        top: 8px;
        left: 20px;
        font-size: 12px;
        color: #5261b8;
    }

    .btn-update {
        background-color: #5261b8;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 12px 30px;
        font-size: 18px;
        transition: background-color 0.3s;
    }

    .btn-update:hover {
        background-color: #3d4b99;
    }
</style>

<div class="main-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <h2 class="card-title">Edit Book</h2>
                    <form method="POST" action="{{ route('admin.updatebook', ['id' => $book->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <i class="fas fa-book form-label"></i>
                            <p>Title:</p>
                            <input type="text" id="bname" class="form-control" name="book_name" value="{{ $book->book_name }}" required>
                        </div>

                        <div class="form-group">
                            <i class="fas fa-user form-label"></i>
                            <p>Author:</p>
                            <input type="text" id="author" class="form-control" name="author" value="{{ $book->author }}" required>
                        </div>

                        <div class="form-group">
                            <i class="fas fa-calendar form-label"></i>
                            <p>Published Date:</p>
                            <input type="text" id="pdate" class="form-control" name="publish_date" value="{{ $book->publish_date }}" required>
                        </div>

                        <div class="form-group">
                            <i class="fas fa-money-bill-wave form-label"></i>
                            <p>Cost:</p>
                            <input type="text" id="cost" class="form-control" name="cost" value="{{ $book->cost }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-update btn-lg btn-block">Update Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
