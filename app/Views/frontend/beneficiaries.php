<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative min-h-[70vh] bg-gradient-to-br from-indigo-50 via-white to-purple-50 flex items-center overflow-hidden -mt-16 pt-16">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #6366f1 2px, transparent 2px), radial-gradient(circle at 75% 75%, #8b5cf6 1px, transparent 1px); background-size: 50px 50px, 30px 30px;"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-24 h-24 bg-indigo-100 rounded-full animate-pulse opacity-60"></div>
    <div class="absolute top-40 right-20 w-20 h-20 bg-purple-100 rounded-full animate-pulse opacity-60" style="animation-delay: 1s;"></div>
    <div class="absolute bottom-40 left-20 w-16 h-16 bg-indigo-200 rounded-full animate-pulse opacity-60" style="animation-delay: 2s;"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <!-- Trust Badge -->
            <div class="inline-flex items-center bg-indigo-100 text-indigo-800 px-6 py-3 rounded-full font-medium text-sm mb-8 shadow-lg">
                <i class="fas fa-graduation-cap mr-2"></i>
                Our Amazing Students • Building Tomorrow's Leaders
            </div>

            <!-- Main Headline -->
            <h1 class="font-bold text-5xl md:text-6xl lg:text-7xl text-gray-900 leading-tight mb-8">
                Meet Our 
                <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                    Future Leaders
                </span>
            </h1>

            <!-- Supporting Text -->
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-12 max-w-4xl mx-auto">
                Dedicated individuals pursuing their dreams through education. Each student represents hope, determination, and the transformative power of opportunity.
            </p>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl mx-auto mb-12">
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 shadow-xl border border-indigo-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="text-3xl md:text-4xl font-bold text-indigo-600 mb-2"><?= isset($total_beneficiaries) ? $total_beneficiaries : (is_array($beneficiaries) ? count($beneficiaries) : 0) ?></div>
                    <div class="text-sm text-gray-600 font-medium">Total Students</div>
                </div>
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 shadow-xl border border-purple-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="text-3xl md:text-4xl font-bold text-purple-600 mb-2"><?= $active_students ?? '0' ?></div>
                    <div class="text-sm text-gray-600 font-medium">Active Students</div>
                </div>
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-6 shadow-xl border border-emerald-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="text-3xl md:text-4xl font-bold text-emerald-600 mb-2"><?= $graduates ?? '0' ?></div>
                    <div class="text-sm text-gray-600 font-medium">Graduates</div>
                </div>
                
            </div>
            <!-- Added information -->
            <p class="text-lg text-gray-700 mt-8">This website is an unofficial version. For the official site, please visit <a href="https://nayantaratrust.com/" target="_blank" class="text-indigo-600 font-semibold hover:underline">nayantaratrust.com</a>.</p>
            <div class="mt-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Our Objective</h3>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">We make underprivileged students or job-ready professionals.</p>
            </div>
        </div>
    </div>
</section>

<!-- Filter & Search Section -->
<section class="py-8 bg-white border-b border-gray-100 shadow-sm">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8 items-center justify-between">
            <!-- Filter Buttons -->
            <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                <button onclick="filterBeneficiaries('all')" 
                        class="filter-btn active bg-indigo-600 text-white px-8 py-4 rounded-2xl font-bold hover:bg-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-users mr-2"></i>
                    All Students
                </button>
                <button onclick="filterBeneficiaries('active')" 
                        class="filter-btn bg-gray-100 text-gray-700 px-8 py-4 rounded-2xl font-bold hover:bg-gray-200 hover:shadow-lg transition-all duration-200 transform hover:-translate-y-1">
                    <i class="fas fa-user-graduate mr-2"></i>
                    Active
                </button>
                <button onclick="filterBeneficiaries('graduate')" 
                        class="filter-btn bg-gray-100 text-gray-700 px-8 py-4 rounded-2xl font-bold hover:bg-gray-200 hover:shadow-lg transition-all duration-200 transform hover:-translate-y-1">
                    <i class="fas fa-medal mr-2"></i>
                    Graduates
                </button>
            </div>

            <!-- Search Box -->
            <div class="relative w-full lg:w-auto">
                <input type="text" id="searchInput" placeholder="Search students by name, course, or institution..." 
                       class="bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 pl-14 font-medium focus:outline-none focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 w-full lg:w-80 transition-all duration-200">
                <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>
    </div>
