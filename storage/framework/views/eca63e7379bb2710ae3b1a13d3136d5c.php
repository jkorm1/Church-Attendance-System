<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-6 max-w-7xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">First Timers &amp; Follow-Up Department</h1>
        <a href="<?php echo e(route('first_timers.create')); ?>" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Register First Timer</a>
    </div>

    
    <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">
        <div>
            <label for="service_id" class="block text-sm font-medium text-gray-700">Filter by Service</label>
            <select name="service_id" id="service_id" class="mt-1 block w-56 border-gray-300 rounded shadow-sm">
                <option value="">-- All Services --</option>
                <?php
                    $serviceGenerator = app(\App\Services\ServiceGeneratorService::class);
                    $autoServices = collect($serviceGenerator->getAllServices(7));
                    $manualServices = \App\Models\Service::orderBy('service_date', 'desc')->get();
                    $allServices = $autoServices->merge($manualServices)->sortBy('service_date');
                ?>
                <?php $__currentLoopData = $allServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($service['id'] ?? $service->id); ?>" <?php if(request('service_id') == ($service['id'] ?? $service->id)): ?> selected <?php endif; ?>>
                        <?php echo e($service['name'] ?? $service->name); ?> (<?php echo e(\Carbon\Carbon::parse($service['service_date'] ?? $service->service_date)->format('D, d M Y')); ?>)
                        <?php if(isset($service['is_auto_generated']) && $service['is_auto_generated']): ?>
                            (Auto)
                        <?php endif; ?>
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700">Or by Date</label>
            <input type="date" name="date" id="date" value="<?php echo e(request('date')); ?>" class="mt-1 block w-48 border-gray-300 rounded shadow-sm">
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Filter</button>
            <a href="<?php echo e(route('first_timers.index')); ?>" class="ml-2 text-sm text-gray-600 underline">Reset</a>
        </div>
    </form>

    
    <div class="mb-6 p-4 bg-gray-50 rounded shadow">
        <div class="flex flex-wrap gap-8 items-center">
            <div>
                <div class="text-lg font-bold">Grand Total = <?php echo e($total); ?></div>
                <div class="text-green-700 font-semibold">Total Stay - <?php echo e($stay); ?></div>
                <div class="text-blue-700 font-semibold">Total Visit - <?php echo e($visit); ?></div>
            </div>
            <?php if($service): ?>
                <div>
                    <div class="font-semibold">For: <?php echo e(is_array($service) ? $service['name'] : $service->name); ?></div>
                    <div class="text-sm text-gray-600"><?php echo e(\Carbon\Carbon::parse(is_array($service) ? $service['service_date'] : $service->service_date)->format('D, d M Y')); ?></div>
                </div>
            <?php elseif($date): ?>
                <div>
                    <div class="font-semibold">For: <?php echo e(\Carbon\Carbon::parse($date)->format('D, d M Y')); ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Date of Birth</th>
                    <th class="px-4 py-2 border">Contact</th>
                    <th class="px-4 py-2 border">Residence</th>
                    <th class="px-4 py-2 border">Purpose</th>
                    <th class="px-4 py-2 border">Service</th>
                    <th class="px-4 py-2 border">Invited By</th>
                    <th class="px-4 py-2 border">Cell</th>
                    <th class="px-4 py-2 border">Fold</th>
                    <th class="px-4 py-2 border">First Visit</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $firstTimers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="px-4 py-2 border"><?php echo e($ft->name); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($ft->date_of_birth ?? 'N/A'); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($ft->phone); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($ft->residence ?? 'N/A'); ?></td>
                    <td class="px-4 py-2 border">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo e($ft->purpose == 'stay' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'); ?>">
                            <?php echo e(ucfirst($ft->purpose ?? 'visit')); ?>

                        </span>
                    </td>
                    <td class="px-4 py-2 border"><?php echo e($ft->service_name); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($ft->inviter->name ?? 'N/A'); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($ft->cell->name ?? 'N/A'); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($ft->fold->name ?? 'N/A'); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($ft->first_visit_date); ?></td>
                    <td class="px-4 py-2 border">
                        <form action="<?php echo e(route('first_timers.promote', $ft->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mb-2">Promote to Member</button>
                        </form>
                        <form action="<?php echo e(route('first_timers.destroy', $ft->id)); ?>" method="POST" onsubmit="return confirm('Delete this first timer?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/first_timers/index.blade.php ENDPATH**/ ?>