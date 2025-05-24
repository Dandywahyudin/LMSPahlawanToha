<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    @vite('resources/css/app.css')
    
</head>
<body>
    <div class="bg-white">
        <div class="relative isolate px-3 lg:px-5">
            <div class="min-h-screen flex items-center justify-center px-4">
                <div class="text-center">
                    <img src="{{ asset('storage/logopahlawanwoha.png') }}" alt="Logo" class="mx-auto mb-6 w-24 h-24 object-contain">
                    
                    <p class="text-base sm:text-2xl md:text-4xl font-medium text-gray-500">
                        Selamat Datang di Portal Ujian
                    </p>
                    
                    <h2 class="text-xl sm:text-3xl md:text-5xl font-semibold tracking-tight text-gray-900 pt-4">
                        SMK PAHLAWAN TOHA BANDUNG
                    </h2>
            
                    <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="/login" class="w-full sm:w-auto rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 text-center">
                            Masuk
                        </a>
                        <a href="/register" class="w-full sm:w-auto rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 text-center">
                            Daftar
                        </a>
                        
                    </div>
                </div>
            </div>                      
        </div>
    </div>
</body>
</html>
