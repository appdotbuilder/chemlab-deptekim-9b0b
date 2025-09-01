@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
  <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 border">
    <h1 class="text-2xl font-bold text-center mb-6">Verify Email</h1>
    
    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
      Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
    </p>
    
    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 text-sm text-green-600 dark:text-green-400">
      A new verification link has been sent to your email address.
    </div>
    @endif
    
    <div class="flex justify-between">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="bg-gray-900 text-white px-4 py-2 rounded-lg dark:bg-white dark:text-gray-900 text-sm">
          Resend Verification Email
        </button>
      </form>
      
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-sm text-gray-600 dark:text-gray-300 underline">
          Log Out
        </button>
      </form>
    </div>
  </div>
</div>
@endsection