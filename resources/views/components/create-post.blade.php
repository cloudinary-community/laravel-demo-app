@props(['open' => false])

<div
  class="relative h-auto w-auto"
  x-data="{ open: @js($open) }"
  x-on:keydown.escape.window="open = false"
  x-bind:class="{ 'z-40': open }"
>
  <button
    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-laravel dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
    x-on:click="open = true"
  >
    New Post
  </button>

  <template x-teleport="body">
    <div
      class="fixed left-0 top-0 z-[99] flex h-screen w-screen items-end justify-center md:items-center"
      x-show="open"
      x-cloak
    >
      <div
        class="absolute inset-0 h-full w-full bg-zinc-900 bg-opacity-50 backdrop-blur-[4px]"
        x-show="open"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-on:click="open = false"
      ></div>
      <div
        class="relative w-full bg-white bg-opacity-90 px-7 py-6 shadow-md drop-shadow-md backdrop-blur-sm dark:bg-zinc-900 sm:max-w-3xl sm:rounded-lg"
        x-show="open"
        x-trap.inert.noscroll="open"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
      >
        <div class="flex items-center justify-between pb-3">
          <h3 class="text-lg font-semibold text-inherit dark:text-white/70">Create New Post</h3>
          <button
            class="absolute right-0 top-0 mr-5 mt-5 flex h-8 w-8 items-center justify-center rounded-full text-zinc-600 hover:bg-zinc-50 hover:text-zinc-800 focus:bg-zinc-50 focus:outline-none focus:ring-0 dark:hover:bg-zinc-950 dark:hover:text-zinc-50 dark:focus:bg-zinc-950 dark:focus:text-zinc-50"
            x-on:click="open = false"
          >
            <x-icons.x class="size-6" />
          </button>
        </div>
        <form
          method="post"
          action="{{ route('create') }}"
          enctype="multipart/form-data"
        >
          @csrf
          <div class="relative w-auto pb-8">
            <x-input
              name="description"
              label="Description"
              placeholder="Tell us about this image"
              autofocus
            />

            <x-input
              type="file"
              name="image"
              label="Image"
            />
          </div>
          <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
            <x-button type="submit">Create Post</x-button>
          </div>
        </form>
      </div>
    </div>
  </template>
</div>
