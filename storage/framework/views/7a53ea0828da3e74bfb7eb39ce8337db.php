

<?php $__env->startSection('content'); ?>
<div class="bg-white shadow mb-6">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detailed Analytics
            </h2>
            <a href="<?php echo e(route('dashboard')); ?>" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Back to Dashboard
            </a>
        </div>
    </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Filters -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6">
                <form method="GET" action="<?php echo e(route('dashboard.analytics')); ?>" class="flex flex-wrap gap-4">
                    <div>
                        <label for="period" class="block text-sm font-medium text-gray-700 mb-1">Time Period</label>
                        <select name="period" id="period" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="week" <?php echo e($period === 'week' ? 'selected' : ''); ?>>This Week</option>
                            <option value="month" <?php echo e($period === 'month' ? 'selected' : ''); ?>>This Month</option>
                            <option value="year" <?php echo e($period === 'year' ? 'selected' : ''); ?>>This Year</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Analytics Type</label>
                        <select name="type" id="type" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="overview" <?php echo e($type === 'overview' ? 'selected' : ''); ?>>Overview</option>
                            <option value="first_timers" <?php echo e($type === 'first_timers' ? 'selected' : ''); ?>>First Timers</option>
                            <option value="conversions" <?php echo e($type === 'conversions' ? 'selected' : ''); ?>>Conversions</option>
                            <option value="attendance" <?php echo e($type === 'attendance' ? 'selected' : ''); ?>>Attendance</option>
                            <option value="cells" <?php echo e($type === 'cells' ? 'selected' : ''); ?>>Cells</option>
                            <option value="folds" <?php echo e($type === 'folds' ? 'selected' : ''); ?>>Folds</option>
                        </select>
                    </div>
                    
                    <div class="flex items-end">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                            Apply Filters
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <?php if($type === 'overview'): ?>
            <!-- Overview Analytics -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- First Timers Overview -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">First Timers Analytics</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Total First Timers:</span>
                                <span class="font-semibold text-lg"><?php echo e($data['first_timers']['total']); ?></span>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-sm font-medium text-gray-700 mb-2">By Purpose</h4>
                                <?php $__currentLoopData = $data['first_timers']['by_purpose']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purpose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex justify-between text-sm">
                                        <span class="capitalize"><?php echo e($purpose->purpose ?? 'Unknown'); ?>:</span>
                                        <span class="font-semibold"><?php echo e($purpose->count); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Top Inviters</h4>
                                <?php $__currentLoopData = $data['first_timers']['by_inviter']->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inviter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex justify-between text-sm">
                                        <span><?php echo e($inviter->inviter->name ?? 'Unknown'); ?>:</span>
                                        <span class="font-semibold"><?php echo e($inviter->count); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Conversions Overview -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Conversion Analytics</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Conversion Rate:</span>
                                <span class="font-semibold text-lg text-green-600"><?php echo e($data['conversions']['conversion_rate']); ?>%</span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Converted:</span>
                                <span class="font-semibold text-lg"><?php echo e($data['conversions']['converted']); ?></span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Total First Timers:</span>
                                <span class="font-semibold text-lg"><?php echo e($data['conversions']['total_first_timers']); ?></span>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Top Converting Inviters</h4>
                                <?php $__currentLoopData = $data['conversions']['by_inviter']->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inviter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex justify-between text-sm">
                                        <span><?php echo e($inviter->inviter->name ?? 'Unknown'); ?>:</span>
                                        <span class="font-semibold text-green-600"><?php echo e($inviter->count); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attendance Overview -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Attendance Analytics</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Total Attendance:</span>
                                <span class="font-semibold text-lg"><?php echo e($data['attendance']['total']); ?></span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Present:</span>
                                <span class="font-semibold text-lg text-green-600"><?php echo e($data['attendance']['present']); ?></span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Absent:</span>
                                <span class="font-semibold text-lg text-red-600"><?php echo e($data['attendance']['absent']); ?></span>
                            </div>
                            
                            <?php if($data['attendance']['total'] > 0): ?>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Attendance Rate:</span>
                                    <span class="font-semibold text-lg text-blue-600">
                                        <?php echo e(round(($data['attendance']['present'] / $data['attendance']['total']) * 100, 1)); ?>%
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Cells Overview -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Cells Performance</h3>
                        <div class="space-y-3">
                            <?php $__currentLoopData = $data['cells']->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900"><?php echo e($cell->name); ?></div>
                                        <div class="text-xs text-gray-500"><?php echo e($cell->members_count); ?> members</div>
                                    </div>
                                    <div class="text-xs text-blue-600 font-semibold">
                                        <?php echo e($cell->folds_count); ?> folds
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif($type === 'first_timers'): ?>
            <!-- First Timers Detailed Analytics -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">First Timers Detailed Analytics</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600"><?php echo e($data['total']); ?></div>
                            <div class="text-sm text-blue-700">Total First Timers</div>
                        </div>
                        
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-green-600">
                                <?php echo e($data['by_purpose']->where('purpose', 'stay')->first()->count ?? 0); ?>

                            </div>
                            <div class="text-sm text-green-700">Chose to Stay</div>
                        </div>
                        
                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-yellow-600">
                                <?php echo e($data['by_purpose']->where('purpose', 'visit')->first()->count ?? 0); ?>

                            </div>
                            <div class="text-sm text-yellow-700">Visitors Only</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Top Inviters -->
                        <div>
                            <h4 class="text-md font-semibold text-gray-800 mb-4">Top Inviters</h4>
                            <div class="space-y-3">
                                <?php $__currentLoopData = $data['by_inviter']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inviter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900"><?php echo e($inviter->inviter->name ?? 'Unknown'); ?></div>
                                            <div class="text-xs text-gray-500"><?php echo e($inviter->inviter->phone ?? 'No phone'); ?></div>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-lg font-bold text-blue-600"><?php echo e($inviter->count); ?></div>
                                            <div class="text-xs text-gray-500">first timers</div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <!-- Daily Trend -->
                        <div>
                            <h4 class="text-md font-semibold text-gray-800 mb-4">Daily Trend</h4>
                            <div class="space-y-2">
                                <?php $__currentLoopData = $data['daily_trend']->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
                                        <span class="text-sm text-gray-700"><?php echo e(\Carbon\Carbon::parse($trend->date)->format('M j, Y')); ?></span>
                                        <span class="font-semibold text-blue-600"><?php echo e($trend->count); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif($type === 'conversions'): ?>
            <!-- Conversions Detailed Analytics -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Conversion Analytics</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-green-600"><?php echo e($data['converted']); ?></div>
                            <div class="text-sm text-green-700">Converted to Members</div>
                        </div>
                        
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600"><?php echo e($data['total_first_timers']); ?></div>
                            <div class="text-sm text-blue-700">Total First Timers</div>
                        </div>
                        
                        <div class="bg-indigo-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-indigo-600"><?php echo e($data['conversion_rate']); ?>%</div>
                            <div class="text-sm text-indigo-700">Conversion Rate</div>
                        </div>
                    </div>

                    <!-- Top Converting Inviters -->
                    <div>
                        <h4 class="text-md font-semibold text-gray-800 mb-4">Top Converting Inviters</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <?php $__currentLoopData = $data['by_inviter']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inviter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900"><?php echo e($inviter->inviter->name ?? 'Unknown'); ?></div>
                                            <div class="text-xs text-gray-500"><?php echo e($inviter->inviter->phone ?? 'No phone'); ?></div>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-lg font-bold text-green-600"><?php echo e($inviter->count); ?></div>
                                            <div class="text-xs text-gray-500">conversions</div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif($type === 'attendance'): ?>
            <!-- Attendance Detailed Analytics -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Attendance Analytics</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600"><?php echo e($data['total']); ?></div>
                            <div class="text-sm text-blue-700">Total Records</div>
                        </div>
                        
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-green-600"><?php echo e($data['present']); ?></div>
                            <div class="text-sm text-green-700">Present</div>
                        </div>
                        
                        <div class="bg-red-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-red-600"><?php echo e($data['absent']); ?></div>
                            <div class="text-sm text-red-700">Absent</div>
                        </div>
                        
                        <div class="bg-indigo-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-indigo-600">
                                <?php echo e($data['total'] > 0 ? round(($data['present'] / $data['total']) * 100, 1) : 0); ?>%
                            </div>
                            <div class="text-sm text-indigo-700">Attendance Rate</div>
                        </div>
                    </div>

                    <!-- Attendance by Service -->
                    <div>
                        <h4 class="text-md font-semibold text-gray-800 mb-4">Attendance by Service</h4>
                        <div class="space-y-3">
                            <?php $__currentLoopData = $data['by_service']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">
                                            <?php echo e($service->service->name ?? 'Unknown Service'); ?>

                                        </div>
                                        <div class="text-xs text-gray-500">
                                            <?php echo e(\Carbon\Carbon::parse($service->service->service_date ?? now())->format('M j, Y')); ?>

                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-lg font-bold text-blue-600"><?php echo e($service->count); ?></div>
                                        <div class="text-xs text-gray-500">attendance records</div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif($type === 'cells'): ?>
            <!-- Cells Detailed Analytics -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Cells Performance Analytics</h3>
                    
                    <div class="space-y-4">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900"><?php echo e($cell->name); ?></h4>
                                        <p class="text-sm text-gray-600"><?php echo e($cell->description ?? 'No description'); ?></p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-blue-600"><?php echo e($cell->members_count); ?></div>
                                        <div class="text-sm text-gray-500">members</div>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-gray-50 p-3 rounded">
                                        <div class="text-sm font-medium text-gray-700">Folds</div>
                                        <div class="text-lg font-semibold text-green-600"><?php echo e($cell->folds_count); ?></div>
                                    </div>
                                    
                                    <div class="bg-gray-50 p-3 rounded">
                                        <div class="text-sm font-medium text-gray-700">Active Members</div>
                                        <div class="text-lg font-semibold text-purple-600"><?php echo e($cell->members->where('status', 'active')->count()); ?></div>
                                    </div>
                                </div>
                                
                                <?php if($cell->members->count() > 0): ?>
                                    <div class="mt-4">
                                        <h5 class="text-sm font-medium text-gray-700 mb-2">Recent Members</h5>
                                        <div class="space-y-2">
                                            <?php $__currentLoopData = $cell->members->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="flex justify-between items-center text-sm">
                                                    <span><?php echo e($member->name); ?></span>
                                                    <span class="px-2 py-1 text-xs rounded-full <?php echo e($member->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                                        <?php echo e(ucfirst($member->status)); ?>

                                                    </span>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

        <?php elseif($type === 'folds'): ?>
            <!-- Folds Detailed Analytics -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Folds Performance Analytics</h3>
                    
                    <div class="space-y-4">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900"><?php echo e($fold->name); ?></h4>
                                        <p class="text-sm text-gray-600">
                                            Cell: <?php echo e($fold->cell->name ?? 'No cell assigned'); ?>

                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-2xl font-bold text-green-600"><?php echo e($fold->members_count); ?></div>
                                        <div class="text-sm text-gray-500">members</div>
                                    </div>
                                </div>
                                
                                <div class="bg-gray-50 p-3 rounded">
                                    <div class="text-sm font-medium text-gray-700">Active Members</div>
                                    <div class="text-lg font-semibold text-purple-600"><?php echo e($fold->members->where('status', 'active')->count()); ?></div>
                                </div>
                                
                                <?php if($fold->members->count() > 0): ?>
                                    <div class="mt-4">
                                        <h5 class="text-sm font-medium text-gray-700 mb-2">Recent Members</h5>
                                        <div class="space-y-2">
                                            <?php $__currentLoopData = $fold->members->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="flex justify-between items-center text-sm">
                                                    <span><?php echo e($member->name); ?></span>
                                                    <span class="px-2 py-1 text-xs rounded-full <?php echo e($member->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                                        <?php echo e(ucfirst($member->status)); ?>

                                                    </span>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/dashboard/analytics.blade.php ENDPATH**/ ?>