

<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-6 max-w-5xl">
    <h1 class="text-2xl font-bold mb-4">Cells Overview</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php $__currentLoopData = $cells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white rounded shadow p-4">
            <h2 class="text-lg font-semibold mb-2"><?php echo e($cell->name); ?></h2>
            <a href="<?php echo e(route('dashboard.cells.detail', $cell->id)); ?>" class="text-blue-600 hover:underline text-sm mb-2 inline-block">View Analytics</a>
            <div class="text-sm text-gray-600 mb-2">Folds:</div>
            <ul class="list-disc ml-6">
                <?php $__currentLoopData = $cell->folds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($fold->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/dashboard/cells.blade.php ENDPATH**/ ?>