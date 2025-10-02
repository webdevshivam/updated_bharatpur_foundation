<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Structured Data for Success Stories -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "Bharatpur Foundation Success Stories",
  "description": "Inspiring success stories from our alumni who transformed their lives through education",
  "numberOfItems": <?= count($success_stories ?? []) ?>,
  "itemListElement": [
    <?php if (!empty($success_stories)): ?>
      <?php foreach ($success_stories as $index => $story): ?>
        {
          "@type": "Person",
          "name": "<?= esc($story['name']) ?>",
          "jobTitle": "<?= esc($story['current_position']) ?>",
          "description": "<?= esc(substr($story['story'], 0, 200)) ?>...",
          "alumniOf": {
            "@type": "EducationalOrganization",
            "name": "Bharatpur Foundation"
          }
        }<?= $index < count($success_stories) - 1 ? ',' : '' ?>
      <?php endforeach; ?>
    <?php endif; ?>
  ]
}
</script></old_str>

<!-- Hero Section -->
<section class="relative min-h-[70vh] bg-gradient-to-br from-emerald-50 via-white to-teal-50 flex items-center overflow-hidden -mt-16 pt-16">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #10b981 2px, transparent 2px), radial-gradient(circle at 75% 75%, #06b6d4 1px, transparent 1px); background-size: 50px 50px, 30px 30px;"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-24 h-24 bg-emerald-100 rounded-full animate-pulse opacity-60"></div>
    <div class="absolute top-40 right-20 w-20 h-20 bg-teal-100 rounded-full animate-pulse opacity-60" style="animation-delay: 1s;"></div>
    <div class="absolute bottom-40 left-20 w-16 h-16 bg-emerald-200 rounded-full animate-pulse opacity-60" style="animation-delay: 2s;"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <!-- Trust Badge -->
            <div class="inline-flex items-center bg-emerald-100 text-emerald-800 px-6 py-3 rounded-full font-medium text-sm mb-8 shadow-lg">
                <i class="fas fa-trophy mr-2"></i>
                Real Transformations • Inspiring Journeys
            </div>

            <!-- Main Headline -->
            <h1 class="font-bold text-5xl md:text-6xl lg:text-7xl text-gray-900 leading-tight mb-8">
                Success 
                <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">
                    Stories
                </span>
            </h1>

            <!-- Supporting Text -->
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-12 max-w-4xl mx-auto">
                Discover inspiring journeys of students who transformed their lives through our comprehensive empowerment program.
            </p>
        </div>
    </div>
</section>

