@extends('layouts.admin')

@section('content')
<hr class="topbar"/>
<div class="container">
	<!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-success">
        	<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
        	{{ Session::get('message') }}
        </div>
    @endif
    
    {{ Form::open( array( 'url' => '/admin/settings', 'enctype' => 'multipart/form-data', 'id' => 'frmSettings' )) }}
    <div class="row">
    	<div class="col-sm-12">
    		<div class="panel panel-default settings-panel">
				<div class="panel-heading">
					<h1 class="panel-title icon-head head-categories"><?php echo Lang::get('settings.title.settings') ?></h1>
				</div>

				<div class="panel-body">						
					<!-- if there are creation errors, they will show here -->
					{{ HTML::ul($errors->all(), array('class'=>'errors alert alert-danger')) }}

					<ul id="settingsTabSet" class="nav nav-tabs">
					    <li class="active"><a href="#general" data-toggle="tab">General</a></li>					   
					    <li><a href="#contacts" data-toggle="tab">Contacts</a></li>
					    <li><a href="#listing" data-toggle="tab">Listing</a></li>
						<li><a href="#seo" data-toggle="tab">SEO</a></li>				   					   						
					</ul>

					<div class="tab-content">			
		    			<div class="tab-pane fade in active" id="general">
		    				<div class="row">
					    		<div class="col-sm-12">		                            
					                {{ Form::label('site_name', 'Site Name', array('class' => 'awesome')) }}
					                {{ Form::text('site_name', ($aSettings ? $aSettings['site_name'] : ''), array('placeholder' => 'Site Name', 'focused' => 1, 'class' => 'form-control')) }}
					            </div>

					            <div class="col-sm-12">
					            	<br >
					                {{ Form::label('site_descr', 'Site Description', array('class' => 'awesome')) }}
					                {{ Form::textarea('site_descr', ($aSettings ? $aSettings['site_descr'] : ''), array('rows' => '6', 'style'=>'width: 99%; height: 114px;', 'e-height' => '114px', 'class' => 'form-control col-sm-8 expand')) }}		                        	
					            </div>

					            <div class="col-sm-12">		                            
					               	<br >
					                {{ Form::label('site_is_active', 'Is Site Active', array('class' => 'awesome')) }}
					                {{ Form::select('site_is_active', array('0' => 'No', '1' => 'Yes'), ($aSettings ? $aSettings['site_is_active'] : '1'), array('class' => 'form-control')) }}
					            </div>
					        </div>    
		    			</div>

		    			<div class="tab-pane fade" id="contacts">
		    				<div class="row">
					    		<div class="col-sm-12">		                            
					                {{ Form::label('contact_name', 'Contact Name', array('class' => 'awesome')) }}
					                {{ Form::text('contact_name', ($aSettings ? $aSettings['contact_name'] : ''), array('placeholder' => 'Contact Name', 'class' => 'form-control')) }}
					            </div>					            
					            	
					            <div class="col-sm-12">	
					            	<br >	                            
					                {{ Form::label('contact_phone', 'Contact Phone', array('class' => 'awesome')) }}
					                {{ Form::text('contact_phone', ($aSettings ? $aSettings['contact_phone'] : ''), array('placeholder' => 'Contact Phone', 'class' => 'form-control')) }}
					            </div>

					            <div class="col-sm-12">	
					            	<br >	                            
					                {{ Form::label('contact_country', 'Country', array('class' => 'awesome')) }}
					            	{{ Form::select('contact_country', Countries::getList(App::getLocale(), 'php', 'cldr'), ($aSettings ? $aSettings['contact_country'] : '1'), array('class' => 'form-control')) }}
					            </div>

					            <div class="col-sm-12">	
					            	<br >	                            
					                {{ Form::label('contact_email', 'Contact Email', array('class' => 'awesome')) }}
					                {{ Form::text('contact_email', ($aSettings ? $aSettings['contact_email'] : ''), array('placeholder' => 'Contact Email', 'class' => 'form-control')) }}
					            </div>

					            <div class="col-sm-12">		                            
					               	<br >
					                {{ Form::label('contact_address', 'Contact Address', array('class' => 'awesome')) }}
					                {{ Form::textarea('contact_address', ($aSettings ? $aSettings['contact_address'] : ''), array('rows' => '6', 'style'=>'width: 99%; height: 114px;', 'e-height' => '114px', 'class' => 'form-control col-sm-8 expand')) }}
					            </div>
					        </div>    
		    			</div>

		    			<div class="tab-pane fade" id="listing">
		    				<h1>LISTING</h1>
		    			</div>

		    			<div class="tab-pane fade in" id="seo">
		    				<h1>SEO</h1>
		    			</div>
		    		</div>	
				</div>
			</div>		
    	</div>
    </div>

    <div class="row">
		<div class="col-sm-12">
			{{ Form::button(
				'<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Save Settings', 
					array('type' => 'submit', 'class' => 'btn btn-success pull-right')) 
			}}							
		</div>
	</div>	

	{{ Form::close() }}

@stop