<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border p-8 dark:bg-gray-800 dark:border-gray-700">
        <h2 class="text-2xl font-bold mb-6">Ajukan Peminjaman Alat</h2>
        
        <form class="space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Equipment Selection</label>
                    <select class="w-full px-3 py-2 border rounded-lg dark:border-gray-600 dark:bg-gray-700" required>
                        <option value="">Select equipment...</option>
                        <option>Spektrofotometer UV-Vis (SPK-001)</option>
                        <option>pH Meter Digital (PHM-002)</option>
                        <option>Rotary Evaporator (ROT-003)</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium mb-2">Loan Purpose</label>
                    <select class="w-full px-3 py-2 border rounded-lg dark:border-gray-600 dark:bg-gray-700" required>
                        <option value="">Select purpose...</option>
                        <option>Research</option>
                        <option>Laboratory Assignment</option>
                        <option>Final Project</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">📅 Borrow Date & Time</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-lg dark:border-gray-600 dark:bg-gray-700" 
                           placeholder="Select date and time..." 
                           x-data 
                           x-init="flatpickr($el, {
                               enableTime: true,
                               dateFormat: 'Y-m-d H:i',
                               minDate: 'today',
                               time_24hr: true
                           })" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium mb-2">📅 Return Date & Time</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-lg dark:border-gray-600 dark:bg-gray-700" 
                           placeholder="Select return date and time..." 
                           x-data 
                           x-init="flatpickr($el, {
                               enableTime: true,
                               dateFormat: 'Y-m-d H:i',
                               minDate: 'today',
                               time_24hr: true
                           })" required>
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-medium mb-2">Project Description</label>
                <textarea rows="4" class="w-full px-3 py-2 border rounded-lg dark:border-gray-600 dark:bg-gray-700" 
                          placeholder="Describe your project and how you plan to use the equipment..."></textarea>
            </div>
            
            <div class="bg-yellow-50 p-4 rounded-lg dark:bg-yellow-900/20">
                <h4 class="font-semibold text-yellow-800 dark:text-yellow-300 mb-2">📄 Upload JSA Required</h4>
                <p class="text-sm text-yellow-700 dark:text-yellow-400 mb-3">
                    Please upload your Job Safety Analysis (JSA) document in PDF format.
                </p>
                <input type="file" accept=".pdf" class="w-full px-3 py-2 border border-yellow-200 rounded-lg bg-white dark:border-yellow-600 dark:bg-gray-700" required>
                <p class="text-xs text-yellow-600 dark:text-yellow-400 mt-1">
                    Maximum file size: 10MB. Only PDF files are allowed.
                </p>
            </div>
            
            <div class="bg-blue-50 p-4 rounded-lg dark:bg-blue-900/20">
                <h4 class="font-semibold text-blue-800 dark:text-blue-300 mb-2">📋 Terms and Conditions</h4>
                <div class="space-y-1 text-sm text-blue-700 dark:text-blue-400">
                    <label class="flex items-start gap-2">
                        <input type="checkbox" class="mt-1" required>
                        <span>I agree to return the equipment in the same condition and on time.</span>
                    </label>
                    <label class="flex items-start gap-2">
                        <input type="checkbox" class="mt-1" required>
                        <span>I understand that late returns may result in penalties.</span>
                    </label>
                    <label class="flex items-start gap-2">
                        <input type="checkbox" class="mt-1" required>
                        <span>I have read and agree to the laboratory safety procedures.</span>
                    </label>
                </div>
            </div>
            
            <div class="flex justify-end gap-3">
                <button type="button" class="px-6 py-2 border rounded-lg hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    📋 Submit Loan Request
                </button>
            </div>
        </form>
    </div>
</div>