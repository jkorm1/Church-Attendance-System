

<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-6 max-w-4xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Register First Timer</h1>
        <a href="<?php echo e(route('first_timers.index')); ?>" class="text-gray-600 hover:text-gray-800">← Back to First Timers</a>
    </div>

    <?php if(session('error')): ?>
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('first_timers.store')); ?>" method="POST" class="space-y-6 font-montserrat bg-white shadow-md rounded-lg p-6 border border-[#3a1d09]">
        <?php echo csrf_field(); ?>
        
        <h3 class="text-lg font-semibold mb-4 text-[#3a1d09]">Personal Information</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-bold text-[#3a1d09] mb-2">Full Name *</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-[#3a1d09] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f58502] font-montserrat" value="<?php echo e(old('name')); ?>" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="date_of_birth" class="block text-sm font-bold text-[#3a1d09] mb-2">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="w-full px-3 py-2 border border-[#3a1d09] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f58502] font-montserrat" value="<?php echo e(old('date_of_birth')); ?>">
                <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="phone" class="block text-sm font-bold text-[#3a1d09] mb-2">Contact Number *</label>
                <input type="tel" name="phone" id="phone" class="w-full px-3 py-2 border border-[#3a1d09] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f58502] font-montserrat" value="<?php echo e(old('phone')); ?>" required>
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="residence" class="block text-sm font-bold text-[#3a1d09] mb-2">Residence/Address</label>
                <input type="text" name="residence" id="residence" class="w-full px-3 py-2 border border-[#3a1d09] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f58502] font-montserrat" value="<?php echo e(old('residence')); ?>" placeholder="Enter full address">
                <?php $__errorArgs = ['residence'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Visit Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="purpose" class="block text-sm font-bold text-[#3a1d09] mb-2">Purpose of Visit *</label>
                    <select name="purpose" id="purpose" class="w-full px-3 py-2 border border-[#3a1d09] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f58502] font-montserrat" required>
                        <option value="">Select Purpose</option>
                        <option value="visit" <?php if(old('purpose') == 'visit'): ?> selected <?php endif; ?>>Visit</option>
                        <option value="stay" <?php if(old('purpose') == 'stay'): ?> selected <?php endif; ?>>Stay (Join Church)</option>
                    </select>
                    <?php $__errorArgs = ['purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="first_visit_date" class="block text-sm font-bold text-[#3a1d09] mb-2">First Visit Date</label>
                    <input type="date" name="first_visit_date" id="first_visit_date" class="w-full px-3 py-2 border border-[#3a1d09] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f58502] font-montserrat" value="<?php echo e(old('first_visit_date', date('Y-m-d'))); ?>">
                    <?php $__errorArgs = ['first_visit_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="service_id" class="block text-sm font-bold text-[#3a1d09] mb-2">Service Attended *</label>
                    <select name="service_id" id="service_id" class="w-full px-3 py-2 border border-[#3a1d09] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f58502] font-montserrat" required>
                        <option value="">Select Service</option>
                        <?php $__currentLoopData = $allServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($service['id'] ?? $service->id); ?>" <?php if(old('service_id') == ($service['id'] ?? $service->id)): ?> selected <?php endif; ?>>
                                <?php echo e($service['name'] ?? $service->name); ?> - <?php echo e(\Carbon\Carbon::parse($service['service_date'] ?? $service->service_date)->format('D, d M Y')); ?>

                                <?php if(isset($service['is_auto_generated']) && $service['is_auto_generated']): ?>
                                    (Auto-generated)
                                <?php endif; ?>
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['service_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="mt-6">
                <label for="inviter_search" class="block text-sm font-bold text-[#3a1d09] mb-2">Invited By (Search Member)</label>
                <div class="relative">
                    <input type="text" id="inviter_search" class="w-full px-3 py-2 border border-[#3a1d09] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f58502] font-montserrat" placeholder="Start typing member name..." autocomplete="off">
                    <input type="hidden" name="invited_by" id="invited_by" value="<?php echo e(old('invited_by')); ?>">
                    <div id="search_results" class="absolute z-10 w-full bg-white border border-[#3a1d09] rounded-md shadow-lg max-h-60 overflow-y-auto hidden"></div>
                </div>
                <div id="selected_inviter" class="mt-2 p-2 bg-green-50 border border-green-200 rounded-md hidden">
                    <span class="text-sm text-green-700">Selected: <span id="inviter_name"></span></span>
                    <button type="button" id="clear_inviter" class="ml-2 text-red-600 hover:text-red-800 text-sm">Clear</button>
                </div>
                <?php $__errorArgs = ['invited_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Additional Information</h3>
            
            <div>
                <label for="notes" class="block text-sm font-bold text-[#3a1d09] mb-2">Notes</label>
                <textarea name="notes" id="notes" rows="3" class="w-full px-3 py-2 border border-[#3a1d09] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f58502] font-montserrat" placeholder="Any additional notes about the first timer"><?php echo e(old('notes')); ?></textarea>
                <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="flex justify-end">
            <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('Register First Timer')); ?> <?php echo $__env->renderComponent(); ?>
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
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const inviterSearch = document.getElementById('inviter_search');
    const invitedBy = document.getElementById('invited_by');
    const searchResults = document.getElementById('search_results');
    const selectedInviter = document.getElementById('selected_inviter');
    const inviterName = document.getElementById('inviter_name');
    const clearInviter = document.getElementById('clear_inviter');
    let searchTimeout;

    inviterSearch.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        
        if (query.length < 2) {
            searchResults.classList.add('hidden');
            return;
        }

        searchTimeout = setTimeout(() => {
            fetch(`/api/members/search?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    searchResults.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(member => {
                            const div = document.createElement('div');
                            div.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
                            div.textContent = member.name;
                            div.addEventListener('click', () => selectInviter(member));
                            searchResults.appendChild(div);
                        });
                        searchResults.classList.remove('hidden');
                    } else {
                        searchResults.classList.add('hidden');
                    }
                })
                .catch(error => {
                    console.error('Error searching members:', error);
                    searchResults.classList.add('hidden');
                });
        }, 300);
    });

    function selectInviter(member) {
        invitedBy.value = member.id;
        inviterName.textContent = member.name;
        inviterSearch.value = member.name;
        selectedInviter.classList.remove('hidden');
        searchResults.classList.add('hidden');
    }

    clearInviter.addEventListener('click', function() {
        invitedBy.value = '';
        inviterSearch.value = '';
        selectedInviter.classList.add('hidden');
    });

    // Hide search results when clicking outside
    document.addEventListener('click', function(e) {
        if (!inviterSearch.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });
});
</script>
<?php $__env->stopPush(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Joseph Korm\Desktop\Church attendance sytem\cw_attendance\AEMS\resources\views/first_timers/create.blade.php ENDPATH**/ ?>