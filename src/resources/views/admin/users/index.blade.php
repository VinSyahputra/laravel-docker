@extends('layouts.admin')

@section('header_title', $title ?? 'Blank Page')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 text-blue-500 mb-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                </path>
            </svg>
        </div>
        <h2 class="text-xl font-bold text-slate-800 mb-2">{{ $title ?? 'Page' }} Content Goes Here!</h2>
        <p class="text-slate-500 max-w-md mx-auto">This is a mock page placeholder for your navigation links. You can start
            building your actual features by replacing this view.</p>
    </div>
@endsection
