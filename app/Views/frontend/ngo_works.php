<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative min-h-[70vh] bg-gradient-to-br from-blue-50 via-white to-indigo-50 flex items-center overflow-hidden -mt-16 pt-16">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #3b82f6 2px, transparent 2px), radial-gradient(circle at 75% 75%, #6366f1 1px, transparent 1px); background-size: 50px 50px, 30px 30px;"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-24 h-24 bg-blue-100 rounded-full animate-pulse opacity-60"></div>
    <div class="absolute top-40 right-20 w-20 h-20 bg-indigo-100 rounded-full animate-pulse opacity-60" style="animation-delay: 1s;"></div>
    <div class="absolute bottom-40 left-20 w-16 h-16 bg-blue-200 rounded-full animate-pulse opacity-60" style="animation-delay: 2s;"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <!-- Trust Badge -->
            <div class="inline-flex items-center bg-blue-100 text-blue-800 px-6 py-3 rounded-full font-medium text-sm mb-8 shadow-lg">
                <i class="fas fa-hands-helping mr-2"></i>
                Making a Difference • Creating Impact
            </div>

            <!-- Main Headline -->
            <h1 class="font-bold text-5xl md:text-6xl lg:text-7xl text-gray-900 leading-tight mb-8">
                Our 
                <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent">
                    Works
                </span>
            </h1>

            <!-- Supporting Text -->
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-12 max-w-4xl mx-auto">
                Discover the impactful initiatives and programs that are transforming communities and creating lasting change.
            </p>
        </div>
    </div>
</section>

