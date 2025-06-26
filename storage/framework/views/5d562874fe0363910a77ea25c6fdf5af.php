

<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-6 max-w-5xl">
    <h1 class="text-2xl font-bold mb-4">Members Overview</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Cell</th>
                    <th class="px-4 py-2 border">Fold</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="px-4 py-2 border"><?php echo e($member->name); ?> <a href="<?php echo e(route('dashboard.members.detail', $member->id)); ?>" class="text-blue-600 hover:underline text-xs ml-2">View Analytics</a></td>
                    <td class="px-4 py-2 border"><?php echo e($member->cell->name ?? 'N/A'); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($member->fold->name ?? 'N/A'); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/dashboard/members.blade.php ENDPATH**/ ?>