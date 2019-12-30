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
        <?php if(\Session::has('success')): ?>
            <div class="alert alert-success">
                <p><?php echo \Session::get('success'); ?></p>
            </div>
        <?php endif; ?>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <p>jūsų įvedamuose duomenyse yra klaidu:</p>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form class = "update-form" method="post" action="<?php echo e(route('confirmAirportEdit', $selectedAirport -> getkey())); ?>"> <?php echo e(csrf_field()); ?>

            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <label class = "expanded-form-label">Oro uosto redegavimas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Kodas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="code" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo e($selectedAirport->code); ?>">
                        <label class = "expanded-label">Miestas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="city" value="<?php echo e($selectedAirport->city); ?>">
                        <label class = "expanded-label">Šalis:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="country" value="<?php echo e($selectedAirport->country); ?>">
                        <div class = "expanded-form-button">
                            <button class = "expanded-button" type="submit">Patvirtinti</button>
                        </div>
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
<?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/admin/admin_airportEdit.blade.php ENDPATH**/ ?>