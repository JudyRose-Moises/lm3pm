@extends('layouts.admin')

@section('content')
<style>
    .main-content {
        margin-left: 150px;
        padding: 20px;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #5261b8;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1.2rem;
        color: #333;
    }
</style>
<div class="main-content">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="main-content">
                <h2 class="mb-4">Admin Dashboard</h2>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistics</h5>
                        <p class="card-text">Total Books: {{ $totalBooks }}</p>
                        <p class="card-text">Borrowed Books: {{ $borrowedBooks }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
