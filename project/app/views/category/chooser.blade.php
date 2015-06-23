<div class="container-fluid">
	<div class="row category-chooser">

		<div class="col-xs-12">
			<ol class="breadcrumb" id="categoryBreadcrumb">
			  <li id="home"><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;</a></li>			  
			</ol>

			@if ( $aCategories )				
				@foreach( $aCategories as $cItem)
					<div class="directory-block col-sm-4 col-xs-6">
						<div class="row">
							<div class="col-sm-3">{{ HTML::image( '/app/image/category/30,30/' . ($cItem->icon_image ? $cItem->icon_image : '-'), $cItem->name, array('class' => 'img-rounded')) }}</div>
							<div class="col-sm-9">
								<h4>{{ $cItem->name }}</h4>
								<p>
								@if ( $cItem->children_count > 0 )							

									@foreach( $cItem->getChildrenAttribute() as $index => $cSubItem)									
										@if ( $index >= 5)
											<p><a href="#" class="category-item hasChildren">more >></a></p>
										    <?php break;?>
										@endif
										<a href="" class="category-item {{ $cSubItem->getCssClassAttribute() }}">{{ $cSubItem->name }}</a>
									@endforeach							
								@endif
								</p>
							</div>
						</div>
					</div>
				@endforeach
			@else
				Hello	
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