<!-- NGO Works Grid -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (!empty($ngo_works) && is_array($ngo_works)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($ngo_works as $index => $work): ?>
                    <article class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-3 border border-gray-100 overflow-hidden" 
                             style="animation: fadeInUp 0.6s ease-out <?= $index * 0.1 ?>s both;">

                        <!-- Work Image -->
                        <div class="relative h-64 bg-gradient-to-br from-blue-100 to-indigo-100 overflow-hidden">
                            <?php if (!empty($work['image']) && file_exists(WRITEPATH . 'uploads/ngo_works/' . $work['image'])): ?>
                                <img src="<?= base_url('uploads/ngo_works/' . $work['image']) ?>"
                                     alt="<?= esc($work['title'] ?? 'NGO Work') ?>" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-br from-blue-200 to-indigo-200 flex items-center justify-center">
                                    <i class="fas fa-hands-helping text-blue-600 text-6xl"></i>
                                </div>
                            <?php endif; ?>

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

                            <!-- Work Category Badge -->
                            <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-heart mr-1"></i>
                                Our Work
                            </div>
                        </div>

                        <!-- Work Content -->
                        <div class="p-6">
                            <div class="space-y-4">
                                <!-- Title -->
                                <h3 class="text-xl font-bold text-gray-900 leading-tight group-hover:text-blue-600 transition-colors duration-200">
                                    <?= esc($work['title'] ?? 'Community Initiative') ?>
                                </h3>

                                <!-- Excerpt -->
                                <p class="text-gray-600 leading-relaxed line-clamp-3">
                                    <?= esc(substr($work['description'] ?? 'A meaningful initiative creating positive impact in our community.', 0, 150)) ?>...
                                </p>

                                <!-- Location & Date -->
                                <div class="flex items-center justify-between text-sm text-gray-500">
                                    <?php if (!empty($work['location'])): ?>
                                        <span class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            <?= esc($work['location']) ?>
                                        </span>
                                    <?php endif; ?>
                                    <span class="flex items-center">
                                        <i class="fas fa-calendar mr-1"></i>
                                        <?= date('M j, Y', strtotime($work['created_at'] ?? 'now')) ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Read More Button -->
                            <div class="mt-6 pt-4 border-t border-gray-100">
                                <button onclick="viewWork('<?= esc($work['title'] ?? '') ?>', '<?= esc($work['description'] ?? '') ?>', '<?= esc($work['location'] ?? '') ?>', '<?= date('M j, Y', strtotime($work['created_at'] ?? 'now')) ?>', '<?= !empty($work['image']) ? base_url('uploads/ngo_works/' . $work['image']) : '' ?>')"
                                        class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-200 flex items-center justify-center group">
                                    Learn More
                                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-200"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="w-32 h-32 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg">
                    <i class="fas fa-hands-helping text-blue-500 text-4xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Our Works Coming Soon</h3>
                <p class="text-gray-600 max-w-md mx-auto text-lg mb-8">
                    We're documenting our amazing community initiatives. Check back soon to see our impactful work!
                </p>
                <a href="<?= base_url(($language ?? 'en')) ?>" 
                   class="inline-flex items-center bg-blue-600 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-home mr-2"></i>
                    Back to Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Work Detail Modal -->
<div id="workModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div id="workModalImage" class="w-20 h-20 rounded-3xl overflow-hidden bg-white/20 flex-shrink-0 shadow-lg">
                            <div class="w-full h-full bg-white/30 flex items-center justify-center">
                                <i class="fas fa-hands-helping text-white text-2xl"></i>
                            </div>
                        </div>
                        <div>
                            <h2 id="workModalTitle" class="text-3xl font-bold mb-2"></h2>
                            <p id="workModalLocation" class="text-white/90 text-lg"></p>
                        </div>
                    </div>
                    <button onclick="closeWorkModal()" class="text-white hover:text-gray-200 transition-colors duration-200 p-2">
                        <i class="fas fa-times text-3xl"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Content -->
            <div class="p-8 overflow-y-auto max-h-[60vh]">
                <div class="space-y-6">
                    <div id="workModalContent" class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        <!-- Work content will be inserted here -->
                    </div>

                    <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                        <div class="flex items-center justify-center">
                            <span id="workModalDate" class="text-blue-700 font-medium"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 30% 40%, #ffffff 2px, transparent 2px), radial-gradient(circle at 70% 60%, #ffffff 1px, transparent 1px); background-size: 80px 80px, 60px 60px;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-8">
                Join Our Mission
            </h2>
            <p class="text-xl md:text-2xl text-white/90 leading-relaxed mb-12 max-w-3xl mx-auto">
                Be part of our impactful initiatives and help us create lasting change in communities.
            </p>

            <div class="flex flex-col sm:flex-row gap-8 justify-center">
                <a href="<?= base_url(($language ?? 'en') . '/beneficiaries') ?>" 
                   class="bg-white text-blue-700 px-12 py-5 rounded-2xl font-bold text-lg hover:bg-gray-50 transition-all duration-200 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 flex items-center justify-center">
                    <i class="fas fa-users mr-3"></i>
                    Meet Our Students
                </a>
                <a href="<?= base_url(($language ?? 'en') . '/success-stories') ?>" 
                   class="bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white px-12 py-5 rounded-2xl font-bold text-lg hover:bg-white/20 hover:border-white/50 transition-all duration-200 flex items-center justify-center transform hover:-translate-y-2">
                    <i class="fas fa-star mr-3"></i>
                    Success Stories
                </a>
            </div>
        </div>
    </div>
</section>

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

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<script>
// Work modal functions
function viewWork(title, content, location, date, image) {
    document.getElementById('workModalTitle').textContent = title || 'Community Initiative';
    document.getElementById('workModalLocation').textContent = location ? `Location: ${location}` : '';
    document.getElementById('workModalContent').innerHTML = content ? content.replace(/\n/g, '<br>') : 'A meaningful initiative creating positive impact in our community.';
    document.getElementById('workModalDate').textContent = `Published on ${date}`;

    // Handle image
    const workModalImage = document.getElementById('workModalImage');
    if (image) {
        workModalImage.innerHTML = `<img src="${image}" alt="${title}" class="w-full h-full object-cover">`;
    } else {
        workModalImage.innerHTML = '<div class="w-full h-full bg-white/30 flex items-center justify-center"><i class="fas fa-hands-helping text-white text-2xl"></i></div>';
    }

    document.getElementById('workModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeWorkModal() {
    document.getElementById('workModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal on outside click
document.getElementById('workModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeWorkModal();
    }
});

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeWorkModal();
    }
});
</script>

