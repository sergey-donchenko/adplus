<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        {{ HTML::style('/css/dropzone.css') }}

		{{ HTML::style('/css/styles.css') }}
	</head>
    <body>
       <!--  @section('sidebar')
            This is the master sidebar.
        @show -->
        
        <nav class="navbar navbar-default" role="navigation">
        	<div class="container">
        		<div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="/" class="navbar-brand ">
                        <span class="logo"><strong>classified</strong><span class="handwriting">ads</span><br />
                        <small >a minimalist theme built with bootstrap </small></span>
                    </a>
                </div>

                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right visible-xs">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="/account/login/">Login</a></li>
                        <li><a href="{{ URL::route('account.create') }}">Register</a></li>
                        <li><a href="/listing/">Listings</a></li>
                        <li><a href="{{ URL::route('account.dashboard') }}">My account</a></li>
                        <li><a href="/advert/create.html">Post an ad</a></li>
                    </ul> 
                    <div class="nav navbar-nav navbar-right hidden-xs">
                        <div class="row">
                            <div class="pull-right">
                                <a data-toggle="modal" data-target="#modalLogin" href="#">Login</a> | 
                                <a href="{{ URL::route('account.create') }}">Register</a> | 
                                <a href="/listing/">Listings</a> | 
                                <a href="{{ URL::route('account.dashboard') }}">My account</a>
                                <a href="/advert/create.html" class="btn btn-warning post-ad-btn">Post an ad</a>
                            </div>	
                        </div>
                    </div>
                </div>
        	</div>	
        </nav>
        
        <!-- Content section -->        
        @yield('content')      

        <!-- Modal box: Login form -->
        @include('popups.login');


        <!-- Modal box: Forgot form -->
        @include('popups.forgot');
        

        <!-- Bottom container section -->
        @section('bottom-container')
        	&nbsp;            
        @show

        <!-- Footer section -->
        <div class="footer">
		    <div class="container">

		        <div class="row">

		            <div class="col-sm-4 col-xs-12">
		                <p><strong>© Bootstrap Classifieds 2014</strong></p>
		                <p>All rights reserved</p>
		            </div>			

		            <div class="col-sm-8 col-xs-12">
		                <p class="footer-links">
		                    <a href="index.html" class="active">Home</a>
		                    <a href="typography.html">Typography</a>
		                    <a href="terms.html">Terms and Conditions</a>
		                    <a href="contact.html">Contact Us</a>
		                </p>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- End Of Footer Section -->

        <!-- Bootstrap core JavaScript -->
		<!-- Placed at the end of the document so the pages load faster -->        
        {{ HTML::script('/js/jquery/jquery.min.js'); }} 
        {{ HTML::script('/js/jquery/jquery.flot.js'); }}
        {{ HTML::script('/js/dropzone.min.js'); }}
		{{ HTML::script('/js/frontend.js'); }}
    </body>
</html>