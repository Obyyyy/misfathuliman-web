<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 — Sedang Maintenance | MIS Fathul Iman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-950 text-gray-100 min-h-screen flex flex-col items-center justify-center px-4">

    <div class="text-center max-w-lg mx-auto">
        <div class="mb-6">
            <svg class="w-24 h-24 mx-auto text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-white mb-3">
            Sedang Dalam Pemeliharaan
        </h1>
        <p class="text-gray-400 text-sm sm:text-base leading-relaxed mb-4">
            Website MIS Fathul Iman sedang dalam proses pemeliharaan.
            Kami akan segera kembali.
        </p>
        @if (isset($exception) && $exception->getMessage())
            <p class="text-xs text-gray-500 italic">{{ $exception->getMessage() }}</p>
        @endif
    </div>

</body>

</html>
