<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>DineFlow - Enterprise ERP Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#b20112",
                        "primary-container": "#d62828",
                        "on-primary": "#ffffff",
                        "surface": "#fcf9f8",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-highest": "#e5e2e1",
                        "on-surface": "#1c1b1b",
                        "on-surface-variant": "#5c403d",
                        "secondary": "#625d5c",
                        "secondary-fixed-dim": "#ccc5c3",
                        "outline-variant": "#e5bdb9",
                        "background": "#fcf9f8"
                    },
                    "spacing": {
                        "xs": "4px",
                        "sm": "8px",
                        "md": "16px",
                        "lg": "24px",
                        "xl": "32px"
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-surface font-sans text-on-surface antialiased h-screen w-screen overflow-hidden flex">

<div class="flex w-full h-full">
    <!-- Left Side: Image Canvas -->
    <div class="hidden lg:flex lg:w-1/2 relative bg-surface-container-highest">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuABn0W4SXaZpHcx3nH6fBW-IUkrS4DLj7SSgrID0HcOuJsJhoAT89AtaaFYm5z1XnBCzoJMOHmPXN5manl-fvwzYDddJhiqZsRUmpvuqxXepFh7MEYks5o8Wb92g2XNWgfH2bca65h7YbPpa0glEShsx2GEa9mBgaNP43EV5Gq8KgwWirR0RgrAa9uMNgIxfUjCgtpcSq0CRwzFzpxuJQtqH8ntYFjpYh6-qVAc1ShZtpghfyuG1xaNGg')">
            <div class="absolute inset-0 bg-black/10 backdrop-blur-[2px]"></div>
        </div>
        <!-- Branding Overlay -->
        <div class="absolute bottom-12 left-12 z-10 p-lg bg-surface/80 backdrop-blur-xl rounded-[18px] border border-outline-variant/30 shadow-lg">
            <div class="flex items-center space-x-xs mb-sm">
                <span class="material-symbols-outlined text-primary text-[32px]">restaurant_menu</span>
                <h1 class="text-2xl font-bold text-on-surface">DineFlow</h1>
            </div>
            <p class="text-lg font-semibold text-secondary">Enterprise ERP & POS Platform</p>
            <div class="mt-md h-1 w-12 bg-primary rounded-full"></div>
        </div>
    </div>

    <!-- Right Side: Login Card Area -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-md md:p-xl bg-background">
        <div class="w-full max-w-[480px] bg-surface-container-lowest rounded-[18px] p-xl shadow-lg border border-outline-variant/20 relative z-10">
            
            <!-- Mobile Branding -->
            <div class="lg:hidden flex items-center space-x-xs mb-xl justify-center">
                <span class="material-symbols-outlined text-primary text-[28px]">restaurant_menu</span>
                <h1 class="text-xl font-bold text-on-surface">DineFlow</h1>
            </div>

            <!-- Header -->
            <div class="mb-xl text-center lg:text-left">
                <h2 class="text-2xl font-bold text-on-surface mb-xs">Selamat Datang Kembali</h2>
                <p class="text-sm text-secondary">Masuk ke pusat komando DineFlow untuk mengelola operasional Anda.</p>
            </div>

            <!-- Error Notification -->
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form Login Laravel -->
            <form action="{{ route('login') }}" method="POST" class="space-y-lg">
                @csrf

                <!-- Email Field -->
                <div class="space-y-xs">
                    <label class="block text-xs font-semibold text-on-surface-variant uppercase tracking-wider" for="email">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-sm flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-secondary group-focus-within:text-primary transition-colors">mail</span>
                        </div>
                        <input class="block w-full pl-10 pr-sm py-2 text-sm text-on-surface bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all shadow-sm outline-none placeholder:text-secondary-fixed-dim" 
                               id="email" name="email" value="{{ old('email') }}" placeholder="admin@dineflow.com" required type="email"/>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="space-y-xs">
                    <label class="block text-xs font-semibold text-on-surface-variant uppercase tracking-wider" for="password">Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-sm flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-secondary group-focus-within:text-primary transition-colors">lock</span>
                        </div>
                        <input class="block w-full pl-10 pr-10 py-2 text-sm text-on-surface bg-surface-container-lowest border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all shadow-sm outline-none placeholder:text-secondary-fixed-dim" 
                               id="password" name="password" placeholder="••••••••" required type="password"/>
                        <button class="absolute inset-y-0 right-0 pr-sm flex items-center text-secondary hover:text-on-surface focus:outline-none transition-colors" onclick="togglePasswordVisibility()" type="button">
                            <span class="material-symbols-outlined text-[20px]" id="visibility-icon">visibility</span>
                        </button>
                    </div>
                </div>

                <!-- Options Row -->
                <div class="flex items-center justify-between pt-xs">
                    <div class="flex items-center">
                        <input class="h-4 w-4 rounded border-outline-variant text-primary focus:ring-primary/50 cursor-pointer bg-surface-container-lowest" id="remember-me" name="remember" type="checkbox"/>
                        <label class="ml-2 block text-sm text-secondary cursor-pointer" for="remember-me">
                            Ingat Saya
                        </label>
                    </div>
                    <div class="text-sm">
                        <a class="text-xs font-medium text-primary hover:text-primary-container transition-colors underline-offset-4 hover:underline" href="#">
                            Lupa Kata Sandi?
                        </a>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-sm">
                    <button class="w-full flex justify-center py-2 px-md border border-transparent rounded-lg shadow-sm text-xs font-semibold text-on-primary bg-primary-container hover:bg-primary hover:shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary active:scale-[0.98] transition-all uppercase tracking-wide" type="submit">
                        Masuk ke Dashboard
                    </button>
                </div>
            </form>

            <!-- Informasi Credentials Bawaan -->
            <div class="mt-6 p-4 bg-gray-50 rounded-lg text-xs text-gray-600 space-y-1 border border-gray-100">
                <p class="font-semibold text-gray-700">Akun Login Bawaan (Seeder):</p>
                <p><span class="font-medium text-primary">Admin:</span> admin@dineflow.com | password</p>
                <p><span class="font-medium text-primary">Kasir:</span> kasir@dineflow.com | password</p>
                <p><span class="font-medium text-primary">Dapur:</span> dapur@dineflow.com | password</p>
            </div>

            <!-- Footer -->
            <div class="mt-xl pt-lg border-t border-outline-variant/30 text-center">
                <p class="text-sm text-secondary">
                    Butuh bantuan? <a class="text-xs font-medium text-primary hover:underline transition-colors" href="#">Hubungi tim dukungan kami.</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const icon = document.getElementById('visibility-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            passwordInput.type = 'password';
            icon.textContent = 'visibility';
        }
    }
</script>
</body>
</html>