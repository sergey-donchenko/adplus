@extends('layouts.master')

@section('content')
	<hr class="topbar"/>
	<div class="container">    	    	
    	
        <div class="row">
    		<?php /* ?>
            <div class="col-sm-3">
    			<div class="sidebar-account">		
					
					<div class="row ">
						<!-- Account vertical menu -->
        				@include('account.html.left-nav', array('selected' => 'create-ad'))
					</div>

					<div class="row hidden-xs">
						<div class="col-lg-12">
							<div class="well">
								<div class="row ">
									<div class="col-lg-3">										
										{{ HTML::image("css/icons/Crest.png", '', array('width' => 45)) }}
									</div>
									<div class="col-lg-9">
										<h4 style="margin-top: 0">Increase visibility</h4>
										<p>Don't forget to 'bump' your listing to gain more visibility</p>
									</div>
								</div>
							</div>	
						</div>	
					</div>	
				</div>	
    		</div>	
            <?php */ ?>

    		<div class="col-sm-12">
    			
                {{ Form::open( array( 'url' => '/advert/create', 'enctype' => 'multipart/form-data', 'id' => 'frmAdvert', 'classs' => 'form-vertical' )) }}
                    
                    {{ HTML::ul($errors->all(), array('class'=>'errors alert alert-danger') ) }}


    				<div class="panel panel-default">
    					<div class="panel-heading">Ad details</div>
    					<div class="panel-body">
                            
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Title </label>
                                        <input type="text" class="form-control " >
                                    </div>                                                                            
                                </div>  
                            </div>

    						<div class="row">    						                                
                                <br />
    							<div class="form-group">
    								<div class="col-sm-12">   
    									<label>Category </label> <br />
                                        <button type="button" id="selectCategory" class="btn btn-default navbar-btn" title="Change Category">
                                            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;...
                                        </button>
                                        <label id="selectedCategory">
                                        	<input type="hidden" name="category_id" attr-parent-id="" value="0" />                                        	
                                        </label>                                        
                                    </div>    								
    							</div>	    						
    						</div>
    					   
                            <div class="row">
                    		    <div class="form-group">                           	    

		                                <div class="col-sm-12"><br />
		                                    <label>Description </label>
		                                    <textarea class="form-control col-sm-8 expand" rows="6" style="width: 99%"></textarea>
		                                </div>

		                                <div class="col-sm-12"><br />
		                                    <label>Keywords</label>
		                                    <input type="text" class="form-control " >
		                                </div>	
                            		</div>	
                            	</div>	
                    		</div>	
                    	</div>	

                    	<div class="panel panel-default">
                    		<div class="panel-heading">Ad information</div>
                    			<div class="panel-body">
                    				<div class="form-group">
                    					<div class="row">
                    						<div class="col-sm-6">
			                                    <label>Region</label>
			                                    <input type="text" class="form-control "  >
			                                </div>									     	
			                                <div class="col-sm-6">
			                                    <label>City</label>
			                                    <input type="text" class="form-control "  >
			                                </div>
			                                <div class="col-sm-6"><br />
			                                    <label>Country</label>
			                                    <input type="text" class="form-control "  >
			                                </div>
			                                <div class="col-sm-6"><br />
			                                    <label>Post Code</label>
			                                    <input type="text" class="form-control "  >
			                                </div>
                    					</div>	

                    					<br />

                    					<div class="row">
			                                <div class="col-sm-12">
			                                    <div class="checkbox">
			                                        <label>
			                                            <input type="checkbox" name="optionsRadios" id="optionsRadios2" value="option2">
			                                            Don't show my address details publicly
			                                        </label>
			                                    </div>
			                                </div>
			                            </div>

                    				</div>	
                    			</div>	
                    		</div>

                    		<div class="panel panel-default">
			                    <div class="panel-heading">Add photos</div>
			                    <div class="panel-body">
			                        <div id="my-dropzone" action="upload.php" class="dropzone"></div>
			                        <br /><p><small>* please note that the displayed images are cropped/resized only for display purposes</small></p>
			                    </div>
			                </div>

			                <div class="panel panel-default">
			                	<div class="panel-heading">Your price</div>
			                	<div class="panel-body">
			                		<div class="form-group">
			                			<div class="row">
			                                <div class="col-sm-6">
			                                    <input type="text" class="form-control "  placeholder="How much do you want it to be listed for?">
			                                </div>
			                                <div class="col-sm-6">
			                                    <p>You can adjust your price anytime you like, even after your listing is published.</p>
			                                </div>
			                            </div>
			                		</div>	
			                	</div>	
			                </div>	

			                <div class="panel panel-default">
			                	<div class="panel-heading">Complete ad</div>
			                	<div class="panel-body">
			                		<div class="checkbox">
			                            <label><input type="checkbox"> I agree to the terms and conditions and regulations.</label>
			                        </div>
			                        <br />
			                        <button type="submit" class="btn btn-default hidden-xs">Save draft</button>
			                        <button type="submit" class="btn btn-default hidden-xs">Preview ad</button>			                        
                                    {{ Form::button(
                                        '<span class="glyphicon glyphicon-send" aria-hidden="true"></span>  Publish ad', 
                                        array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) 
                                    }}
			                        <br /><p class=" hidden-xs" style="text-align: right"><small>* payment options will be<br /> shown on the next screen</small></p>
			                	</div>			                	
			                </div>
                    	</div>	
    				</div>	    				
    			{{ Form::close() }}
    			<br />
    		</div>

    	</div>		
	</div>	
@stop