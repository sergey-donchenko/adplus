@extends('layouts.master')

@section('content')
<div class="jumbotron home-tron-search well ">
	<div class="container">
    	<div class="row">

    		<div class="col-sm-12">
    			<div class="home-tron-search-inner">
    				<div class="row">
    					
    					<div class="col-sm-8 col-xs-9" style="text-align: center">
                            <div class="row">

                            	<div class="col-sm-12 col-sm-offset-1">
                                	<div class="input-group">
                                    	<span class="input-group-addon input-group-addon-text hidden-xs">Find me a</span>

                                        <input type="text" class="form-control col-sm-3" placeholder="e.g. BMW, 2 bed flat, sofa ">
                                        <div class=" input-group-addon hidden-xs">
                                        	<div class="btn-group" >
                                            	<button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">All categories <span class="caret"></span></button>
                                                <ul class="dropdown-menu" role="menu">
                                                	<li><a href="#">Cars, Vans & Motorbikes</a></li>
                                                    <li><a href="#">Community</a></li>
                                                    <li><a href="#">Flats & Houses</a></li>
                                                    <li><a href="#">For Sale</a></li>
                                                    <li><a href="#">Jobs</a></li>
                                                    <li><a href="#">Pets</a></li>
                                                    <li><a href="#">Services</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-sm-4 col-xs-3" style="text-align: center">
                        	<div class="row">
                                <div class="col-sm-11 pull-right">
                                	<button class="btn btn-primary search-btn"><i class="icon-search"></i>&nbsp;&nbsp;&nbsp;&nbsp;Search</button>
                            	</div>
                            </div>
                        </div>
    				</div>	
    			</div>	
    		</div>	

    	</div>	
    </div>	
</div>

