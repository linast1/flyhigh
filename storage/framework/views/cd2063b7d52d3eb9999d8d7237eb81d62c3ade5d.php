<?php $__env->startSection('flights'); ?>
    <li class="nav-item">
        <a href="<?php echo e(url('admin/flights')); ?>">Skrydžiai</a>
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
        <label class =  "search-label"> VISI BILIETAI </label>
        <table id = "flights-table">
            <thead>
            <tr>
                <th>Kodas</th>
                <th>Savininko vardas</th>
                <th>Savninko pavardė</th>
                <th>Savininko el. paštas</th>
                <th>Vietos numeris</th>
                <th>Papildomas bagažas?</th>
                <th>Skrydžio nr.</th>
                <th id="update-hrow">Keisti?</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $allTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketsData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($ticketsData -> code); ?></td>
                    <td><?php echo e($ticketsData -> owner_name); ?></td>
                    <td><?php echo e($ticketsData -> owner_surname); ?></td>
                    <td><?php echo e($ticketsData -> owner_email); ?></td>
                    <td><?php echo e($ticketsData -> seat_number); ?></td>
                    <td><?php if( ($ticketsData -> extra_baggage) == '1'): ?> Taip <?php else: ?> Nėra <?php endif; ?></td>
                    <td><?php echo e($ticketsData -> fk_flight); ?></td>
                    <td id="update-row"><a class = "update-button"  href="<?php echo e(route('ticketEdit', $ticketsData -> getKey())); ?>">Keisti</a><a class = "actual-delete-button" onclick="javascript:return confirm('Do you really want to delete this?')" href="<?php echo e(route('deleteTicket',$ticketsData->getKey())); ?>">Trinti</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class = "pages">
            <?php echo e($allTickets->links("pagination::bootstrap-4")); ?>

        </div>
        <div class= "crud-button-block">
            <button class = "add-button" type="button">Pildyti</button>
            <button class = "delete-button" type="button">Trinti</button>
            <button class = "change-button" type="button">Keisti</button>
        </div>
        <form class = "expanded-form-insert" method="post" action="<?php echo e(url('/admin/tickets/insertTicket')); ?>"> <?php echo e(csrf_field()); ?>

            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <span class = "expanded-close">&times</span>
                    <label class = "expanded-form-label">Naujas bilietas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Savininko vardas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_name" value="<?php echo e(old('owner_name')); ?>">
                        <label class = "expanded-label">Savininko pavardė:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_surname" value="<?php echo e(old('owner_surname')); ?>">
                        <label class = "expanded-label">Savininko el. paštas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_email" value="<?php echo e(old('owner_email')); ?>">
                        <label class = "expanded-label">Vietos nr:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="seat_number" value="<?php echo e(old('seat_number')); ?>">
                        <div class="expanded-selects">
                            <label class = "expanded-label">Papildomas bagažas?:</label>
                            <select class = "expanded-select" name="extra_baggage">
                                    <option class = "expanded-option" value="1" <?php echo e(old('extra_baggage') == 1 ? 'selected' : ''); ?>>Taip</option>
                                    <option class = "expanded-option" value="0" <?php echo e(old('extra_baggage') == 0 ? 'selected' : ''); ?>>Ne</option>
                            </select>
                        </div>
                        <div class="expanded-selects">
                            <label class = "expanded-label">Skrydžio id:</label>
                            <select id = "expanded-select-flight" name="fk_flight">
                                <?php $__currentLoopData = $allFlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flightsData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class = "expanded-option" value="<?php echo e($flightsData->getKey()); ?>" <?php echo e(old('fk_flight') == $flightsData->getKey() ? 'selected' : ''); ?>><?php echo e($flightsData->id); ?></option>
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
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/admin/admin_tickets.blade.php ENDPATH**/ ?>