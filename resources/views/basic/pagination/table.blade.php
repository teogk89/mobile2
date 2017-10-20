@if ($paginator->hasPages())
	
	<div class="paging" style="width:auto">
		{{-- Previous Page Link --}}
		@if($paginator->onFirstPage())
			<a href="">Prev</a>
		@else
			<a href="{{ $paginator->previousPageUrl() }}">Prev</a>
		@endif

		{{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            	<span class="dots">{{ $element }}</span>
             
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    	<span class="current">{{ $page }}</span>
                      
                    @else
                     
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
          
            <a href="{{ $paginator->nextPageUrl() }}">Next</a>
        @else
            <a href="">Next</a>
        @endif




	</div>
	

	





@endif