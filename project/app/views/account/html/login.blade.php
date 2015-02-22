<p>If you have an account with us, please enter your details below.</p>
{{Form::open(array(
    "accept-charset"=> "UTF-8",
    "class"=>"form ajax",
    "url"=>"account/login",
    "data-replace"=>".error-message p",
    "id"=>"user-login-form"
))}}
    <div class="form-group">    
        {{Form::label('email', 'Email address', array('class'=>'visible-xs'))}}
        <div class="controls">
            {{Form::text('email', '', array(
                'class'=>'form-control regula-validation', 
                'placeholder'=>'Your username/email',
                'data-constraints'=>'@Required(message="The Username is required field!")'
            ))}}        
            <span class="error-inline"></span>
        </div>
    </div>
    <div class="form-group">
        {{Form::label('password', 'Password', array('class'=>'visible-xs'))}}
        <div class="controls">
            {{Form::password('password', array(
                'class'=>'form-control regula-validation', 
                'placeholder'=>'Your password',
                'data-constraints'=>'@Required(message="Please fill the Password it\'s required field!")'
            ))}}
            <span class="error-inline"></span>
        </div>        
    </div>

    <div class="form-group">
        {{Form::checkbox('rememberme', 1, null, ["id" => "rememberme"])}}
        {{Form::label('rememberme', 'Remember me', array())}}
    </div>    

    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            {{Form::submit('Login', array('class'=>'btn btn-primary pull-right'))}}
        </div>
    </div>

    <div class="row hidden-xs">
        <div class="col-md-12"><a data-toggle="modal" href="#modalForgot">Forgot your password?</a></div>
    </div>
{{Form::close()}}