<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-6 font-montserrat">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-[#3a1d09]">Members</h1>
        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('Add Member')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
    </div>
    <?php if(session('success')): ?>
        <div class="mb-4 text-green-600"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-[#3a1d09] rounded-lg shadow">
            <thead class="bg-[#f58502]">
                <tr>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Name</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Gender</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Phone</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Status</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Cell</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Fold</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">First Visit</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Leader Role</th>
                    <th class="px-4 py-2 border text-[#3a1d09] font-bold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-orange-100">
                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="px-4 py-2 border"><?php echo e($member->name); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($member->gender); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($member->phone); ?></td>
                    <td class="px-4 py-2 border"><?php echo e(ucfirst($member->status)); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($member->cell->name ?? 'N/A'); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($member->fold->name ?? 'N/A'); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($member->first_visit_date); ?></td>
                    <td class="px-4 py-2 border">
                        <?php
                            $roles = [];
                            if ($member->ledCell) $roles[] = 'Cell Leader';
                            if ($member->assistantLedCell) $roles[] = 'Assistant Cell Leader';
                            if ($member->ledFold) $roles[] = 'Fold Leader';
                            if ($member->assistantLedFold) $roles[] = 'Assistant Fold Leader';
                        ?>
                        <?php if(count($roles)): ?>
                            <span class="text-green-700 font-semibold"><?php echo e(implode(', ', $roles)); ?></span>
                        <?php else: ?>
                            <span class="text-gray-400">-</span>
                        <?php endif; ?>
                    </td>
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