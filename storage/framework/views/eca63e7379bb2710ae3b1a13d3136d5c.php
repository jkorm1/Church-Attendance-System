<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gradient mb-2">
                <i class="fas fa-user-plus mr-3"></i>First Timers & Follow-Up Department
            </h1>
            <p class="text-[#3a1d09] font-medium">Welcome and track new visitors to Charisword Gospel Ministry</p>
        </div>
        <a href="<?php echo e(route('first_timers.create')); ?>" class="btn-primary">
            <i class="fas fa-user-plus mr-2"></i>Register First Timer
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="stats-card">
            <div class="flex items-center justify-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-white text-xl"></i>
                </div>
            </div>
            <div class="stats-number"><?php echo e($total); ?></div>
            <div class="stats-label">Grand Total</div>
        </div>

        <div class="stats-card">
            <div class="flex items-center justify-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-home text-white text-xl"></i>
                </div>
            </div>
            <div class="stats-number"><?php echo e($stay); ?></div>
            <div class="stats-label">Total Stay</div>
        </div>

        <div class="stats-card">
            <div class="flex items-center justify-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-calendar-check text-white text-xl"></i>
                </div>
            </div>
            <div class="stats-number"><?php echo e($visit); ?></div>
            <div class="stats-label">Total Visit</div>
        </div>

        <div class="stats-card">
            <div class="flex items-center justify-center mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-chart-line text-white text-xl"></i>
                </div>
            </div>
            <div class="stats-number"><?php echo e($firstTimers->count()); ?></div>
            <div class="stats-label">Current View</div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="glass-card p-6">
        <h3 class="text-lg font-bold text-[#3a1d09] mb-4">
            <i class="fas fa-filter mr-2"></i>Filter Records
        </h3>
        <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <div class="form-group">
                <label for="service_id" class="form-label">Filter by Service</label>
                <select name="service_id" id="service_id" class="form-input">
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
            <div class="form-group">
                <label for="date" class="form-label">Or by Date</label>
                <input type="date" name="date" id="date" value="<?php echo e(request('date')); ?>" class="form-input">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                <a href="<?php echo e(route('first_timers.index')); ?>" class="btn-secondary">
                    <i class="fas fa-refresh mr-2"></i>Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Current Filter Info -->
    <?php if($service || $date): ?>
        <div class="glass-card p-6 bg-gradient-to-r from-blue-50 to-indigo-50">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-lg font-bold text-[#3a1d09] mb-2">Current Filter</h4>
                    <?php if($service): ?>
                        <p class="text-[#f58502] font-semibold">
                            <i class="fas fa-church mr-2"></i>
                            <?php echo e(is_array($service) ? $service['name'] : $service->name); ?>

                        </p>
                        <p class="text-sm text-gray-600">
                            <?php echo e(\Carbon\Carbon::parse(is_array($service) ? $service['service_date'] : $service->service_date)->format('D, d M Y')); ?>

                        </p>
                    <?php elseif($date): ?>
                        <p class="text-[#f58502] font-semibold">
                            <i class="fas fa-calendar mr-2"></i>
                            <?php echo e(\Carbon\Carbon::parse($date)->format('D, d M Y')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-[#f58502]"><?php echo e($firstTimers->count()); ?></div>
                    <div class="text-sm text-gray-600">Records Found</div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Success Message -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle mr-2"></i><?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- First Timers Table -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table-modern w-full">
                <thead>
                    <tr>
                        <th class="text-left">
                            <i class="fas fa-user mr-2"></i>Name
                        </th>
                        <th class="text-left">
                            <i class="fas fa-birthday-cake mr-2"></i>Date of Birth
                        </th>
                        <th class="text-left">
                            <i class="fas fa-phone mr-2"></i>Contact
                        </th>
                        <th class="text-left">
                            <i class="fas fa-map-marker-alt mr-2"></i>Residence
                        </th>
                        <th class="text-left">
                            <i class="fas fa-flag mr-2"></i>Purpose
                        </th>
                        <th class="text-left">
                            <i class="fas fa-church mr-2"></i>Service
                        </th>
                        <th class="text-left">
                            <i class="fas fa-user-friends mr-2"></i>Invited By
                        </th>
                        <th class="text-left">
                            <i class="fas fa-home mr-2"></i>Cell
                        </th>
                        <th class="text-left">
                            <i class="fas fa-layer-group mr-2"></i>Fold
                        </th>
                        <th class="text-left">
                            <i class="fas fa-calendar mr-2"></i>First Visit
                        </th>
                        <th class="text-left">
                            <i class="fas fa-cogs mr-2"></i>Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $firstTimers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-orange-50 transition-colors duration-200">
                        <td class="font-semibold text-[#3a1d09]">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-r from-[#f58502] to-[#ff9a2e] rounded-full flex items-center justify-center text-white text-sm font-bold mr-3">
                                    <?php echo e(strtoupper(substr($ft->name, 0, 1))); ?>

                                </div>
                                <?php echo e($ft->name); ?>

                            </div>
                        </td>
                        <td>
                            <span class="text-sm text-gray-600">
                                <?php echo e($ft->date_of_birth ? \Carbon\Carbon::parse($ft->date_of_birth)->format('M j, Y') : 'N/A'); ?>

                            </span>
                        </td>
                        <td>
                            <a href="tel:<?php echo e($ft->phone); ?>" class="text-[#f58502] hover:text-[#3a1d09] transition-colors">
                                <i class="fas fa-phone mr-1"></i><?php echo e($ft->phone); ?>

                            </a>
                        </td>
                        <td>
                            <span class="text-sm text-gray-600"><?php echo e($ft->residence ?? 'N/A'); ?></span>
                        </td>
                        <td>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo e($ft->purpose == 'stay' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'); ?>">
                                <i class="fas <?php echo e($ft->purpose == 'stay' ? 'fa-home' : 'fa-calendar-check'); ?> mr-1"></i>
                                <?php echo e(ucfirst($ft->purpose ?? 'visit')); ?>

                            </span>
                        </td>
                        <td>
                            <span class="text-sm text-gray-600"><?php echo e($ft->service_name); ?></span>
                        </td>
                        <td>
                            <?php if($ft->inviter): ?>
                                <div class="flex items-center">
                                    <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center text-white text-xs font-bold mr-2">
                                        <?php echo e(strtoupper(substr($ft->inviter->name, 0, 1))); ?>

                                    </div>
                                    <span class="text-sm"><?php echo e($ft->inviter->name); ?></span>
                                </div>
                            <?php else: ?>
                                <span class="text-gray-400 text-sm">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($ft->cell): ?>
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">
                                    <?php echo e($ft->cell->name); ?>

                                </span>
                            <?php else: ?>
                                <span class="text-gray-400 text-sm">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($ft->fold): ?>
                                <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-semibold">
                                    <?php echo e($ft->fold->name); ?>

                                </span>
                            <?php else: ?>
                                <span class="text-gray-400 text-sm">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="text-sm text-gray-600">
                                <?php echo e($ft->first_visit_date ? \Carbon\Carbon::parse($ft->first_visit_date)->format('M j, Y') : 'N/A'); ?>

                            </span>
                        </td>
                        <td>
                            <div class="flex items-center gap-2">
                                <form action="<?php echo e(route('first_timers.promote', $ft->id)); ?>" method="POST" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="text-green-600 hover:text-green-800 transition-colors" title="Promote to Member">
                                        <i class="fas fa-arrow-up"></i>
                                    </button>
                                </form>
                                <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('first_timers.destroy', $ft->id)); ?>" method="POST" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition-colors" title="Delete" onclick="return confirm('Are you sure you want to delete this first timer?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <?php if($firstTimers->hasPages()): ?>
        <div class="flex justify-center">
            <div class="glass-card p-4">
                <?php echo e($firstTimers->links()); ?>

            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/first_timers/index.blade.php ENDPATH**/ ?>