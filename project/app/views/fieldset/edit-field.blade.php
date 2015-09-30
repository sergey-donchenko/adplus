@extends('layouts.admin')

@section('content')
<hr class="topbar"/>
<div class="container"> 
	<div class="row">
   		<div class="col-sm-12">
   			@include('breadcrumb.standard', array('arrList' => array(
   				array('url' => URL::route('admin.fieldset'), 'title' => Lang::get('pages.nav.custom_fields') ),
   				array('url' => URL::route('admin.fieldset.edit', array('id' => $idFieldSet) ), 'title' => Lang::get('pages.nav.form_title', array('title' => ' Custom Field #' . $idFieldSet) )),
   				array('url' => '', 'title' => Lang::get('pages.nav.form_title', array('title' => ' The Field') ) )
   			)))

   			{{ Form::open( array( 'url' => URL::route('admin.field.save'), 'enctype' => 'multipart/form-data', 'id' => 'frmField', 'classs' => 'form-vertical', 'method' => 'POST' )) }}
   				{{ HTML::ul($errors->all(), array('class'=>'errors alert alert-danger') ) }}

   				<div class="panel panel-default">
   					<div class="panel-heading">{{ Lang::get('pages.headers.field_header') }} </div>

   					<div class="panel-body">
   						
   						<div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {{ HTML::link( URL::route('admin.fieldset.edit', array('fid' => $idFieldSet) ), Lang::get('pages.nav.to_the_fieldset'), array('class' => 'btn btn-default') ) }}
                                </div>                                                                            
                            </div>  
                        </div>

   						          <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {{ Form::label('field_name', Lang::get('pages.field.title') ) }}
                                    {{ Form::text('field_name', (empty( $oField ) === false ? $oField->title : ''), array('class' => 'form-control') ) }} 
                                </div>                                                                            
                            </div>  
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {{ Form::label('field_type', Lang::get('pages.field.fieldtype'), array('class' => 'awesome')) }}
		                			          {{ Form::select('field_type', $aFieldTypes, (empty( $oField ) === false ? $oField->id_field_type : '1'), array('class' => 'form-control')) }}
                                </div>                                                                            
                            </div>  
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {{ Form::label('field_hint', Lang::get('pages.field.hint') ) }}
                                    {{ Form::text('field_hint', (empty( $oField ) === false ? $oField->hint : ''), array('class' => 'form-control') ) }} 
                                </div>                                                                            
                            </div>  
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {{ Form::label('field_pos', Lang::get('pages.field.pos') ) }}
                                    {{ Form::number('field_pos', (empty( $oField ) === false ? $oField->pos : ''), array('class' => 'form-control') ) }} 
                                </div>                                                                            
                            </div>  
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-4">
                                    {{ Form::label('field_is_searchable', Lang::get('pages.field.is_searchable') ) }}
                                    {{ Form::checkbox('field_is_searchable', '1', (empty( $oField ) === false ? ( $oField->is_searchable > 0 ) : false ), array('class' => 'form-control') ) }} 
                                </div>                                                                            
                            
                                <div class="col-sm-4">
                                    {{ Form::label('field_is_filterable', Lang::get('pages.field.is_filterable') ) }}
                                    {{ Form::checkbox('field_is_filterable', '1', (empty( $oField ) === false ? ( $oField->is_filterable > 0 ) : false ), array('class' => 'form-control') ) }} 
                                </div>                                                                            
                            
                                <div class="col-sm-4">
                                    {{ Form::label('field_is_used_in_list', Lang::get('pages.field.is_used_in_list') ) }}
                                    {{ Form::checkbox('field_is_used_in_list', '1', (empty( $oField ) === false ? ( $oField->is_used_in_list > 0 ) : false ), array('class' => 'form-control') ) }} 
                                </div>                                                                            
                            </div>  
                        </div>

                        <div class="row">
							<div class="col-sm-12">
								{{ Form::hidden('field_id_fieldset', $idFieldSet ) }}
								{{ Form::hidden('field_id', (empty( $oField ) === false ? $oField->id : '0') ) }}

								{{ HTML::link( URL::route('admin.fieldset.edit', array('fid' => $idFieldSet) ), Lang::get('pages.nav.to_the_fieldset'), array('class' => 'btn btn-default') ) }}
								{{ Form::button(
									'<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Save Field', 
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