@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
  <h1 class="text-3xl font-bold">Appearance Settings</h1>
  
  <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border">
    <h2 class="text-xl font-semibold mb-4">Theme Preference</h2>
    
    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
      Choose your preferred theme. The system theme will automatically switch between light and dark based on your device settings.
    </p>
    
    <div class="space-y-3">
      <label class="flex items-center">
        <input type="radio" name="theme" value="light" class="mr-3">
        <span>☀️ Light Theme</span>
      </label>
      
      <label class="flex items-center">
        <input type="radio" name="theme" value="dark" class="mr-3">
        <span>🌙 Dark Theme</span>
      </label>
      
      <label class="flex items-center">
        <input type="radio" name="theme" value="system" class="mr-3" checked>
        <span>💻 System Theme</span>
      </label>
    </div>
    
    <div class="mt-6">
      <button type="button" class="bg-gray-900 text-white px-4 py-2 rounded-lg dark:bg-white dark:text-gray-900"
              onclick="saveThemePreference()">
        Save Preference
      </button>
    </div>
  </div>
</div>

<script>
function saveThemePreference() {
  const theme = document.querySelector('input[name="theme"]:checked').value;
  localStorage.setItem('theme', theme);
  
  // Apply immediately
  if (theme === 'dark') {
    document.documentElement.classList.add('dark');
  } else if (theme === 'light') {
    document.documentElement.classList.remove('dark');
  } else {
    // System preference
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    document.documentElement.classList.toggle('dark', prefersDark);
  }
  
  alert('Theme preference saved!');
}

// Load current preference
document.addEventListener('DOMContentLoaded', function() {
  const currentTheme = localStorage.getItem('theme') || 'system';
  document.querySelector(`input[value="${currentTheme}"]`).checked = true;
});
</script>
@endsection