</section>

<!-- Students Grid -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-indigo-50/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (!empty($beneficiaries) && is_array($beneficiaries)): ?>
            <div id="beneficiariesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php foreach ($beneficiaries as $index => $beneficiary): ?>
                    <article class="beneficiary-card group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-3 border border-gray-100 overflow-hidden" 
                             style="animation: fadeInUp 0.6s ease-out <?= $index * 0.1 ?>s both;"
                             data-status="<?= $beneficiary['is_passout'] ? 'graduate' : 'active' ?>"
                             data-name="<?= strtolower(esc($beneficiary['name'] ?? '')) ?>"
                             data-course="<?= strtolower(esc($beneficiary['course'] ?? '')) ?>"
                             data-institution="<?= strtolower(esc($beneficiary['institution'] ?? '')) ?>">

                        <!-- Card Header -->
                        <div class="relative p-6 bg-gradient-to-br from-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-50 to-<?= $beneficiary['is_passout'] ? 'green' : 'purple' ?>-50 border-b border-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-100">
                            <div class="flex flex-col items-center text-center">
                                <!-- Profile Image -->
                                <div class="w-24 h-24 rounded-3xl overflow-hidden bg-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-100 flex-shrink-0 ring-4 ring-white shadow-lg mb-4">
                                    <?php if (!empty($beneficiary['image']) && file_exists(WRITEPATH . 'uploads/beneficiaries/' . $beneficiary['image'])): ?>
                                        <img src="<?= base_url('uploads/beneficiaries/' . $beneficiary['image']) ?>"
                                             alt="<?= esc($beneficiary['name'] ?? 'Student') ?>" 
                                             class="w-full h-full object-cover">
                                    <?php else: ?>
                                        <div class="w-full h-full bg-gradient-to-br from-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-200 to-<?= $beneficiary['is_passout'] ? 'green' : 'purple' ?>-200 flex items-center justify-center">
                                            <i class="fas fa-user-graduate text-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-700 text-3xl"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Student Info -->
                                <h3 class="text-xl font-bold text-gray-900 mb-2"><?= esc($beneficiary['name'] ?? 'Student Name') ?></h3>
                                <p class="text-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-700 font-semibold mb-3"><?= esc($beneficiary['course'] ?? 'Course') ?></p>
                                <span class="inline-flex items-center bg-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-100 text-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-800 px-4 py-2 rounded-full text-sm font-medium">
                                    <i class="fas fa-<?= $beneficiary['is_passout'] ? 'medal' : 'graduation-cap' ?> mr-2"></i>
                                    <?= $beneficiary['is_passout'] ? 'Graduate' : 'Active Student' ?>
                                </span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6">
                            <div class="space-y-4">
                                <!-- Institution -->
                                <div class="bg-gray-50 rounded-2xl p-4 border-l-4 border-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-400">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                        <i class="fas fa-university text-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-500 mr-2"></i>
                                        Institution
                                    </h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        <?= esc($beneficiary['institution'] ?? 'Not specified') ?>
                                    </p>
                                </div>

                                <!-- Location & Year -->
                                <div class="grid grid-cols-2 gap-3">
                                    <?php if (!empty($beneficiary['city'])): ?>
                                        <div class="bg-blue-50 rounded-xl p-3 border border-blue-100">
                                            <div class="flex items-center text-blue-700">
                                                <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>
                                                <span class="text-sm font-medium"><?= esc($beneficiary['city']) ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($beneficiary['year'])): ?>
                                        <div class="bg-purple-50 rounded-xl p-3 border border-purple-100">
                                            <div class="flex items-center text-purple-700">
                                                <i class="fas fa-calendar mr-2 text-purple-500"></i>
                                                <span class="text-sm font-medium"><?= esc($beneficiary['year']) ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Company (if graduate) -->
                                <?php if ($beneficiary['is_passout'] && !empty($beneficiary['company_name'])): ?>
                                    <div class="bg-emerald-50 rounded-2xl p-4 border-l-4 border-emerald-400 border border-emerald-100">
                                        <h4 class="text-sm font-semibold text-emerald-800 mb-2 flex items-center">
                                            <i class="fas fa-building text-emerald-600 mr-2"></i>
                                            Current Company
                                        </h4>
                                        <p class="text-emerald-700 text-sm font-medium">
                                            <?= esc($beneficiary['company_name']) ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Card Footer -->
                            <div class="flex items-center justify-end mt-6 pt-6 border-t border-gray-100">
                                <button onclick="viewBeneficiary(<?= htmlspecialchars(json_encode([
                                    'name' => $beneficiary['name'] ?? '',
                                    'course' => $beneficiary['course'] ?? '',
                                    'institution' => $beneficiary['institution'] ?? '',
                                    'city' => $beneficiary['city'] ?? '',
                                    'state' => $beneficiary['state'] ?? '',
                                    'year' => $beneficiary['year'] ?? '',
                                    'age' => $beneficiary['age'] ?? '',
                                    'education_level' => $beneficiary['education_level'] ?? '',
                                    'phone' => $beneficiary['phone'] ?? '',
                                    'email' => $beneficiary['email'] ?? '',
                                    'company_name' => $beneficiary['company_name'] ?? '',
                                    'linkedin_url' => $beneficiary['linkedin_url'] ?? '',
                                    'company_link' => $beneficiary['company_link'] ?? '',
                                    'family_background' => $beneficiary['family_background'] ?? '',
                                    'academic_achievements' => $beneficiary['academic_achievements'] ?? '',
                                    'career_goals' => $beneficiary['career_goals'] ?? '',
                                    'is_passout' => $beneficiary['is_passout'] ? true : false,
                                    'status' => $beneficiary['status'] ?? '',
                                    'image' => !empty($beneficiary['image']) ? base_url('uploads/beneficiaries/' . $beneficiary['image']) : ''
                                ]), ENT_QUOTES) ?>)"
                                        class="text-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-600 hover:text-<?= $beneficiary['is_passout'] ? 'emerald' : 'indigo' ?>-700 font-medium text-sm flex items-center group transition-all duration-200">
                                    View Profile
                                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-200"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- No Results Message -->
            <div id="noResults" class="hidden text-center py-20">
                <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg">
                    <i class="fas fa-search text-gray-400 text-4xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">No Students Found</h3>
                <p class="text-gray-600 max-w-md mx-auto text-lg">
                    Try adjusting your search criteria or filter options to find the students you're looking for.
                </p>
            </div>
        <?php else: ?>
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="w-32 h-32 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg">
                    <i class="fas fa-graduation-cap text-indigo-500 text-4xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Students Coming Soon</h3>
                <p class="text-gray-600 max-w-md mx-auto text-lg">
                    We're currently onboarding amazing students. Check back soon to meet our future leaders!
                </p>
                <a href="<?= base_url(($language ?? 'en')) ?>" 
                   class="inline-flex items-center bg-indigo-600 text-white px-8 py-4 rounded-2xl font-bold hover:bg-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1 mt-8">
                    <i class="fas fa-home mr-2"></i>
                    Back to Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Student Detail Modal -->
