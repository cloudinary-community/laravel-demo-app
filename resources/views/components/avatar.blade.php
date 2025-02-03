@props(['email' => 'example@test.com'])

<img
  {{ $attributes->merge([
      'class' => 'size-10 rounded-full',
      'src' => 'https://www.gravatar.com/avatar/' . md5($email) . '?d=mm&s=40',
  ]) }}
/>
