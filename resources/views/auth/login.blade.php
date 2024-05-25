<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
        }
        .header {
            text-align: center;
            margin-bottom: 20px; 
            font-size: 24px; 
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 20px;
            border-radius: 10px;
            width: 400px; 
        }
        .form-group {
            margin-bottom: 20px; 
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            width: 100%; 
            height: 40px; 
            border-radius: 5px; 
        }
        .btn {
            width: 100%;
            height: 40px; 
        }
        .subtext {
            text-align: center; 
            font-size: 12px; 
            color: #555; 
        }
        .alert {
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">{{ __('Login') }}</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Student Account -->
                    <div class="form-group">
                        <label for="student_number" class="form-label">{{ __('Student Account') }}</label>
                        <input id="student_number" type="text" name="student_number" value="{{ old('student_number') }}" required autofocus class="form-control">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
