<?php $__env->startSection('content'); ?>
    <h2 class="text-2xl font-bold">Job Applications</h2>
    <p class="text-sm text-gray-600 mb-6">Manage and review job applications from candidates</p>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('job-search-apply');

$__html = app('livewire')->mount($__name, $__params, 'lw-3150490176-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('job-apply-list');

$__html = app('livewire')->mount($__name, $__params, 'lw-3150490176-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('job-apply-view');

$__html = app('livewire')->mount($__name, $__params, 'lw-3150490176-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/main-jobApply.blade.php ENDPATH**/ ?>