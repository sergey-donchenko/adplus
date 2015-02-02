@extends('layouts.master')

@section('content')
<hr class="topbar"/>
<div class="container">
   	<div class="row">
   		<div class="col-sm-12">	
   			<br />
            <br />			
            <br />
            <br />
            <div class="row">
            	<div class="col-md-6 col-sm-12">
            		<div class="row">
                        <div class="col-md-11 col-sm-12">
                            <div class="well">
                            	<h2>Sign in</h2>
                            	@include('account.html.login')
                            </div>
                        </div>    
                    </div>    
				</div>

				<div class="col-md-6 col-sm-12">
					<div class="row">
						<div class="col-sm-12 col-md-11 pull-right">
							<div class="well">
                                <h2>Register</h2>
                                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p><br />
                                <a href="{{ URL::route('account.create') }}" class="btn btn-primary">Create an account</a>
                            </div>
						</div>
					</div>
				</div>	

            </div>	
   		</div>
    </div>	  
</div>    
@stop