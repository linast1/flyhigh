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
        <form class = "update-form" method="post" action="<?php echo e(route('confirmFlightEdit', $selectedFlight -> getkey())); ?>"> <?php echo e(csrf_field()); ?>

            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <label class = "expanded-form-label">Skrydžio redegavimas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Oro linijos:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="airline_name" value="<?php echo e($selectedFlight->airline_name); ?>">
                                                <div class="expanded-selects">
                                                    <label class = "expanded-label">Iš:</label>
                                                    <select class = "expanded-select" name="fk_dep_airport">
                                                        <?php $__currentLoopData = $allPorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portsData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option class = "expanded-option" value="<?php echo e($portsData->getKey()); ?>" }} <?php echo e($portsData->getKey() == $selectedFlight->fk_dep_airport ? 'selected' : ''); ?>><?php echo e($portsData->code); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <label class = "expanded-label">Į:</label>
                                                    <select class = "expanded-select" name="fk_arr_airport">
                                                        <?php $__currentLoopData = $allPorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portsData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option class = "expanded-option" value="<?php echo e($portsData->getKey()); ?>" <?php echo e($portsData->getKey() == $selectedFlight->fk_arr_airport ? 'selected' : ''); ?>><?php echo e($portsData->code); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                </div>
                                                <div class="expaned-selects">
                                                    <label class = "expanded-label">Lėktuvas:</label>
                                                    <select id = "expanded-select-plane" name="fk_plane">
                                                        <?php $__currentLoopData = $allPlanes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planesData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option class = "expanded-option" value="<?php echo e($planesData->getKey()); ?>" <?php echo e($planesData->getKey() == $selectedFlight->fk_plane ? 'selected' : ''); ?>><?php echo e($planesData->id); ?>-<?php echo e($planesData->model); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                        <label class = "expanded-label">Išvyksta:</label>
                        <input id = "expanded-duration" type = "datetime-local" autocomplete="off" name="departure_time" value="<?php echo e(str_replace(" ", "T", $selectedFlight->departure_time)); ?>">
                        <label class = "expanded-label">Atvyksta:</label>
                        <input id = "expanded-duration" type = "datetime-local" autocomplete="off" name="arrival_time" value="<?php echo e(str_replace(" ", "T", $selectedFlight->arrival_time)); ?>">
                        <label class = "expanded-label">Vietų kiekis:</label>
                        <input id = "expanded-seats" type = "text" autocomplete="off" name="seats" value="<?php echo e($selectedFlight->seats); ?>">
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
<?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/admin/admin_flightEdit.blade.php ENDPATH**/ ?>