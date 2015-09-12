@extends('layouts.admin')

@section('content')
<hr class="topbar"/>

<div class="container">
	<div class="row">
   		<div class="col-sm-12">
   			<div class="panel panel-default settings-panel">
				<div class="panel-heading">
					<h1 class="panel-title icon-head head-categories">
						<?php echo ($aFieldset ? Lang::get('fieldset.title.edit_fieldset', array('fieldsetId' => ' #' . $aFieldset['id'])) : Lang::get('fieldset.title.new_fieldset') ) ?>
					</h1>					
				</div>
				

				<div class="panel-body">					

					{{ Form::open( array( 'url' => URL::route('admin.add-fieldset'), 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'frmFieldset' )) }}
					<!-- if there are creation errors, they will show here -->
					{{ HTML::ul($errors->all(), array('class'=>'errors alert alert-danger') ) }}
					
					<div class="row">
			    		<div class="col-sm-12">		                            
			                {{ Form::label('fieldset_name', 'Name', array('class' => 'awesome')) }}
			                {{ Form::text('fieldset_name', ($aFieldset ? $aFieldset['name'] : ''), array('placeholder' => 'Name', 'focused' => 1, 'class' => 'form-control')) }}
			            </div>			            

				        <div class="col-sm-12">		                            
			               	<br >
			                {{ Form::label('fieldset_is_active', 'Is Active', array('class' => 'awesome')) }}
			                {{ Form::select('fieldset_is_active', array('0' => 'No', '1' => 'Yes'), ($aFieldset ? $aFieldset['is_active'] : '1'), array('class' => 'form-control')) }}
			            </div>

			            <div class="col-sm-12">
			            	<br >		                        	
			                {{ Form::label('fieldset_descr', 'Description', array('class' => 'awesome')) }}
			                {{ Form::textarea('fieldset_descr', ($aFieldset ? $aFieldset['description'] : ''), array('rows' => '6', 'style'=>'height: 114px;', 'e-height' => '114px', 'class' => 'form-control col-sm-8 expand')) }}
			            </div>			            
		            </div>

		            @if ( isset($aFieldset['id']) && $aFieldset['id'] > 0 )
		               	<div class="row">
		               		{{ CustomHTML::addDynamicComponent('category/fields/' . $aFieldset['id'] ); }}
		               	</div>
		            @endif

		            <div class="row button-panel">
						<div class="col-sm-12">	

							<nav>
								<ul class="pager">
							        <li class="previous"><a href="{{ URL::route('admin.fieldset') }}"><span aria-hidden="true">←</span> Go to the list</a></li>					        
							        <li>{{ Form::button('<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> ' . Lang::get('fieldset.form.save'), array('type' => 'submit', 'class' => 'btn btn-success pull-right')) }}</li>
									<li><a href="{{ URL::route('admin.fieldset') }}" class="btn btn-default btn-xs pull-right btn-cancel"><span class="glyphicon glyphicon-share" aria-hidden="true">&nbsp;{{ Lang::get('fieldset.form.cancel') }}</span></a></li>
							    </ul>
							</nav>						
														
						</div>
					</div>

			        {{ Form::hidden('fieldset_id', ($aFieldset ? $aFieldset['id'] : '0') ) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>		
</div>	
@stop
