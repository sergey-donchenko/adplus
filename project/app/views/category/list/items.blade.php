<div class="modal-backdrop fade in"></div>
@foreach( $aCategories as $cItem)
	<div class="directory-block col-sm-4 col-xs-6{{isset($sContainerClass) ? ' ' . $sContainerClass : ''}}">
		<div class="row">
			<div class="col-sm-3">{{ HTML::image( '/app/image/category/30,30/' . ($cItem->icon_image ? $cItem->icon_image : '-'), $cItem->name, array('class' => 'img-rounded')) }}</div>
			<div class="col-sm-9">
				@if( !(isset($bHideTitle) && $bHideTitle === true) )
				<h4>{{ $cItem->name }}</h4>
				@endif
				<p>
				@if ( $cItem->children_count > 0 )							

					@foreach( $cItem->getChildrenAttribute() as $index => $cSubItem)									
						@if ( $index >= 5 && !( isset($bShowAll) && $bShowAll === true ) )
							<p><a href="#" class="category-item hasChildren" attr-id="{{ $cItem->id }}" attr-parent-id="0" title="{{ $cItem->name }}">more >></a></p>
							<?php break;?>
						@endif
						<a href="" class="category-item {{ $cSubItem->getCssClassAttribute() }}" attr-id="{{ $cSubItem->id }}" attr-parent-id="{{ $cSubItem->parent_id }}" title="{{ $cSubItem->name }}">							
							{{ $cSubItem->name }}
							@if ( $cSubItem->children_count > 0 )
							***
							@endif
						</a>
					@endforeach

				@endif
				</p>
			</div>
		</div>
	</div>
@endforeach