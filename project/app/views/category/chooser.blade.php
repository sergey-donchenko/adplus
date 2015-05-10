<div class="row category-chooser container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">/</a></li>
		</ol>
	</div>
	<div class="row">
		<ul>
			@foreach( $aCategories as $cItem)
			<li><a href="#">{{ $cItem->name }}</a></li>
			@endforeach
		</ul>
	</div>
</div>