<div id="studentModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div id="modalHeader" class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white p-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div id="modalImage" class="w-20 h-20 rounded-3xl overflow-hidden bg-white/20 flex-shrink-0 shadow-lg">
                            <div class="w-full h-full bg-white/30 flex items-center justify-center">
                                <i class="fas fa-user-graduate text-white text-2xl"></i>
                            </div>
                        </div>
                        <div>
                            <h2 id="modalName" class="text-3xl font-bold mb-2"></h2>
                            <p id="modalCourse" class="text-white/90 text-lg"></p>
                        </div>
                    </div>
                    <button onclick="closeStudentModal()" class="text-white hover:text-gray-200 transition-colors duration-200 p-2">
                        <i class="fas fa-times text-3xl"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Content -->
            <div class="p-8 overflow-y-auto max-h-[70vh]">
                <div class="space-y-8">
                    <!-- Personal Information -->
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-user text-indigo-500 mr-3"></i>
                            Personal Information
                        </h3>
                        <div class="bg-gray-50 rounded-2xl p-6 space-y-4 border border-gray-100">
                            <div id="modalAgeDiv" class="flex items-center justify-between py-2">
                                <span class="text-gray-600 font-medium">Age:</span>
                                <span id="modalAge" class="font-semibold text-gray-900"></span>
                            </div>
                            <div id="modalEducationLevelDiv" class="flex items-center justify-between py-2">
                                <span class="text-gray-600 font-medium">Education Level:</span>
                                <span id="modalEducationLevel" class="font-semibold text-gray-900"></span>
                            </div>
                            <div id="modalLocationDiv" class="flex items-center justify-between py-2">
                                <span class="text-gray-600 font-medium">Location:</span>
                                <span id="modalLocation" class="font-semibold text-gray-900"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Academic Information -->
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-university text-indigo-500 mr-3"></i>
                            Academic Information
                        </h3>
                        <div class="bg-gray-50 rounded-2xl p-6 space-y-4 border border-gray-100">
                            <div class="flex items-center justify-between py-2">
                                <span class="text-gray-600 font-medium">Course:</span>
                                <span id="modalCourseDetail" class="font-semibold text-gray-900"></span>
                            </div>
                            <div class="flex items-center justify-between py-2">
                                <span class="text-gray-600 font-medium">Institution:</span>
                                <span id="modalInstitution" class="font-semibold text-gray-900"></span>
                            </div>
                            <div id="modalYearDiv" class="flex items-center justify-between py-2">
                                <span class="text-gray-600 font-medium">Year:</span>
                                <span id="modalYear" class="font-semibold text-gray-900"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div id="modalContactDiv">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-address-book text-indigo-500 mr-3"></i>
                            Contact Information
                        </h3>
                        <div class="bg-gray-50 rounded-2xl p-6 space-y-4 border border-gray-100">
                            <div id="modalPhoneDiv" class="flex items-center justify-between py-2">
                                <span class="text-gray-600 font-medium">Phone:</span>
                                <a id="modalPhone" href="#" class="font-semibold text-indigo-600 hover:text-indigo-800"></a>
                            </div>
                            <div id="modalEmailDiv" class="flex items-center justify-between py-2">
                                <span class="text-gray-600 font-medium">Email:</span>
                                <a id="modalEmail" href="#" class="font-semibold text-indigo-600 hover:text-indigo-800"></a>
                            </div>
                            <div id="modalLinkedInDiv" class="flex items-center justify-between py-2">
                                <span class="text-gray-600 font-medium">LinkedIn:</span>
                                <a id="modalLinkedIn" href="#" target="_blank" class="font-semibold text-blue-600 hover:text-blue-800 flex items-center">
                                    <span class="mr-2">View Profile</span>
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Professional Information (if graduate) -->
                    <div id="modalCompanyDiv" class="hidden">
                        <h3 class="text-2xl font-bold text-emerald-800 mb-4 flex items-center">
                            <i class="fas fa-building text-emerald-600 mr-3"></i>
                            Professional Information
                        </h3>
                        <div class="bg-emerald-50 rounded-2xl p-6 space-y-4 border border-emerald-100">
                            <div class="flex items-center justify-between py-2">
                                <span class="text-emerald-700 font-medium">Current Company:</span>
                                <span id="modalCompany" class="font-semibold text-emerald-900"></span>
                            </div>
                            <div id="modalCompanyLinkDiv" class="flex items-center justify-between py-2">
                                <span class="text-emerald-700 font-medium">Company Website:</span>
                                <a id="modalCompanyLink" href="#" target="_blank" class="font-semibold text-emerald-600 hover:text-emerald-800 flex items-center">
                                    <span class="mr-2">Visit Website</span>
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Family Background -->
                    <div id="modalFamilyDiv" class="hidden">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-home text-purple-500 mr-3"></i>
                            Family Background
                        </h3>
                        <div class="bg-purple-50 rounded-2xl p-6 border border-purple-100">
                            <p id="modalFamily" class="text-gray-700 leading-relaxed"></p>
                        </div>
                    </div>

                    <!-- Academic Achievements -->
                    <div id="modalAchievementsDiv" class="hidden">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-trophy text-yellow-500 mr-3"></i>
                            Academic Achievements
                        </h3>
                        <div class="bg-yellow-50 rounded-2xl p-6 border border-yellow-100">
                            <p id="modalAchievements" class="text-gray-700 leading-relaxed"></p>
                        </div>
                    </div>

                    <!-- Career Goals -->
                    <div id="modalGoalsDiv" class="hidden">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-bullseye text-green-500 mr-3"></i>
                            Career Goals
                        </h3>
                        <div class="bg-green-50 rounded-2xl p-6 border border-green-100">
                            <p id="modalGoals" class="text-gray-700 leading-relaxed"></p>
                        </div>
                    </div>

                    <!-- Status Badge -->
                    <div class="bg-blue-50 rounded-2xl p-6 text-center border border-blue-100">
                        <span id="modalStatus" class="inline-flex items-center px-6 py-3 rounded-full font-semibold text-lg"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
