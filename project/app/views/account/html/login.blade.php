<p>If you have an account with us, please enter your details below.</p>

<form method="POST" action="account_dashboard.html" accept-charset="UTF-8" id="user-login-form" class="form ajax" data-replace=".error-message p">

    <div class="form-group">        
        <label class="visible-xs">Email address</label>
        <input placeholder="Your username/email" class="form-control" name="email" type="text">
    </div>
    <div class="form-group">
        <label class="visible-xs">Password</label>
        <input placeholder="Your password" class="form-control" name="password" type="password" value="">
    </div>

    <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
    </div>    

    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6"><button type="submit" class="btn btn-primary pull-right">Login</button></div>
    </div>

    <div class="row hidden-xs">
        <div class="col-md-12"><a data-toggle="modal" href="#modalForgot">Forgot your password?</a></div>
    </div>
</form>