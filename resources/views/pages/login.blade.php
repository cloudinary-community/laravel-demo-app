<x-layouts.auth title="Login">
  <x-card class="mx-auto mt-24 flex max-w-3xl flex-col items-center py-12">
    <a class="flex items-center gap-3" href="{{ route('home') }}">
      <x-logo class="h-24 w-auto text-laravel" />
    </a>

    <h1 class="mb-4 mt-8 text-xl font-semibold text-white/80">Welcome Back!</h1>

    <form
      class="flex w-1/2 flex-col gap-4"
      action="{{ route('login') }}"
      method="POST"
    >
      @csrf

      <x-input
        label="Email"
        type="email"
        name="email"
        placeholder="jane@example.com"
        required
      />
      <x-input
        label="Password"
        type="password"
        name="password"
        placeholder="hunter2"
        required
      />

      <label class="flex cursor-pointer items-center gap-3">
        <input
          class="rounded-lg border border-zinc-200 bg-white p-3 text-sm text-laravel focus:ring-0 dark:border-black dark:bg-black/20"
          type="checkbox"
          label="Remember me"
          name="remember"
        />
        <span>Remember me</span>
      </label>

      <button class="mt-4 w-full rounded-lg bg-laravel py-3 font-semibold text-white hover:bg-laravel/70"
        type="submit">
        Login
      </button>

      <p class="mt-4 flex items-center justify-center gap-1">
        <span>Don't have an account?</span>
        <a class="text-center text-sm text-laravel hover:underline" href="{{ route('register') }}">Register</a>
      </p>
    </form>
  </x-card>
</x-layouts.auth>
