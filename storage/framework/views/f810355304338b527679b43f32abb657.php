<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Services')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold mb-6">Available Services</h3>
                    <?php if(session('success')): ?>
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="space-y-4">
                        <?php $__empty_1 = true; $__currentLoopData = $allServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50">
                                <div>
                                    <p class="font-bold text-lg text-gray-800"><?php echo e($service['name']); ?></p>
                                    <p class="text-sm text-gray-600"><?php echo e(\Carbon\Carbon::parse($service['service_date'])->format('l, F j, Y')); ?></p>
                                </div>
                                <div>
                                    <?php if(isset($service['id'])): ?>
                                        <a href="<?php echo e(route('attendance.index', ['service' => $service['id']])); ?>" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">
                                            Take Attendance
                                        </a>
                                    <?php else: ?>
                                        <button class="bg-gray-300 text-gray-500 px-4 py-2 rounded-md cursor-not-allowed" disabled>
                                            Take Attendance
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-gray-500">No services available.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/services/index.blade.php ENDPATH**/ ?>