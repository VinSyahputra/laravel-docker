@extends('layouts.auth')

@section('content')
    <form class="space-y-6" action="/login" method="POST">
        <!-- Mock CSRF -->
        @csrf

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label for="email" class="block text-sm font-medium text-slate-700">
                Email address
            </label>
            <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" required
                    placeholder="you@example.com"
                    class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors transition-shadow">
            </div>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-slate-700">
                Password
            </label>
            <div class="mt-1">
                <input id="password" name="password" type="password" autocomplete="current-password" required
                    placeholder="••••••••"
                    class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-lg shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors transition-shadow">
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300 rounded cursor-pointer">
                <label for="remember-me" class="ml-2 block text-sm text-slate-900 cursor-pointer">
                    Remember me
                </label>
            </div>

            <div class="text-sm">
                <a href="#" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">
                    Forgot your password?
                </a>
            </div>
        </div>

        <div>
            <button type="submit"
                class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all active:scale-[0.98]">
                Sign in
            </button>
        </div>
    </form>

    <div class="mt-6">
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-slate-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-slate-500">
                    Preview only
                </span>
            </div>
        </div>

        <div class="mt-6 flex gap-2">
            <a href="/dashboard"
                class="w-full inline-flex justify-center py-2 px-4 border border-slate-300 rounded-lg shadow-sm bg-white text-sm font-medium text-slate-500 hover:bg-slate-50 transition-colors">
                Skip to Dashboard Demo
            </a>
        </div>
    </div>
@endsection
