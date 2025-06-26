<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Charisword Gospel Ministry')); ?></title>

        <!-- Montserrat Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        <style>
            body {
                font-family: 'Montserrat', sans-serif !important;
                background: #fff;
            }
            .main-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 2rem 1rem 4rem 1rem;
            }
            .app-card {
                background: #fff;
                border: 2px solid #3a1d09;
                border-radius: 1.5rem;
                box-shadow: 0 8px 32px 0 rgba(60, 30, 9, 0.10);
                padding: 2rem 1.5rem;
                margin-bottom: 2rem;
            }
            .app-footer {
                text-align: center;
                font-size: 0.98rem;
                color: #3a1d09;
                margin-top: 2.5rem;
                padding: 2rem 0 1rem 0;
                border-top: 1px solid #eee;
                background: #fff;
            }
            .app-footer .socials {
                margin-bottom: 0.5rem;
            }
            .app-footer a {
                color: #f58502;
                text-decoration: none;
                margin: 0 0.3rem;
                font-weight: 600;
            }
            .app-footer .payment {
                margin-top: 1rem;
                font-size: 0.95rem;
                color: #3a1d09;
            }
            .glass-card {
                background: rgba(255,255,255,0.7);
                border: 1.5px solid #f58502;
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border-radius: 2rem;
            }
            .sidebar {
                background: #3a1d09;
                color: #fff;
                min-height: 100vh;
                border-top-right-radius: 2rem;
                border-bottom-right-radius: 2rem;
                box-shadow: 2px 0 16px 0 rgba(58,29,9,0.15);
            }
            .sidebar a { color: #fff; font-weight: 600; transition: background 0.2s, color 0.2s; border-radius: 0.75rem; }
            .sidebar a.active, .sidebar a:hover { background: #f58502; color: #3a1d09; }
            .hero-img {
                width: 100%;
                height: 260px;
                object-fit: cover;
                border-radius: 2rem 2rem 0 0;
                position: relative;
            }
            .hero-overlay {
                position: absolute;
                top: 0; left: 0; width: 100%; height: 100%;
                background: linear-gradient(90deg, #f58502cc 0%, #3a1d09cc 100%);
                border-radius: 2rem 2rem 0 0;
                z-index: 1;
            }
            .hero-content {
                position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);
                z-index: 2; color: #fff; text-align: center;
            }
            .animated-btn {
                transition: transform 0.15s, box-shadow 0.15s;
                box-shadow: 0 2px 8px 0 #f5850233;
                position: relative;
                overflow: hidden;
            }
            .animated-btn:hover {
                transform: scale(1.05);
                box-shadow: 0 4px 16px 0 #f5850266;
            }
            .animated-btn:active::after {
                content: '';
                position: absolute;
                left: 50%; top: 50%;
                width: 200%; height: 200%;
                background: rgba(245,133,2,0.15);
                border-radius: 50%;
                transform: translate(-50%,-50%);
                animation: ripple 0.4s linear;
            }
            @keyframes ripple {
                from { opacity: 1; }
                to { opacity: 0; }
            }
            @media (max-width: 900px) {
                .sidebar { display: none; }
                .main-content { margin-left: 0 !important; }
            }
            .active-glow {
                background: #f58502 !important;
                color: #3a1d09 !important;
                box-shadow: 0 0 12px 2px #f58502cc;
                border-radius: 0.75rem;
            }
            @media (max-width: 900px) {
                .sidebar span { display: none; }
                .sidebar { width: 72px !important; padding: 1rem !important; }
                .sidebar nav a { justify-content: center; padding: 0.75rem 0 !important; }
            }
        </style>
    </head>
    <body class="min-h-screen flex flex-col bg-white">
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="sidebar w-64 p-8 flex flex-col gap-8 items-center justify-between hidden md:flex">
                <div class="flex flex-col gap-8 w-full">
                    <div class="flex flex-col items-center gap-2">
                        <img src="<?php echo e(asset('images/logoo.png')); ?>" alt="Church Logo" class="w-20 h-20 object-contain rounded-full border-4 border-[#f58502] bg-white" />
                        <span class="text-lg font-bold tracking-wide">Charisword Gospel Ministry</span>
                    </div>
                    <nav class="flex flex-col gap-3 mt-8 w-full">
                        <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center gap-3 py-2 px-4 transition-all duration-150 <?php if(request()->routeIs('dashboard')): ?> active-glow <?php endif; ?>">
                            <!-- Home Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h3m10-11v11a1 1 0 01-1 1h-3m-6 0h6" /></svg>
                            <span>Dashboard</span>
                        </a>
                        <a href="<?php echo e(route('members.index')); ?>" class="flex items-center gap-3 py-2 px-4 transition-all duration-150 <?php if(request()->routeIs('members.*')): ?> active-glow <?php endif; ?>">
                            <!-- Users Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-7a4 4 0 11-8 0 4 4 0 018 0zm6 4a4 4 0 10-8 0 4 4 0 008 0z" /></svg>
                            <span>Members</span>
                        </a>
                        <a href="<?php echo e(route('folds.index')); ?>" class="flex items-center gap-3 py-2 px-4 transition-all duration-150 <?php if(request()->routeIs('folds.*')): ?> active-glow <?php endif; ?>">
                            <!-- Collection Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" /></svg>
                            <span>Folds</span>
                        </a>
                        <a href="<?php echo e(route('first_timers.index')); ?>" class="flex items-center gap-3 py-2 px-4 transition-all duration-150 <?php if(request()->routeIs('first_timers.*')): ?> active-glow <?php endif; ?>">
                            <!-- User Add Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v6m3-3h-6m-2 4a4 4 0 11-8 0 4 4 0 018 0zm6-4a4 4 0 10-8 0 4 4 0 008 0z" /></svg>
                            <span>First Timers</span>
                        </a>
                        <a href="<?php echo e(route('services.index')); ?>" class="flex items-center gap-3 py-2 px-4 transition-all duration-150 <?php if(request()->routeIs('services.*')): ?> active-glow <?php endif; ?>">
                            <!-- Calendar Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            <span>Services</span>
                        </a>
                        <a href="<?php echo e(route('profile.edit')); ?>" class="flex items-center gap-3 py-2 px-4 transition-all duration-150 <?php if(request()->routeIs('profile.edit')): ?> active-glow <?php endif; ?>">
                            <!-- User Circle Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" /></svg>
                            <span>Profile</span>
                        </a>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="w-full">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="flex items-center gap-3 py-2 px-4 w-full text-left transition-all duration-150">
                                <!-- Logout Icon -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" /></svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </nav>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(auth()->user()->name ?? 'User')); ?>&background=f58502&color=fff&size=128" alt="Profile" class="w-14 h-14 rounded-full border-2 border-[#f58502]" />
                    <span class="text-sm font-semibold"><?php echo e(auth()->user()->name ?? 'User'); ?></span>
                </div>
            </aside>
            <!-- Main Content -->
            <main class="flex-1 flex flex-col min-h-screen main-content md:ml-64">
                <!-- Hero Section (Dashboard only, swap image below for ministry photo) -->
                <?php if(request()->routeIs('dashboard')): ?>
                <div class="relative mb-8">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Ministry Hero" class="hero-img" />
                    <!-- TODO: Swap /images/logo.png for a ministry photo from Google Drive -->
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1 class="text-4xl font-bold mb-2 drop-shadow">Welcome to Charisword Gospel Ministry</h1>
                        <p class="text-lg font-semibold">Raising Kingdom Giants for Christ</p>
                    </div>
                </div>
                <?php endif; ?>
                <div class="p-6 md:p-12">
                    <div class="glass-card p-8 md:p-12 mb-8">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="w-full bg-[#3a1d09] text-white py-8 px-4 flex flex-col md:flex-row md:justify-between md:items-center gap-4 text-sm rounded-t-3xl shadow-xl">
                    <div>
                        <div class="font-bold text-lg mb-1">CONNECT WITH US</div>
                        <div>Call or Message: 026 116 9859</div>
                        <div>Location: Lashibi, Transformer Junction (Sakumono to Ashaiman Highway)</div>
                        <div>Digital Address: GT-337-6599</div>
                        <div>Google Maps: Search "Charisword Gospel Ministry"</div>
                    </div>
                    <div>
                        <div class="font-bold mb-1">SOCIAL</div>
                        <div>Facebook: Charisword Gospel Ministry</div>
                        <div>Instagram/Tiktok: @charisword</div>
                        <div>Twitter/X: @ChariswordM</div>
                    </div>
                    <div>
                        <div class="font-bold mb-1">GIVING</div>
                        <div>MTN MOMO: 0248645966</div>
                        <div>TELECEL CASH: 364097</div>
                        <div>FIDELITY BANK: 1050052233116</div>
                        <div>STANBIC BANK: 9040011571950</div>
                    </div>
                    <div>
                        <div class="font-bold mb-1">EMAIL</div>
                        <div>chariswordgh@gmail.com</div>
                    </div>
                </footer>
            </main>
        </div>
        <?php echo $__env->yieldPushContent('scripts'); ?>
    </body>
</html>
<?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/layouts/app.blade.php ENDPATH**/ ?>