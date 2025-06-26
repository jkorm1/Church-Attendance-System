

<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-6 max-w-4xl">
    <h1 class="text-2xl font-bold mb-4">Cell: <?php echo e($cell->name); ?></h1>
    <div class="mb-4">
        <strong>Folds:</strong>
        <ul class="list-disc ml-6">
            <?php $__currentLoopData = $cell->folds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($fold->name); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="bg-white rounded shadow p-4">
        <h2 class="text-lg font-semibold mb-2">Analytics (Coming Soon)</h2>
        <p>Attendance, first timers, conversions, productivity, and more will be shown here.</p>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/dashboard/cell_detail.blade.php ENDPATH**/ ?>