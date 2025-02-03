@php
  $suggested = \App\Models\User::all();
@endphp

<x-layouts.main class="flex flex-col gap-12 md:flex-row">
  <section class="flex w-full flex-col gap-12 md:w-2/3">
    @foreach ($posts as $post)
      <x-card class="flex flex-col">
        <div class="mb-4 flex items-center gap-3">
          <a class="flex-shrink-0" href="{{ route('profile', $post->user) }}">
            <x-avatar email="{{ $post->user->email }}" />
          </a>
          <div class="flex flex-1">
            <a class="block font-semibold tracking-tight text-black dark:text-white"
              href="{{ route('profile', $post->user) }}"
            >
              {{ $post->user->username }}
            </a>
            <a class="ml-1 block before:mr-1 before:[content:'•']"
              href={{ route('post', $post) }}>{{ $post->created_at->diffForHumans() }}</a>
          </div>
          <x-icons.dots class="h-auto w-6" />
        </div>
        <a class="block" href="{{ route('post', $post) }}">
          <img
            class="w-full rounded-md"
            src="{{ Storage::url($post->image) }}"
            alt="{{ $post->description }}"
          />
        </a>
        <div class="my-4 flex items-center justify-between">
          <div class="flex items-center gap-4">
            <x-icons.heart class="size-6" />
            <x-icons.message class="size-6" />
            <x-icons.send class="size-6" />
          </div>
          <x-icons.bookmark class="size-6" />
        </div>
        <div class="text-sm">
          <a class="font-semibold tracking-tight text-black dark:text-white" href="{{ route('profile', $post->user) }}">
            {{ $post->user->username }}
          </a>
          <span class="ml-1">{{ $post->description }}</span>
        </div>
      </x-card>
    @endforeach
  </section>
  <aside class="hidden w-1/3 md:block">
    <x-card>
      <p class="font-semibold text-black dark:text-white/80">Suggested for you</p>
      <ul class="mt-4 flex flex-col gap-4">
        @foreach ($suggested as $user)
          <li class="flex items-center justify-between">
            <a class="flex flex-shrink-0 items-center gap-3" href="{{ route('profile', $user) }}">
              <x-avatar email="{{ $user->email }}" />
              <span class="flex-1 font-semibold tracking-tight text-black dark:text-white">{{ $user->username }}</span>
            </a>
            <a class="font-semibold text-laravel hover:underline" href="#">Follow</a>
          </li>
        @endforeach
      </ul>
    </x-card>
  </aside>
</x-layouts.main>