<?= $this->endSection() ?>
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative min-h-[70vh] bg-gradient-to-br from-blue-50 via-white to-indigo-50 flex items-center overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #3b82f6 2px, transparent 2px), radial-gradient(circle at 75% 75%, #6366f1 1px, transparent 1px); background-size: 50px 50px, 30px 30px;"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-24 h-24 bg-blue-100 rounded-full animate-pulse opacity-60"></div>
    <div class="absolute top-40 right-20 w-20 h-20 bg-indigo-100 rounded-full animate-pulse opacity-60" style="animation-delay: 1s;"></div>
    <div class="absolute bottom-40 left-20 w-16 h-16 bg-blue-200 rounded-full animate-pulse opacity-60" style="animation-delay: 2s;"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <!-- Trust Badge -->
            <div class="inline-flex items-center bg-blue-100 text-blue-800 px-6 py-3 rounded-full font-medium text-sm mb-8 shadow-lg">
                <i class="fas fa-hands-helping mr-2"></i>
                Empowering Communities • Creating Impact
            </div>

            <!-- Main Headline -->
            <h1 class="font-bold text-5xl md:text-6xl lg:text-7xl text-gray-900 leading-tight mb-8">
                Our 
                <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent">
                    Works
                </span>
            </h1>

            <!-- Supporting Text -->
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-12 max-w-4xl mx-auto">
                Discover the comprehensive programs and initiatives that transform students into professionals through our innovative approach.
            </p>
        </div>
    </div>
</section>

