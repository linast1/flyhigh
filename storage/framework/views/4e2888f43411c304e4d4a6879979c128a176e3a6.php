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
<?php $__env->startSection('airports'); ?>
    <li class="nav-item">
        <a href="<?php echo e(url('admin/airports')); ?>">Oro uostai</a>
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
        <label class =  "search-label"> VISI LĖKTUVAI </label>
        <table id = "flights-table">
            <thead>
            <tr>
                <th>Modelis</th>
                <th>Kapitonas</th>
                <th>Antrasis pilotas</th>
                <th>Pagaminimo data</th>
                <th id="update-hrow">Keisti?</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $allPlanes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planesData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($planesData -> model); ?></td>
                    <td><?php echo e($planesData -> captain); ?></td>
                    <td><?php echo e($planesData -> copilot); ?></td>
                    <td><?php echo e($planesData -> make_date); ?>

                    <td id="update-row"><a class = "update-button"  href="<?php echo e(route('planeEdit', $planesData -> getKey())); ?>">Keisti</a><a class = "actual-delete-button" onclick="javascript:return confirm('Do you really want to delete this?')" href="<?php echo e(route('deletePlane',$planesData->getKey())); ?>">Trinti</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class = "pages">
            <?php echo e($allPlanes->links("pagination::bootstrap-4")); ?>

        </div>
        <div class= "crud-button-block">
            <button class = "add-button" type="button">Pildyti</button>
            <button class = "delete-button" type="button">Trinti</button>
            <button class = "change-button" type="button">Keisti</button>
        </div>
        <form class = "expanded-form-insert" method="post" action="<?php echo e(url('/admin/planes/insertPlane')); ?>"> <?php echo e(csrf_field()); ?>

            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <span class = "expanded-close">&times</span>
                    <label class = "expanded-form-label">Naujas lėktuvas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Modelis:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="model">
                        <label class = "expanded-label">Kapitonas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="captain">
                        <label class = "expanded-label">Antrasis pilotas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="copilot">
                        <label class = "expanded-label">Pagaminimo data:</label>
                        <input id = "expanded-duration" type = "date" autocomplete="off" name="make_date">
                        <div class = "expanded-form-button">
                            <button class = "expanded-button" type="submit">Patvirtinti</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/admin/admin_planes.blade.php ENDPATH**/ ?>