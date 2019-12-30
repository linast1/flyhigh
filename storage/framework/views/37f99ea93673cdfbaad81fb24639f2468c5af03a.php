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
        <div class = "header">
            <a href="<?php echo e(url('home')); ?>">
                <div class = "header-logo">
                    <img src="<?php echo e(asset('images/SiteLogo.png')); ?>">
                </div>
            </a>
            <div class = "top-navigation">
                <ul class = "navigation-items">
                    <?php echo $__env->yieldContent('homeBtn'); ?>
                    <?php echo $__env->yieldContent('ticketBtn'); ?>
                    <?php echo $__env->yieldContent('flightsBtn'); ?>
                    <?php echo $__env->yieldContent('flights'); ?>
                    <?php echo $__env->yieldContent('tickets'); ?>
                    <?php echo $__env->yieldContent('airports'); ?>
                    <?php echo $__env->yieldContent('planes'); ?>
                    <?php echo $__env->yieldContent('logout'); ?>
                    <?php echo $__env->yieldContent('other'); ?>
                </ul>
            </div>
        </div>
        <main>
            <?php echo $__env->yieldContent('home'); ?>
            <?php echo $__env->yieldContent('table'); ?>
            <?php echo $__env->yieldContent('search'); ?>
        </main>
        <div class = "footer">
            FlyHigh © 2019
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/layouts/app.blade.php ENDPATH**/ ?>