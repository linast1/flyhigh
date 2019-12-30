<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'FlyHigh')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/script.js')); ?>" defer></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>
<body>
<div class = "wrapper">
    <login-main>
        <form id = "login-form" action="<?php echo e(url('admin')); ?>" method="post"> <?php echo e(csrf_field()); ?>

            <div id = "login-form-header">
                <label id = "login-form-label">Prisijunkite</label>
            </div>
            <div id = "login-form-body">
                <?php if(Session::has('flash_message_error')): ?>
                    <div class="input-error">
                        <label class = "input-error-tip"><?php echo session('flash_message_error'); ?></label>
                    </div>
                <?php endif; ?>
                <div id = "login-inputs">
                    <div id = "login-block">
                        <input id = "login-username" name="username" type = "text" autocomplete="off" placeholder="Prisijungimo vardas">
                    </div>
                    <div id = "password-block">
                        <input id = "login-password" name="password" type = "password" autocomplete="off" placeholder="Slaptažodis">
                    </div>
                    <div id = "login-form-button">
                        <button id = "login-button" type="submit" value="Login">Prisijungti</button>
                    </div>
                </div>
            </div>
        </form>
    </login-main>
    <div class = "footer">
        FlyHigh © 2019
    </div>
</div>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/admin/admin_login.blade.php ENDPATH**/ ?>