@props(['name', 'label'])

<div class="mb-2">
  <label class="mb-2 block font-semibold" for="{{ $name }}">{{ $label }}</label>
  <input name="{{ $name }}"
    {{ $attributes->merge(['class' => 'w-full rounded-lg border border-zinc-200 bg-white p-3 text-sm focus:border-laravel/70 focus:ring-0 active:ring-0 dark:border-black dark:bg-black/20']) }}
  />
</div>
