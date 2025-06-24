

<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-6 max-w-lg">
    <h1 class="text-2xl font-bold mb-4">Add Member</h1>
    <?php
        $user = Auth::user();
        $isAdmin = $user && $user->isAdmin();
        $cells = \App\Models\Cell::orderBy('name')->get();
        $folds = \App\Models\Fold::orderBy('name')->get();
    ?>
    <form action="<?php echo e(route('members.store')); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>
        <div>
            <label class="block font-medium">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-medium">Gender</label>
            <select name="gender" class="w-full border rounded px-3 py-2">
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div>
            <label class="block font-medium">Phone</label>
            <input type="text" name="phone" class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block font-medium">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="first_timer">First Timer</option>
                <option value="associate">Associate</option>
                <option value="member">Member</option>
            </select>
        </div>
        <div>
            <label class="block font-medium">Invited By (Member ID)</label>
            <input type="number" name="invited_by" class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block font-medium">First Visit Date</label>
            <input type="date" name="first_visit_date" class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block font-medium">Notes</label>
            <textarea name="notes" class="w-full border rounded px-3 py-2"></textarea>
        </div>
        <?php if($isAdmin): ?>
            <div>
                <label class="block font-medium">Assign as Cell Leader</label>
                <select name="cell_leader_of" class="w-full border rounded px-3 py-2">
                    <option value="">None</option>
                    <?php $__currentLoopData = $cells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cell->id); ?>"><?php echo e($cell->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label class="block font-medium">Assign as Assistant Cell Leader</label>
                <select name="assistant_cell_leader_of" class="w-full border rounded px-3 py-2">
                    <option value="">None</option>
                    <?php $__currentLoopData = $cells; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cell->id); ?>"><?php echo e($cell->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label class="block font-medium">Assign as Fold Leader</label>
                <select name="fold_leader_of" class="w-full border rounded px-3 py-2">
                    <option value="">None</option>
                    <?php $__currentLoopData = $folds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($fold->id); ?>"><?php echo e($fold->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label class="block font-medium">Assign as Assistant Fold Leader</label>
                <select name="assistant_fold_leader_of" class="w-full border rounded px-3 py-2">
                    <option value="">None</option>
                    <?php $__currentLoopData = $folds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($fold->id); ?>"><?php echo e($fold->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        <?php endif; ?>
        <div class="flex justify-between">
            <a href="<?php echo e(route('members.index')); ?>" class="text-gray-600">Cancel</a>
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Save</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/members/create.blade.php ENDPATH**/ ?>