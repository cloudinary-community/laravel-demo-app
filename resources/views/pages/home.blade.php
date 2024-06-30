@php
  $posts = collect(range(1, 10))->map(
      fn() => [
          'username' => fake()->userName(),
          'avatar' => fake()->imageUrl(50, 50),
          'image' => fake()->imageUrl(640, 360),
          'caption' => fake()->sentence(rand(10, 30)),
          'time' => fake()->dateTimeBetween('-1 week', 'now')->format('M j'),
      ],
  );

  $suggested = collect(range(1, 5))->map(
      fn() => [
          'username' => fake()->userName(),
          'avatar' => fake()->imageUrl(50, 50),
      ],
  );
@endphp

<x-layout class="flex flex-col gap-12 md:flex-row">
  <section class="flex w-full flex-col gap-12 md:w-2/3">
    @foreach ($posts as $post)
      <x-card class="flex flex-col">
        <div class="mb-4 flex items-center gap-3">
          <a class="flex-shrink-0" href="{{ route('profile') }}">
            <img
              class="size-10 rounded-full"
              src="{{ $post['avatar'] }}"
              alt="Avatar"
            />
          </a>
          <div class="flex flex-1">
            <a class="block font-semibold tracking-tight text-black dark:text-white" href="{{ route('profile') }}">
              {{ $post['username'] }}
            </a>
            <a class="ml-1 block before:mr-1 before:[content:'•']" href={{ route('post') }}>{{ $post['time'] }}</a>
          </div>
          <x-icons.dots class="h-auto w-6" />
        </div>
        <a class="block" href="{{ route('post') }}">
          <img
            class="w-full rounded-md"
            src="{{ $post['image'] }}"
            alt="Placeholder"
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
          <a class="font-semibold tracking-tight text-black dark:text-white" href="{{ route('profile') }}">
            {{ $post['username'] }}
          </a>
          <span class="ml-1">{{ $post['caption'] }}</span>
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
            <a class="flex flex-shrink-0 items-center gap-3" href="{{ route('profile') }}">
              <img
                class="size-10 rounded-full"
                src="{{ $user['avatar'] }}"
                alt="Avatar"
              />
              <span
                class="flex-1 font-semibold tracking-tight text-black dark:text-white">{{ $user['username'] }}</span>
            </a>
            <a class="font-semibold text-laravel hover:underline" href="#">Follow</a>
          </li>
        @endforeach
      </ul>
    </x-card>
  </aside>
</x-layout>
