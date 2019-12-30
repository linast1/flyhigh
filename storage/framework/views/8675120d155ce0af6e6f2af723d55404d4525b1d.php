<?php $__env->startSection('homeBtn'); ?>
    <li class="nav-item">
        <a href="<?php echo e(url('home')); ?>">Pirkti bilietą</a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('ticketBtn'); ?>
    <li class="nav-item">
        <a href="<?php echo e(url('ticket')); ?>">Mano bilietas</a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('other'); ?>
    <li class="nav-item">
        <a>D.U.K</a>
    </li>
    <li class="nav-item">
        <a>Apie mus</a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('table'); ?>
    <div id = "flights-block">
        <label class =  "search-label"> VISI SKRYDŽIAI </label>
        <table id = "flights-table">
            <thead>
            <tr>
                <th>Skrydžio nr.</th>
                <th>Oro linijos</th>
                <th>Iš</th>
                <th>Į</th>
                <th>Trukmė</th>
                <th>Vietų kiekis</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $allFlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flightsData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($flightsData -> id); ?></td>
                    <td><?php echo e($flightsData -> airline_name); ?></td>
                    <td><?php echo e($flightsData -> fk_dep_airport); ?></td>
                    <td><?php echo e($flightsData -> fk_arr_airport); ?></td>
                    <td><?php echo e($flightsData -> duration); ?></td>
                    <td><?php echo e($flightsData -> seats); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class = "pages">
            <?php echo e($allFlights->links("pagination::bootstrap-4")); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/flights.blade.php ENDPATH**/ ?>