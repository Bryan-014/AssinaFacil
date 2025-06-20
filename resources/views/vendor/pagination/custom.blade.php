@if ($paginator->hasPages())
    <div class="pagination-btns">
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->url(1) }}" class="pagination-back-all" aria-label="Primeira página"></a>
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-back" aria-label="Página anterior"></a>
        @else
            <a class="pagination-back-all disabled" aria-disabled="true"></a>
            <a class="pagination-back disabled" aria-disabled="true"></a>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="disabled">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="pagination selected">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}" class="pagination">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-up" aria-label="Próxima página"></a>
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="pagination-up-all" aria-label="Última página"></a>
        @else
            <a class="pagination-up disabled" aria-disabled="true"></a>
            <a class="pagination-up-all disabled" aria-disabled="true"></a>
        @endif
    </div>
@endif