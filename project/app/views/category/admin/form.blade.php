<?php 
	$aCategory           = array();
	$sAvailableStatus    = 'glyphicon-eye-open';
	$sStatusMessage      = Lang::get('pages.status.shown', array('object' => 'Category'));
	$sCategoryStatusIcon = '<span class="glyphicon %%status%%" aria-hidden="true" title="Category status"></span>';

	if ( $oCategory && $aCategory = $oCategory->toArray() ) {
		if ( empty($aCategory['is_active']) ) {
			$sAvailableStatus = 'glyphicon-eye-close';
			$sStatusMessage   = Lang::get('pages.status.hidden', array('object' => 'Category'));
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
		   <?php /* ?>
			   <li><a href="#permissions" data-toggle="tab">Permissions</a></li>
			   <li><a href="#adverts" data-toggle="tab">Advers</a></li>				   
		   <?php */ ?>
		</ul>
		
		<div class="row text-right display-status">{{ HTML::decode(str_replace(array('%%status%%','%%title%%'), array($sAvailableStatus, $sStatusMessage), $sCategoryStatusIcon) ) }}</div>

		<div class="tab-content">			
		    <div class="tab-panel fade in active" id="general">
					    	
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
		            {{ Form::hidden('category_id', ($aCategory ? $aCategory['id'] : '0') ) }}
		            {{ Form::hidden('parent_id', ($aCategory ? $aCategory['parent_id'] : '0') ) }}
		        </div>            

			</div>
			<?php /* ?>
			<div class="tab-panel fade" id="permissions">Permissions</div>
			<div class="tab-panel fade" id="adverts">Adverts</div>				    
			<?php */ ?>
		</div>

		<div class="row">
			<div class="col-sm-12">
				{{ Form::button(
					'<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Save Category7', 
					array('type' => 'submit', 'class' => 'btn btn-success pull-right')) 
				}}							
			</div>
		</div>
		
		{{ Form::close() }}
	</div>	
</div>
<?php echo Form::token(); ?>			