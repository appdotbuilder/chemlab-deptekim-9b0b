@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
  <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border">
    <h1 class="text-2xl font-bold text-center mb-6">Reset Password</h1>
    
    @if (session('status'))
    <div class="mb-4 text-sm text-green-600 dark:text-green-400">
      {{ session('status') }}
    </div>
    @endif
    
    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      
      <div class="mb-6">
        <label for="email" class="block text-sm font-medium mb-2">Email Address</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" 
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
        @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      
      <button type="submit" class="w-full bg-gray-900 text-white py-2 rounded-lg dark:bg-white dark:text-gray-900">
        Send Password Reset Link
      </button>
    </form>
    
    <div class="mt-4 text-center">
      <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-300 underline">
        Back to Login
      </a>
    </div>
  </div>
</div>
@endsection