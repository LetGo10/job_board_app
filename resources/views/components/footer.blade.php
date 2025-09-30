<footer class="bg-white border-t border-gray-200 mt-20">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Brand -->
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-lg font-bold text-purple-700 mb-4">JobPortal</h3>
                <p class="text-sm text-gray-600 mb-6">
                    Your trusted platform to connect job seekers with top companies. <br>
                    Discover your dream career with ease and speed.
                </p>
                <div class="flex space-x-3">
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-500 hover:bg-purple-600 hover:text-white transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-500 hover:bg-purple-600 hover:text-white transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-500 hover:bg-purple-600 hover:text-white transition">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-sm font-semibold text-gray-900 mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-purple-700">Home</a></li>
                    <li><a href="{{ route('jobs') }}" class="text-sm text-gray-600 hover:text-purple-700">Jobs</a></li>
                    <li><a href="{{ route('companies') }}" class="text-sm text-gray-600 hover:text-purple-700">Companies</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div>
                <h4 class="text-sm font-semibold text-gray-900 mb-4">Resources</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-sm text-gray-600 hover:text-purple-700">Help Center</a></li>
                    <li><a href="#" class="text-sm text-gray-600 hover:text-purple-700">Guides</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-200 mt-10 pt-6 flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm text-gray-500">© 2025 JobPortal. All rights reserved.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="text-sm text-gray-500 hover:text-purple-700">Privacy Policy</a>
                <a href="#" class="text-sm text-gray-500 hover:text-purple-700">Terms</a>
                <a href="#" class="text-sm text-gray-500 hover:text-purple-700">Cookies</a>
            </div>
        </div>
    </div>
</footer>
