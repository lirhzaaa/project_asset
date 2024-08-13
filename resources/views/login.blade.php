<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> </head>
    <style>
        .alert {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 15px;
            background-color: #f44336;
            color: white;
            text-align: center;
            z-index: 9999;
            display: none;
        }

        .alert button {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            margin-left: 20px;
        }

        .alert.show {
            display: block;
        }
    </style>
<body>

    <!-- Alert -->
    <div id="alert" class="alert">
        <span id="alert-message"></span>
        <button onclick="closeAlert()">OK</button>
    </div>

    <div class="login-container">
        <form action="{{ url('login') }}" method="POST" class="login-form">
            @csrf
            @if (Session::get('failed'))
                <div class="alert alert-danger">{{ Session::get('failed') }}</div>
            @endif
            <div class="input-group">
                <label for="username" class="input-label">Username</label>
                <div class="input-container"> 
                    <i class="fa-regular fa-user"></i>
                    <input type="text" id="username" name="username" placeholder="Masukan username anda" required>
                </div>
            </div>
            <div class="input-group">
                <label for="password" class="input-label">Password</label>
                <div class="input-container">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Masukan password anda" required autocomplete="current-password">
                    </div>
            </div>            
            <button type="submit">Login</button>
            <a href="#" class="forgot-password">Lupa password</a>
        </form>
    </div>

    <script>
        function showAlert(message) {
            const alertBox = document.getElementById('alert');
            const alertMessage = document.getElementById('alert-message');
            alertMessage.textContent = message;
            alertBox.classList.add('show');
        }

        function closeAlert() {
            const alertBox = document.getElementById('alert');
            alertBox.classList.remove('show');
        }

        // Menampilkan alert dari session jika ada
        document.addEventListener('DOMContentLoaded', function() {
            const message = '{{ session('message') }}';
            if (message) {
                showAlert(message);
            }
        });
    </script>
</body>
</html>