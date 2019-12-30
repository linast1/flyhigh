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
                <p>Jūsų įvedamuose duomenyse yra klaidų:</p>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form class = "update-form" method="post" action="<?php echo e(route('confirmTicketEdit', $selectedTicket -> getkey())); ?>"> <?php echo e(csrf_field()); ?>

            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <label class = "expanded-form-label">Bilieto redegavimas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Savininko vardas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_name" value="<?php echo e($selectedTicket->owner_name); ?>">
                        <label class = "expanded-label">Savininko pavardė:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_surname" value="<?php echo e($selectedTicket->owner_surname); ?>">
                        <label class = "expanded-label">Savininko el. paštas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_email" value="<?php echo e($selectedTicket->owner_email); ?>">
                        <label class = "expanded-label">Vietos nr:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="seat_number" value="<?php echo e($selectedTicket->seat_number); ?>">
                        <div class="expanded-selects">
                            <label class = "expanded-label">Papildomas bagažas?:</label>
                            <select class = "expanded-select" name="extra_baggage">
                                <option class = "expanded-option" value="1" <?php echo e($selectedTicket->extra_baggage == 1 ? 'selected' : ''); ?>>Taip</option>
                                <option class = "expanded-option" value="0" <?php echo e($selectedTicket->extra_baggage == 0 ? 'selected' : ''); ?>>Ne</option>
                            </select>
                        </div>
                        <div class="expanded-selects">
                            <label class = "expanded-label">Skrydžio id:</label>
                            <select id = "expanded-select-flight" name="fk_flight">
                                <?php $__currentLoopData = $allFlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flightsData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class = "expanded-option" value="<?php echo e($flightsData->getKey()); ?>" <?php echo e($flightsData->getKey() == $selectedTicket->fk_flight ? 'selected' : ''); ?>><?php echo e($flightsData->id); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
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
<?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/admin/admin_ticketsEdit.blade.php ENDPATH**/ ?>