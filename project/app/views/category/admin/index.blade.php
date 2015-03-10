@extends('layouts.admin')

@section('footer.script.section')
{{ HTML::script('/js/easyTree.min.js'); }}
@stop

@section('content')
<hr class="topbar"/>
<div class="container">
   	<div class="row">
   		<div class="col-sm-12">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Vehicles</a></li>
                <li class="active">Cars</li>
                <li class="active">4,699 results for <strong>"Cars"</strong> in London</li>
            </ol>
        </div>
   	</div>	

   	<div class="row">
   		<div class="col-sm-3">
            	<div class="sidebar-account">		
					<div class="row ">
						
						<div class="col-md-3" style="margin-top:150px;">
							<h3 class="text-success">Easy Tree Example</h3>
							<div class="easy-tree">
								<ul>
									<li>Example 1</li>
									<li>Example 2</li>
									<li>Example 3
										<ul>
											<li>Example 1</li>
											<li>Example 2
												<ul>
													<li>Example 1</li>
													<li>Example 2</li>
													<li>Example 3</li>
													<li>Example 4</li>
												</ul>
											</li>
											<li>Example 3</li>
											<li>Example 4</li>
										</ul>
									</li>
									<li>Example 0
										<ul>
											<li>Example 1</li>
											<li>Example 2</li>
											<li>Example 3</li>
											<li>Example 4
												<ul>
													<li>Example 1</li>
													<li>Example 2</li>
													<li>Example 3</li>
													<li>Example 4</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
						

					</div>
				</div>	
		</div>

		<div class="col-sm-9">
			<div class="panel panel-default">
				Here will be form content...
			</div>	
		</div>		

   	</div>
</div>    
@stop