// Filter functionality
function filterBeneficiaries(filter) {
    const cards = document.querySelectorAll('.beneficiary-card');
    const filterBtns = document.querySelectorAll('.filter-btn');

    // Update active button
    filterBtns.forEach(btn => {
        btn.classList.remove('active', 'bg-indigo-600', 'text-white');
        btn.classList.add('bg-gray-100', 'text-gray-700');
    });
    event.target.classList.add('active', 'bg-indigo-600', 'text-white');
    event.target.classList.remove('bg-gray-100', 'text-gray-700');

    let visibleCount = 0;

    cards.forEach(card => {
        const status = card.dataset.status;
        let shouldShow = false;

        if (filter === 'all') {
            shouldShow = true;
        } else if (filter === 'active' && status === 'active') {
            shouldShow = true;
        } else if (filter === 'graduate' && status === 'graduate') {
            shouldShow = true;
        }

        if (shouldShow) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Show/hide no results message
    const noResults = document.getElementById('noResults');
    if (visibleCount === 0) {
        noResults.classList.remove('hidden');
    } else {
        noResults.classList.add('hidden');
    }
}

// Search functionality
document.getElementById('searchInput').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const cards = document.querySelectorAll('.beneficiary-card');
    let visibleCount = 0;

    cards.forEach(card => {
        const name = card.dataset.name || '';
        const course = card.dataset.course || '';
        const institution = card.dataset.institution || '';

        if (name.includes(searchTerm) || course.includes(searchTerm) || institution.includes(searchTerm)) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Show/hide no results message
    const noResults = document.getElementById('noResults');
    if (visibleCount === 0 && searchTerm !== '') {
        noResults.classList.remove('hidden');
    } else {
        noResults.classList.add('hidden');
    }
});

// Modal functions
function viewBeneficiary(beneficiaryData) {
    const data = beneficiaryData;

    // Basic Information
    document.getElementById('modalName').textContent = data.name || 'Student Name';
    document.getElementById('modalCourse').textContent = data.course || 'Course';
    document.getElementById('modalCourseDetail').textContent = data.course || 'Not specified';
    document.getElementById('modalInstitution').textContent = data.institution || 'Not specified';

    // Handle image
    const modalImage = document.getElementById('modalImage');
    if (data.image) {
        modalImage.innerHTML = `<img src="${data.image}" alt="${data.name}" class="w-full h-full object-cover">`;
    } else {
        modalImage.innerHTML = '<div class="w-full h-full bg-white/30 flex items-center justify-center"><i class="fas fa-user-graduate text-white text-2xl"></i></div>';
    }

    // Personal Information
    const ageDiv = document.getElementById('modalAgeDiv');
    const educationLevelDiv = document.getElementById('modalEducationLevelDiv');

    if (data.age) {
        document.getElementById('modalAge').textContent = data.age + ' years old';
        ageDiv.style.display = 'flex';
    } else {
        ageDiv.style.display = 'none';
    }

    if (data.education_level) {
        document.getElementById('modalEducationLevel').textContent = data.education_level;
        educationLevelDiv.style.display = 'flex';
    } else {
        educationLevelDiv.style.display = 'none';
    }

    // Location
    const locationDiv = document.getElementById('modalLocationDiv');
    const location = [data.city, data.state].filter(Boolean).join(', ');
    if (location) {
        document.getElementById('modalLocation').textContent = location;
        locationDiv.style.display = 'flex';
    } else {
        locationDiv.style.display = 'none';
    }

    // Academic year
    const yearDiv = document.getElementById('modalYearDiv');
    if (data.year) {
        document.getElementById('modalYear').textContent = data.year;
        yearDiv.style.display = 'flex';
    } else {
        yearDiv.style.display = 'none';
    }

    // Contact Information
    const contactDiv = document.getElementById('modalContactDiv');
    const phoneDiv = document.getElementById('modalPhoneDiv');
    const emailDiv = document.getElementById('modalEmailDiv');
    const linkedInDiv = document.getElementById('modalLinkedInDiv');

    let hasContact = false;

    if (data.phone) {
        const phoneLink = document.getElementById('modalPhone');
        phoneLink.textContent = data.phone;
        phoneLink.href = `tel:${data.phone}`;
        phoneDiv.style.display = 'flex';
        hasContact = true;
    } else {
        phoneDiv.style.display = 'none';
    }

    if (data.email) {
        const emailLink = document.getElementById('modalEmail');
        emailLink.textContent = data.email;
        emailLink.href = `mailto:${data.email}`;
        emailDiv.style.display = 'flex';
        hasContact = true;
    } else {
        emailDiv.style.display = 'none';
    }

    if (data.linkedin_url) {
        const linkedInLink = document.getElementById('modalLinkedIn');
        linkedInLink.href = data.linkedin_url;
        linkedInDiv.style.display = 'flex';
        hasContact = true;
    } else {
        linkedInDiv.style.display = 'none';
    }

    if (hasContact) {
        contactDiv.classList.remove('hidden');
    } else {
        contactDiv.classList.add('hidden');
    }

    // Professional Information
    const companyDiv = document.getElementById('modalCompanyDiv');
    const companyLinkDiv = document.getElementById('modalCompanyLinkDiv');

    if (data.company_name && data.is_passout) {
        document.getElementById('modalCompany').textContent = data.company_name;

        if (data.company_link) {
            const companyLink = document.getElementById('modalCompanyLink');
            companyLink.href = data.company_link;
            companyLinkDiv.style.display = 'flex';
        } else {
            companyLinkDiv.style.display = 'none';
        }

        companyDiv.classList.remove('hidden');
    } else {
        companyDiv.classList.add('hidden');
    }

    // Family Background
    const familyDiv = document.getElementById('modalFamilyDiv');
    if (data.family_background && data.family_background.trim()) {
        document.getElementById('modalFamily').innerHTML = data.family_background.replace(/\n/g, '<br>');
        familyDiv.classList.remove('hidden');
    } else {
        familyDiv.classList.add('hidden');
    }

    // Academic Achievements
    const achievementsDiv = document.getElementById('modalAchievementsDiv');
    if (data.academic_achievements && data.academic_achievements.trim()) {
        document.getElementById('modalAchievements').innerHTML = data.academic_achievements.replace(/\n/g, '<br>');
        achievementsDiv.classList.remove('hidden');
    } else {
        achievementsDiv.classList.add('hidden');
    }

    // Career Goals
    const goalsDiv = document.getElementById('modalGoalsDiv');
    if (data.career_goals && data.career_goals.trim()) {
        document.getElementById('modalGoals').innerHTML = data.career_goals.replace(/\n/g, '<br>');
        goalsDiv.classList.remove('hidden');
    } else {
        goalsDiv.classList.add('hidden');
    }

    // Update status and header colors
    const modalStatus = document.getElementById('modalStatus');
    const modalHeader = document.getElementById('modalHeader');

    if (data.is_passout) {
        modalStatus.className = 'inline-flex items-center bg-emerald-100 text-emerald-800 px-6 py-3 rounded-full font-semibold text-lg';
        modalStatus.innerHTML = '<i class="fas fa-medal mr-2"></i>Graduate';
        modalHeader.className = 'bg-gradient-to-r from-emerald-500 to-green-500 text-white p-8';
    } else {
        modalStatus.className = 'inline-flex items-center bg-indigo-100 text-indigo-800 px-6 py-3 rounded-full font-semibold text-lg';
        modalStatus.innerHTML = '<i class="fas fa-graduation-cap mr-2"></i>Active Student';
        modalHeader.className = 'bg-gradient-to-r from-indigo-500 to-purple-500 text-white p-8';
    }

    document.getElementById('studentModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeStudentModal() {
    document.getElementById('studentModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal on outside click
document.getElementById('studentModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeStudentModal();
    }
});

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeStudentModal();
    }
});
</script>

<?= $this->endSection() ?>