@if ($paginator->hasPages())
            @if ($paginator->onFirstPage())
                <a href="#/" class="text-link with-ico cont"></a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="text-link with-ico cont"></a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <a href="#/" class="number-link">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
{{--                        {{ $url}}--}}
                        @if ($page == $paginator->currentPage())
                            <a href="#/" class="number-link active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="number-link ">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="text-link with-ico"></a>
            @else
                <a href="#/" class="text-link with-ico"></a>
            @endif
@endif
{{--http://worldwatchtrade.local/catalog?_token=VEojBJYSR8tDc3OMaXTxcpdYidyw4r46KUazWflZ&models%5B%5D=A1-1042&models%5B%5D=A1-1077&price=0%3B600--}}
