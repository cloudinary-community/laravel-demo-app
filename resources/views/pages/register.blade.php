<x-layouts.auth title="Lets get started">
  <x-card class="mx-auto mt-24 flex max-w-3xl flex-col items-center py-12">
    <a class="flex items-center gap-3" href="{{ route('home') }}">
      <x-logo class="h-24 w-auto text-laravel" />
    </a>

    <h1 class="mb-4 mt-8 text-xl font-semibold dark:text-white/80">Lets get started</h1>

    <form
      class="flex w-1/2 flex-col gap-4"
      action="{{ route('register') }}"
      method="POST"
    >
      @csrf

      <x-input
        label="Your Name"
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
        name="password_confirmation"
        placeholder="hunter2"
        required
      />

      <x-button class="mt-4" type="submit">
        Register
      </x-button>

      <p class="mt-4 flex items-center justify-center gap-1">
        <span>Already have an account?</span>
        <a class="text-center text-sm text-laravel hover:underline" href="{{ route('login') }}">Login</a>
      </p>
    </form>
  </x-card>
</x-layouts.auth>
