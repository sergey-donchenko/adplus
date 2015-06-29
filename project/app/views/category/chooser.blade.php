<div class="container-fluid">
	<div class="row category-chooser">

		<div class="col-xs-12">
			<ol class="breadcrumb" id="categoryBreadcrumb">
			  <li id="home"><a href="#"><span class="glyphicon glyphicon-home loadInitialList" aria-hidden="true"></span></a></li>			  
			</ol>

			@if ( $aCategories )							
			<div class="row category-container">
				@include('category.list.items', array('aCategories' => $aCategories))
			</div>	
			@else
				You do not have active categories installed OR configured.
			@endif	
		</div>	


















		<?php /*?>
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">/</a></li>
			</ol>
		</div>
		<div class="row col-md-12 text-center">
			<ul class="list-inline">
				@foreach( $aCategories as $cItem)
				<li class="col-md-3">
					<a href="#">
						{{ HTML::image( '/app/image/category/30,30/' . ($cItem->icon_image ? $cItem->icon_image : '-'), $cItem->name, array('class' => 'img-rounded')) }}<br />
						<p class="category-title">{{ $cItem->name }}</p>
					</a>
				</li>
				@endforeach
			</ul>
		</div>
		<?php */?>
	</div>
</div>