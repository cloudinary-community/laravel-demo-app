@php
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
    <img class="max-w-2xl border-r border-zinc-200 dark:border-white/[0.05]" src="{{ Storage::url($post->image) }}" />
    <div class="w-full">
      <div class="flex items-center gap-4 p-4">
        <a class="flex-shrink-0" href="{{ route('profile', $post->user) }}">
          <x-avatar email="{{ $post->user->email }}" />
        </a>
        <div>
          <a class="font-semibold text-black dark:text-white/80"
            href="{{ route('profile', $post->user) }}">{{ $post->user->username }}</a>
          <div class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</div>
        </div>
      </div>
      <p class="border-b border-white/[0.10] p-4 pt-0">
        {{ $post->description }}
      </p>
      <ul class="flex flex-col gap-3">
        @foreach ($post->comments as $comment)
          <li class="flex items-start gap-4 p-4">
            <a class="flex-shrink-0" href="{{ route('profile', $comment->user) }}">
              <x-avatar class="size-8" email="{{ $comment->user->email }}" />
            </a>
            <div>
              <div>
                <a class="font-semibold text-black dark:text-white/80"
                  href="{{ route('profile', $comment->user) }}">{{ $comment->user->username }}</a>
                <div class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</div>
              </div>
              <div class="text-sm text-black dark:text-white/80">{{ $comment->body }}</div>
            </div>
          </li>
        @endforeach
      </ul>
      @auth
        <div class="mt-4 flex w-full items-center gap-3">
          <x-avatar email="{{ auth()->user()->email }}" />
          <form
            class="flex flex-1 items-center gap-3"
            method="post"
            action="{{ route('post', $post) }}"
          >
            @csrf
            <div class="w-full">
              <x-input name="body" placeholder="Add a comment" />
            </div>
            <x-button class="text-sm" type="submit">Comment</x-button>
          </form>
        </div>
      @endauth
    </div>
  </x-card>
</x-layouts.main>
