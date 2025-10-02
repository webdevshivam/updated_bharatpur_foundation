
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-indigo-50 via-white to-purple-50 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute top-10 left-10 w-20 h-20 bg-indigo-100 rounded-full opacity-60 animate-bounce-subtle"></div>
    <div class="absolute bottom-20 right-20 w-16 h-16 bg-purple-100 rounded-full opacity-60 animate-bounce-subtle" style="animation-delay: 1s;"></div>
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6">
                <?= $translations['join_title'] ?>
            </h1>
            <p class="font-accent text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                <?= $translations['join_description'] ?>
            </p>
        </div>

        <!-- Join Options -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Student Card -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-indigo-100 hover:border-indigo-300">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h3 class="font-heading text-2xl font-bold text-gray-900 mb-4">Student</h3>
                <p class="font-accent text-gray-600 mb-6">Join our education program and get support for your academic journey with mentoring and career placement.</p>
                <button onclick="showForm('student')" class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-6 py-3 rounded-xl font-heading font-semibold hover:from-indigo-700 hover:to-indigo-800 transition-all duration-200">
                    Apply as Student
                </button>
            </div>

            <!-- Volunteer Card -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-purple-100 hover:border-purple-300">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-hands-helping text-white text-2xl"></i>
                </div>
                <h3 class="font-heading text-2xl font-bold text-gray-900 mb-4">Volunteer</h3>
                <p class="font-accent text-gray-600 mb-6">Share your skills and experience to mentor students and help them achieve their career goals.</p>
                <button onclick="showForm('volunteer')" class="w-full bg-gradient-to-r from-purple-600 to-purple-700 text-white px-6 py-3 rounded-xl font-heading font-semibold hover:from-purple-700 hover:to-purple-800 transition-all duration-200">
                    Join as Volunteer
                </button>
            </div>

            <!-- Donor Card -->
            <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-emerald-100 hover:border-emerald-300">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-heart text-white text-2xl"></i>
                </div>
                <h3 class="font-heading text-2xl font-bold text-gray-900 mb-4">Donor</h3>
                <p class="font-accent text-gray-600 mb-6">Support our mission financially and help us provide education and opportunities to more students.</p>
                <button onclick="showForm('donor')" class="w-full bg-gradient-to-r from-emerald-600 to-emerald-700 text-white px-6 py-3 rounded-xl font-heading font-semibold hover:from-emerald-700 hover:to-emerald-800 transition-all duration-200">
                    Become a Donor
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Forms Modal -->
<div id="formModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-8">
            <div class="flex justify-between items-center mb-6">
                <h3 id="formTitle" class="font-heading text-2xl font-bold text-gray-900"></h3>
                <button onclick="hideForm()" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Student Form -->
            <form id="studentForm" class="hidden" onsubmit="submitForm(event, 'student')">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Full Name *</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Age</label>
                        <input type="number" name="age" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Email *</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Phone *</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Course *</label>
                        <input type="text" name="course" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Institution *</label>
                        <input type="text" name="institution" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Year of Study</label>
                        <select name="year_of_study" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">Select Year</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                            <option value="Final Year">Final Year</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Academic Percentage</label>
                        <input type="number" name="academic_percentage" step="0.01" max="100" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Family Income Range</label>
                        <select name="family_income" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">Select Range</option>
                            <option value="Below 1 Lakh">Below ₹1 Lakh</option>
                            <option value="1-3 Lakhs">₹1-3 Lakhs</option>
                            <option value="3-5 Lakhs">₹3-5 Lakhs</option>
                            <option value="Above 5 Lakhs">Above ₹5 Lakhs</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Financial Need (Explain your situation)</label>
                        <textarea name="financial_need" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Career Goals</label>
                        <textarea name="career_goals" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Why do you want to apply?</label>
                        <textarea name="why_apply" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none"></textarea>
                    </div>
                </div>
                <div class="flex gap-4 mt-8">
                    <button type="button" onclick="hideForm()" class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-heading font-semibold hover:bg-gray-300 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-6 py-3 rounded-xl font-heading font-semibold hover:from-indigo-700 hover:to-indigo-800 transition-all duration-200">
                        Submit Application
                    </button>
                </div>
            </form>

            <!-- Volunteer Form -->
            <form id="volunteerForm" class="hidden" onsubmit="submitForm(event, 'volunteer')">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Full Name *</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Age</label>
                        <input type="number" name="age" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Email *</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Phone *</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Profession *</label>
                        <input type="text" name="profession" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Experience</label>
                        <select name="experience" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="">Select Experience</option>
                            <option value="0-2 years">0-2 years</option>
                            <option value="3-5 years">3-5 years</option>
                            <option value="6-10 years">6-10 years</option>
                            <option value="10+ years">10+ years</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Skills</label>
                        <textarea name="skills" rows="3" placeholder="List your skills that could help our students" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Availability</label>
                        <input type="text" name="availability" placeholder="e.g., Weekends, 2 hours/week" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Motivation</label>
                        <textarea name="motivation" rows="3" placeholder="Why do you want to volunteer with us?" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Previous Volunteer Work</label>
                        <textarea name="previous_volunteer_work" rows="3" placeholder="Describe any previous volunteer experience" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Preferred Activities</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="flex items-center">
                                <input type="checkbox" name="preferred_activities[]" value="Teaching" class="mr-2 rounded">
                                <span class="font-accent">Teaching</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="preferred_activities[]" value="Mentoring" class="mr-2 rounded">
                                <span class="font-accent">Mentoring</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="preferred_activities[]" value="Career Counseling" class="mr-2 rounded">
                                <span class="font-accent">Career Counseling</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="preferred_activities[]" value="Fundraising" class="mr-2 rounded">
                                <span class="font-accent">Fundraising</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4 mt-8">
                    <button type="button" onclick="hideForm()" class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-heading font-semibold hover:bg-gray-300 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-purple-600 to-purple-700 text-white px-6 py-3 rounded-xl font-heading font-semibold hover:from-purple-700 hover:to-purple-800 transition-all duration-200">
                        Submit Application
                    </button>
                </div>
            </form>

            <!-- Donor Form -->
            <form id="donorForm" class="hidden" onsubmit="submitForm(event, 'donor')">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Full Name *</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Email *</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Phone *</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Organization</label>
                        <input type="text" name="organization" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Donation Type *</label>
                        <select name="donation_type" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            <option value="">Select Type</option>
                            <option value="one-time">One-time</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Donation Amount</label>
                        <input type="number" name="donation_amount" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Preferred Causes</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="flex items-center">
                                <input type="checkbox" name="preferred_causes[]" value="Education" class="mr-2 rounded">
                                <span class="font-accent">Education</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="preferred_causes[]" value="Scholarships" class="mr-2 rounded">
                                <span class="font-accent">Scholarships</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="preferred_causes[]" value="Career Development" class="mr-2 rounded">
                                <span class="font-accent">Career Development</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="preferred_causes[]" value="Infrastructure" class="mr-2 rounded">
                                <span class="font-accent">Infrastructure</span>
                            </label>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-heading font-semibold text-gray-700 mb-2">Message</label>
                        <textarea name="message" rows="4" placeholder="Any additional message or specific requirements" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent resize-none"></textarea>
                    </div>
                </div>
                <div class="flex gap-4 mt-8">
                    <button type="button" onclick="hideForm()" class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-heading font-semibold hover:bg-gray-300 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white px-6 py-3 rounded-xl font-heading font-semibold hover:from-emerald-700 hover:to-emerald-800 transition-all duration-200">
                        Submit Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Success/Error Messages -->
