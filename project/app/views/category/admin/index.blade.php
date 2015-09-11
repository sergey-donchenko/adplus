@extends('layouts.admin')

@section('header.section')
{{ HTML::style('/css/ui-easytree.min.css') }}
@stop

@section('footer.script.section')
{{ HTML::script('/js/easyTree.min.js'); }}
{{ HTML::script('/js/admin.min.js'); }}
@stop

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
   	
    <!--
    <div class="row">
      <div class="col-sm-12">
   		   @include('breadcrumb.standard')
      </div>   
   	</div>
    //-->

   	<div class="row">
   		<div class="col-sm-3">
          @include('category.admin.tree')    
		  </div>

		  <div class="col-sm-9" id="categoryFormWrapper">{{ $sCategoryForm }}</div>	
   	</div>
</div> 

@stop