
<div class="paginating-container pagination-default">
    @if ($paginator->hasPages())
    {{-- <nav class="pagination justify-content-center"> --}}
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="prev disabled"  aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a  aria-hidden="true">&lsaquo;</a>
                </li>
            @else
                <li class="prev">
                    <a   dusk="previousPage"  wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link" style="background: transparent;border:none;">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" wire:key="paginator-page-{{ $page }}" aria-current="page"><a  wire:click="gotoPage({{ $page }})">{{ $page }}</a></li>
                        @else
                            <li class="page-item" wire:key="paginator-page-{{ $page }}"><a  wire:click="gotoPage({{ $page }})">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a  dusk="nextPage"  wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a aria-hidden="true">&rsaquo;</a>
                </li>
            @endif
        </ul>
    {{-- </nav> --}}
@endif

</div>