<!-- Success Stories Grid -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-emerald-50/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (!empty($stories) && is_array($stories)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($stories as $index => $story): ?>
                    <article class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-3 border border-gray-100 overflow-hidden" 
                             style="animation: fadeInUp 0.6s ease-out <?= $index * 0.1 ?>s both;">

                        <!-- Story Image -->
                        <div class="relative h-64 bg-gradient-to-br from-emerald-100 to-teal-100 overflow-hidden">
                            <?php if (!empty($story['image']) && file_exists(WRITEPATH . 'uploads/success_stories/' . $story['image'])): ?>
                                <img src="<?= base_url('uploads/success_stories/' . $story['image']) ?>"
                                     alt="<?= esc($story['title'] ?? 'Success Story') ?>" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-br from-emerald-200 to-teal-200 flex items-center justify-center">
                                    <i class="fas fa-star text-emerald-600 text-6xl"></i>
                                </div>
                            <?php endif; ?>

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

                            <!-- Success Badge -->
                            <div class="absolute top-4 right-4 bg-emerald-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-trophy mr-1"></i>
                                Success Story
                            </div>
                        </div>

                        <!-- Story Content -->
                        <div class="p-6">
                            <div class="space-y-4">
                                <!-- Title -->
                                <h3 class="text-xl font-bold text-gray-900 leading-tight group-hover:text-emerald-600 transition-colors duration-200">
                                    <?= esc($story['name'] ?? 'Inspiring Journey') ?>
                                </h3>

                                <!-- Excerpt -->
                                <p class="text-gray-600 leading-relaxed line-clamp-3">
                                    <?= esc(substr($story['story'] ?? 'An inspiring story of transformation and success through education and determination.', 0, 150)) ?>...
                                </p>

                                <!-- Position & Company -->
                                <?php if (!empty($story['current_position']) || !empty($story['company'])): ?>
                                    <div class="bg-emerald-50 rounded-xl p-3 border border-emerald-100">
                                        <?php if (!empty($story['current_position'])): ?>
                                            <p class="text-emerald-800 font-semibold text-sm">
                                                <i class="fas fa-briefcase mr-1"></i>
                                                <?= esc($story['current_position']) ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (!empty($story['company'])): ?>
                                            <p class="text-emerald-700 text-sm">
                                                <i class="fas fa-building mr-1"></i>
                                                <?= esc($story['company']) ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Meta Info -->
                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                    <span class="flex items-center">
                                        <i class="fas fa-calendar mr-1"></i>
                                        <?= date('M j, Y', strtotime($story['created_at'] ?? 'now')) ?>
                                    </span>
                                    <?php if (!empty($story['education'])): ?>
                                        <span class="flex items-center">
                                            <i class="fas fa-graduation-cap mr-1"></i>
                                            <?= esc($story['education']) ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Read More Button -->
                            <div class="mt-6 pt-4 border-t border-gray-100">
                                <button onclick="viewStory(<?= htmlspecialchars(json_encode($story['name'] ?? ''), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode($story['story'] ?? ''), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode($story['name'] ?? ''), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode(date('M j, Y', strtotime($story['created_at'] ?? 'now'))), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode(!empty($story['image']) ? base_url('uploads/success_stories/' . $story['image']) : ''), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode($story['current_position'] ?? ''), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode($story['company'] ?? ''), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode($story['linkedin_url'] ?? ''), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode($story['company_link'] ?? ''), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode($story['education'] ?? ''), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode($story['city'] ?? ''), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode($story['state'] ?? ''), ENT_QUOTES) ?>)" class="w-full bg-emerald-600 text-white py-3 rounded-xl font-semibold hover:bg-emerald-700 transition-all duration-200 flex items-center justify-center group">
                                    Read Full Story
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
                <div class="w-32 h-32 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg">
                    <i class="fas fa-star text-emerald-500 text-4xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Success Stories Coming Soon</h3>
                <p class="text-gray-600 max-w-md mx-auto text-lg mb-8">
                    We're documenting amazing transformation stories. Check back soon to read inspiring journeys!
                </p>
                <a href="<?= base_url(($language ?? 'en')) ?>" 
                   class="inline-flex items-center bg-emerald-600 text-white px-8 py-4 rounded-2xl font-bold hover:bg-emerald-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-home mr-2"></i>
                    Back to Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Story Detail Modal -->
<div id="storyModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white p-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div id="storyModalImage" class="w-20 h-20 rounded-3xl overflow-hidden bg-white/20 flex-shrink-0 shadow-lg">
                            <div class="w-full h-full bg-white/30 flex items-center justify-center">
                                <i class="fas fa-star text-white text-2xl"></i>
                            </div>
                        </div>
                        <div>
                            <h2 id="storyModalTitle" class="text-3xl font-bold mb-2"></h2>
                            <p id="storyModalStudent" class="text-white/90 text-lg"></p>
                        </div>
                    </div>
                    <button onclick="closeStoryModal()" class="text-white hover:text-gray-200 transition-colors duration-200 p-2">
                        <i class="fas fa-times text-3xl"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Content -->
            <div class="p-8 overflow-y-auto max-h-[60vh]">
                <div class="space-y-6">
                    <!-- Professional Info -->
                    <div id="storyModalProfessional" class="bg-emerald-50 rounded-2xl p-6 border border-emerald-100 hidden">
                        <h3 class="text-lg font-bold text-emerald-800 mb-4">Professional Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div id="storyModalPosition" class="hidden">
                                <p class="text-emerald-700 font-semibold"><i class="fas fa-briefcase mr-2"></i>Position</p>
                                <p id="storyModalPositionText" class="text-gray-700"></p>
                            </div>
                            <div id="storyModalCompany" class="hidden">
                                <p class="text-emerald-700 font-semibold"><i class="fas fa-building mr-2"></i>Company</p>
                                <p id="storyModalCompanyText" class="text-gray-700"></p>
                            </div>
                            <div id="storyModalEducation" class="hidden">
                                <p class="text-emerald-700 font-semibold"><i class="fas fa-graduation-cap mr-2"></i>Education</p>
                                <p id="storyModalEducationText" class="text-gray-700"></p>
                            </div>
                            <div id="storyModalLocation" class="hidden">
                                <p class="text-emerald-700 font-semibold"><i class="fas fa-map-marker-alt mr-2"></i>Location</p>
                                <p id="storyModalLocationText" class="text-gray-700"></p>
                            </div>
                        </div>
                        <!-- Links -->
                        <div id="storyModalLinks" class="mt-4 flex space-x-4 hidden">
                            <a id="storyModalLinkedIn" href="#" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors hidden">
                                <i class="fab fa-linkedin mr-2"></i>LinkedIn
                            </a>
                            <a id="storyModalCompanyLink" href="#" target="_blank" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors hidden">
                                <i class="fas fa-external-link-alt mr-2"></i>Company Website
                            </a>
                        </div>
                    </div>

                    <!-- Full Story Content -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Success Story</h3>
                        <div id="storyModalContent" class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            <!-- Story content will be inserted here -->
                        </div>
                    </div>

                    <div class="bg-emerald-50 rounded-2xl p-6 border border-emerald-100">
                        <div class="flex items-center justify-center">
                            <span id="storyModalDate" class="text-emerald-700 font-medium"></span>
                        </div>
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

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<script>
// Story modal functions
function viewStory(title, content, studentName, date, image, position, company, linkedinUrl, companyLink, education, city, state) {
    document.getElementById('storyModalTitle').textContent = title || 'Success Story';
    document.getElementById('storyModalStudent').textContent = studentName ? `by ${studentName}` : '';

    // Display full story content
    const fullContent = content || 'An inspiring story of transformation and success.';
    document.getElementById('storyModalContent').innerHTML = fullContent.replace(/\n/g, '<br><br>');

    document.getElementById('storyModalDate').textContent = `Published on ${date}`;

    // Handle image
    const storyModalImage = document.getElementById('storyModalImage');
    if (image) {
        storyModalImage.innerHTML = `<img src="${image}" alt="${title}" class="w-full h-full object-cover">`;
    } else {
        storyModalImage.innerHTML = '<div class="w-full h-full bg-white/30 flex items-center justify-center"><i class="fas fa-star text-white text-2xl"></i></div>';
    }

    // Handle professional details
    const professionalSection = document.getElementById('storyModalProfessional');
    let hasInfo = false;

    // Position
    if (position) {
        document.getElementById('storyModalPosition').classList.remove('hidden');
        document.getElementById('storyModalPositionText').textContent = position;
        hasInfo = true;
    } else {
        document.getElementById('storyModalPosition').classList.add('hidden');
    }

    // Company
    if (company) {
        document.getElementById('storyModalCompany').classList.remove('hidden');
        document.getElementById('storyModalCompanyText').textContent = company;
        hasInfo = true;
    } else {
        document.getElementById('storyModalCompany').classList.add('hidden');
    }

    // Education
    if (education) {
        document.getElementById('storyModalEducation').classList.remove('hidden');
        document.getElementById('storyModalEducationText').textContent = education;
        hasInfo = true;
    } else {
        document.getElementById('storyModalEducation').classList.add('hidden');
    }

    // Location
    if (city || state) {
        document.getElementById('storyModalLocation').classList.remove('hidden');
        const location = [city, state].filter(Boolean).join(', ');
        document.getElementById('storyModalLocationText').textContent = location;
        hasInfo = true;
    } else {
        document.getElementById('storyModalLocation').classList.add('hidden');
    }

    // Links
    const linksSection = document.getElementById('storyModalLinks');
    let hasLinks = false;

    if (linkedinUrl) {
        document.getElementById('storyModalLinkedIn').classList.remove('hidden');
        document.getElementById('storyModalLinkedIn').href = linkedinUrl;
        hasLinks = true;
    } else {
        document.getElementById('storyModalLinkedIn').classList.add('hidden');
    }

    if (companyLink) {
        document.getElementById('storyModalCompanyLink').classList.remove('hidden');
        document.getElementById('storyModalCompanyLink').href = companyLink;
        hasLinks = true;
    } else {
        document.getElementById('storyModalCompanyLink').classList.add('hidden');
    }

    if (hasLinks) {
        linksSection.classList.remove('hidden');
    } else {
        linksSection.classList.add('hidden');
    }

    if (hasInfo) {
        professionalSection.classList.remove('hidden');
    } else {
        professionalSection.classList.add('hidden');
    }

    document.getElementById('storyModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeStoryModal() {
    document.getElementById('storyModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal on outside click
document.getElementById('storyModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeStoryModal();
    }
});

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeStoryModal();
    }
});
</script>

<?= $this->endSection() ?>