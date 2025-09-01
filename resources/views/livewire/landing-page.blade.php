<section data-hero class="grid md:grid-cols-2 gap-8 items-center">
  <div>
    <h1 class="text-3xl md:text-5xl font-bold tracking-tight">🏗️ ChemLab Deptekim</h1>
    <p class="mt-4 text-base md:text-lg text-gray-600 dark:text-gray-300">
      Advanced equipment and loan management system for Departemen Teknik Kimia FTUI - your complete solution for lab equipment tracking, scheduling, and safety compliance.
    </p>
    <div class="mt-6 flex gap-3 flex-wrap">
      <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors">
        🔐 Login to Dashboard
      </a>
      <a href="{{ route('register.student') }}" class="inline-flex items-center px-6 py-3 rounded-xl border border-blue-600 text-blue-600 font-medium hover:bg-blue-50 dark:border-blue-400 dark:text-blue-400 dark:hover:bg-blue-900/20 transition-colors">
        ✨ Register Student
      </a>
    </div>
    
    <div class="mt-8 space-y-4">
      <h3 class="text-lg font-semibold">🚀 Key Features:</h3>
      <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
        <li class="flex items-center gap-2">
          <span class="text-green-500">✅</span>
          Equipment tracking with real-time availability
        </li>
        <li class="flex items-center gap-2">
          <span class="text-blue-500">📋</span>
          Smart loan management with approval workflow  
        </li>
        <li class="flex items-center gap-2">
          <span class="text-purple-500">📄</span>
          JSA (Job Safety Analysis) document upload & management
        </li>
        <li class="flex items-center gap-2">
          <span class="text-yellow-500">⏰</span>
          Advanced scheduling with Flatpickr integration
        </li>
        <li class="flex items-center gap-2">
          <span class="text-red-500">📊</span>
          Analytics dashboard with Chart.js visualizations
        </li>
        <li class="flex items-center gap-2">
          <span class="text-indigo-500">🎓</span>
          Student-focused interface with academic integration
        </li>
      </ul>
    </div>
    
    <div class="mt-6 p-4 bg-blue-50 rounded-lg dark:bg-blue-900/20">
      <h4 class="font-semibold text-blue-800 dark:text-blue-300 mb-2">📋 Quick Start Process:</h4>
      <ol class="text-sm text-blue-700 dark:text-blue-400 space-y-1">
        <li><strong>1.</strong> Register as student → Get verified by admin</li>
        <li><strong>2.</strong> Browse equipment grid → Select available items</li>
        <li><strong>3.</strong> Create loan request → Upload JSA (PDF)</li>
        <li><strong>4.</strong> Get approval → Pick up → Use safely → Return on time</li>
      </ol>
    </div>
  </div>
  
  <div class="relative">
    <div class="aspect-video rounded-2xl border-2 border-dashed border-gray-300 bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-800 dark:to-gray-700 dark:border-gray-600 flex items-center justify-center">
      <div class="text-center">
        <div class="text-6xl mb-4">🏗️</div>
        <p class="text-gray-600 dark:text-gray-400 font-medium">Equipment Management</p>
        <p class="text-sm text-gray-500 dark:text-gray-500">Dashboard Preview</p>
      </div>
    </div>
    
    <!-- Floating feature cards -->
    <div class="absolute -top-4 -right-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-3 border">
      <div class="flex items-center gap-2 text-sm">
        <span class="text-green-500">📊</span>
        <span class="font-medium">Live Analytics</span>
      </div>
    </div>
    
    <div class="absolute -bottom-4 -left-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-3 border">
      <div class="flex items-center gap-2 text-sm">
        <span class="text-blue-500">🔧</span>
        <span class="font-medium">156+ Equipment</span>
      </div>
    </div>
  </div>
</section>

<section class="mt-16 py-12 border-t border-gray-200 dark:border-gray-700">
  <div class="text-center mb-8">
    <h2 class="text-2xl font-bold mb-4">🎯 Perfect for Academic & Research Use</h2>
    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
      Built specifically for Departemen Teknik Kimia FTUI with features designed for academic excellence and research productivity.
    </p>
  </div>
  
  <div class="grid md:grid-cols-3 gap-6 mt-8">
    <div class="text-center p-6 rounded-xl bg-gradient-to-br from-green-50 to-emerald-100 dark:from-green-900/20 dark:to-emerald-900/20">
      <div class="text-3xl mb-3">🎓</div>
      <h3 class="font-semibold mb-2">Student-Friendly</h3>
      <p class="text-sm text-gray-600 dark:text-gray-300">Easy registration, intuitive interface, academic integration</p>
    </div>
    
    <div class="text-center p-6 rounded-xl bg-gradient-to-br from-blue-50 to-cyan-100 dark:from-blue-900/20 dark:to-cyan-900/20">
      <div class="text-3xl mb-3">⚡</div>
      <h3 class="font-semibent mb-2">Fast & Efficient</h3>
      <p class="text-sm text-gray-600 dark:text-gray-300">Quick loan approvals, real-time tracking, smart scheduling</p>
    </div>
    
    <div class="text-center p-6 rounded-xl bg-gradient-to-br from-purple-50 to-violet-100 dark:from-purple-900/20 dark:to-violet-900/20">
      <div class="text-3xl mb-3">🔒</div>
      <h3 class="font-semibold mb-2">Safe & Secure</h3>
      <p class="text-sm text-gray-600 dark:text-gray-300">JSA compliance, safety protocols, secure document management</p>
    </div>
  </div>
</section>