<?php $__env->startSection('homeBtn'); ?>
    <li class="nav-item">
        <a href="<?php echo e(url('home')); ?>">Pirkti bilietą</a>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('flightsBtn'); ?>
    <li class="nav-item">
        <a href="<?php echo e(url('flights')); ?>">Skrydžiai</a>
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
<?php $__env->startSection('search'); ?>
    <div id = "ticket-search-block">
        <?php if(\Session::has('success')): ?>
            <div class="alert alert-success">
                <p><?php echo \Session::get('success'); ?></p>
            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <p style="text-align:center"><?php echo e($errors->first()); ?></p>
            </div>
        <?php endif; ?>
        <label class =  "search-label">BILIETO PAIEŠKA</label>
        <form method="get" class = "ticket-form" action="<?php echo e(url('myTicket')); ?>">
            <div class = "ticket-form-block">
                <div class = "input-container">
                    <label class = "search-top">Įveskite savo bilieto kodą:</label>
                    <input id = "search-ticket" type = "text" autocomplete="off" name="code">
                </div>
            </div>
            <div class= "ticket-form-block">
                <button id = "search-ticket-button" type="submit">Ieškoti</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Bilietai2\resources\views/ticket.blade.php ENDPATH**/ ?>