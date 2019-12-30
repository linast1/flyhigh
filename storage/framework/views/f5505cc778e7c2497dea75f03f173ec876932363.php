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
        <label class =  "search-label"> VISI SKRYDŽIAI </label>
        <table id = "flights-table">
            <thead>
            <tr>
                <th>Skrydžio nr.</th>
                <th>Oro linijos</th>
                <th>Iš</th>
                <th>Į</th>
                <th>Išvyksta</th>
                <th>Atvyksta</th>
                <th>Trukmė</th>
                <th>Vietų kiekis</th>
                <th>Lėktuvo id</th>
                <th id="update-hrow">Keisti?</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $allFlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flightsData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($flightsData -> id); ?></td>
                    <td><?php echo e($flightsData -> airline_name); ?></td>
                    <td><?php echo e($flightsData -> fk_dep_airport); ?></td>
                    <td><?php echo e($flightsData -> fk_arr_airport); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($flightsData->departure_time)->format('Y-m-d H:i')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($flightsData->arrival_time)->format('Y-m-d H:i')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($flightsData->duration)->format('H:i')); ?></td>
                    <td><?php echo e($flightsData -> seats); ?></td>
                    <td><?php echo e($flightsData -> fk_plane); ?></td>
                    <td id="update-row"><a class = "update-button"  href="<?php echo e(route('flightEdit', $flightsData -> getKey())); ?>">Keisti</a><a class = "actual-delete-button" onclick="javascript:return confirm('Do you really want to delete this?')" href="<?php echo e(route('deleteFlight',$flightsData->getKey())); ?>">Trinti</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class = "pages">
            <?php echo e($allFlights->links("pagination::bootstrap-4")); ?>

        </div>
        <div class= "crud-button-block">
            <button class = "add-button" type="button">Pildyti</button>
            <button class = "delete-button" type="button">Trinti</button>
            <button class = "change-button" type="button">Keisti</button>
        </div>
        <form class = "expanded-form-insert" method="post" action="<?php echo e(url('/admin/dashboard/insertFlight')); ?>"> <?php echo e(csrf_field()); ?>

            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <span class = "expanded-close">&times</span>
                    <label class = "expanded-form-label">Naujas skrydis</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Oro linijos:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="firm">
                        <div class="expanded-selects">
                            <label class = "expanded-label">Iš:</label>
                            <select class = "expanded-select" name="from">
                                <?php $__currentLoopData = $allPorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portsData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class = "expanded-option" value="<?php echo e($portsData->getKey()); ?>"><?php echo e($portsData->code); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label class = "expanded-label">Į:</label>
                            <select class = "expanded-select" name="to">
                                <?php $__currentLoopData = $allPorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portsData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class = "expanded-option" value="<?php echo e($portsData->getKey()); ?>"><?php echo e($portsData->code); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>
                        <div class="expaned-selects">
                            <label class = "expanded-label">Lėktuvas:</label>
                            <select id = "expanded-select-plane" name="plane">
                                <?php $__currentLoopData = $allPlanes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planesData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class = "expanded-option" value="<?php echo e($planesData->getKey()); ?>"><?php echo e($planesData->id); ?>-<?php echo e($planesData->model); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <label class = "expanded-label">Išvyksta:</label>
                        <input id = "expanded-duration" type = "datetime-local" autocomplete="off" name="departure">
                        <label class = "expanded-label">Atvyksta:</label>
                        <input id = "expanded-duration" type = "datetime-local" autocomplete="off" name="arrival">
                        <label class = "expanded-label">Vietų kiekis:</label>
                        <input id = "expanded-seats" type = "text" autocomplete="off" name="seats">
                        <div class = "expanded-form-button">
                            <button class = "expanded-button" type="submit">Patvirtinti</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/admin/admin_dashboard.blade.php ENDPATH**/ ?>