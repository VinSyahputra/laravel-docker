@extends('layouts.admin')

@section('header_title', $title ?? 'Blank Page')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden" x-data="{
        selected: [],
        userIds: {{ $users->pluck('id') }},
        get allSelected() { return this.selected.length === this.userIds.length && this.userIds.length > 0 },
        toggleAll() {
            if (this.allSelected) {
                this.selected = [];
            } else {
                this.selected = [...this.userIds];
            }
        }
    }">
        <!-- Table Header & Filters Logic -->
        <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4">
            <form action="{{ route('admin.users.index') }}" method="GET"
                class="flex flex-1 items-center gap-3 w-full md:w-auto">
                <div class="relative flex-1 md:max-w-xs">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search User"
                        class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none">
                </div>

                <!-- Bulk Actions Dropdown -->
                <div class="relative" x-data="{ open: false }" x-show="selected.length > 0" x-transition>
                    <button @click="open = !open" type="button"
                        class="inline-flex items-center gap-2 px-4 py-2 border border-indigo-200 rounded-lg bg-indigo-50 text-sm font-semibold text-indigo-700 hover:bg-indigo-100 transition-all focus:ring-2 focus:ring-indigo-500/10 outline-none">
                        <span x-text="selected.length"></span> Selected
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-1 ring-1 ring-black ring-opacity-5 z-20"
                        style="display: none;">
                        <button type="button"
                            class="flex w-full items-center px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            Edit Selected
                        </button>
                        <button type="button"
                            class="flex w-full items-center px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Activate Users
                        </button>
                        <div class="border-t border-slate-100 my-1"></div>
                        <button type="button"
                            class="flex w-full items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                            <svg class="w-4 h-4 mr-2 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Delete Selected
                        </button>
                    </div>
                </div>
            </form>
            <button
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all shadow-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add User
            </button>
        </div>

        <!-- Desktop Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1000px]">
                <thead>
                    <tr class="border-b border-slate-100 text-[11px] uppercase tracking-wider text-slate-400 font-bold">
                        <th class="px-6 py-4 w-10">
                            <input type="checkbox" @click="toggleAll()" :checked="allSelected"
                                class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        </th>
                        <th class="px-6 py-4">User</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4">Plan</th>
                        <th class="px-6 py-4">Billing</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-50/50 transition-colors"
                            :class="{ 'bg-indigo-50/30': selected.includes({{ $user->id }}) }">
                            <td class="px-6 py-4">
                                <input type="checkbox" value="{{ $user->id }}" x-model.number="selected"
                                    class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="h-9 w-9 rounded-full bg-slate-100 flex items-center justify-center text-indigo-600 font-bold text-xs ring-2 ring-white overflow-hidden">
                                        <img src="https://i.pravatar.cc/30?u={{ $user->id }}" alt=""
                                            class="h-full w-full object-cover">
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-700 leading-tight">{{ $user->name }}</span>
                                        <span class="text-[12px] text-slate-400 font-medium">{{ $user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2 text-slate-600">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="text-sm font-medium">Maintainer</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-600 font-medium">Enterprise</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-600 font-medium whitespace-nowrap">Auto Debit</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold uppercase tracking-tight {{ $loop->index % 3 == 0 ? 'bg-emerald-50 text-emerald-600' : ($loop->index % 3 == 1 ? 'bg-amber-50 text-amber-600' : 'bg-slate-50 text-slate-500') }}">
                                    {{ $loop->index % 3 == 0 ? 'Active' : ($loop->index % 3 == 1 ? 'Pending' : 'Inactive') }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-1">
                                    {{-- View --}}
                                    <button
                                        class="p-1.5 text-slate-400 hover:text-slate-600 transition-colors cursor-pointer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>

                                    {{-- More Dropdown (Edit & Delete) --}}
                                    <div class="relative" x-data="{ open: false }">
                                        <button @click="open = !open" @click.away="open = false"
                                            class="p-1.5 text-slate-400 hover:text-slate-600 transition-colors focus:outline-none cursor-pointer">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                            </svg>
                                        </button>

                                        <div x-show="open" x-transition.opacity
                                            class="absolute right-2 top-7 mb-2 w-auto bg-white rounded-lg shadow-xl ring-1 ring-black ring-opacity-5 z-30 py-1 overflow-hidden"
                                            style="display: none;">
                                            <button
                                                class="flex w-full items-center px-4 py-2 text-[11px] font-bold uppercase tracking-wider text-slate-600 hover:bg-slate-50 transition-colors cursor-pointer">
                                                <svg class="w-3.5 h-3.5 mr-2 text-slate-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                                Edit
                                            </button>
                                            <button
                                                class="flex w-full items-center px-4 py-2 text-[11px] font-bold uppercase tracking-wider text-red-600 hover:bg-red-50 transition-colors cursor-pointer">
                                                <svg class="w-3.5 h-3.5 mr-2 text-red-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-20 text-center text-slate-400">No entries found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Section -->
        {{ $users->links('vendor.pagination.custom') }}
    </div>
@endsection
