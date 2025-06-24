<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Church Services</h1>
        <a href="<?php echo e(route('dashboard')); ?>" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Back to Dashboard
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <?php if($allServices->isEmpty()): ?>
            <p class="text-gray-500 text-center py-8">No services found.</p>
        <?php else: ?>
            <!-- Today's Services -->
            <?php
                $today = \Carbon\Carbon::now()->format('Y-m-d');
                $todayServices = $allServices->filter(function($service) use ($today) {
                    $serviceDate = is_array($service) ? $service['service_date'] : $service->service_date;
                    return $serviceDate === $today;
                });
                $upcomingServices = $allServices->filter(function($service) use ($today) {
                    $serviceDate = is_array($service) ? $service['service_date'] : $service->service_date;
                    return $serviceDate !== $today;
                });
            ?>

            <?php if($todayServices->count() > 0): ?>
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-green-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Today's Services
                    </h2>
                    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <?php $__currentLoopData = $todayServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border border-green-200 rounded-lg p-4 bg-green-50">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="font-semibold text-green-800"><?php echo e(is_array($service) ? $service['name'] : $service->name); ?></h3>
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Today</span>
                                </div>
                                <p class="text-sm text-green-600 mb-3">
                                    <?php echo e(is_array($service) ? $service['service_date'] : $service->service_date); ?>

                                </p>
                                <a href="<?php echo e(route('attendance.index', is_array($service) ? $service['id'] : $service->id)); ?>" 
                                   class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-center block">
                                    Take Attendance
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Upcoming Services -->
            <?php if($upcomingServices->count() > 0): ?>
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-blue-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                        Upcoming Services
                    </h2>
                    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <?php $__currentLoopData = $upcomingServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border border-blue-200 rounded-lg p-4 bg-blue-50">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="font-semibold text-blue-800"><?php echo e(is_array($service) ? $service['name'] : $service->name); ?></h3>
                                    <?php if(is_array($service) && isset($service['is_auto_generated']) && $service['is_auto_generated']): ?>
                                        <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">Auto</span>
                                    <?php endif; ?>
                                </div>
                                <p class="text-sm text-blue-600 mb-3">
                                    <?php echo e(is_array($service) ? $service['service_date'] : $service->service_date); ?>

                                </p>
                                <a href="<?php echo e(route('attendance.index', is_array($service) ? $service['id'] : $service->id)); ?>" 
                                   class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-center block">
                                    Take Attendance
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Custom Services (if any) -->
            <?php
                $customServices = $allServices->filter(function($service) {
                    return !(is_array($service) ? ($service['is_auto_generated'] ?? false) : ($service->is_auto_generated ?? false));
                });
            ?>

            <?php if($customServices->count() > 0): ?>
                <div>
                    <h2 class="text-xl font-semibold text-purple-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path>
                        </svg>
                        Custom Services
                    </h2>
                    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <?php $__currentLoopData = $customServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border border-purple-200 rounded-lg p-4 bg-purple-50">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="font-semibold text-purple-800"><?php echo e(is_array($service) ? $service['name'] : $service->name); ?></h3>
                                    <span class="px-2 py-1 text-xs bg-purple-100 text-purple-800 rounded-full">Custom</span>
                                </div>
                                <p class="text-sm text-purple-600 mb-3">
                                    <?php echo e(is_array($service) ? $service['service_date'] : $service->service_date); ?>

                                </p>
                                <a href="<?php echo e(route('attendance.index', is_array($service) ? $service['id'] : $service->id)); ?>" 
                                   class="w-full bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded text-center block">
                                    Take Attendance
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/attendance/services.blade.php ENDPATH**/ ?>