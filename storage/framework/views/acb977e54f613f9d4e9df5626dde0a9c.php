<?php $__env->startSection('content'); ?>
    <h2 class="text-2xl font-bold">My Job Posts</h2>
    <p class="text-sm text-gray-600 mb-6">Manage and review your job postings</p>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('job-search-my-posts');

$__html = app('livewire')->mount($__name, $__params, 'lw-1753020240-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('my-job-posts', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1753020240-1', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('view-my-job-posts', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1753020240-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/my-job-posts.blade.php ENDPATH**/ ?>