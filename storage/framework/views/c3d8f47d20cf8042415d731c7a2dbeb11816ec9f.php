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
        <form class = "update-form">
            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <label class = "expanded-form-label">Jūsų bilietas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <div class = "search-labels">
                            <label class = "expanded-label">Savininko vardas:</label>
                            <label class = "expanded-label" name="owner_name"><?php echo e($myTicket->owner_name); ?></label>
                        </div>
                        <div class = "search-labels">
                            <label class = "expanded-label">Savininko pavardė:</label>
                            <label class = "expanded-label" name="owner_surname"><?php echo e($myTicket->owner_surname); ?></label>
                        </div>
                        <div class = "search-labels">
                            <label class = "expanded-label">Savininko el. paštas:</label>
                            <label class = "expanded-label" name="owner_email"><?php echo e($myTicket->owner_email); ?></label>
                        </div>
                        <div class = "search-labels">
                            <label class = "expanded-label">Vietos nr:</label>
                            <label class = "expanded-label" name="seat_number"><?php echo e($myTicket->seat_number); ?></label>
                        </div>
                        <div class = "search-labels">
                            <label class = "expanded-label">Papildomas bagažas?:</label>
                            <label class = "expanded-label" ><?php echo e($myTicket->extra_baggage == 1 ? 'Taip' : 'Ne'); ?></label>
                        </div>
                        <div class = "search-labels">
                            <label class = "expanded-label">Skrydžio id:</label>
                            <label class = "expanded-label" name="fk_flight"><?php echo e($myTicket->fk_flight); ?></label>
                        </div>

                        <div class = "expanded-form-button">
                            <a class = "return-button"  href="<?php echo e(url('/ticket')); ?>">Grįžti</a>
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
<?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/myTicket.blade.php ENDPATH**/ ?>