<div class="container">
   	<br />
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

    	<div class="col-sm-4  hidden-xs">
            <div class="sidebar ">	
            	
            	<div class="row ">
            		 <div class="col-sm-11 hidden-xs">	
			            <a class="btn btn-primary pull-right" id="regionsBtn" style="width: 100%">Greater London  <span class="caret"></span></a>
			        </div>

			        <div data-backdrop="" id="regionsModal" class="bs-countries-modal-sm  hidden-xs" tabindex="-1" role="dialog" aria-labelledby="regionsModal" aria-hidden="true">
			        	<div class="modal-dialog">
			        		<div class="modal-content">
			                    <div class="directory-counties">
			                        <div class="col-sm-12">
			                        	<ul class="nav nav-tabs" id="myTab">
                                            <li class=""><a data-toggle="tab"  href="#EN">England</a></li>
                                            <li class=""><a data-toggle="tab"  href="#WA">Wales</a></li>
                                            <li class=""><a data-toggle="tab"  href="#SC">Scotland</a></li>
                                            <li class=""><a data-toggle="tab"  href="#NI">Northern Ireland</a></li>
                                            <li class="dropdown">
			                                    <a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#">Other countries <b class="caret"></b></a>
			                                    <ul aria-labelledby="myTabDrop1" role="menu" class="dropdown-menu">
			                                        <li><a href="listings.html">USA</a></li>
			                                        <li><a href="listings.html">France</a></li>
			                                        <li><a href="listings.html">Germany</a></li>
			                                        <li><a href="listings.html">Spain and Portugal</a></li>
			                                        <li><a href="listings.html">Switzerland</a></li>
			                                        <li><a href="listings.html">Other Europe</a></li>
			                                    </ul>
			                                </li>
			                            </ul>

			                            <!-- Tab Content -->
			                            <div class="tab-content " id="myTabContent">
                                            <div id="popular" class="tab-pane fade counties-pane active">
                                            	
                                            	<div class="col-sm-3">
                                            		<div class="row directory-block">
                                            			<div class="col-sm-12">
                                                        	<a href="listings.html">London</a><br />
                                                            <a href="listings.html">Edinburgh</a><br />
                                                            <a href="listings.html">Manchester</a><br />
                                                            <a href="listings.html">Birmingham</a><br />
                                                            <a href="listings.html">Glasgow</a><br />
                                                        </div>
                                        			</div>
                                            	</div>	

                                            	<div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
                                                            <a href="listings.html">Liverpool</a><br />
                                                            <a href="listings.html">Bristol</a><br />
                                                            <a href="listings.html">Oxford</a><br />
                                                            <a href="listings.html">Cambridge</a><br />
                                                            <a href="listings.html">Cardiff</a><br />
                                                        </div>
                                        			</div>
                                    			</div>


                                    			<div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
                                                            <a href="listings.html">Brighton</a><br />
                                                            <a href="listings.html">Newcastle-upon-Tyne</a><br />
                                                            <a href="listings.html">Leeds</a><br />
                                                            <a href="listings.html">York</a><br />
						                                    <a href="listings.html">Inverness</a><br />
                        								</div>                                        
                        							</div>
                                    			</div>

                                    			<div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
                                                            <a href="listings.html">Bath</a><br />
                                                            <a href="listings.html">Nottingham</a><br />
                                                            <a href="listings.html">Reading</a><br />
                                                            <a href="listings.html">Aberdeen</a><br />
                                                            <a href="listings.html">Chester</a><br />
                                                        </div>
                                        			</div>
                                    			</div>
                                            </div>	


                                            <div id="EN" class="tab-pane counties-pane">
                                                
                                                <div class="col-sm-3">
                                                	<div class="row directory-block">
                                            			<div class="col-sm-12">
                                                        	<a href="listings.html" >Avon</a><br />
                                                            <a href="listings.html" >Bedfordshire</a><br />
                                                            <a href="listings.html" >Berkshire</a><br />
                                                            <a href="listings.html" >Buckinghamshire</a><br />
                                                            <a href="listings.html" >Cambridgeshire</a><br />
                                                            <a href="listings.html" >Cheshire</a><br />
                                                            <a href="listings.html" >Cleveland</a><br />
                                                            <a href="listings.html" >Cornwall</a><br />
                                                            <a href="listings.html" >Cumbria</a><br />
                                                            <a href="listings.html" >Derbyshire</a><br />
                                                            <a href="listings.html" >Devon</a><br />
                                                            <a href="listings.html" >Dorset</a><br />
                                                        </div>
                                        			</div>
                                                </div>	

                                                <div class="col-sm-3">
                                                	<div class="row directory-block">
                                            			<div class="col-sm-12">
                                                        	<a href="listings.html" >Durham</a><br />
                                                            <a href="listings.html" >East Sussex</a><br />
                                                            <a href="listings.html" >Essex</a><br />
                                                            <a href="listings.html" >Gloucestershire</a><br />
                                                            <a href="listings.html" >Hampshire</a><br />
                                                            <a href="listings.html" >Herefordshire</a><br />
                                                            <a href="listings.html" >Hertfordshire</a><br />
                                                            <a href="listings.html" >Isle of Wight</a><br />
                                                            <a href="listings.html" >Kent</a><br />
                                                            <a href="listings.html" >Lancashire</a><br />
                                                            <a href="listings.html" >Leicestershire</a><br />
                                                            <a href="listings.html" >Lincolnshire</a><br />
                                                        </div>
                                        			</div>
                                                </div>

                                                <div class="col-sm-3">
                                        			<div class="row directory-block">
                                            			<div class="col-sm-12">
                                                        	<a href="listings.html" >London</a><br />
                                                            <a href="listings.html" >Merseyside</a><br />
                                                            <a href="listings.html" >Middlesex</a><br />
                                                            <a href="listings.html" >Norfolk</a><br />
                                                            <a href="listings.html" >Northamptonshire</a><br />
                                                            <a href="listings.html" >Northumberland</a><br />
                                                            <a href="listings.html" >North Humberside</a><br />
                                                            <a href="listings.html" >North Yorkshire</a><br />
                                                            <a href="listings.html" >Nottinghamshire</a><br />
                                                            <a href="listings.html" >Oxfordshire</a><br />
                                                            <a href="listings.html" >Rutland</a><br />
                                                            <a href="listings.html" >Shropshire</a><br />
                                                        </div>
                                        			</div>
                                    			</div>

                                    			 <div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
                                                            <a href="listings.html" >Somerset</a><br />
                                                            <a href="listings.html" >South Humberside</a><br />
                                                            <a href="listings.html" >South Yorkshire</a><br />
                                                            <a href="listings.html" >Staffordshire</a><br />
                                                            <a href="listings.html" >Suffolk</a><br />
                                                            <a href="listings.html" >Surrey</a><br />
                                                            <a href="listings.html" >Tyne and Wear</a><br />
                                                            <a href="listings.html" >Warwickshire</a><br />
                                                            <a href="listings.html" >West Midlands</a><br />
                                                            <a href="listings.html" >West Sussex</a><br />
                                                            <a href="listings.html" >West Yorkshire</a><br />
                                                            <a href="listings.html" >Worcestershire</a><br />
                                                        </div>
                                        			</div>
                                    			</div>
                                            </div>

                                            <div id="WA" class="tab-pane counties-pane">
                                            	<div class="col-sm-3">
                                        			<div class="row directory-block">
                                            			<div class="col-sm-12">
                                            				<a href="listings.html" >Clwyd</a><br />
                                                            <a href="listings.html" >Dyfed</a><br />
                                            			</div>
                                            		</div>	
                                            	</div>

                                            	<div class="col-sm-3">
                                        			<div class="row directory-block">
                                            			<div class="col-sm-12">
                                                        	<a href="listings.html" >Gwent</a><br />
                                                            <a href="listings.html" >Gwynedd</a><br />
                                                        </div>
                                        			</div>
                                    			</div>

                                    			<div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
			                                                <a href="listings.html" >Mid Glamorgan</a><br />
			                                                <a href="listings.html" >Powys</a><br />
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
			                                                <a href="listings.html" >South Glamorgan</a><br />
			                                                <a href="listings.html" >West Glamorgan</a><br />
			                                            </div>
			                                        </div>
			                                    </div>
                                            </div>

                                            <div id="SC" class="tab-pane counties-pane">

                                            	<div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
                                                        	<a href="listings.html" >Aberdeenshire</a><br />
                                                            <a href="listings.html" >Angus</a><br />
                                                            <a href="listings.html" >Argyll</a><br />
                                                            <a href="listings.html" >Ayrshire</a><br />
                                                            <a href="listings.html" >Banffshire</a><br />
                                                            <a href="listings.html" >Berwickshire</a><br />
                                                            <a href="listings.html" >Bute</a><br />
                                                            <a href="listings.html" >Caithness</a><br />
                                                        </div>
                                        			</div>                                        			
                                    			</div>


                                    			 <div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
                                                            <a href="listings.html" >Clackmannanshire</a><br />
                                                            <a href="listings.html" >Dumfriesshire</a><br />
                                                            <a href="listings.html" >Dunbartonshire</a><br />
                                                            <a href="listings.html" >East Lothian</a><br />
                                                            <a href="listings.html" >Fife</a><br />
                                                            <a href="listings.html" >Inverness-shire</a><br />
                                                            <a href="listings.html" >Kincardineshire</a><br />
                                                            <a href="listings.html" >Kinross-shire</a><br />
                                                        </div>
                                        			</div>
                                    			</div>

                                    			<div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
                                                            <a href="listings.html" >Kirkcudbrightshire</a><br />
                                                            <a href="listings.html" >Lanarkshire</a><br />
                                                            <a href="listings.html" >Midlothian</a><br />
                                                            <a href="listings.html" >Moray</a><br />
                                                            <a href="listings.html" >Nairnshire</a><br />
                                                            <a href="listings.html" >Orkney</a><br />
                                                            <a href="listings.html" >Peeblesshire</a><br />
                                                            <a href="listings.html" >Perthshire</a><br />
                                                        </div>
                                        			</div>
                                    			</div>

                                    			<div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
                                                            <a href="listings.html" >Renfrewshire</a><br />
                                                            <a href="listings.html" >Ross-shire</a><br />
                                                            <a href="listings.html" >Roxburghshire</a><br />
                                                            <a href="listings.html" >Selkirkshire</a><br />
                                                            <a href="listings.html" >Shetland</a><br />
                                                            <a href="listings.html" >Stirlingshire</a><br />
                                                            <a href="listings.html" >Sutherland</a><br />
                                                            <a href="listings.html" >West Lothian</a><br />
                                                        </div>
                                        			</div>
                                    			</div>

                                    			<div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
                                                        	<a href="listings.html" >Wigtownshire</a><br />
                                                        </div>
                                        			</div>                                        				
                                    			</div>
                                            </div>	

                                            <div id="NI" class="tab-pane counties-pane">
                                                
                                                <div class="col-sm-3">
                                        			<div class="row directory-block">
                                            			<div class="col-sm-12">
                                                        	<a href="listings.html" >Antrim</a><br />
                                                        </div>
                                        			</div>
                                    			</div>

                                    			<div class="col-sm-3">
                                        			<div class="row directory-block">
                                            			<div class="col-sm-12">
                                                            <a href="listings.html" >Armagh</a><br />
                                                        </div>
                                        			</div>                                        				
                                    			</div>

                                    			<div class="col-sm-3">
			                                        <div class="row directory-block">
			                                            <div class="col-sm-12">
                                                            <a href="listings.html" >Down</a><br />
                                                        </div>
                                        			</div>
                                    			</div>

                                    			<div class="col-sm-3">
                                        			<div class="row directory-block">
                                            			<div class="col-sm-12">
                                                        	<a href="listings.html" >Fermanagh</a><br />
                                                        </div>
                                        			</div>
                                    			</div>

                                    			<div class="col-sm-3">
                                        			<div class="row directory-block">
                                            			<div class="col-sm-12">
                                                        	<a href="listings.html" >Londonderry</a><br />
                                                        </div>
                                        			</div>
                                    			</div>
												
												<div class="col-sm-3">
                                        			<div class="row directory-block">
                                            			<div class="col-sm-12">
                                                        	<a href="listings.html" >Tyrone</a><br />
                                                        </div>
                                        			</div>
                                    			</div>

                                    		</div>	
                                        </div>    
                                        <!-- End of #myTabContent -->
			                        </div>	
			                    </div>  
			                </div>    
			        	</div>	
			        </div>	
            	</div>	
            	<br />


            	<div class="row ">
        			<div class="col-sm-11">
            			<div class="panel panel-default">
            				<div class="panel-heading">Filters</div>
            				<div class="panel-body">
            					<form class="form-inline mini" style="margin-bottom: 0px;">
            						<fieldset>
            							<div class="row filter-row">
			                                <div class="col-sm-6">
			                                    <label>Make</label>
			                                </div>
			                                <div class="col-sm-6">
			                                    <select class=" form-control ">
			                                        <option>Any</option>
			                                        <option>Alfa romeo</option>
			                                        <option>Houses</option>
			                                        <option>Flats/ Apartments</option>
			                                        <option>Bungalows</option>
			                                        <option>Land</option>
			                                        <option>Commercial property</option>
			                                        <option>Other</option>
			                                    </select>
			                                </div>
			                            </div>

			                            <div class="row filter-row">
			                                <div class="col-sm-6">
			                                    <label>Mileage</label>
			                                </div>
			                                <div class="col-sm-6">
			                                    <select class="col-sm-10 form-control ">
			                                        <option>Any</option>
			                                        <option>Alfa romeo</option>
			                                        <option>Houses</option>
			                                        <option>Flats/ Apartments</option>
			                                        <option>Bungalows</option>
			                                        <option>Land</option>
			                                        <option>Commercial property</option>
			                                        <option>Other</option>
			                                    </select>
			                                </div>
			                            </div>

			                            <div class="row filter-row">
			                                <div class="col-sm-6">
			                                    <label>Seller type</label>
			                                </div>
			                                <div class="col-sm-6">
			                                    <select class="col-sm-10 form-control ">
			                                        <option>Any</option>
			                                        <option>Alfa romeo</option>
			                                        <option>Houses</option>
			                                        <option>Flats/ Apartments</option>
			                                        <option>Bungalows</option>
			                                        <option>Land</option>
			                                        <option>Commercial property</option>
			                                        <option>Other</option>
			                                    </select>
			                                </div>
			                            </div>

			                            <div class="row filter-row">
			                                <div class="col-sm-6">
			                                    <label>Body type</label>
			                                </div>
			                                <div class="col-sm-6">
			                                    <select class="col-sm-10 form-control ">
			                                        <option>Any</option>
			                                        <option>Alfa romeo</option>
			                                        <option>Houses</option>
			                                        <option>Flats/ Apartments</option>
			                                        <option>Bungalows</option>
			                                        <option>Land</option>
			                                        <option>Commercial property</option>
			                                        <option>Other</option>
			                                    </select>
			                                </div>
			                            </div>

			                            <div class="row filter-row">
			                                <div class="col-sm-6">
			                                    <label>Fuel type</label>
			                                </div>
			                                <div class="col-sm-6">
			                                    <select class="col-sm-10 form-control ">
			                                        <option>Any</option>
			                                        <option>Alfa romeo</option>
			                                        <option>Houses</option>
			                                        <option>Flats/ Apartments</option>
			                                        <option>Bungalows</option>
			                                        <option>Land</option>
			                                        <option>Commercial property</option>
			                                        <option>Other</option>
			                                    </select>
			                                </div>
			                            </div>

			                            <div class="row filter-row">
			                                <div class="col-sm-6">
			                                    <label>Age</label>
			                                </div>
			                                <div class="col-sm-6">
			                                    <select class="col-sm-10 form-control ">
			                                        <option>Any</option>
			                                        <option>Alfa romeo</option>
			                                        <option>Houses</option>
			                                        <option>Flats/ Apartments</option>
			                                        <option>Bungalows</option>
			                                        <option>Land</option>
			                                        <option>Commercial property</option>
			                                        <option>Other</option>
			                                    </select>
			                                </div>
			                            </div>

			                            <div class="row filter-row">
			                                <div class="col-sm-12">
			                                    <label>Price range</label>
			                                </div>
			                                <div class="col-sm-6">
			                                    <div class="input-group">
			                                        <span class="input-group-addon">$</span>
			                                        <input type="email" class="form-control price-input" placeholder="min" />
			                                    </div>
			                                </div>
			                                <div class="col-sm-6">
			                                    <div class="input-group">
			                                        <span class="input-group-addon">$</span>
			                                        <input type="email" class="form-control price-input" placeholder="max" />
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="row filter-row">
			                                <div class="col-sm-12">
			                                    <label>Search only:</label>
			                                </div>
			                                <div class="col-sm-12">
			                                    <div class="radio">
			                                        <label>
			                                            <input type="radio" name="optionsRadios" value="option1" checked>
			                                            Urgent ads
			                                        </label>
			                                    </div><br />

			                                    <div class="radio">
			                                        <label>
			                                            <input type="radio" name="optionsRadios" value="option2">
			                                            Featured ads
			                                        </label>
			                                    </div><br />

			                                    <div class="radio">
			                                        <label>
			                                            <input type="radio" name="optionsRadios" value="option2">
			                                            Only ads with pictures
			                                        </label>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="row filter-row">
			                                <div class="col-sm-2 pull-right" style="margin-top: 10px;">
			                                    <button class="btn btn-primary pull-right" type="submit">Update results</button>
			                                </div>
			                            </div>
            						</fieldset>
            					</form>	
            				</div>	
            			</div>	
            		</div>	
            	</div>	

            	<div class="row ">
			        <div class="col-sm-11">
			            <div class="panel panel-default">
			                <div class="panel-heading">Refine category</div>
			                <div class="panel-body">
			                    <ul class="nav nav-category">
			                        <li>
			                            <a class="active" href="category.html">All categories</a>
			                            <ul>
			                                <li><a href="listings.html">Cars, Vans & Motorbikes</a>
			                                <ul>
			                                    <li><a class="active" href="listings.html">Cars</a>
			                                        <ul>
			                                            <li><a class="active" href="listings.html"><strong>Porsche</strong></a> (66)<a href="#" class="remove-category"><i class="fa fa-times"></i></a></li>
			                                        </ul>
			                                    </li>

			                                </ul>
			                                    </li>
			                            </ul>
			                        </li>
			                    </ul>				

			                </div>
			            </div>
			        </div>
			    </div>


			    <div class="row ">
			        <div class="col-sm-11">
			            <div class="panel panel-default">
			           		<div class="panel-heading">Refine category</div>
                			<div class="panel-body">
                				<div class="property"><a href="#AC+Cobra">AC Cobra</a></div>
				                <div class="property"><a href="#Acura">Acura</a></div>
				                <div class="property"><a href="#Alfa+Romeo">Alfa Romeo</a></div>
				                <div class="property"><a href="#American+Motors">American Motors</a></div>
				                <div class="property"><a href="#Aston+Martin">Aston Martin</a></div>				                    
				                <div class="more" id="more_make_link"><a href="#" class="more link-info" id="more_make">More ...</a></div>
							    <div id="more_make_list" style="display: none;">
				                    <div class="property"><a href="#Audi">Audi</a></div>
								    <div class="property"><a href="#Austin+Healey">Austin Healey</a></div>
				                    <div class="property"><a href="#Avanti">Avanti</a></div>
				                    <div class="property"><a href="#Bentley">Bentley</a></div>
				                    <div class="property"><a href="#Bitter">Bitter</a></div>
				                    <div class="property"><a href="#BMW">BMW</a></div>
				                    <div class="property"><a href="#Bricklin">Bricklin</a></div>
				                    <div class="property"><a href="#British+Leyland">British Leyland</a></div>
				                    <div class="property"><a href="#Bugatti">Bugatti</a></div>
				                    <div class="property"><a href="#Buick">Buick</a></div>
				                    <div class="property"><a href="#Cadillac">Cadillac</a></div>				                        
				                    <div class="more"><a id="less_make" href="#" class="more link-info">Less ...</a></div>
                				</div>
                			</div>		 	
			            </div>	
			        </div>    
			    </div>    			    

			    <div class="row ">
			        <div class="col-sm-11">
			            <div class="panel panel-default">
			                <div class="panel-heading">Location</div>
			                <div class="panel-body">
			                    <ul class="nav">
			                        <li>
			                            <a class="active" href="category.html">Greater London (12)</a>
			                            <ul>
			                                <li><a href="listings.html"> - Central London (11)</a></li>
			                                <li><a class="active" href="listings.html"> - East London (1)</a></li>
			                                <li><a class="active" href="listings.html"> - North London (1)</a></li>
			                                <li><a class="active" href="listings.html"> - North London (1)</a></li>
			                                <li><a class="active" href="listings.html"> - North West London  (1)</a></li>
			                                <li><a class="active" href="listings.html"> - South East London  (1)</a></li>
			                                <li><a class="active" href="listings.html"> - South West London  (1)</a></li>
			                                <li><a class="active" href="listings.html"> - West London  (1)</a></li>
			                            </ul>
			                        </li>
			                        <li><a href="category.html">Brighton (5)</a></li>
			                        <li><a href="category.html">Cambridge (2)</a></li>
			                        <li><a href="category.html">Essex (2)</a></li>
			                        <li><a href="category.html">Guildford (2)</a></li>
			                        <li><a href="category.html">Kent (2)</a></li>
			                        <li><a href="category.html">Luton (2)</a></li>
			                        <li><a href="category.html">Milton Keynes (2)</a></li>
			                        <li><a href="category.html">Oxford (2)</a></li>
			                        <li><a href="category.html">Reading (2)</a></li>
			                    </ul>
			                </div>
			            </div>
			        </div>
			    </div>	
			    <!-- End of rowsets -->

            </div>	
        </div>    
        <!-- End of sidebar -->

        <!-- Right panel -->
        <div class="col-sm-8 pull-right listings">
        	
        	<div class="row listing-row" style="margin-top: -10px;">
        		<div class="pull-left">
                    <strong>Today, Saturday 14th September</strong>
                </div>
                <div class="pull-right">
                    <span style="">Sort by:&nbsp;&nbsp;&nbsp;</span>   
                    <a href="#"  data-toggle="tooltip" data-placement="top" title="Sort from newest to oldest"> Date <i class="fa fa-chevron-up"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Sort from lowest price to highest price"> Price <i class="fa fa-chevron-down"></i></a>
                </div>
        	</div>	

        	<!-- Featured adverts -->
        	<div class="row premium listing-row">
        		<div class="ribbon-wrapper-red"><div class="ribbon-red">&nbsp;<span>Featured</span></div></div>
        		<div class="col-sm-2">
                    <a href="details.html" class="thumbnail " >{{ HTML::image("photos/listings/0.jpg", '', array()) }}</a>
                </div>

                <div class="col-sm-10">
                	<h3><a class=""  href="details.html">Renault Megane Convertible, 2002, 1.6 Petrol - <strong>&pound;14,350</strong></a></h3>
                	<p class="muted">Located in <strong>Richmond, London</strong></p>
                    <p class="muted">Posted Feb 05, 2014 to <a href="#" class="underline">Cars, Vans & Motorbikes</a></p>
                    <p>Excellent Condition. Displacement: 2,900 cc Power Output: 250 bhp Drivetrain: 2-WD  Second hand car for sale – 7377790212 Available car – beat – blue color, Honda city –white /black Indica ecs – white Alto – white Nano – red /white...</p>
                    <p class="ad-description">
                        <strong>2006</strong> | 

                        <strong>98,000 miles</strong> | 

                        <strong>2,696 cc</strong> | 

                        <strong>Diesel</strong>                
                    </p>
                    <p>
                        <span class="classified_links pull-right">
                            <a class="link-info underline" href="#">Share</a>&nbsp;
                            <a class="link-info underline" href="#">Add to favorites</a>
                            &nbsp;<a class="link-info underline" href="details.html">Details</a>&nbsp;
                            &nbsp;<a class="link-info underline" href="#">Contact</a></span>
                    </p>
                </div>
        	</div>	

        	<div class="row premium listing-row">
                <div class="col-sm-2">
                	<a href="details.html" class="thumbnail " >{{ HTML::image("photos/listings/1.jpg", '', array()) }}</a>
                </div>

                <div class="col-sm-10">
                    <h3><a class=""  href="details.html">Ford Fusion 2 2003 1.4 - <strong>&pound;9,950</strong></a></h3>
                    <p class="muted">Located in <strong>Richmond, London</strong></p>
                    <p class="muted">Posted Feb 05, 2014 to <a href="#" class="underline">Cars, Vans & Motorbikes</a></p>
                    <p>Excellent Condition. Displacement: 2,900 cc Power Output: 250 bhp Drivetrain: 2-WD  Second hand car for sale – 7377790212 Available car – beat – blue color, Honda city –white /black Indica ecs – white Alto – white Nano – red /white...</p>
                    <p class="ad-description">
                        <strong>2006</strong> | 

                        <strong>98,000 miles</strong> | 

                        <strong>2,696 cc</strong> | 

                        <strong>Diesel</strong>                
                    </p>
                    <p>
                        <span class="classified_links pull-right">
                            <a class="link-info underline" href="#">Share</a>&nbsp;
                            <a class="link-info underline" href="#">Add to favorites</a>
                            &nbsp;<a class="link-info underline" href="details.html">Details</a>&nbsp;
                            &nbsp;<a class="link-info underline" href="#">Contact</a></span>
                    </p>
                </div>
            </div>    
        	<!-- End of featured advertises-->


            <!-- Start regular listing section -->
            <div class="row  listing-row">
                <div class="col-sm-2">
                    <a href="details.html" class="thumbnail " >{{ HTML::image("photos/listings/3.jpg", '', array()) }}</a>
                </div>

                <div class="col-sm-10">
                    <h3><a class=""  href="details.html">Renault Clio Dynamique 16v 1.2 51 plate - <strong>&pound;5,000</strong></a></h3>
                    <p class="muted">Located in <strong>Richmond, London</strong></p>
                    <p class="muted">Posted Feb 05, 2014 to <a href="#" class="underline">Cars, Vans & Motorbikes</a></p>
                    <p>Excellent Condition. Displacement: 2,900 cc Power Output: 250 bhp Drivetrain: 2-WD  Second hand car for sale – 7377790212 Available car – beat – blue color, Honda city –white /black Indica ecs – white Alto – white Nano – red /white...</p>
                    <p class="ad-description">
                        <strong>2006</strong> | 

                        <strong>98,000 miles</strong> | 

                        <strong>2,696 cc</strong> | 

                        <strong>Diesel</strong>                
                    </p>
                    <p>
                        <span class="classified_links pull-right">
                            <a class="link-info underline" href="#">Share</a>&nbsp;
                            <a class="link-info underline" href="#">Add to favorites</a>
                            &nbsp;<a class="link-info underline" href="details.html">Details</a>&nbsp;
                            &nbsp;<a class="link-info underline" href="#">Contact</a></span>
                    </p>
                </div>
            </div>

            <div class="row  listing-row">
                <div class="col-sm-2">
                    <a href="details.html" class="thumbnail " >{{ HTML::image("photos/listings/4.jpg", '', array()) }}</a>
                </div>

                <div class="col-sm-10">
                    <h3><a class=""  href="details.html">Mercedes-Benz C Class C220 CDI Avantgarde SE - <strong>&pound;15,000</strong></a></h3>
                    <p class="muted">Located in <strong>Richmond, London</strong></p>
                    <p class="muted">Posted Feb 05, 2014 to <a href="#" class="underline">Cars, Vans & Motorbikes</a></p>
                    <p>Excellent Condition. Displacement: 2,900 cc Power Output: 250 bhp Drivetrain: 2-WD  Second hand car for sale – 7377790212 Available car – beat – blue color, Honda city –white /black Indica ecs – white Alto – white Nano – red /white...</p>
                    <p class="ad-description">
                        <strong>2006</strong> | 

                        <strong>98,000 miles</strong> | 

                        <strong>2,696 cc</strong> | 

                        <strong>Diesel</strong>                
                    </p>
                    <p>
                        <span class="classified_links pull-right">
                            <a class="link-info underline" href="#">Share</a>&nbsp;
                            <a class="link-info underline" href="#">Add to favorites</a>
                            &nbsp;<a class="link-info underline" href="details.html">Details</a>&nbsp;
                            &nbsp;<a class="link-info underline" href="#">Contact</a></span>
                    </p>
                </div>
            </div>    

            <div class="row  listing-row">
                <div class="col-sm-2">
                    <a href="details.html" class="thumbnail property_sold"  style="position:relative;">{{ HTML::image("photos/listings/5.jpg", '', array()) }}</a>
                </div>

                <div class="col-sm-10">
                    <h3><a class=""  href="details.html">Range rover sport hse 2.7 tdv6 2005 - <strong>&pound;10,000</strong></a></h3>
                    <p class="muted">Located in <strong>Richmond, London</strong></p>
                    <p class="muted">Posted Feb 05, 2014 to <a href="#" class="underline">Cars, Vans & Motorbikes</a></p>
                    <p>Excellent Condition. Displacement: 2,900 cc Power Output: 250 bhp Drivetrain: 2-WD  Second hand car for sale – 7377790212 Available car – beat – blue color, Honda city –white /black Indica ecs – white Alto – white Nano – red /white...</p>
                    <p class="ad-description">
                        <strong>2006</strong> | 

                        <strong>98,000 miles</strong> | 

                        <strong>2,696 cc</strong> | 

                        <strong>Diesel</strong>                
                    </p>
                    <p>
                        <span class="classified_links pull-right">
                            <a class="link-info underline" href="#">Share</a>&nbsp;
                            <a class="link-info underline" href="#">Add to favorites</a>
                            &nbsp;<a class="link-info underline" href="details.html">Details</a>&nbsp;
                            &nbsp;<a class="link-info underline" href="#">Contact</a></span>
                    </p>
                </div>
            </div>    
            <!-- End of listing section -->

            <!-- Pagination -->
            <div>
                <ul class="pagination pull-right">
                    <li><a href="#">Prev</a></li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li class="hidden-xs"><a href="#">6</a></li>
                    <li class="hidden-xs"><a href="#">7</a></li>
                    <li class="hidden-sm hidden-xs"><a href="#">8</a></li>
                    <li class="hidden-sm hidden-xs"><a href="#">9</a></li>
                    <li class="hidden-sm hidden-xs"><a href="#">10</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
            <!-- End of pagination -->

        </div>	
        <!-- End of right panel -->



    </div>	
</div>	
@stop