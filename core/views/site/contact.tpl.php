<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item"><a href="#">Страницы</a></li>
                <li class="breadcrumb-item active" aria-current="page">О Нас</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('/images/about-header-bg.jpg')">
            <h1 class="page-title text-white">О Нас<span class="text-white">Кто Мы</span></h1>
            <form id="contact-form" action="/contact" method="post">
                <input type="hidden" name="_csrf-frontend" value="Xf2tKWq1fzg7CNHb-FV-xOUj7V9EsQXpNUQ12TryVX0Wi8BQNeRMXVhKobCyCkz1sRWsCBX_PNtHNFSWY6c0TA==">
                <div class="form-group field-contactform-name required">
                    <label class="control-label" for="contactform-name">Name</label>
                    <input type="text" id="contactform-name" class="form-control" name="ContactForm[name]" autofocus="" aria-required="true">

                    <p class="help-block help-block-error"></p>
                </div>
                <div class="form-group field-contactform-email required">
                    <label class="control-label" for="contactform-email">Email</label>
                    <input type="text" id="contactform-email" class="form-control" name="ContactForm[email]" aria-required="true">

                    <p class="help-block help-block-error"></p>
                </div>
                <div class="form-group field-contactform-subject required">
                    <label class="control-label" for="contactform-subject">Subject</label>
                    <input type="text" id="contactform-subject" class="form-control" name="ContactForm[subject]" aria-required="true">

                    <p class="help-block help-block-error"></p>
                </div>
                <div class="form-group field-contactform-body required">
                    <label class="control-label" for="contactform-body">Body</label>
                    <textarea id="contactform-body" class="form-control" name="ContactForm[body]" rows="6" aria-required="true"></textarea>

                    <p class="help-block help-block-error"></p>
                </div>
                <div class="form-group field-contactform-verifycode">
                    <label class="control-label" for="contactform-verifycode">Verification Code</label>
                    <div class="row"><div class="col-lg-3"><img id="contactform-verifycode-image" src="/ru/site/captcha?v=60ca27ccbc23b0.82991350" alt=""></div><div class="col-lg-6"><input type="text" id="contactform-verifycode" class="form-control" name="ContactForm[verifyCode]"></div></div>

                    <p class="help-block help-block-error"></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="contact-button">Submit</button>                </div>

            </form>
        </div><!-- End .page-header -->
    </div><!-- End .container -->


    </div><!-- End .page-content -->
</main>