<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Charisword Gospel Ministry') }}</title>

        <!-- Montserrat Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                font-family: 'Montserrat', sans-serif !important;
                background: #fff;
            }
            .auth-hero-bg {
                background: linear-gradient(120deg, #f58502cc 0%, #fff0 100%), url('/images/logo.png') center/cover no-repeat; /* TODO: Replace with hero image from Google Drive */
                min-height: 100vh;
            }
            .auth-card {
                border: 2px solid #3a1d09;
                box-shadow: 0 8px 32px 0 rgba(60, 30, 9, 0.15);
                border-radius: 1.5rem;
                background: #fff;
                padding: 2.5rem 2rem;
                max-width: 420px;
                margin: 2rem auto;
            }
            .auth-logo {
                width: 90px;
                height: 90px;
                margin: 0 auto 1.5rem auto;
                display: block;
            }
            .auth-welcome {
                text-align: center;
                font-weight: 700;
                color: #3a1d09;
                font-size: 1.5rem;
                margin-bottom: 0.5rem;
            }
            .auth-tagline {
                text-align: center;
                color: #f58502;
                font-size: 1rem;
                margin-bottom: 2rem;
                font-weight: 500;
            }
            .auth-footer {
                text-align: center;
                font-size: 0.95rem;
                color: #3a1d09;
                margin-top: 2.5rem;
                padding: 1.5rem 0 0.5rem 0;
                border-top: 1px solid #eee;
                background: #fff;
            }
            .auth-footer .socials {
                margin-bottom: 0.5rem;
            }
            .auth-footer a {
                color: #f58502;
                text-decoration: none;
                margin: 0 0.3rem;
                font-weight: 600;
            }
            .auth-footer .payment {
                margin-top: 1rem;
                font-size: 0.93rem;
                color: #3a1d09;
            }
            @media (min-width: 900px) {
                .auth-flex {
                    display: flex;
                    min-height: 100vh;
                }
                .auth-hero-bg {
                    flex: 1 1 0%;
                    min-width: 0;
                    border-top-right-radius: 2rem;
                    border-bottom-right-radius: 2rem;
                }
                .auth-card-wrap {
                    flex: 1 1 0%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: #fff;
                }
            }
        </style>
    </head>
    <body>
        <div class="auth-flex">
            <div class="auth-card-wrap">
                <div class="auth-card">
                    <img src="{{ asset('images/logoo.png') }}" alt="Church Logo" class="auth-logo" />
                    <div class="auth-welcome">Welcome to Charisword Gospel Ministry</div>
                    <div class="auth-tagline">Raising Kingdom Giants • Transforming Lives</div>
                    {{ $slot }}
                </div>
            </div>
            <div class="auth-hero-bg d-none d-lg-block">
                <!-- TODO: Replace /images/logo.png with a beautiful hero image from your Google Drive -->
            </div>
        </div>
        <div class="auth-footer">
            <div class="socials">
                <strong>CONNECT WITH US</strong><br>
                Call/Message: <a href="tel:0261169859">026 116 9859</a> &bull; Location: Lashibi, Transformer Junction (Sakumono to Ashaiman Highway)<br>
                Digital Address: GT-337-6599 &bull; <a href="https://goo.gl/maps/yourmaplink" target="_blank">Google Maps</a><br>
                Facebook: <a href="https://facebook.com/chariswordgospelministry" target="_blank">Charisword Gospel Ministry</a> &bull;
                Instagram/Tiktok: <a href="https://instagram.com/charisword" target="_blank">@charisword</a> &bull;
                Twitter/X: <a href="https://twitter.com/ChariswordM" target="_blank">@ChariswordM</a>
            </div>
            <div class="payment">
                <strong>GIVING & SUPPORT</strong><br>
                MTN MOMO: <b>0248645966</b> &bull; TELECEL CASH: <b>364097</b><br>
                Fidelity Bank: <b>1050052233116</b> &bull; Stanbic Bank: <b>9040011571950</b><br>
                Email: <a href="mailto:chariswordgh@gmail.com">chariswordgh@gmail.com</a>
            </div>
        </div>
    </body>
</html>
