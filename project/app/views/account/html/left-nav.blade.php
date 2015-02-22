<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading"><?php echo Lang::get('pages.account.my_account_title'); ?></div>
		<div class="panel-body">
			<ul class="nav">
				<li><a class="@if ($selected === 'dashboard') active @endif" href="{{ URL::route('account.dashboard') }}"><?php echo Lang::get('pages.account.dashboard'); ?></a></li>						
				<li><a class="@if ($selected === 'profile') active @endif" href="account_profile.html"><?php echo Lang::get('pages.account.my_profile'); ?></a></li>
				<li><a class="@if ($selected === 'edit-account') active @endif" href="{{ URL::route('account.edit') }}"><?php echo Lang::get('pages.nav.my_account'); ?></a></li>
				<li><a class="@if ($selected === 'manage-ads') active @endif" href="account_ads.html"><?php echo Lang::get('pages.advert.manage_ads'); ?></a></li>
				<li><a class="@if ($selected === 'create-ad') active @endif" href="{{ URL::route('advert.create') }}"><?php echo Lang::get('pages.advert.create_new_ad'); ?></a></li>
			</ul>
		</div>
	</div>	
</div>