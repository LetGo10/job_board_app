<?php $__env->startSection('content'); ?>
<section class="relative bg-gradient-to-r from-purple-700 via-purple-500 to-pink-500 py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
    <h1 class="text-4xl md:text-5xl font-extrabold text-white">Find Your Perfect Job</h1>
    <p class="mt-4 text-lg text-purple-100 max-w-2xl mx-auto">
      Browse the latest opportunities and apply in just a few clicks.
    </p>
  </div>
</section>

<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12 grid grid-cols-1 lg:grid-cols-4 gap-8">
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('job-search', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3174874571-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('job-list', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3174874571-1', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('job-view', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3174874571-2', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('job-edit', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3174874571-3', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('job-apply', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3174874571-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/jobs.blade.php ENDPATH**/ ?>