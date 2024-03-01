<?= $this->extend('portal/templates/index'); ?>
<?= $this->section('content'); ?>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h1 class="heading-section"><?= lang('Auth.forgotPassword') ?></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <p>Enter your email for reset</p>
                    <form class="signin-form" action="<?= url_to('forgot') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>