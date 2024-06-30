@php
  $posts = collect(range(1, 9))->map(
      fn() => [
          'image' => fake()->imageUrl(640, 360),
      ],
  );

  $user = [
      'name' => fake()->name(),
      'username' => fake()->userName(),
      'avatar' => fake()->imageUrl(50, 50),
      'bio' => fake()->sentence(rand(10, 30)),
      'posts' => random_int(1, 1000),
      'followers' => random_int(1, 1000),
      'following' => random_int(1, 1000),
  ];
@endphp

<x-layouts.main class="flex flex-col gap-12">
  <x-card class="flex items-center justify-center gap-5">
    <img class="size-32 rounded-full" src="{{ $user['avatar'] }}" />
    <div class="flex flex-1 flex-col gap-2">
      <ul class="flex gap-3 text-black dark:text-white/60">
        <li><span class="font-semibold">{{ $user['posts'] }}</span> posts</li>
        <li><span class="font-semibold">{{ $user['followers'] }}</span> followers</li>
        <li><span class="font-semibold">{{ $user['following'] }}</span> following</li>
      </ul>
      <h1 class="text-xl font-semibold text-black dark:text-white">{{ $user['name'] }} <span
          class="text-black dark:text-white/30"
        >{{ '@' . $user['username'] }}</span></h1>
      <p class="text-black dark:text-white/80">{{ $user['bio'] }}</p>
    </div>
  </x-card>
  <x-card class="rid-rows-3 grid grid-cols-3 gap-1 overflow-hidden p-0">
    @foreach ($posts as $post)
      <a class="group relative" href="{{ route('post') }}">
        <span class="absolute hidden h-full w-full items-center justify-center gap-3 bg-black/70 group-hover:flex">
          <span class="flex items-center gap-2 text-white">
            <x-icons.heart-filled class="size-6" />
            <span class="font-black">32</span>
          </span>
          <span class="flex items-center gap-2 text-white">
            <x-icons.message-filled class="size-6" />
            <span class="font-black">7</span>
          </span>
        </span>
        <img src="{{ $post['image'] }}" />
      </a>
    @endforeach
  </x-card>
</x-layouts.main>
