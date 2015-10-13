<?php

/* @var $this yii\web\View */

$this->title = 'Marketing Social Network';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>This is just the beginning!</h1>

        <p class="lead">You want to make money and create your own Marketing Network? Get Started.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Yii::$app->urlManager->createUrl('site/signup') ?>">Get started</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Marketing Social Network</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="<?= Yii::$app->urlManager->createUrl('site/signup') ?>">Sign Up &raquo;</a></p>
            </div>
            <div class="col-lg-6">
                <h2>How it works</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="<?= Yii::$app->urlManager->createUrl('site/signup') ?>">Sign Up &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
