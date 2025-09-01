@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
  <h1 class="text-3xl font-bold">Profile Settings</h1>
  
  <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border">
    <h2 class="text-xl font-semibold mb-4">Profile Information</h2>
    
    @if (session('status'))
    <div class="mb-4 text-sm text-green-600 dark:text-green-400">
      {{ session('status') }}
    </div>
    @endif
    
    <form method="POST" action="{{ route('profile.update') }}">
      @csrf
      @method('PATCH')
      
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium mb-2">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
        @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      
      <div class="mb-6">
        <label for="email" class="block text-sm font-medium mb-2">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               required>
        @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        
        @if ($mustVerifyEmail && !auth()->user()->hasVerifiedEmail())
        <p class="text-sm text-yellow-600 dark:text-yellow-400 mt-1">
          Your email address is unverified. 
          <a href="{{ route('verification.send') }}" class="underline">Click here to re-send the verification email.</a>
        </p>
        @endif
      </div>
      
      <button type="submit" class="bg-gray-900 text-white px-4 py-2 rounded-lg dark:bg-white dark:text-gray-900">
        Save
      </button>
    </form>
  </div>
  
  <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border">
    <h2 class="text-xl font-semibold mb-4 text-red-600">Delete Account</h2>
    
    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
      Once your account is deleted, all of its resources and data will be permanently deleted.
    </p>
    
    <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
      @csrf
      @method('DELETE')
      
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium mb-2">Password</label>
        <input type="password" id="password" name="password"
               class="w-full px-3 py-2 border rounded-lg dark:border-gray-700 dark:bg-gray-800"
               placeholder="Confirm your password to delete account"
               required>
        @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      
      <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg">
        Delete Account
      </button>
    </form>
  </div>
</div>
@endsection