<!-- Works Grid -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (!empty($ngo_works) && is_array($ngo_works)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($ngo_works as $index => $work): ?>
                    <article class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-3 border border-gray-100 overflow-hidden" 
                             style="animation: fadeInUp 0.6s ease-out <?= $index * 0.1 ?>s both;">

                        <!-- Work Image -->
                        <div class="relative h-64 bg-gradient-to-br from-blue-100 to-indigo-100 overflow-hidden">
                            <?php if (!empty($work['image']) && file_exists(WRITEPATH . 'uploads/ngo_works/' . $work['image'])): ?>
                                <img src="<?= base_url('uploads/ngo_works/' . $work['image']) ?>"
                                     alt="<?= esc($work['title'] ?? 'NGO Work') ?>" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-br from-blue-200 to-indigo-200 flex items-center justify-center">
                                    <i class="fas fa-hands-helping text-blue-600 text-6xl"></i>
                                </div>
                            <?php endif; ?>

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

                            <!-- Category Badge -->
                            <div class="absolute top-4 right-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-hands-helping mr-1"></i>
                                <?= esc($work['category'] ?? 'Program') ?>
                            </div>
                        </div>

                        <!-- Work Content -->
                        <div class="p-6">
                            <div class="space-y-4">
                                <!-- Title -->
                                <h3 class="text-xl font-bold text-gray-900 leading-tight group-hover:text-blue-600 transition-colors duration-200">
                                    <?= esc($work['title'] ?? 'Our Initiative') ?>
                                </h3>

                                <!-- Description -->
                                <p class="text-gray-600 leading-relaxed line-clamp-3">
                                    <?= esc(substr($work['description'] ?? 'An impactful program that creates positive change in our community.', 0, 150)) ?>...
                                </p>

                                <!-- Impact Stats -->
                                <?php if (!empty($work['beneficiaries_count']) || !empty($work['impact_metrics'])): ?>
                                    <div class="bg-blue-50 rounded-xl p-3 border border-blue-100">
                                        <?php if (!empty($work['beneficiaries_count'])): ?>
                                            <p class="text-blue-800 font-semibold text-sm">
                                                <i class="fas fa-users mr-1"></i>
                                                <?= esc($work['beneficiaries_count']) ?> People Impacted
                                            </p>
                                        <?php endif; ?>
                                        <?php if (!empty($work['impact_metrics'])): ?>
                                            <p class="text-blue-700 text-sm">
                                                <i class="fas fa-chart-line mr-1"></i>
                                                <?= esc($work['impact_metrics']) ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Meta Info -->
                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                    <span class="flex items-center">
                                        <i class="fas fa-calendar mr-1"></i>
                                        <?= date('M j, Y', strtotime($work['created_at'] ?? 'now')) ?>
                                    </span>
                                    <?php if (!empty($work['location'])): ?>
                                        <span class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            <?= esc($work['location']) ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Read More Button -->
                            <div class="mt-6 pt-4 border-t border-gray-100">
                                <button onclick="viewWork('<?= esc($work['title'] ?? '') ?>', '<?= esc($work['description'] ?? '') ?>', '<?= esc($work['objectives'] ?? '') ?>', '<?= date('M j, Y', strtotime($work['created_at'] ?? 'now')) ?>', '<?= !empty($work['image']) ? base_url('uploads/ngo_works/' . $work['image']) : '' ?>', '<?= esc($work['category'] ?? '') ?>', '<?= esc($work['beneficiaries_count'] ?? '') ?>', '<?= esc($work['impact_metrics'] ?? '') ?>', '<?= esc($work['location'] ?? '') ?>')"
                                        class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-200 flex items-center justify-center group">
                                    Learn More
                                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-200"></i>
                                </button>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="w-32 h-32 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg">
                    <i class="fas fa-hands-helping text-blue-500 text-4xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Our Works Coming Soon</h3>
                <p class="text-gray-600 max-w-md mx-auto text-lg mb-8">
                    We're documenting our amazing initiatives and programs. Check back soon to learn about our impact!
                </p>
                <a href="<?= base_url(($language ?? 'en')) ?>" 
                   class="inline-flex items-center bg-blue-600 text-white px-8 py-4 rounded-2xl font-bold hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-home mr-2"></i>
                    Back to Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Work Detail Modal -->
<div id="workModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div id="workModalImage" class="w-20 h-20 rounded-3xl overflow-hidden bg-white/20 flex-shrink-0 shadow-lg">
                            <div class="w-full h-full bg-white/30 flex items-center justify-center">
                                <i class="fas fa-hands-helping text-white text-2xl"></i>
                            </div>
                        </div>
                        <div>
                            <h2 id="workModalTitle" class="text-3xl font-bold mb-2"></h2>
                            <p id="workModalCategory" class="text-white/90 text-lg"></p>
                        </div>
                    </div>
                    <button onclick="closeWorkModal()" class="text-white hover:text-gray-200 transition-colors duration-200 p-2">
                        <i class="fas fa-times text-3xl"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Content -->
            <div class="p-8 overflow-y-auto max-h-[60vh]">
                <div class="space-y-6">
                    <!-- Impact Info -->
                    <div id="workModalImpact" class="bg-blue-50 rounded-2xl p-6 border border-blue-100 hidden">
                        <h3 class="text-lg font-bold text-blue-800 mb-4">Impact & Reach</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div id="workModalBeneficiaries" class="hidden">
                                <p class="text-blue-700 font-semibold"><i class="fas fa-users mr-2"></i>Beneficiaries</p>
                                <p id="workModalBeneficiariesText" class="text-gray-700 text-xl font-bold"></p>
                            </div>
                            <div id="workModalMetrics" class="hidden">
                                <p class="text-blue-700 font-semibold"><i class="fas fa-chart-line mr-2"></i>Impact</p>
                                <p id="workModalMetricsText" class="text-gray-700"></p>
                            </div>
                            <div id="workModalLocation" class="hidden">
                                <p class="text-blue-700 font-semibold"><i class="fas fa-map-marker-alt mr-2"></i>Location</p>
                                <p id="workModalLocationText" class="text-gray-700"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">About This Initiative</h3>
                        <div id="workModalDescription" class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            <!-- Description content will be inserted here -->
                        </div>
                    </div>

                    <!-- Objectives -->
                    <div id="workModalObjectivesSection" class="hidden">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Objectives & Goals</h3>
                        <div id="workModalObjectives" class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            <!-- Objectives content will be inserted here -->
                        </div>
                    </div>

                    <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                        <div class="flex items-center justify-center">
                            <span id="workModalDate" class="text-blue-700 font-medium"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 30% 40%, #ffffff 2px, transparent 2px), radial-gradient(circle at 70% 60%, #ffffff 1px, transparent 1px); background-size: 80px 80px, 60px 60px;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-8">
                Join Our Mission
            </h2>
            <p class="text-xl md:text-2xl text-white/90 leading-relaxed mb-12 max-w-3xl mx-auto">
                Be part of creating positive change. Support our initiatives that transform lives and empower communities.
            </p>

            <div class="flex flex-col sm:flex-row gap-8 justify-center">
                <a href="<?= base_url(($language ?? 'en') . '/beneficiaries') ?>" 
                   class="bg-white text-blue-700 px-12 py-5 rounded-2xl font-bold text-lg hover:bg-gray-50 transition-all duration-200 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 flex items-center justify-center">
                    <i class="fas fa-users mr-3"></i>
                    Meet Our Students
                </a>
                <a href="<?= base_url(($language ?? 'en') . '/success-stories') ?>" 
                   class="bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white px-12 py-5 rounded-2xl font-bold text-lg hover:bg-white/20 hover:border-white/50 transition-all duration-200 flex items-center justify-center transform hover:-translate-y-2">
                    <i class="fas fa-star mr-3"></i>
                    Read Success Stories
                </a>
            </div>
        </div>
    </div>
</section>

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

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<script>
// Work modal functions
function viewWork(title, description, objectives, date, image, category, beneficiaries, metrics, location) {
    document.getElementById('workModalTitle').textContent = title || 'Our Initiative';
    document.getElementById('workModalCategory').textContent = category || 'Program';
    
    // Display full description
    const fullDescription = description || 'An impactful program that creates positive change in our community.';
    document.getElementById('workModalDescription').innerHTML = fullDescription.replace(/\n/g, '<br><br>');
    
    // Display objectives if available
    if (objectives && objectives.trim()) {
        document.getElementById('workModalObjectivesSection').classList.remove('hidden');
        document.getElementById('workModalObjectives').innerHTML = objectives.replace(/\n/g, '<br><br>');
    } else {
        document.getElementById('workModalObjectivesSection').classList.add('hidden');
    }
    
    document.getElementById('workModalDate').textContent = `Launched on ${date}`;

    // Handle image
    const workModalImage = document.getElementById('workModalImage');
    if (image) {
        workModalImage.innerHTML = `<img src="${image}" alt="${title}" class="w-full h-full object-cover">`;
    } else {
        workModalImage.innerHTML = '<div class="w-full h-full bg-white/30 flex items-center justify-center"><i class="fas fa-hands-helping text-white text-2xl"></i></div>';
    }

    // Handle impact details
    const impactSection = document.getElementById('workModalImpact');
    let hasImpact = false;

    // Beneficiaries
    if (beneficiaries) {
        document.getElementById('workModalBeneficiaries').classList.remove('hidden');
        document.getElementById('workModalBeneficiariesText').textContent = beneficiaries;
        hasImpact = true;
    } else {
        document.getElementById('workModalBeneficiaries').classList.add('hidden');
    }

    // Metrics
    if (metrics) {
        document.getElementById('workModalMetrics').classList.remove('hidden');
        document.getElementById('workModalMetricsText').textContent = metrics;
        hasImpact = true;
    } else {
        document.getElementById('workModalMetrics').classList.add('hidden');
    }

    // Location
    if (location) {
        document.getElementById('workModalLocation').classList.remove('hidden');
        document.getElementById('workModalLocationText').textContent = location;
        hasImpact = true;
    } else {
        document.getElementById('workModalLocation').classList.add('hidden');
    }

    if (hasImpact) {
        impactSection.classList.remove('hidden');
    } else {
        impactSection.classList.add('hidden');
    }

    document.getElementById('workModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeWorkModal() {
    document.getElementById('workModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal on outside click
document.getElementById('workModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeWorkModal();
    }
});

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeWorkModal();
    }
});
</script>

<?= $this->endSection() ?>
