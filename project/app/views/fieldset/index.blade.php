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
   			<div class="panel panel-default settings-panel">
   				<div class="panel-heading">
					<h1 class="panel-title icon-head head-categories"><?php echo Lang::get('admin.headers.fieldset') ?></h1>
				</div>

				<div class="panel-body">
					<div class="panel panel-default">
						<div class="panel-body">
						    <button type="button" class="btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Fieldset</button>
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
					    			<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
					    			<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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
