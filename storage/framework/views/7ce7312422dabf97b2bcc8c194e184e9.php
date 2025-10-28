<?php $__env->startSection('content'); ?>
    <div>
        <h2 class="text-2xl font-bold text-gray-900">My Job Applications</h2>
        <p class="text-sm text-gray-600 mb-6">List of jobs you have applied for</p>
    </div>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user-job-applied-list', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3535475715-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/user-applications.blade.php ENDPATH**/ ?>