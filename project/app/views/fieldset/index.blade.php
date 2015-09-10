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

   	<div class="row">
   		<div class="col-sm-12">

   			@include('breadcrumb.standard', array('arrList' => array(
   				0 => array('url' => '', 'title' => Lang::get('pages.nav.custom_fields') )
   			)))

   			<div class="panel panel-default settings-panel">
   				<div class="panel-heading">
					<h1 class="panel-title icon-head head-categories"><?php echo Lang::get('admin.headers.fieldset') ?></h1>
				</div>

				<div class="panel-body">
					<div class="panel panel-default">
						<div class="panel-body">
							{{ html_entity_decode( HTML::link( URL::route('admin.fieldset.new'), '<span class="glyphicon glyphicon-plus" aria-hidden="true"> New Fieldset', array('class' => 'btn btn-default btn-xs pull-right') ) ) }}
						</div>
					</div>

					<table class="table table-striped table-hover table-responsive">
					    <thead>
					        <tr>
					            <th>Item ID</th>
					            <th width="80%">Item Name</th>
					            <th>Actions</th>
					        </tr>
					    </thead>
					    <tbody>
					    	@foreach( $aFieldsSet as $aItem)
					    	<tr>
					    		<td>{{ $aItem->id }}</td>
					    		<td>{{ $aItem->name }}</td>
					    		<td>
					    			{{ html_entity_decode( HTML::link( URL::route('admin.fieldset.edit', array('id' => $aItem->id )), '<span class="glyphicon glyphicon-pencil" aria-hidden="true">', array('class' => 'btn btn-default btn-xs') ) ) }}
					    			{{ html_entity_decode( HTML::link( URL::route('admin.fieldset.delete', array('id' => $aItem->id )), '<span class="glyphicon glyphicon-remove" aria-hidden="true">', array('class' => 'btn btn-default btn-xs') ) ) }}
					    		</td>
					    	</tr>	
					    	@endforeach
					    </tbody>
					</table>
				</div>
   			</div>
   		</div>
   	</div>
</div> 

@stop
