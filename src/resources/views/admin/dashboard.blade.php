@extends('layouts.admin')

@section('header_title', 'Dashboard Overview')

@section('content')
    <!-- Dashboard Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Stat Card 1 -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex flex-col transition-transform hover:-translate-y-1 hover:shadow-md duration-300">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-slate-500 font-medium text-sm">Total Revenue</h3>
                <span class="inline-flex items-center justify-center p-2 bg-green-50 text-green-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </span>
            </div>
            <div class="flex items-baseline space-x-2">
                <h2 class="text-3xl font-bold text-slate-800">$45,231</h2>
                <span class="text-sm font-medium text-green-600">+20.1%</span>
            </div>
            <p class="text-xs text-slate-400 mt-1">from last month</p>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex flex-col transition-transform hover:-translate-y-1 hover:shadow-md duration-300">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-slate-500 font-medium text-sm">Active Users</h3>
                <span class="inline-flex items-center justify-center p-2 bg-blue-50 text-blue-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </span>
            </div>
            <div class="flex items-baseline space-x-2">
                <h2 class="text-3xl font-bold text-slate-800">+2350</h2>
                <span class="text-sm font-medium text-blue-600">+10.5%</span>
            </div>
            <p class="text-xs text-slate-400 mt-1">from last month</p>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex flex-col transition-transform hover:-translate-y-1 hover:shadow-md duration-300">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-slate-500 font-medium text-sm">Sales</h3>
                <span class="inline-flex items-center justify-center p-2 bg-orange-50 text-orange-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </span>
            </div>
            <div class="flex items-baseline space-x-2">
                <h2 class="text-3xl font-bold text-slate-800">+12,234</h2>
                <span class="text-sm font-medium text-orange-600">+8.2%</span>
            </div>
            <p class="text-xs text-slate-400 mt-1">from last month</p>
        </div>
        
        <!-- Stat Card 4 -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex flex-col transition-transform hover:-translate-y-1 hover:shadow-md duration-300">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-slate-500 font-medium text-sm">Server Uptime</h3>
                <span class="inline-flex items-center justify-center p-2 bg-indigo-50 text-indigo-600 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
                </span>
            </div>
            <div class="flex items-baseline space-x-2">
                <h2 class="text-3xl font-bold text-slate-800">99.9%</h2>
                <span class="text-sm font-medium text-slate-500">steady</span>
            </div>
            <p class="text-xs text-slate-400 mt-1">last 30 days</p>
        </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <h3 class="font-semibold text-slate-800">Recent Signups</h3>
            <button class="text-sm bg-white border border-slate-200 px-3 py-1.5 rounded-lg text-slate-600 font-medium hover:bg-slate-50 transition-colors shadow-sm">View All</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-slate-500 uppercase bg-white border-b border-slate-100">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium tracking-wider">User</th>
                        <th scope="col" class="px-6 py-4 font-medium tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-4 font-medium tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-4 font-medium tracking-wider">Joined Date</th>
                        <th scope="col" class="px-6 py-4 font-medium tracking-wider text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-6 py-4 flex items-center">
                            <img class="w-8 h-8 rounded-full border border-slate-200" src="https://ui-avatars.com/api/?name=John+Doe&background=f1f5f9" alt="User avatar">
                            <div class="ml-3 font-medium text-slate-800">John Doe</div>
                        </td>
                        <td class="px-6 py-4 text-slate-600">john.doe@example.com</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs font-medium bg-green-50 text-green-600 rounded-full border border-green-200/50">Active</span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">2 minutes ago</td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-800 opacity-0 group-hover:opacity-100 transition-opacity">Edit</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-6 py-4 flex items-center">
                            <img class="w-8 h-8 rounded-full border border-slate-200" src="https://ui-avatars.com/api/?name=Jane+Smith&background=f1f5f9" alt="User avatar">
                            <div class="ml-3 font-medium text-slate-800">Jane Smith</div>
                        </td>
                        <td class="px-6 py-4 text-slate-600">jane.smith@example.com</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs font-medium bg-green-50 text-green-600 rounded-full border border-green-200/50">Active</span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">1 hour ago</td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-800 opacity-0 group-hover:opacity-100 transition-opacity">Edit</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-6 py-4 flex items-center">
                            <img class="w-8 h-8 rounded-full border border-slate-200" src="https://ui-avatars.com/api/?name=Mike+Johnson&background=f1f5f9" alt="User avatar">
                            <div class="ml-3 font-medium text-slate-800">Mike Johnson</div>
                        </td>
                        <td class="px-6 py-4 text-slate-600">mike.j@example.com</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs font-medium bg-slate-100 text-slate-600 rounded-full border border-slate-200/50">Pending</span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">3 hours ago</td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-800 opacity-0 group-hover:opacity-100 transition-opacity">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
