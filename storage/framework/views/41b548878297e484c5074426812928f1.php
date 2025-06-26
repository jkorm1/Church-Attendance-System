

<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-6 max-w-4xl">
    <h1 class="text-2xl font-bold mb-4">Member: <?php echo e($member->name); ?></h1>
    <div class="mb-4">
        <strong>Cell:</strong> <?php echo e($member->cell->name ?? 'N/A'); ?><br>
        <strong>Fold:</strong> <?php echo e($member->fold->name ?? 'N/A'); ?>

    </div>
    <div class="bg-white rounded shadow p-4">
        <h2 class="text-lg font-semibold mb-2">Analytics (Coming Soon)</h2>
        <p>Attendance, invitations, conversions, and more will be shown here.</p>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/dashboard/member_detail.blade.php ENDPATH**/ ?>