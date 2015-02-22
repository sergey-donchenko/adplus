@extends('layouts.master')

@section('content')
	<hr class="topbar"/>
	<div class="container dashboard">
    	<div class="row">

    		<div class="col-sm-3">
            	<div class="sidebar-account">		
					<div class="row ">
						<!-- Account vertical menu -->
        				@include('account.html.left-nav', array('selected' => 'dashboard'))
					</div>

					<div class="row hidden-xs">
			    		<div class="col-lg-12">
							<div class="well">
								<div class="row ">
									<div class="col-lg-3">{{ HTML::image("css/icons/Crest.png", '', array('width' => 45)) }}</div>
									<div class="col-lg-9">
										<h4 style="margin-top: 0"><?php echo Lang::get('pages.account.increase_visibility'); ?></h4>
										<p><?php echo Lang::get('pages.tips.do_not_forget_to_bump_listing'); ?></p>
									</div>
								</div>	
							</div>	
						</div>	
			    	</div>

				</div>	
			</div>	

			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo Lang::get('pages.account.dashboard'); ?></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-3 col-xs-6" style="border-right: 1px solid #DADADA; text-align: center;">
                            <h3 style="text-align: center;"><?php echo Lang::get('pages.account.total_credits'); ?></h3>
	                            <p>50</p>
	                        </div>

	                        <div class="col-sm-3 col-xs-6" style="border-right: 1px solid #DADADA; text-align: center;">
	                            <h3 style="text-align: center;"><?php echo Lang::get('pages.account.listings_published'); ?></h3>
	                            <p>5</p>
	                        </div>

	                        <div class="col-sm-3 col-xs-6" style="border-right: 1px solid #DADADA; text-align: center;">
	                            <h3 style="text-align: center;"><?php echo Lang::get('pages.account.views_this_month'); ?></h3>
	                            <p>86</p>
	                        </div>

	                        <div class="col-sm-3 col-xs-6" style="text-align: center;">
	                            <h3 style="text-align: center;"><?php echo Lang::get('pages.account.total_ad_views'); ?></h3>
	                            <p>257</p>
	                        </div>
						</div>
						<br />

	                    <br /><br />
	                    <div class="row">

	                        <div class="col-sm-12" >
	                            <h3 style="text-align: center;"><?php echo Lang::get('pages.account.listing_views_in_the_last_hours', ['a_count' => 29, 'h_count' => 24]); ?></h3>
	                        </div>

	                    </div>

	                     <div class="row">
	                        <div class="col-sm-12">
	                            <div id="visualization"></div>
	                        </div>
	                    </div>

	                    <br /><br /><br /><br />

	                    <div class="row">

	                        <div class="col-sm-4">
	                            <h3><?php echo Lang::get('pages.advert.create_new_ad') ?></h3>
	                            <p><?php echo Lang::get('pages.tips.create_new_advert') ?></p>
	                            <a href="{{ URL::route('advert.create') }}" class="btn btn-default"><?php echo Lang::get('pages.advert.create_new_ad') ?></a>
	                            <br />
	                            <br />
	                        </div>

	                        <div class="col-sm-4">
	                            <h3><?php echo Lang::get('pages.account.promote_your_ads') ?></h3>
	                            <p><?php echo Lang::get('pages.tips.it_is_time_to_bump') ?></p>
	                            <a href="account_ads.html" class="btn btn-default"><?php echo Lang::get('pages.advert.bump_listings') ?></a>
	                            <br />
	                            <br />
	                        </div>

	                        <div class="col-sm-4">
	                            <h3><?php echo Lang::get('pages.account.unlimited_listings') ?></h3>
	                            <p><?php echo Lang::get('pages.tips.upgrade_your_account') ?></p>
	                            <a href="#" class="btn btn-default"><?php echo Lang::get('pages.account.upgrade_account') ?></a>
	                            <br />
	                            <br />
	                        </div>
	                    </div>

	                    <br />
	                    <br />
					</div>
				</div>
			</div>
    	</div>	
    </div>
@stop