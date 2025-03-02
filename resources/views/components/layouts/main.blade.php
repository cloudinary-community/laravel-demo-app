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

    <header class="border-b border-zinc-200 bg-white p-6 dark:border-white/[0.05] dark:bg-zinc-900">
      <div class="mx-auto flex w-full items-start gap-4 lg:max-w-6xl">
        <a class="flex items-center gap-3" href="{{ route('home') }}">
          <x-logo class="text-laravel h-6 w-auto lg:h-8" />
          <span class="text-laravel text-xl lg:text-2xl">Laragram</span>
        </a>

        <nav class="-mx-3 flex flex-1 justify-end">
          @auth
            <x-create-post />

            <form method="post" action="{{ route('logout') }}">
              @csrf
              <button
                class="focus-visible:ring-laravel rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                type="submit"
              >
                <x-icons.logout class="size-6" />
              </button>
            </form>
          @else
            <a class="focus-visible:ring-laravel rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
              href="{{ route('login') }}"
            >
              Log in
            </a>

            <a class="focus-visible:ring-laravel rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
              href="{{ route('register') }}"
            >
              Register
            </a>
          @endauth
        </nav>
      </div>
    </header>

    <main {{ $attributes->merge(['class' => 'mx-auto my-6 w-full px-6 lg:max-w-6xl lg:px-0']) }}>
      {{ $slot }}
    </main>

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
      Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>
    </div>
  </body>

</html>
