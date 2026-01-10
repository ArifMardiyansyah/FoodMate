<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodMate | Akses Ditolak</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50 min-h-screen font-abhaya flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-2xl shadow-xl p-8 text-center">
            <!-- Icon -->
            <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>

            <!-- Title -->
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Akses Ditolak</h1>
            
            <!-- Message -->
            <p class="text-gray-600 mb-2">{{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses untuk halaman ini.' }}</p>
            <p class="text-sm text-gray-500 mb-8">Halaman ini hanya dapat diakses oleh admin.</p>

            <!-- Actions -->
            <div class="space-y-3">
                <a href="/menu" class="block w-full bg-[#F6A406] text-white font-semibold py-3 px-6 rounded-xl hover:bg-[#F08C00] transition-colors">
                    Kembali ke Menu
                </a>
                
                @auth
                    @if(auth()->user()->role !== 'admin')
                        <p class="text-sm text-gray-500 mt-4">
                            Login sebagai: <strong>{{ auth()->user()->name }}</strong> ({{ ucfirst(auth()->user()->role) }})
                        </p>
                    @endif
                @endauth
            </div>

            <!-- Help Text -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-500">
                    Jika Anda adalah admin dan mengalami masalah, silakan hubungi tim support.
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="/" class="text-gray-600 hover:text-[#F6A406] transition-colors text-sm">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>