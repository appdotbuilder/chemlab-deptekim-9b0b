@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
  <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border">
    <h1 class="text-2xl font-bold text-center mb-6">Confirm Password</h1>
    
    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
      This is a secure area of the application. Please confirm your password before continuing.
    </p>
    
    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf
      
      <div class="mb-6">
        <label for="password" class="block text-sm font-medium mb-2">Password</label>
        <input type="password" id="password" name="password"
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
        @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      
      <button type="submit" class="w-full bg-gray-900 text-white py-2 rounded-lg dark:bg-white dark:text-gray-900">
        Confirm
      </button>
    </form>
  </div>
</div>
@endsection