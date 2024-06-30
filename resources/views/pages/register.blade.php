<x-layouts.auth title="Login">
  <x-card class="mx-auto mt-24 flex max-w-3xl flex-col items-center py-12">
    <a class="flex items-center gap-3" href="{{ route('home') }}">
      <x-logo class="h-24 w-auto text-laravel" />
    </a>

    <h1 class="mb-4 mt-8 text-xl font-semibold text-white/80">Lets get started</h1>

    <form
      class="flex w-1/2 flex-col gap-4"
      action="{{ route('login') }}"
      method="POST"
    >
      @csrf

      <x-input
        label="Your Name"
        type="name"
        name="name"
        placeholder="Jane Doe"
        required
      />

      <x-input
        label="Email"
        type="email"
        name="email"
        placeholder="jane@example.com"
        required
      />

      <x-input
        label="Username"
        type="username"
        name="username"
        placeholder="janedoe"
        required
      />

      <x-input
        label="Password"
        type="password"
        name="password"
        placeholder="hunter2"
        required
      />

      <x-input
        label="Confirm Password"
        type="password"
        name="confirm_password"
        placeholder="hunter2"
        required
      />

      <button class="mt-4 w-full rounded-lg bg-laravel py-3 font-semibold text-white hover:bg-laravel/70"
        type="submit">
        Register
      </button>

      <p class="mt-4 flex items-center justify-center gap-1">
        <span>Already have an account?</span>
        <a class="text-center text-sm text-laravel hover:underline" href="{{ route('login') }}">Login</a>
      </p>
    </form>
  </x-card>
</x-layouts.auth>
