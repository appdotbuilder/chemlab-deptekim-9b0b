@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
  <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border">
    <h1 class="text-2xl font-bold text-center mb-6">Reset Password</h1>
    
    <form method="POST" action="{{ route('password.store') }}">
      @csrf
      
      <input type="hidden" name="token" value="{{ $token }}">
      
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium mb-2">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $email) }}"
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required autofocus>
        @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium mb-2">New Password</label>
        <input type="password" id="password" name="password"
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
        @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      
      <div class="mb-6">
        <label for="password_confirmation" class="block text-sm font-medium mb-2">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
        @error('password_confirmation')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      
      <button type="submit" class="w-full bg-gray-900 text-white py-2 rounded-lg dark:bg-white dark:text-gray-900">
        Reset Password
      </button>
    </form>
  </div>
</div>
@endsection