@extends('layouts.admin')

@section('content')
<hr class="topbar"/>
<div class="container list-of-fieldsets">
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
						    <a  href="{{ URL::route('admin.fieldset.form') }}" class="btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Fieldset</a>
						</div>
					</div>

					<table class="table table-striped table-hover table-responsive">
					    <thead>
					        <tr>					            
					            <th width="85%">Name</th>					            
					            <th>Actions</th>					            
					        </tr>
					    </thead>
					    <tbody>					    	
					    	@foreach( $aFieldsSet as $aItem)
					    	<tr>					    		
					    		<td>
					    			{{ RecordHelper::getStatus( $aItem->is_active, true ) }}
					    			{{ HTML::link( URL::route('admin.fieldset.form', $aItem->id), $aItem->name, array('class' => 'edit-link') ) }}
					    		</td>
					    		<td>
					    			<a href="{{ URL::route('admin.fieldset.form', $aItem->id) }}" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					    			<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
					    		</td>					    		
					    	</tr>	
					    	@endforeach
					    	<tr class="pagination-container"><td colspan="3"><?php echo $aFieldsSet->links(); ?></td></tr>
					    </tbody>
					</table>
				</div>
   			</div>
   		</div>
   	</div>
</div> 

@stop
