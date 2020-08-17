@if ($paginator->hasPages())
    <!-- Pagination -->
    <nav class="pull-right pagination">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li  class="disabled  page-item">
                    <span  class="page-link"><i class="fa fa-angle-double-left"></i></span>
                </li>
            @else
                <li class=" page-item">
                    <a rel="nofollow" href="{{ $paginator->previousPageUrl() }}" class="page-link">
                        <span><i class="fa fa-angle-double-left"></i></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active page-item"><span  class="page-link">{{ $page }}</span></li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <li class="page-item"><a rel="nofollow" href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <li class="disabled page-item"><span class="page-link"><i class="fa fa-ellipsis-h"></i></span></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class=" page-item">
                    <a  class="page-link" rel="nofollow" href="{{ $paginator->nextPageUrl() }}">
                        <span><i class="fa fa-angle-double-right"></i></span>
                    </a>
                </li>
            @else
                <li class="disabled  page-item">
                    <span  class="page-link">
                        <i class="fa fa-angle-double-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
    <!-- Pagination -->
@endif
