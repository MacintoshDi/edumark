@extends('layouts.guest')

@section('title', 'Sign in')

@section('heading', 'Sign in to your account')

@section('content')
    <form class="space-y-6" action="#" method="POST">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium leading-6 text-copy-light">Email address</label>
            <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-2.5 px-3 text-copy shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-copy-light">Password</label>
                <div class="text-sm">
                    <a href="#" class="font-semibold text-primary hover:text-primary-darker">Forgot password?</a>
                </div>
            </div>
            <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-2.5 px-3 text-copy shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary">
                <label for="remember-me" class="ml-3 block text-sm leading-6 text-copy-light">Remember me</label>
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary w-full">Sign in</button>
        </div>
    </form>
@endsection
