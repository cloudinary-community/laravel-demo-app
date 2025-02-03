<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Laragram' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    @vite(['resources/client/app.css', 'resources/client/app.ts'])
  </head>

  <body class="bg-[size:75%] bg-left-top bg-no-repeat font-sans antialiased dark:bg-black dark:text-white/50"
    style="background-image: url('{{ Vite::asset('resources/assets/background.svg') }}')"
  >

    <header />

    <main {{ $attributes->merge(['class' => 'mx-auto my-6 w-full px-6 lg:max-w-6xl lg:px-0']) }}>
      {{ $slot }}
    </main>

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
      Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>

    </div>
  </body>

</html>
