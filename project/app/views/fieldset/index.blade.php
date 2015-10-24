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
<<<<<<< HEAD
						    <a  href="{{ URL::route('admin.fieldset.form') }}" class="btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Fieldset</a>
=======
							{{ html_entity_decode( HTML::link( URL::route('admin.fieldset.new'), '<span class="glyphicon glyphicon-plus" aria-hidden="true"> New Fieldset', array('class' => 'btn btn-default btn-xs pull-right') ) ) }}
>>>>>>> 629f1521d28a97dba2f25abd5d5bcc572017d6ab
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
<<<<<<< HEAD
					    			{{ RecordHelper::getStatus( $aItem->is_active, true ) }}
					    			{{ HTML::link( URL::route('admin.fieldset.form', $aItem->id), $aItem->name, array('class' => 'edit-link') ) }}
=======
					    			{{ html_entity_decode( HTML::link( URL::route('admin.fieldset.edit', array('id' => $aItem->id )), '<span class="glyphicon glyphicon-pencil" aria-hidden="true">', array('class' => 'btn btn-default btn-xs') ) ) }}
					    			{{ html_entity_decode( HTML::link( URL::route('admin.fieldset.delete', array('id' => $aItem->id )), '<span class="glyphicon glyphicon-remove" aria-hidden="true">', array('class' => 'btn btn-default btn-xs') ) ) }}
>>>>>>> 629f1521d28a97dba2f25abd5d5bcc572017d6ab
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
