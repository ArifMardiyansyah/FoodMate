<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodMate | Sign Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white min-h-screen flex justify-center items-center font-poppins px-4 relative">
    
    <!-- Back Button -->
    <a href="/login" class="absolute top-8 left-8 w-12 h-12 bg-[#FF8C42] hover:bg-[#e7830d] rounded-full flex items-center justify-center shadow-lg transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </a>

    <!-- Main Form Container -->
    <div class="max-w-md w-full px-8">
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-[#FF8C42] mb-3">Sign Up</h1>
            <p class="text-[#FF8C42] text-base font-medium opacity-80">Please sign up to get started</p>
        </div>

        <!-- Form -->
        <form action="/menu" method="GET" class="space-y-6">

            <!-- Name Input -->
            <div>
                <label for="name" class="block text-xs font-semibold uppercase text-gray-700 mb-2 tracking-wide">NAME</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    placeholder="John doe"
                    value="{{ old('name') }}"
                    class="w-full bg-gray-100 rounded-lg py-4 px-5 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FF8C42] focus:bg-white transition-all @error('name') ring-2 ring-red-500 @enderror"
                    required
                />
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase text-gray-700 mb-2 tracking-wide">EMAIL</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="example@gmail.com"
                    value="{{ old('email') }}"
                    class="w-full bg-gray-100 rounded-lg py-4 px-5 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FF8C42] focus:bg-white transition-all @error('email') ring-2 ring-red-500 @enderror"
                    required
                />
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-xs font-semibold uppercase text-gray-700 mb-2 tracking-wide">PASSWORD</label>
                <div class="relative">
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="••••••••"
                        class="w-full bg-gray-100 rounded-lg py-4 px-5 pr-12 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FF8C42] focus:bg-white transition-all @error('password') ring-2 ring-red-500 @enderror"
                        required
                    />
                    <button
                        type="button"
                        id="toggle-password"
                        class="absolute inset-y-0 right-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors"
                        aria-label="Toggle password visibility"
                    >
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Re-type Password Input -->
            <div>
                <label for="password_confirmation" class="block text-xs font-semibold uppercase text-gray-700 mb-2 tracking-wide">RE-TYPE PASSWORD</label>
                <div class="relative">
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="••••••••"
                        class="w-full bg-gray-100 rounded-lg py-4 px-5 pr-12 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FF8C42] focus:bg-white transition-all"
                        required
                    />
                    <button
                        type="button"
                        id="toggle-password-confirmation"
                        class="absolute inset-y-0 right-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors"
                        aria-label="Toggle password confirmation visibility"
                    >
                        <svg id="eye-icon-confirmation" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full py-4 rounded-lg text-white font-bold uppercase text-base bg-[#FF8C42] hover:bg-[#e7830d] transition-colors shadow-lg hover:shadow-xl mt-8"
            >
                SIGN UP
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Toggle password visibility
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('toggle-password');
            const eyeIcon = document.getElementById('eye-icon');

            toggleButton?.addEventListener('click', () => {
                const isHidden = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isHidden ? 'text' : 'password');

                if (isHidden) {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    `;
                } else {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    `;
                }
            });

            // Toggle password confirmation visibility
            const passwordConfirmationInput = document.getElementById('password_confirmation');
            const toggleConfirmationButton = document.getElementById('toggle-password-confirmation');
            const eyeIconConfirmation = document.getElementById('eye-icon-confirmation');

            toggleConfirmationButton?.addEventListener('click', () => {
                const isHidden = passwordConfirmationInput.getAttribute('type') === 'password';
                passwordConfirmationInput.setAttribute('type', isHidden ? 'text' : 'password');

                if (isHidden) {
                    eyeIconConfirmation.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    `;
                } else {
                    eyeIconConfirmation.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    `;
                }
            });
        });
    </script>
</body>
</html>