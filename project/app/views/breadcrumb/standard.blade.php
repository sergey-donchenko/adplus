<ol class="breadcrumb">
	<li><a href="#">Home</a></li>

	@foreach( $arrList as $oItem )

		@if ( $oItem === end($arrList) )
			<li class="active">
		@else
			<li>		
		@endif

		@if ( empty($oItem['url']) === false )
			{{ HTML::link( $oItem['url'], $oItem['title'] ) }}
		@else
			{{ $oItem['title'] }}
		@endif				
	</li>
	@endforeach   
</ol>
