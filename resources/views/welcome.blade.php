<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.15);
            padding: 40px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            text-align: center;
            backdrop-filter: blur(15px);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .login-box h1 {
            margin-bottom: 30px;
            font-size: 26px;
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .textbox {
            position: relative;
            margin-bottom: 30px;
        }

        .textbox input {
            width: 100%;
            padding: 12px;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            outline: none;
            color: #333;
            font-size: 16px;
            border-radius: 5px;
            transition: all 0.3s ease;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .textbox input:focus {
            background: #fff;
            box-shadow: 0 0 8px rgba(46, 204, 113, 0.8);
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #2980b9;
            border: none;
            outline: none;
            color: #fff;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 10px;                   
        }

        .btn:hover {
            background: #3498db;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn:active {
            transform: scale(0.98);
        }

        .register-btn {
            background: #27ae60;
        }

        .register-btn:hover {
            background: #2ecc71;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .info-text {
            margin-bottom: 10px;
            color: #fff;
            font-size: 16px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        }
    </style>
    <script>
    function loadNewContent() {
        window.location.href = "{{ route('register') }}";
    }
</script>
</head>
<body id="page">
    <div class="container">
        <div class="login-box">
            <h1>Login</h1>
            <form onsubmit="showLoginMessage(); return false;" method="POST">
                <div class="textbox">
                    <input type="email" placeholder="Email ID" name="email" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="info-text">For new users, click Register:</div>
                <button type="button" class="btn register-btn" onclick="loadNewContent()">Register</button>
            </form>
        </div>
    </div>
</body>
</html>

