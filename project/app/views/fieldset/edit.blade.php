@extends('layouts.admin')

@section('content')
<hr class="topbar"/>
<div class="container">    	
   	<div class="row">
   		<div class="col-sm-12">
   			@include('breadcrumb.standard', array('arrList' => array(
   				array('url' => URL::route('admin.fieldset'), 'title' => Lang::get('pages.nav.custom_fields') ),
   				array('url' => '', 'title' => Lang::get('pages.nav.form_title', array('title' => ' Custom Field' . (isset( $oFieldsSet ) ? '#' . $oFieldsSet->id : '') )) )
   			)))   			

        @if (Session::has('message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
            {{ Session::get('message') }}
        </div>
        @endif

   			{{ Form::open( array( 'url' => URL::route('admin.fieldset.save'), 'enctype' => 'multipart/form-data', 'id' => 'frmAdvert', 'classs' => 'form-vertical', 'method' => 'POST' )) }}
   				{{ HTML::ul($errors->all(), array('class'=>'errors alert alert-danger') ) }}

   				<div class="panel panel-default">
   					<div class="panel-heading">{{ Lang::get('admin.headers.fieldset') }} </div>

   					<div class="panel-body">
   						<div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {{ Form::label('fieldset_name', Lang::get('pages.field.name') ) }}
                                    {{ Form::text('fieldset_name', (isset( $oFieldsSet ) ? $oFieldsSet->name : ''), array('class' => 'form-control') ) }} 
                                </div>                                                                            
                            </div>  
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {{ Form::label('fieldset_is_active', Lang::get('pages.field.is_active'), array('class' => 'awesome')) }}
		                			{{ Form::select('fieldset_is_active', array('0' => 'No', '1' => 'Yes'), ($oFieldsSet ? $oFieldsSet->is_active : '1'), array('class' => 'form-control')) }}
                                </div>                                                                            
                            </div>  
                        </div>
                        
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {{ Form::label('fieldset_description', Lang::get('pages.field.description'), array('class' => 'awesome')) }}
		                			{{ Form::textarea('fieldset_description', ($oFieldsSet ? $oFieldsSet->description : ''), array('class' => 'form-control col-sm-8 expand', 'rows' => '6', 'style' => 'width: 99%')) }}
                                </div>                                                                            
                            </div>  
                        </div>

                        @if ( isset($oFieldsSet) && $oFieldsSet->id > 0 )
                        <div class="row">
                        	<div class="form-group">
                                <div class="col-sm-12">
		                        	{{ Form::label('fields_list', Lang::get('pages.headers.fields'), array('class' => 'awesome')) }}
		                        	<p>{{ HTML::link( URL::route('admin.field.edit', array( 'fid' => ($oFieldsSet ? $oFieldsSet->id : 0) )), 'Add New', array('class' => 'btn btn-default btn-xs') ) }}</p>
		                        	
		                        	<table class="table table-striped table-hover" id="fields_list">
									    <thead>
									      <tr>
									        <th class="col-md-1">{{ Lang::get('pages.headers.id') }}</th>									        
									        <th class="col-md-3">{{ Lang::get('pages.headers.fieldname') }}</th>									        
									        <th class="col-md-2">{{ Lang::get('pages.headers.fieldtype') }}</th>
									        <th class="col-md-1">{{ Lang::get('pages.headers.fieldpos') }}</th>
									        <th class="col-md-1">{{ Lang::get('pages.headers.actions') }}</th>
									      </tr>
									    </thead>

									    <tbody>
									      @forelse( $oFieldsSet->getFieldsAttribute() as $oField)
									      <tr>
									        <td>{{ $oField->id }}</td>									        
									        <td>{{ $oField->title }}</td>									        
									        <td>{{ $oField->field_type }}</td>
									        <td>{{ $oField->pos }}</td>
									        <td>									        	
									        	{{ html_entity_decode( HTML::link( URL::route('admin.field.edit', array( 'fid' => ($oFieldsSet ? $oFieldsSet->id : 0), 'id' => $oField->id )), '<span class="glyphicon glyphicon-pencil" aria-hidden="true">', array('class' => 'btn btn-default btn-xs') ) ) }}
					    						{{ html_entity_decode( HTML::link( URL::route('admin.field.delete', array('id' => $oField->id )), '<span class="glyphicon glyphicon-remove" aria-hidden="true">', array('class' => 'btn btn-default btn-xs') ) ) }}
									        </td>
									      </tr>									      
									      @empty
									      <tr>
									        <td colspan="5" align="center">{{ HTML::link( URL::route('admin.field.edit', array( 'fid' => ($oFieldsSet ? $oFieldsSet->id : 0) )), 'Create new field', array('class' => 'btn btn-link btn-xs') ) }}</td>									        
									      </tr>
									      @endforelse
									    </tbody>

									</table>
								</div>
							</div>		
                        </div>
                        @endif

             <div class="row">
							<div class="col-sm-12">
                {{ Form::hidden('fieldset_id', (empty( $oFieldsSet ) === false ? $oFieldsSet->id : '0') ) }}
								{{ HTML::link( URL::route('admin.fieldset'), Lang::get('pages.nav.to_the_list'), array('class' => 'btn btn-default') ) }}
								{{ Form::button(
									'<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Save Fieldset', 
									array('type' => 'submit', 'class' => 'btn btn-success pull-right')) 
								}}							
							</div>
						</div>
   					</div>
   				</div>
   			{{ Form::close() }}
   		</div>
   	</div>
</div>
@stop