@extends('layouts.admin')

@section('content')
<hr class="topbar"/>
<div class="container"> 
	<div class="panel panel-default">
		<div class="panel-heading">{{ $DeleteTitle }}</div>
  		<div class="panel-body">
			{{ Form::open( array( 'url' => $sDeleteURL, 'id' => 'frmDeleteCommon', 'classs' => 'form-vertical', 'method' => 'POST' )) }}			   			
			<div class="row">
		   		<div class="col-sm-12">
		   			<div class="alert alert-danger" role="alert">{{ $sDeleteMessage }}</div>
		   		</div>	
			</div>

			<div class="row">
		   		<div class="col-sm-12">	
		   			<p>
		   				{{ HTML::link( $sCancelURL, $sCancelText, array('class' => 'btn btn-link') ) }}
		   				{{ Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete',  array('type' => 'submit', 'class' => 'btn btn-danger pull-right')) }}
		   			</p>	
		   		</div>
			</div>
			{{ Form::hidden('id', $idObject ) }}
			{{ Form::close() }}	
		</div>
	</div>
</div>			
@stop