<?php 
	$aCategory           = array();
	$aFieldIds           = array();
	$aParentFieldsetIds  = array();
	$aParentFieldset     = array();
	$sAvailableStatus    = 'glyphicon-eye-open';
	$sStatusMessage      = Lang::get('pages.status.shown', array('object' => 'Category'));
	$sCategoryStatusIcon = '<span class="glyphicon %%status%%" aria-hidden="true" title="Category status"></span>';

	if ( $oCategory && $aCategory = $oCategory->toArray() ) {
		if ( empty($aCategory['is_active']) ) {
			$sAvailableStatus = 'glyphicon-eye-close';
			$sStatusMessage   = Lang::get('pages.status.hidden', array('object' => 'Category'));
		}

		// Get Custom fields for the category
		foreach( $oCategory->getCustomFieldsAttribute() as $oField ) {
			$aFieldIds[] = $oField->id;
		}

		// Get Parent field set attributes
		foreach( $aParentFieldset = $oCategory->getParentFieldsetAttribute() as $oFieldSetId ) {
			$aParentFieldsetIds[] = $oFieldSetId->id_fieldset;
		}
	}	

?>
<div class="panel panel-default category-panel">
	<div class="panel-heading">
		<h1 class="panel-title icon-head head-categories"><?php echo ($aCategory ? Lang::get('category.title.edit_category', array('categoryId' => ' #' . $aCategory['id'])) : Lang::get('category.title.new_root_category') ) ?></h1>				    		
	</div>

	<div class="panel-body">
		{{ Form::open( array( 'url' => '/admin/category', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'frmCategory' )) }}
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all(), array('class'=>'errors alert alert-danger') ) }}

		<ul id="categoryTabSet" class="nav nav-tabs">
		   <li class="active"><a href="#general" data-toggle="tab">General</a></li>
		   @if ( isset($aCategory['id']) )
		   <li><a href="#custom-fields" data-toggle="tab">Custom Fieslds</a></li>
		   @endif
		   <?php /* ?>
			   
			   <li><a href="#adverts" data-toggle="tab">Advers</a></li>				   
		   <?php */ ?>
		</ul>
		
		<div class="row text-right display-status">{{ HTML::decode(str_replace(array('%%status%%','%%title%%'), array($sAvailableStatus, $sStatusMessage), $sCategoryStatusIcon) ) }}</div>

		<div class="tab-content panel panel-default">			
		    <div class="tab-pane fade in active panel-body" id="general">
					    	
		    	<div class="row">
		    		<div class="col-sm-12">		                            
		                {{ Form::label('category_name', 'Name', array('class' => 'awesome')) }}
		                {{ Form::text('category_name', ($aCategory ? $aCategory['name'] : ''), array('placeholder' => 'Name', 'focused' => 1, 'class' => 'form-control')) }}
		            </div>

		            <div class="col-sm-12">		                            
		               	<br >
		                {{ Form::label('category_is_active', 'Is Active', array('class' => 'awesome')) }}
		                {{ Form::select('category_is_active', array('0' => 'No', '1' => 'Yes'), ($aCategory ? $aCategory['is_active'] : '1'), array('class' => 'form-control')) }}
		            </div>

		            <div class="col-sm-12">		                            
		               	<br >
		                {{ Form::label('category_page_title', 'Page Title', array('class' => 'awesome')) }}
		                {{ Form::text('category_page_title', ($aCategory ? $aCategory['page_title'] : ''), array('placeholder' => 'Page Title', 'class' => 'form-control')) }}
		            </div>

		            <div class="col-sm-12">
		               	<br >		
		               	{{ Form::label('category_icon', 'Icon', array('class' => 'awesome')) }}
		               	@if (isset($aCategory['icon_image']) && !empty($aCategory['icon_image']))
		               	<br />{{ HTML::image( '/app/image/category/60,60/' . $aCategory['icon_image']) }}
		               	@endif
		               	{{ Form::file('category_icon', '', array('class' => 'form-control col-sm-8')) }}
		            </div>

		            <div class="col-sm-12">
		               	<br >		                        	
		               	{{ Form::label('category_cover', 'Cover', array('class' => 'awesome')) }}
		               	@if (isset($aCategory['cover_image']) && !empty($aCategory['cover_image']))
		               	<div style="background:url(<?php echo '/app/image/category/0,0/' . $aCategory['cover_image'] ?>) no-repeat center top scroll;background-size: 100% auto;padding-bottom:40%;"></div>
		               	@endif
		               	{{ Form::file('category_cover', '', array('class' => 'form-control col-sm-8')) }}		                        	
		            </div>

		            <div class="col-sm-12">
		            	<br >		                        	
		                {{ Form::label('category_descr', 'Description', array('class' => 'awesome')) }}
		                {{ Form::textarea('category_descr', ($aCategory ? $aCategory['short_description'] : ''), array('rows' => '6', 'style'=>'width: 99%; height: 114px;', 'e-height' => '114px', 'class' => 'form-control col-sm-8 expand')) }}		                        	
		            </div>

		            <div class="col-sm-12">
		            	<br >		                        	
		                {{ Form::label('category_meta_keywords', 'Meta Keywords', array('class' => 'awesome')) }}
		                {{ Form::textarea('category_meta_keywords', ($aCategory ? $aCategory['meta_keywords'] : ''), array('rows' => '6', 'style'=>'width: 99%; height: 114px;', 'e-height' => '114px', 'class' => 'form-control col-sm-8 expand')) }}		                        	
		            </div>

		            <div class="col-sm-12">
		            	<br >		                        	
		                {{ Form::label('category_meta_descr', 'Meta Description', array('class' => 'awesome')) }}
		                {{ Form::textarea('category_meta_descr', ($aCategory ? $aCategory['meta_description'] : ''), array('rows' => '6', 'style'=>'width: 99%; height: 114px;', 'e-height' => '114px', 'class' => 'form-control col-sm-8 expand')) }}		                        	
		            </div>

		            <div class="col-sm-12">	
		            <br />	                            
		                {{ Form::label('category_position', 'Position', array('class' => 'awesome')) }}
		                <div class="col-xs-3 inputContainer">
		                {{ Form::number('category_position', ($aCategory ? $aCategory['position'] : ''), array('placeholder' => 'Position', 'data-fv-integer-message' => 'The value is not an integer', 'class' => 'form-control')) }}
		            	</div>
		            </div>

		            <br />

		            {{ Form::hidden('category_id', ($aCategory ? $aCategory['id'] : '0') ) }}
		            {{ Form::hidden('parent_id', ($aCategory ? $aCategory['parent_id'] : '0') ) }}
		        </div>            

			</div>
			
			@if ( isset( $aCategory['id'] ) )			
			<div class="tab-pane fade panel-body" id="custom-fields">
				<div class="row custom-fields">
					
					@if ( $aParentFieldset )
					<div class="col-sm-12">
						<h2>Inherited from:</h2>
						@foreach( $aParentFieldset as $oFieldSet)
							{{ Form::label( 'fieldset_label', $oFieldSet->fieldsetname, array('class' => 'awesome')) }}							
						@endforeach	
						<hr />							
					</div>
					@endif

					<div class="col-sm-12 checkbox">
						<h2>Custom Fields Set:</h2>
						{{ Form::radio( 'category_id_fieldset', 0,  ( empty($aCategory['id_fieldset']) ? true : false), array( 'id' => 'category_id_fieldset0' ) ) }}
						{{ Form::label( 'category_id_fieldset0', 'No custom fields', array('class' => 'awesome')) }}
						<p class="help-block">When the Category does not have any Custom Definitions</p>	
					</div>

					@if ( isset($oFieldSets) )					
						@foreach( $oFieldSets as $oItem)						
						<?php 
							$aFields         = $oItem->getFieldsAttribute(); 
							$sDisabled       = ( $aFields->count() == 0 ? ' disabled' : '' );
							$aDisableChecker = array($sDisabled);							
						?>

						<div class="col-sm-12 checkbox{{ $sDisabled }}">	
							@if ( in_array( $oItem->id, $aParentFieldsetIds ) === false )														
								{{ Form::radio('category_id_fieldset', $oItem->id,  ($aCategory && $aCategory['id_fieldset'] === $oItem->id ? true : false), array_merge( array( 'id' => 'category_id_fieldset' . $oItem->id ), $aDisableChecker ) ) }}
								{{ Form::label( 'category_id_fieldset' . $oItem->id, $oItem->name, array('class' => 'awesome')) }}

								<p class="help-block">{{ $oItem->description }}</p>						
								
								@if( empty($aFields) === false )
								<div class="category-custom-fields">
									@forelse( $aFields as $oField )
									<div class="col-sm-12 checkbox">
									{{ Form::checkbox('category_custom_fields[]', $oField->id,  ( empty($aFieldIds) ? true : in_array( $oField->id, $aFieldIds ) ), array_merge( array( 'id' => 'category_custom_fields' . $oField->id ), $aDisableChecker ) ) }}
									{{ Form::label( 'category_custom_fields' . $oField->id, $oField->title, array('class' => 'awesome')) }}									
									</div>
									@empty
									<p class="help-block">... {{ HTML::link( URL::route('admin.fieldset.edit', array( 'fid' => $oItem->id ) ), 'Add fields', array('class' => 'btn btn-link') ) }}</p>
									@endforelse
								</div>					
								@endif	

							@endif 	
						</div>						
						@endforeach	
					@endif
				</div>
			</div>
			@endif

			<?php /* ?>
			<div class="tab-panel fade" id="permissions">Permissions</div>
			<div class="tab-panel fade" id="adverts">Adverts</div>				    
			<?php */ ?>
		</div>

		<div class="row">
			<div class="col-sm-12">
				{{ Form::button(
					'<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Save Category', 
					array('type' => 'submit', 'class' => 'btn btn-success pull-right')) 
				}}							
			</div>
		</div>
		
		{{ Form::close() }}
	</div>	
</div>
<?php echo Form::token(); ?>			