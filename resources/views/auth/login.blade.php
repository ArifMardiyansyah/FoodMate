<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodMate | Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F8FAFC] min-h-screen flex justify-center items-center font-poppins px-4">
    <div class="max-w-[420px] w-full bg-white rounded-2xl shadow-lg p-8">
        <header class="text-center mb-2">
            <h1 class="text-2xl font-bold uppercase text-black">SELAMAT DATANG</h1>
            <p class="text-lg font-semibold text-center" style="color: #F7941D;">Di FoodMate</p>
        </header>

        <div class="mt-4 mb-6 space-y-1">
            <p class="text-[15px] font-semibold text-black">Mudah Pesan</p>
            <p class="text-[15px] font-semibold" style="color: #F7941D;">Nikmat Diantar</p>
        </div>

        <form action="/menu" method="GET" class="space-y-5">
            <div>
                <label for="email" class="block text-xs font-semibold uppercase text-black mb-2">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    placeholder="example@gmail.com"
                    class="w-full bg-[#F8FAFC] rounded-xl py-3 px-4 text-sm text-black placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#F7941D]"
                />
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold uppercase text-black mb-2">Password</label>
                <div class="relative">
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        class="w-full bg-[#F8FAFC] rounded-xl py-3 px-4 pr-12 text-sm text-black placeholder-[#9CA3AF] focus:outline-none focus:ring-2 focus:ring-[#F7941D]"
                    />
                    <button
                        type="button"
                        id="toggle-password"
                        class="absolute inset-y-0 right-3 flex items-center text-[#9CA3AF] hover:text-[#6B7280]"
                        aria-label="Toggle password visibility"
                    >
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s2.25-6 9.75-6 9.75 6 9.75 6-2.25 6-9.75 6-9.75-6-9.75-6z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="rounded border-gray-300 text-[#F7941D] focus:ring-[#F7941D]" />
                    <span class="text-[#6B7280]">Remember me</span>
                </label>
                <a href="#" class="font-medium" style="color: #F7941D;">Forgot Password</a>
            </div>

            <button
                type="submit"
                class="w-full py-3 rounded-lg text-white font-semibold uppercase bg-[#F7941D] hover:bg-[#e7830d] transition-colors mt-6"
            >
                Log In
            </button>
        </form>

        <div class="mt-6 text-center text-sm">
            <p class="text-[#6B7280]">
                Don’t have an account?
                <a href="/register" class="font-semibold" style="color: #F7941D;">SIGN UP</a>
            </p>
        </div>

        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-gray-200"></div>
            <span class="mx-4 text-gray-400 text-sm">Or</span>
            <div class="flex-1 h-px bg-gray-200"></div>
        </div>

        <div class="flex justify-center gap-6 mt-6">
            <button type="button" class="w-12 h-12 rounded-full flex items-center justify-center bg-[#F7941D] text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.407.593 24 1.325 24h11.495V14.708H9.691v-3.62h3.129V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.796.715-1.796 1.764v2.313h3.587l-.467 3.62h-3.12V24h6.116C23.407 24 24 23.407 24 22.675V1.325C24 .593 23.407 0 22.675 0z" />
                </svg>
            </button>
            <button type="button" class="w-12 h-12 rounded-full flex items-center justify-center bg-[#F7941D] text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 4.5l9.543 7.159c.44.33 1.023.33 1.463 0L22.8 4.5M4.5 19.5h15a2.25 2.25 0 002.25-2.25v-9A2.25 2.25 0 0019.5 6h-15A2.25 2.25 0 002.25 8.25v9A2.25 2.25 0 004.5 19.5z" />
                </svg>
            </button>
            <button type="button" class="w-12 h-12 rounded-full flex items-center justify-center border border-[#F7941D] text-[#F7941D] shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12c0 5.523-4.477 9-9 9s-9-3.477-9-9 4.477-9 9-9 9 3.477 9 9z" />
                </svg>
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('toggle-password');
            const eyeIcon = document.getElementById('eye-icon');

            toggleButton?.addEventListener('click', () => {
                const isHidden = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isHidden ? 'text' : 'password');

                if (isHidden) {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A11.943 11.943 0 001.5 12s2.25 6 9.75 6a11.97 11.97 0 005.888-1.528M20.22 15.78A11.953 11.953 0 0022.5 12s-2.25-6-9.75-6c-1.563 0-2.997.268-4.282.71" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                    `;
                } else {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s2.25-6 9.75-6 9.75 6 9.75 6-2.25 6-9.75 6-9.75-6-9.75-6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    `;
                }
            });
        });
    </script>
</body>
</html>