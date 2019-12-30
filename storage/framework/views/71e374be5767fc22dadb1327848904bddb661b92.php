<?php $__env->startSection('flights'); ?>
    <li class="nav-item">
        <a href="<?php echo e(url('admin/flights')); ?>">Skrydžiai</a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('tickets'); ?>
    <li class="nav-item">
        <a href="<?php echo e(url('admin/tickets')); ?>">Bilietai</a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('planes'); ?>
    <li class="nav-item">
        <a href="<?php echo e(url('admin/planes')); ?>">Lėktuvai</a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('logout'); ?>
    <li class="nav-item">
        <a href="<?php echo e(url('/logout')); ?>">Atsijungti</a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('messages'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('table'); ?>
    <div id = "flights-block">
        <?php if(\Session::has('success')): ?>
            <div class="alert alert-success">
                <p><?php echo \Session::get('success'); ?></p>
            </div>
        <?php endif; ?>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <label class =  "search-label"> VISI ORO UOSTAI </label>
        <table id = "flights-table">
            <thead>
            <tr>
                <th>Kodas</th>
                <th>Miestas</th>
                <th>Šalis</th>
                <th id="update-hrow">Keisti?</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $allPorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portsData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($portsData -> code); ?></td>
                    <td><?php echo e($portsData -> city); ?></td>
                    <td><?php echo e($portsData -> country); ?></td>
                    <td id="update-row"><a class = "update-button"  href="<?php echo e(route('airportEdit', $portsData -> getKey())); ?>">Keisti</a><a class = "actual-delete-button" onclick="javascript:return confirm('Do you really want to delete this?')" href="<?php echo e(route('deleteAirport',$portsData->getKey())); ?>">Trinti</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class = "pages">
            <?php echo e($allPorts->links("pagination::bootstrap-4")); ?>

        </div>
        <div class= "crud-button-block">
            <button class = "add-button" type="button">Pildyti</button>
            <button class = "delete-button" type="button">Trinti</button>
            <button class = "change-button" type="button">Keisti</button>
        </div>
        <form class = "expanded-form-insert" method="post" action="<?php echo e(url('/admin/airports/insertAirport')); ?>"> <?php echo e(csrf_field()); ?>

            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <span class = "expanded-close">&times</span>
                    <label class = "expanded-form-label">Naujas oro uostas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Kodas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="code">
                        <label class = "expanded-label">Miestas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="city">
                        <label class = "expanded-label">Šalis:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="country">
                        <div class = "expanded-form-button">
                            <button class = "expanded-button" type="submit">Patvirtinti</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/admin/admin_airports.blade.php ENDPATH**/ ?>