<button
  {{ $attributes->merge(['class' => 'rounded-lg bg-laravel py-3 px-2 font-semibold text-white hover:bg-laravel/70']) }}
>
  {{ $slot }}
</button>