<div id="messageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-md w-full p-8 text-center">
        <div id="messageIcon" class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center"></div>
        <h3 id="messageTitle" class="font-heading text-xl font-bold mb-4"></h3>
        <p id="messageText" class="font-accent text-gray-600 mb-6"></p>
        <button onclick="hideMessage()" class="bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-8 py-3 rounded-xl font-heading font-semibold hover:from-indigo-700 hover:to-indigo-800 transition-all duration-200">
            Close
        </button>
    </div>
</div>

<script>
function showForm(type) {
    const modal = document.getElementById('formModal');
    const title = document.getElementById('formTitle');
    const studentForm = document.getElementById('studentForm');
    const volunteerForm = document.getElementById('volunteerForm');
    const donorForm = document.getElementById('donorForm');

    // Hide all forms
    studentForm.classList.add('hidden');
    volunteerForm.classList.add('hidden');
    donorForm.classList.add('hidden');

    // Show appropriate form
    switch(type) {
        case 'student':
            title.textContent = 'Student Application';
            studentForm.classList.remove('hidden');
            break;
        case 'volunteer':
            title.textContent = 'Volunteer Application';
            volunteerForm.classList.remove('hidden');
            break;
        case 'donor':
            title.textContent = 'Donor Registration';
            donorForm.classList.remove('hidden');
            break;
    }

    modal.classList.remove('hidden');
}

function hideForm() {
    document.getElementById('formModal').classList.add('hidden');
}

function showMessage(success, title, message) {
    const messageModal = document.getElementById('messageModal');
    const messageIcon = document.getElementById('messageIcon');
    const messageTitle = document.getElementById('messageTitle');
    const messageText = document.getElementById('messageText');

    if (success) {
        messageIcon.className = 'w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center bg-green-100';
        messageIcon.innerHTML = '<i class="fas fa-check text-green-600 text-2xl"></i>';
    } else {
        messageIcon.className = 'w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center bg-red-100';
        messageIcon.innerHTML = '<i class="fas fa-times text-red-600 text-2xl"></i>';
    }

    messageTitle.textContent = title;
    messageText.textContent = message;
    messageModal.classList.remove('hidden');
}

function hideMessage() {
    document.getElementById('messageModal').classList.add('hidden');
}

function submitForm(event, type) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    
    let endpoint = '';
    switch(type) {
        case 'student':
            endpoint = '<?= base_url('join-us/submit-student') ?>';
            break;
        case 'volunteer':
            endpoint = '<?= base_url('join-us/submit-volunteer') ?>';
            break;
        case 'donor':
            endpoint = '<?= base_url('join-us/submit-donor') ?>';
            break;
    }

    // Show loading state
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Submitting...';
    submitBtn.disabled = true;

    fetch(endpoint, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        hideForm();
        if (data.success) {
            showMessage(true, 'Application Submitted!', data.message);
            form.reset();
        } else {
            showMessage(false, 'Submission Failed', data.message);
        }
    })
    .catch(error => {
        hideForm();
        showMessage(false, 'Error', 'An error occurred. Please try again.');
        console.error('Error:', error);
    })
    .finally(() => {
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
}
</script>

<?= $this->endSection() ?>
