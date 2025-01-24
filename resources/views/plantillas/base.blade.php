<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CDN tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('titulo')</title>
</head>

<body class="h-screen bg-gradient-to-t from-red-300 to-white">
    <nav class="bg-red-400">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ Storage::url('images/imglogoanimal.jpg') }}" class="h-10" alt="logo app" />
                <span class="self-center text-2xl font-semibold text-white whitespace-nowrap">Tienda Animal</span>
            </a>
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-lg bg-red-400 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                    <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.*')">
                        <i class="fa-solid fa-layer-group mr-2 text-white"></i>
                        <span class="text-white">Categorías</span>
                    </x-nav-link>
                    <x-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.*')">
                        <i class="fa-solid fa-boxes-stacked mr-2 text-white"></i>
                        <span class="text-white">Productos</span>
                    </x-nav-link>
                </ul>
            </div>
        </div>
    </nav>
    <br/>
    <h3 class="mb-2 text-xl text-center font-bold text-red-400">@yield('cabecera')</h3>
    <main class="w-3/4 mx-auto">
        @yield('contenido')
    </main>
    <alertas>
        @yield('alertas')
    </alertas>
</body>

</html>
