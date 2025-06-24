

<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Members</h1>
        <a href="<?php echo e(route('members.create')); ?>" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Add Member</a>
    </div>
    <?php if(session('success')): ?>
        <div class="mb-4 text-green-600"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Gender</th>
                    <th class="px-4 py-2 border">Phone</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">First Visit</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="px-4 py-2 border"><?php echo e($member->name); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($member->gender); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($member->phone); ?></td>
                    <td class="px-4 py-2 border"><?php echo e(ucfirst($member->status)); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($member->first_visit_date); ?></td>
                    <td class="px-4 py-2 border">
                        <a href="<?php echo e(route('members.edit', $member)); ?>" class="text-blue-600 hover:underline">Edit</a>
                        <form action="<?php echo e(route('members.destroy', $member)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Delete this member?')">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($members->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/members/index.blade.php ENDPATH**/ ?>