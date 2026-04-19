<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-50 text-slate-900 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0 hidden md:flex md:flex-col transition-all duration-300">
            <div class="h-16 flex items-center px-6 font-bold text-xl border-b border-slate-800 tracking-wider">
                ADMIN
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="/dashboard"
                    class="{{ request()->is('dashboard') ? 'flex items-center px-4 py-3 bg-blue-600 rounded-lg text-sm font-medium text-white' : 'flex items-center px-4 py-3 text-slate-400 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white' }} transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    Dashboard
                </a>
                <a href="/dashboard/users"
                    class="{{ request()->is('dashboard/users') ? 'flex items-center px-4 py-3 bg-slate-800 text-white rounded-lg text-sm font-medium' : 'flex items-center px-4 py-3 text-slate-400 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white' }} transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    Users
                </a>
                <a href="/dashboard/settings"
                    class="{{ request()->is('dashboard/settings') ? 'flex items-center px-4 py-3 bg-slate-800 text-white rounded-lg text-sm font-medium' : 'flex items-center px-4 py-3 text-slate-400 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white' }} transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Settings
                </a>
            </nav>
        </aside>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Header -->
            <header
                class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6 shadow-sm z-10">
                <div class="flex items-center">
                    <button class="text-slate-500 focus:outline-none md:hidden">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h2 class="text-xl font-semibold text-slate-800 ml-4 md:ml-0">@yield('header_title', 'Dashboard')</h2>
                </div>

                <div class="flex items-center">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" @click.away="open = false"
                            class="flex items-center text-sm font-medium text-slate-700 hover:text-slate-900 focus:outline-none transition-colors">
                            <img class="h-8 w-8 rounded-full object-cover mr-2 border border-slate-200"
                                src="https://ui-avatars.com/api/?name=Admin+User&background=eff6ff&color=1d4ed8"
                                alt="Profile avatar">
                            <span>Admin User</span>
                            <svg class="ml-1 w-4 h-4 text-slate-400 transition-transform duration-200"
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 ring-1 ring-black ring-opacity-5 focus:outline-none"
                            style="display: none;">
                            <a href="/dashboard/profile"
                                class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Your Profile</a>
                            <a href="/dashboard/settings"
                                class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Settings</a>
                            <div class="border-t border-slate-100 my-1"></div>
                            <a href="/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-slate-50">Sign
                                out</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
                <!-- Smooth entry animation -->
                <div class="animate-in fade-in slide-in-from-bottom-4 duration-500">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>

</html>
