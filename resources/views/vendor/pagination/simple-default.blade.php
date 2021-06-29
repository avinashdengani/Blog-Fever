@if ($paginator->hasPages())
    <div class="row m25 animated " data-animation="fadeInUp" data-animation-delay="100" style="display: flex; flex-direction:column;">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true"><a class="button button-sm button-pasific pull-left hover-skew-backward">Old Entries</a></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="button button-sm button-pasific pull-left hover-skew-backward"> Old Entries</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="button button-sm button-pasific pull-right hover-skew-forward">New Entries</a></li>
            @else
            <li class="disabled" aria-disabled="true"><a class="button button-sm button-pasific pull-right hover-skew-forward ">New Entries</a></li>
            @endif
        </ul>
    </div>
@endif
