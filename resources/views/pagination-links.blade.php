@if ($paginator->hasPages())
<ul class="page-numbers">
	{{-- Previous --}}
	@if ($paginator->onFirstPage())
		<li><a class=" next-link btn-disable">Previous</a></li>
	@else
		<li><a class="page-number-item next-link cursor-pointer" wire:click="previousPage" >Previous</a></li>
	@endif
	
	{{-- Previous End --}}


	@if($paginator->currentPage() > 3)
	<li class="hidden-xs"><a class="page-number-item" wire:click="gotoPage(1)">1</a></li>
	@endif
	@if($paginator->currentPage() > 4)
	<li><span class="page-number-item">...</span></li>
	@endif


	@foreach(range(1, $paginator->lastPage()) as $page)
            @if($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2)
                @if ($page == $paginator->currentPage())
				<li><span class="page-number-item current" >{{$page}}</span></li>
                @else
				<li><a class="page-number-item cursor-pointer" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" >{{$page}}</a></li>
                @endif
            @endif
    @endforeach

	{{--Page Number --}}
	{{-- @foreach ($elements as $element)
		@if(is_array($element))
			@foreach ($element as $page => $url)
				@if ($page == $paginator->currentPage())
				<li><span class="page-number-item current" >{{$page}}</span></li>
				@else
				<li><a class="page-number-item" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" >{{$page}}</a></li>
				@endif
			@endforeach
		@endif
	@endforeach --}}
	{{--Page Number END--}}

	@if($paginator->currentPage() < $paginator->lastPage() - 3)
		<li><span class="page-number-item">...</span></li>
	@endif
	@if($paginator->currentPage() < $paginator->lastPage() - 2)
		<li class="hidden-xs"><a class="page-number-item" wire:click="gotoPage({{$paginator->lastPage()}})">{{ $paginator->lastPage() }}</a></li>
	@endif
	
		{{-- Next --}}
		@if ($paginator->hasMorePages())
		<li><a class="page-number-item next-link cursor-pointer" wire:click="nextPage">Next</a></li>
		@else
		<li><a class="btn-disable next-link">Next</a></li>
		@endif
		{{-- Next End--}}
</ul>
<p class="result-count">Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} result</p>
@endif




{{-- @if ($paginator->hasPages())
    <ul class="pagination pagination">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>«</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a></li>
        @endif

        @if($paginator->currentPage() > 3)
            <li class="hidden-xs"><a href="{{ $paginator->url(1) }}">1ii</a></li>
        @endif
        @if($paginator->currentPage() > 4)
            <li><span>...</span></li>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <li><span>...</span></li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">»</a></li>
        @else
            <li class="disabled"><span>»</span></li>
        @endif
    </ul>
@endif  --}}
