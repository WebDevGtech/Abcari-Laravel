
<div class="paginating-container pagination-default">
    @if ($paginator->hasPages())
    @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : ($this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1))
    {{-- <nav class="pagination justify-content-center"> --}}
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                    <li style="cursor:pointer;" class="prev disabled">
                        {{-- {!! __('pagination.previous') !!} --}}<a><</a>
                    </li>
                @else
                    <span style="cursor:pointer;border-radius:4px;" class="prev" wire:click="previousPage" wire:loading.attr="disabled" rel="prev">
                        {{-- {!! __('pagination.previous') !!} --}}<a style="position: relative;top: 10px;">&nbsp&nbsp&nbsp < &nbsp&nbsp&nbsp</a>
                    </span>
                    <span style="padding-right:5px;"></span>
                @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li style="cursor:pointer;" class="page-item disabled" aria-disabled="true"><a>{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li style="cursor:pointer;" class="page-item active" wire:key="paginator-page-{{ $page }}" aria-current="page"><a  wire:click="gotoPage({{ $page }})">{{ $page }}</a></li>
                        @else
                            <li style="cursor:pointer;" class="page-item" wire:key="paginator-page-{{ $page }}"><a  wire:click="gotoPage({{ $page }})">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <span style="cursor:pointer;border-radius:4px;" wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="prev">
                    <a style="position: relative;top: 10px;">&nbsp&nbsp&nbsp > &nbsp&nbsp&nbsp</a>
                </span>
            @else
            <li style="cursor:pointer;" class="page-item">
                <a>></a>
            </li>

            @endif
        </ul>
    {{-- </nav> --}}
@endif

</div>
