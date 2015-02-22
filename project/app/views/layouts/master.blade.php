<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        @if ( isset($headTitle) ) 
        <title>{{ implode(Config::get('template.headTitleSeparator'), $headTitle )  }}</title>
        @else
        <title>{{ Config::get('template.headTitle') }}</title>
        @endif

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
                        <li><a href="{{ URL::route('account.login') }}"><?php echo Lang::get('pages.nav.login'); ?></a></li>
                        <li><a href="{{ URL::route('account.create') }}"><?php echo Lang::get('pages.nav.register'); ?></a></li>
                        <li><a href="{{ URL::route('listing') }}"><?php echo Lang::get('pages.nav.listing'); ?></a></li>
                        <li><a href="{{ URL::route('account.dashboard') }}"><?php echo Lang::get('pages.nav.my_account'); ?></a></li>
                        <li><a href="{{ URL::route('advert.create') }}"><?php echo Lang::get('pages.nav.post_an_ad'); ?></a></li>
                    </ul> 
                    <div class="nav navbar-nav navbar-right hidden-xs">
                        <div class="row">
                            <div class="pull-right">
                                <a data-toggle="modal" data-target="#modalLogin" href="#"><?php echo Lang::get('pages.nav.login'); ?></a> | 
                                <a href="{{ URL::route('account.create') }}"><?php echo Lang::get('pages.nav.register'); ?></a> | 
                                <a href="{{ URL::route('listing') }}"><?php echo Lang::get('pages.nav.listing'); ?></a> | 
                                <a href="{{ URL::route('account.dashboard') }}"><?php echo Lang::get('pages.nav.my_account'); ?></a>
                                <a href="{{ URL::route('advert.create') }}" class="btn btn-warning post-ad-btn"><?php echo Lang::get('pages.nav.post_an_ad'); ?></a>
                            </div>	
                        </div>
                    </div>
                </div>
        	</div>	
        </nav>
        
        <!-- Content section -->        
        @yield('content')      

        <!-- Modal box: Login form -->
        @include('popups.login')


        <!-- Modal box: Forgot form -->
        @include('popups.forgot')
        

        <!-- Bottom container section -->
        @section('bottom-container')
        	&nbsp;            
        @show

        <!-- Footer section -->
        <div class="footer">
		    <div class="container">

		        <div class="row">

		            <div class="col-sm-4 col-xs-12">
		                <p><strong><?php echo Lang::get('pages.copyright.company_name'); ?></strong></p>
		                <p><?php echo Lang::get('pages.copyright.all_right_reserved'); ?></p>
		            </div>			

		            <div class="col-sm-8 col-xs-12">
		                <p class="footer-links">
		                    <a href="index.html" class="active"><?php echo Lang::get('pages.nav.home'); ?></a>
		                    <a href="typography.html"><?php echo Lang::get('pages.nav.typography'); ?></a>
		                    <a href="terms.html"><?php echo Lang::get('pages.nav.terms_and_conditions'); ?></a>
		                    <a href="contact.html"><?php echo Lang::get('pages.nav.contact_us'); ?></a>
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
        {{ HTML::script('/js/regula-1.3.4.min.js'); }}
        {{ HTML::script('/js/dropzone.min.js'); }}
		{{ HTML::script('/js/frontend.js'); }}
    </body>
</html>