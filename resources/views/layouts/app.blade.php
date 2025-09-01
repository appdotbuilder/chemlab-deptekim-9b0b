<!doctype html>
<html lang="id" class="h-full antialiased" x-data="{ dark: localStorage.getItem('theme') === 'dark' }" :class="{ 'dark': dark }">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $title ?? 'ChemLab Deptekim' }}</title>
  @vite(['resources/css/app.css','resources/js/components/app-entrypoint.js'])
  @livewireStyles
</head>
<body class="min-h-screen bg-gray-50 text-gray-900 dark:bg-gray-950 dark:text-gray-100">
  <header class="border-b border-gray-200 dark:border-gray-800">
    <div class="mx-auto max-w-7xl px-4 py-3 flex items-center justify-between">
      <a href="{{ url('/') }}" class="font-semibold text-lg">ChemLab Deptekim</a>
      <div class="flex items-center gap-3">
        <button class="rounded-xl px-3 py-1.5 text-sm border dark:border-gray-700"
                x-on:click="dark = !dark; localStorage.setItem('theme', dark ? 'dark' : 'light')">
          <span x-show="!dark">🌙 Dark</span><span x-show="dark">☀️ Light</span>
        </button>
        @auth
          <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}" class="text-sm underline">Dashboard</a>
            <a href="{{ route('equipment.index') }}" class="text-sm underline">Alat</a>
            <a href="{{ route('loans.create') }}" class="text-sm underline">Pinjam</a>
          </div>
        @else
          <a href="{{ route('login') }}" class="text-sm underline">Login</a>
        @endauth
      </div>
    </div>
  </header>

  <main class="mx-auto max-w-7xl px-4 py-8">
    {{ $slot ?? '' }}
    @yield('content')
  </main>

  <footer class="mt-12 border-t border-gray-200 dark:border-gray-800">
    <div class="mx-auto max-w-7xl px-4 py-6 text-sm">
      © Departemen Teknik Kimia FTUI — Untuk kebutuhan akademik & penelitian.
    </div>
  </footer>

  @livewireScripts
  @stack('scripts')
</body>
</html>