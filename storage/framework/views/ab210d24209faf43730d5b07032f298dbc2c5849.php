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
        <form class = "update-form" method="post" action="<?php echo e(route('confirmPlaneEdit', $selectedPlane -> getkey())); ?>"> <?php echo e(csrf_field()); ?>

            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <label class = "expanded-form-label">Lėktuvo redegavimas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Modelis:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="model" value="<?php echo e($selectedPlane->model); ?>">
                        <label class = "expanded-label">Kapitonas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="captain" value="<?php echo e($selectedPlane->captain); ?>">
                        <label class = "expanded-label">Antrasis pilotas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="copilot" value="<?php echo e($selectedPlane->copilot); ?>">
                        <label class = "expanded-label">Pagaminimo data:</label>
                        <input id = "expanded-duration" type = "date" autocomplete="off" name="make_date" value="<?php echo e(str_replace(" ", "T", $selectedPlane->make_date)); ?>">
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
<?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/admin/admin_planeEdit.blade.php ENDPATH**/ ?>