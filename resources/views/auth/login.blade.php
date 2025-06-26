<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Charisword Gospel Ministry</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(120deg, #f58502 0%, #fff 60%, #3a1d09 100%);
            background-size: 200% 200%;
            animation: movebg 8s ease-in-out infinite alternate;
        }
        @keyframes movebg {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }
        .centered {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .glass-card {
            background: rgba(255,255,255,0.85);
            border-radius: 2rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 3rem 2.5rem;
            max-width: 400px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .logo-icon {
            width: 72px;
            height: 72px;
            object-fit: contain;
            border-radius: 50%;
            border: 3px solid #f58502;
            background: #fff;
            margin-bottom: 1.5rem;
        }
        .login-title {
            font-size: 2rem;
            font-weight: 700;
            color: #3a1d09;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .login-sub {
            color: #f58502;
            font-weight: 600;
            margin-bottom: 2rem;
            text-align: center;
        }
        .input-group {
            width: 100%;
            margin-bottom: 1.5rem;
            position: relative;
        }
        .input-group img {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 28px;
            height: 28px;
            object-fit: contain;
            opacity: 0.7;
        }
        .input-group input {
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            padding: 0.75rem 1rem 0.75rem 3.25rem;
            border: 1.5px solid #f58502;
            border-radius: 1rem;
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
            background: rgba(255,255,255,0.95);
            color: #3a1d09;
            outline: none;
            transition: border 0.2s;
        }
        .input-group input:focus {
            border-color: #3a1d09;
        }
        .login-btn {
            width: 100%;
            padding: 0.85rem;
            background: linear-gradient(90deg, #f58502 0%, #3a1d09 100%);
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 2px 8px 0 #f5850233;
            cursor: pointer;
            transition: transform 0.15s, box-shadow 0.15s, background 0.2s;
        }
        .login-btn:hover {
            transform: scale(1.04);
            box-shadow: 0 4px 16px 0 #f5850266;
            background: linear-gradient(90deg, #3a1d09 0%, #f58502 100%);
        }
        .error {
            color: #d32f2f;
            font-size: 0.95rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        @media (max-width: 600px) {
            .glass-card { padding: 2rem 0.5rem; }
        }
        .social-row {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .social-row a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 2px 8px 0 #f5850233;
            transition: transform 0.15s, box-shadow 0.15s, background 0.2s;
        }
        .social-row a:hover {
            transform: scale(1.15);
            background: #f58502;
            box-shadow: 0 4px 16px 0 #f5850266;
        }
        .social-row svg {
            width: 22px;
            height: 22px;
        }
    </style>
</head>
<body>
<div class="centered">
    <form method="POST" action="{{ route('login') }}" class="glass-card">
        @csrf
        <img src="{{ asset('images/logoo.png') }}" alt="Church Logo" class="logo-icon" />
        <div class="login-title">Welcome Back</div>
        <div class="login-sub">Charisword Gospel Ministry</div>
        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
        <div class="input-group">
            <img src="{{ asset('images/logoo.png') }}" alt="Email Icon" />
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
        </div>
        <div class="input-group">
            <img src="{{ asset('images/logoo.png') }}" alt="Password Icon" />
            <input id="password" type="password" name="password" required placeholder="Password">
        </div>
        <button type="submit" class="login-btn">Login</button>
        <div class="social-row">
            <a href="https://facebook.com/chariswordgospelministry" target="_blank" title="Facebook">
                <!-- Facebook SVG -->
                <svg fill="#1877F3" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.595 0 0 .592 0 1.326v21.348C0 23.408.595 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.406 24 24 23.408 24 22.674V1.326C24 .592 23.406 0 22.675 0"/></svg>
            </a>
            <a href="https://instagram.com/charisword" target="_blank" title="Instagram">
                <!-- Instagram SVG -->
                <svg fill="#E4405F" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.308.974.974 1.246 2.241 1.308 3.608.058 1.266.069 1.646.069 4.85s-.012 3.584-.07 4.85c-.062 1.366-.334 2.633-1.308 3.608-.974.974-2.241 1.246-3.608 1.308-1.266.058-1.646.069-4.85.069s-3.584-.012-4.85-.07c-1.366-.062-2.633-.334-3.608-1.308-.974-.974-1.246-2.241-1.308-3.608C2.175 15.647 2.163 15.267 2.163 12s.012-3.584.07-4.85c.062-1.366.334-2.633 1.308-3.608C4.515 2.567 5.782 2.295 7.148 2.233 8.414 2.175 8.794 2.163 12 2.163zm0-2.163C8.741 0 8.332.012 7.052.07 5.771.128 4.659.334 3.678 1.315c-.98.98-1.187 2.092-1.245 3.373C2.012 5.668 2 6.077 2 12c0 5.923.012 6.332.07 7.612.058 1.281.265 2.393 1.245 3.373.98.98 2.092 1.187 3.373 1.245C8.332 23.988 8.741 24 12 24s3.668-.012 4.948-.07c1.281-.058 2.393-.265 3.373-1.245.98-.98 1.187-2.092 1.245-3.373.058-1.28.07-1.689.07-7.612 0-5.923-.012-6.332-.07-7.612-.058-1.281-.265-2.393-1.245-3.373-.98-.98-2.092-1.187-3.373-1.245C15.668.012 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a3.999 3.999 0 1 1 0-7.998 3.999 3.999 0 0 1 0 7.998zm6.406-11.845a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88z"/></svg>
            </a>
            <a href="https://twitter.com/ChariswordM" target="_blank" title="Twitter/X">
                <!-- Twitter SVG -->
                <svg fill="#1DA1F2" viewBox="0 0 24 24"><path d="M24 4.557a9.83 9.83 0 0 1-2.828.775 4.932 4.932 0 0 0 2.165-2.724c-.951.564-2.005.974-3.127 1.195a4.916 4.916 0 0 0-8.38 4.482C7.691 8.095 4.066 6.13 1.64 3.161c-.542.93-.856 2.011-.857 3.17 0 2.188 1.115 4.117 2.823 5.254a4.904 4.904 0 0 1-2.229-.616c-.054 2.281 1.581 4.415 3.949 4.89a4.936 4.936 0 0 1-2.224.084c.627 1.956 2.444 3.377 4.6 3.417A9.867 9.867 0 0 1 0 21.543a13.94 13.94 0 0 0 7.548 2.209c9.142 0 14.307-7.721 13.995-14.646A9.936 9.936 0 0 0 24 4.557z"/></svg>
            </a>
            <a href="https://tiktok.com/@charisword" target="_blank" title="TikTok">
                <!-- TikTok SVG -->
                <svg fill="#000" viewBox="0 0 24 24"><path d="M12.75 2v12.25a2.25 2.25 0 1 1-2.25-2.25h.25V9.5h-.25a5.25 5.25 0 1 0 5.25 5.25V2h-3z"/></svg>
            </a>
        </div>
    </form>
</div>
</body>
</html>
