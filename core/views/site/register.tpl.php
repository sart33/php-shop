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

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('./../web/images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="/<?=$tempVar[3]?>/login" aria-selected="false">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/<?=$tempVar[3]?>/signup" aria-selected="true">Sign up</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="signup" role="tabpanel" aria-labelledby="register-tab">

                            <form id="form-signup" action="/<?=$tempVar[3]?>/signup" method="post">
                                <div class="form-group field-signupform-username required has-error">
                                    <p><?php if(!empty($yes)) echo $yes?></p>
                                    <label class="control-label" for="signupform-username">Username</label>
                                    <input type="text" id="signupform-username" class="form-control" name="SignupForm[username]" autofocus="" aria-required="true" aria-invalid="true">

                                   <?php if(!empty($vars['name'])): ?>
                                    <p class="help-block help-block-error"><?=$vars['name']?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group field-signupform-email required">
                                    <label class="control-label" for="signupform-email">Email</label>
                                    <input type="text" id="signupform-email" class="form-control" name="SignupForm[email]" aria-required="true">

                                    <?php if(!empty($vars['mail'])): ?>
                                    <p class="help-block help-block-error"><?=$vars['mail']?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group field-signupform-password required">
                                    <label class="control-label" for="signupform-password">Password</label>
                                    <input type="password" id="signupform-password" class="form-control" name="SignupForm[password]" aria-required="true">

                                    <?php if(!empty($vars['pass'])): ?>
                                    <p class="help-block help-block-error"><?=$vars['pass']?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="register-policy" required="">
                                    <label class="custom-control-label" for="register-policy">I agree to the <a href="/<?=$tempVar[3]?>/privacy-policy">privacy policy</a> *</label>
                                </div>

                                <button type="submit" class="btn btn-primary" name="signup-button">Sign up</button>
                            </form>                            <br>
                            <div class="form-group">
                                                          </div>
                            <div class="form-choice">
                                <p class="text-center">or sign in with</p><div id="w0"><ul class="auth-clients"><li><a class="google auth-link" href="/en/site/auth?authclient=google" title="Google"><span class="auth-icon google"></span></a></li><li><a class="facebook auth-link" href="/en/site/auth?authclient=facebook" title="Facebook"><span class="auth-icon facebook"></span></a></li></ul></div>                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login  btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook                                        </a>
                                    </div>
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                            <br>
                            <p class="text-center">
                                <a href="/<?=$tempVar[3]?>/login">Already registered? Sign in!</a>                            </p>
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main>
