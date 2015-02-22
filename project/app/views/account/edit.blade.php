@extends('layouts.master')

@section('content')
	<hr class="topbar"/>
    <div class="container">
    	<div class="row">
        	<div class="col-sm-3">
        		<div class="sidebar-account">		
					<div class="row ">
						<!-- Account vertical menu -->
        				@include('account.html.left-nav', array('selected' => 'edit-account'))
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
        			<div class="panel-heading"><?php echo Lang::get('pages.account.edit_account'); ?></div>
        			<div class="panel-body">

        				<div class="row">
                    		<div class="col-sm-12">
                    			<div class="alert alert-info">
		                            <h3><?php echo Lang::get('pages.message.note'); ?>:</h3>
		                            <p><?php echo Lang::get('pages.message.leave_password_empty'); ?>.</p>
		                        </div>
                    		</div>
                    	</div>	

                    	<br />
                    	<form class="form-vertical">
                    		<fieldset>

                    			<div class="row">  
                                	<div class="col-sm-12 ">
                                		<div class="form-group">
                                        	<label for="exampleInputEmail1"><?php echo Lang::get('pages.field.name'); ?></label>
                                        	<div class="row">
                                        		<div class="col-sm-2">
                                        			<select class="form-control">
	                                                    <option value="1">Mr</option>
	                                                    <option value="2">Mrs</option>
	                                                    <option value="3">Miss</option>
	                                                    <option value="4">Ms</option>
	                                                </select>    
                                        		</div>

                                        		<div class="col-sm-5"><input type="email" class="form-control " id="exampleInputEmail1" placeholder="<?php echo Lang::get('pages.field.your_firstname'); ?>"></div>
	                                            <div class="col-sm-5"><input type="email" class="form-control " id="exampleInputEmail1" placeholder="<?php echo Lang::get('pages.field.your_secondname'); ?>"></div>
                                        	</div>
                                        </div>	

                                        <div class="form-group">
	                                        <label for="exampleInputEmail1"><?php echo Lang::get('pages.field.email'); ?></label>
	                                        <input type="email" class="form-control " id="exampleInputEmail1" placeholder="<?php echo Lang::get('pages.field.enter_email'); ?>">
	                                    </div>

	                                    <div class="form-group">
	                                        <label for="exampleInputPassword1"><?php echo Lang::get('pages.field.password'); ?></label>
	                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="<?php echo Lang::get('pages.field.password'); ?>">
	                                    </div>

	                                    <div class="form-group">
	                                        <label for="exampleInputPassword1"><?php echo Lang::get('pages.field.confirm_password'); ?></label>
	                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="<?php echo Lang::get('pages.field.confirm_your_password'); ?>">
	                                    </div>

	                                    <div class="checkbox">
	                                        <label><input type="checkbox"> <?php echo Lang::get('pages.message.subscription_mesage'); ?></label>
	                                    </div>
	                                    <br />
	                                    <button type="submit" class="btn btn-primary"><?php echo Lang::get('pages.button.save_details'); ?></button>

                                	</div>
                                </div>	

                    		</fieldset>
                    	</form>
        			</div>
        		</div>
        	</div>

        </div>
    </div>
@stop