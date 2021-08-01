<?//= session_id()?>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/<?=$tempVar[3]?>">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="/<?=$tempVar[3]?>/login" role="tab" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/<?=$tempVar[3]?>/signup" role="tab" aria-selected="false">Sign up</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
            <form id="login-form" action="/<?=$tempVar[3]?>/login" method="post">
                <p><?php if(!empty($vars) && !is_array($vars)) {
                        echo $vars;
                    } ?></p>
                <h3><?php if(!empty($yes)) {
                echo $yes;
                } ?></h3>
<input type="hidden" name="_csrf-frontend" value="ZL3mAaUxk7C0QcRZuwAKFnOnX5oFMxJTe257FBC_N-UF0dNR9X7-8dMui3SJZGBPIP4A-XB1ZmQ4XA5uYIp73Q==">
                <div class="form-group field-loginform-username required has-error">
<label class="control-label" for="loginform-username">Username</label>
<input type="text" id="loginform-username" class="form-control" name="LoginForm[username]" autofocus="" aria-required="true" aria-invalid="true">

<p class="help-block help-block-error"><?php if(!empty($message)) {
        echo $message;
    } ?></p>
</div>
                <div class="form-group field-loginform-password required">
<label class="control-label" for="loginform-password">Password</label>
<input type="password" id="loginform-password" class="form-control" name="LoginForm[password]" value="" aria-required="true">

<p class="help-block help-block-error"><?php if(!empty($passError)) {
        echo $passError;
    } ?></p>
</div>
                <div class="form-group field-loginform-rememberme">
<div class="checkbox">
<label for="loginform-rememberme">
<input type="hidden" name="LoginForm[rememberMe]" value="0"><input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked="">
    Remember Me
</label>
<p class="help-block help-block-error"></p>

</div>
</div>
                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <a href="/<?=$tempVar[3]?>/request-password-reset">reset it</a>.
                    <br>
Need new verification email? <a href="/<?=$tempVar[3]?>/resend-verification-email">Resend</a>                </div> <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="login-button">Login</button>                            </div>



            </form>                            <div class="form-choice">
                                <p class="text-center">or sign in with</p><div id="w0"><ul class="auth-clients"><li><a class="google auth-link" href="/<?=$tempVar[3]?>/auth?authclient=google" title="Google"><span class="auth-icon google"></span></a></li><li><a class="facebook auth-link" href="/en/site/auth?authclient=facebook" title="Facebook"><span class="auth-icon facebook"></span></a></li></ul></div>                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
Login With Google                                        </a>
                                    </div><!-- End .col-6 -->
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login  btn-f">
                                            <i class="icon-facebook-f"></i>
Login With Facebook                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                            <br>
<!--                            --><!--                                <p class="text-center">-->
<!--                                    --><!--?//= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?-->
<!--                                </p>-->
<!--                            --><!--                            --><!--                                <p class="text-center">-->
<!--                                    --><!--?//= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?-->
<!--                                </p>-->
<!--                            -->
                        </div><!-- .End .tab-pane -->



                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main>