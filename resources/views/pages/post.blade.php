@php
  $post = [
      'username' => fake()->userName(),
      'avatar' => fake()->imageUrl(50, 50),
      'image' => fake()->imageUrl(640, 960),
      'caption' => fake()->sentence(rand(10, 30)),
      'time' => fake()->dateTimeBetween('-1 week', 'now')->format('M j'),
  ];

  $comments = collect(range(1, 5))->map(function () {
      return [
          'username' => fake()->userName(),
          'avatar' => fake()->imageUrl(50, 50),
          'message' => fake()->sentence(rand(5, 15)),
          'time' => fake()->dateTimeBetween('-1 week', 'now')->format('M j'),
      ];
  });
@endphp

<x-layouts.main>
  <x-card class="flex flex-row overflow-hidden p-0">
    <img class="border-r border-zinc-200 dark:border-white/[0.05]" src="{{ $post['image'] }}" />
    <div>
      <div class="flex items-center gap-4 p-4">
        <a class="flex-shrink-0" href="{{ route('profile') }}">
          <img class="size-10 rounded-full" src="{{ $post['avatar'] }}" />
        </a>
        <div>
          <a class="font-semibold text-black dark:text-white/80" href="{{ route('profile') }}">{{ $post['username'] }}</a>
          <div class="text-xs text-gray-500">{{ $post['time'] }}</div>
        </div>
      </div>
      <p class="border-b border-white/[0.10] p-4 pt-0">
        {{ $post['caption'] }}
      </p>
      <ul class="flex flex-col gap-3">
        @foreach ($comments as $comment)
          <li class="flex items-start gap-4 p-4">
            <a class="flex-shrink-0" href="{{ route('profile') }}">
              <img class="size-8 rounded-full" src="{{ $comment['avatar'] }}" />
            </a>
            <div>
              <div>
                <a class="font-semibold text-black dark:text-white/80"
                  href="{{ route('profile') }}">{{ $comment['username'] }}</a>
                <div class="text-xs text-gray-500">{{ $comment['time'] }}</div>
              </div>
              <div class="text-sm text-black dark:text-white/80">{{ $comment['message'] }}</div>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </x-card>
</x-layouts.main>
