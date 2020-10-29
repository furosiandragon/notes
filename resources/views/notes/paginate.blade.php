@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="table-responsive">
        <table class="table">
            <tr class="r">
                <td width="15%">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        &nbsp;
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="text-secondary h4" aria-label="{{ __('pagination.previous') }}"> << </a>
                    @endif
                </td>
                <td>
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="px-4 py-2 text-secondary bg-secondary border">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="px-4 py-2 text-white bg-secondary border">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="px-4 py-2 text-secondary" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </td>
                <td width="15%">
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="text-secondary h4" aria-label="{{ __('pagination.next') }}"> >> </a>
                    @else
                        &nbsp;
                    @endif
                </td>
            </tr>

            <tr class="hidden">
                <td colspan="3"><p class="mb-0">
                    {!! __('Showing') !!}
                    <span class="">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p></td>
            </tr>
        </table>
    </nav>
@endif
