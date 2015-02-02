@extends('layouts.master')

@section('content')
<hr class="topbar">
<div class="container">
    <br />
    <div class="row">
    	<div class="col-sm-12">
    		<h1>Create an account</h1>
    		<hr />

    		<div class="row">
                <div class="col-sm-12 col-md-6">

                	<form class="form-vertical">
                        <fieldset>
                        	
                        	<div class="row">  
                                <div class="col-sm-12" >
                                	
                                	<div class="well">
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Full name</label>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <select class="form-control">
                                                        <option value="1">Mr</option>
                                                        <option value="2">Mrs</option>
                                                        <option value="3">Miss</option>
                                                        <option value="4">Ms</option>
                                                        <option value="5">Dr</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="email" class="form-control " id="exampleInputEmail1" placeholder="First name">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="email" class="form-control " id="exampleInputEmail1" placeholder="Last name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control " id="exampleInputEmail1" placeholder="Enter email">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Make sure your password is longer than 6 characters">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Confirm password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm your password">
                                        </div>							  

                                        <div class="checkbox">
                                            <label><input type="checkbox"> We can contact you with relevant properties, offers and news</label>
                                        </div>
                                        
                                        <br />
                                        <a href="account_dashboard.html" class="btn btn-primary">Create account</a>

                                    </div>    
                                </div>	
                            </div>  

                        </fieldset>
                    </form>

                </div>
                
                <div class="col-md-6 col-sm-12 account-sidebar hidden-sm">
                	<div class="row">
                        <div class="col-sm-3" style="text-align: center;">                            
                            {{ HTML::image("css/icons/Crest.png", '', array('width' => 50)) }}
                        </div>
                        
                        <div class="col-sm-8">
                            <h3>Why us?</h3>
                            <p>We're one of the most recognisable brands, attracting thousands of buyers every month.</p>
                       	</div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-sm-3" style="text-align: center;">                            
                            {{ HTML::image("css/icons/Pie-Chart.png", '', array('width' => 40)) }}
                        </div>
                        <div class="col-sm-8">
                            <h3>Magnet for buyers</h3>
                            <p>We make sure your listings receive maximum exposure and is presented in an engaging way</p>
                        </div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-sm-3" style="text-align: center;">                               
                            {{ HTML::image("css/icons/Search.png", '', array('width' => 40)) }}   
                        </div>
                        <div class="col-sm-8">
                            <h3>Focused searches</h3>
                            <p>Our technology and algorithm matches potential buyers directly to your listings</p>
                        </div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-sm-3" style="text-align: center;">                                   
                            {{ HTML::image("css/icons/Telephone.png", '', array('width' => 40)) }}          
                        </div>
                        <div class="col-sm-8">
                            <h3>Mobile web</h3>
                            <p>Your listings will always be accessible to everyone, even when they are on the move, via our responsive mobile website</p>
                        </div>
                    </div>

                </div>    

			</div>	
        </div>  

   	</div>	
    </div>
</div>    

@stop