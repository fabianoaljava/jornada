<?php
require_once '../../../../../painel/koinonia/libraries/PHPMailer/test/vendor/autoload.php';
spl_autoload_register(function ($class) {
    require_once strtr($class, '\\_', '//').'.php';
});
