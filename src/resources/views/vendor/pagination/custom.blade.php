@if ($paginator->hasPages() || $paginator->total() > 0)
    <div class="flex items-center justify-between py-4 bg-white border-t border-slate-100 px-6">
        <!-- Info -->
        <div class="text-sm text-slate-400">
            Showing {{ $paginator->firstItem() ?? 0 }} to {{ $paginator->lastItem() ?? 0 }} of {{ $paginator->total() }} entries
        </div>

        <!-- Pagination -->
        @if ($paginator->hasPages())
            <div class="flex items-center gap-1">
                {{-- First Page --}}
                <a href="{{ $paginator->url(1) }}" class="flex items-center justify-center w-8 h-8 rounded bg-slate-50 text-slate-400 hover:bg-slate-100 transition-colors {{ $paginator->onFirstPage() ? 'pointer-events-none opacity-50' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5"/></svg>
                </a>

                {{-- Previous --}}
                <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center w-8 h-8 rounded bg-slate-50 text-slate-400 hover:bg-slate-100 transition-colors {{ $paginator->onFirstPage() ? 'pointer-events-none opacity-50' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                </a>

                {{-- Numbers --}}
                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="flex items-center justify-center w-8 h-8 rounded bg-indigo-600 text-white font-medium text-sm shadow-sm">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="flex items-center justify-center w-8 h-8 rounded bg-slate-50 text-slate-600 hover:bg-slate-100 transition-colors font-medium text-sm">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center w-8 h-8 rounded bg-slate-100 text-slate-400 hover:bg-slate-200 transition-colors {{ !$paginator->hasMorePages() ? 'pointer-events-none opacity-50' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                </a>

                {{-- Last Page --}}
                <a href="{{ $paginator->url($paginator->lastPage()) }}" class="flex items-center justify-center w-8 h-8 rounded bg-slate-100 text-slate-400 hover:bg-slate-200 transition-colors {{ !$paginator->hasMorePages() ? 'pointer-events-none opacity-50' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"/></svg>
                </a>
            </div>
        @endif
    </div>
@endif
