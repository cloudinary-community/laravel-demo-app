<div
  {{ $attributes->merge(['class' => 'rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:ring-black/20 focus:outline-none focus-visible:ring-laravel dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:ring-zinc-700 dark:focus-visible:ring-laravel']) }}
>
  {{ $slot }}
</div>
