<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Internal Server Error</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white min-h-screen flex flex-col antialiased">

    <!-- Main Content Area -->
    <main class="flex-grow flex items-center justify-center px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center max-w-lg mx-auto">
            
            <!-- Error Code Highlight -->
            <h1 class="text-9xl font-bold text-[#ffdc59]">
                500
            </h1>
            
            <!-- Direct, human-readable heading -->
            <h3 class="mt-4 text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                Internal Server Error
            </h3>
            
            <!-- Pragmatic explanation -->
            <p class="mt-6 text-base leading-7 text-gray-600">
                Ada kesalahan pada server kami. Silakan coba lagi nanti atau hubungi admin kami jika masalah berlanjut.
            </p>

			  
    <?php if (ENVIRONMENT === 'development'): ?>
        <div style="text-align: left; background: #fff; padding: 20px; border: 1px solid #dcdde1; display: inline-block;">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
            
            <!-- Actionable steps -->
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-x-6">
                <!-- Primary Action -->
                <button onclick="window.location.reload()" class="w-full sm:w-auto rounded-md bg-[#ffdc59] px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#ffdc59]/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#ffdc59] transition-colors">
                    Coba lagi
                </button>
                
                <!-- Secondary Action -->
                <a href="<?php echo base_url('/'); ?>" class="w-full sm:w-auto text-sm font-semibold leading-6 text-gray-900 hover:text-gray-600 transition-colors">
                    Kembali ke beranda <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
            
        </div>
    </main>
    
    

</body>
</html>