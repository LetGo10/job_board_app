<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative py-24 sm:py-32 overflow-hidden">
  <!-- Animated Gradient Background -->
  <div class="absolute inset-0 bg-gradient-to-r from-purple-700 via-purple-500 to-pink-500
              bg-[length:200%_200%] animate-gradientMove"></div>

  <!-- Content -->
  <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center">
    <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-6xl">
      Discover Your Dream Career
    </h1>
    <p class="mt-6 text-lg leading-8 text-purple-100">
      Find your ideal job quickly and easily.
    </p>
    <div class="mt-10 flex justify-center gap-x-4">
      <a href=""
        class="rounded-lg bg-white px-6 py-3 text-sm font-semibold text-purple-700 shadow-md hover:bg-gray-100">
        Apply Now
      </a>
      <a href="#jobs"
        class="rounded-lg bg-purple-600 px-6 py-3 text-sm font-semibold text-white shadow-md hover:bg-purple-500">
        View Jobs
      </a>
    </div>
  </div>
</section>

<!-- Search / Filter Section -->
<section class="relative -mt-16 z-10">
  <div class="max-w-4xl mx-auto px-6 lg:px-8">
    <div class="bg-white p-6 rounded-xl shadow-lg">
      <form action="" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div>
          <input type="text" name="keyword" placeholder="Search jobs..."
            class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-purple-500 focus:ring-purple-500" />
        </div>
        <div>
          <select name="location"
            class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-purple-500 focus:ring-purple-500">
            <option value="">Location</option>
            <option value="kl">Kuala Lumpur</option>
            <option value="selangor">Selangor</option>
          </select>
        </div>
        <div>
          <select name="type"
            class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-purple-500 focus:ring-purple-500">
            <option value="">Job Type</option>
            <option value="full_time">Full Time</option>
            <option value="part_time">Part Time</option>
            <option value="remote">Remote</option>
          </select>
        </div>
        <div class="flex items-center">
          <button type="submit"
            class="w-full rounded-lg bg-purple-600 px-4 py-2 text-white font-semibold shadow hover:bg-purple-500">
            Search
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Jobs Section -->
<section id="jobs" class="bg-gray-50 py-16 sm:py-24">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="text-center">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
        Latest Job Openings
      </h2>
      <p class="mt-2 text-lg text-gray-600">
        Join us today and grow your career.
      </p>
    </div>

    <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Example Job Card -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-gray-900">Web Developer</h3>
            <p class="mt-2 text-gray-600">Build modern web applications using Laravel & Tailwind CSS.</p>
            <div class="mt-4 flex justify-between items-center">
            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Full Time</span>
            <a href="" class="text-purple-700 font-medium hover:underline">Apply →</a>
            </div>
        </div>

      <!-- Add more job cards here -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-gray-900">Web Developer</h3>
            <p class="mt-2 text-gray-600">Build modern web applications using Laravel & Tailwind CSS.</p>
            <div class="mt-4 flex justify-between items-center">
            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Full Time</span>
            <a href="" class="text-purple-700 font-medium hover:underline">Apply →</a>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-gray-900">Web Developer</h3>
            <p class="mt-2 text-gray-600">Build modern web applications using Laravel & Tailwind CSS.</p>
            <div class="mt-4 flex justify-between items-center">
            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Full Time</span>
            <a href="" class="text-purple-700 font-medium hover:underline">Apply →</a>
            </div>
        </div>
    </div>
  </div>
</section>

<!-- About Section -->
<section id="about" class="py-16 sm:py-24">
  <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">About Us</h2>
    <p class="mt-6 text-lg leading-8 text-gray-600">
      We are a company dedicated to connecting job seekers with the best opportunities.
      Our supportive work culture empowers every team member to reach their full potential.
    </p>
  </div>
</section>

<!-- Call to Action -->
<section class="bg-purple-700 py-16 sm:py-24">
  <div class="max-w-3xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-white sm:text-4xl">
      Ready for your next step?
    </h2>
    <p class="mt-4 text-lg text-purple-200">
      Submit your application today and join our growing team.
    </p>
    <div class="mt-6">
      <a href=""
        class="rounded-lg bg-white px-6 py-3 text-sm font-semibold text-purple-700 shadow hover:bg-gray-100">
        Apply Now
      </a>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\OUM\Herd\job-board-app-2\resources\views/home.blade.php ENDPATH**/ ?>