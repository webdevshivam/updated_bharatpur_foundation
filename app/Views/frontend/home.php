<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Additional Structured Data for Homepage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "EducationalOrganization",
  "name": "Bharatpur Foundation",
  "alternateName": "Nayantar Memorial Charitable Trust",
  "url": "<?= base_url() ?>",
  "logo": "<?= base_url('assets/images/bharatpur-logo.png') ?>",
  "description": "Bharatpur Foundation transforms underprivileged students into job-ready professionals through comprehensive education, mentoring, and career placement support.",
  "foundingDate": "2020",
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Educational Programs",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "EducationalOccupationalProgram",
          "name": "Scholarship Program",
          "description": "Complete academic fee coverage with modern learning tools"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "EducationalOccupationalProgram",
          "name": "Mentoring Program",
          "description": "One-on-one guidance from industry professionals"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "EducationalOccupationalProgram",
          "name": "Career Placement",
          "description": "Job placement assistance and professional training"
        }
      }
    ]
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9",
    "ratingCount": "500",
    "bestRating": "5"
  }
}
</script>

<!-- Hero Section -->
<section class="relative min-h-screen bg-white flex items-center overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #0ea5e9 2px, transparent 2px), radial-gradient(circle at 75% 75%, #f59e0b 1px, transparent 1px); background-size: 50px 50px, 30px 30px;"></div>
    </div>

    <!-- Floating Elements with Enhanced Shadows -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-primary-100 rounded-full animate-bounce-subtle opacity-60 shadow-xl"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-accent-100 rounded-full animate-bounce-subtle opacity-60 shadow-lg" style="animation-delay: 1s;"></div>
    <div class="absolute bottom-40 left-20 w-12 h-12 bg-primary-200 rounded-full animate-bounce-subtle opacity-60 shadow-md" style="animation-delay: 2s;"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-6xl mx-auto text-center">
            <!-- Trust Badge -->
            <div class="inline-flex items-center bg-primary-100 text-primary-800 px-6 py-3 rounded-full font-accent font-medium text-sm mb-8 shadow-lg">
                <i class="fas fa-certificate mr-2"></i>
                Registered NGO • Audited Impact
            </div>

            <!-- Main Headline -->
            <h1 class="font-display text-4xl md:text-6xl lg:text-7xl font-bold text-gray-900 leading-tight mb-8">
                We Transform Underprivileged Students Into 
                <span class="bg-gradient-to-r from-primary-600 to-accent-500 bg-clip-text text-transparent">
                    Job-Ready Professionals
                </span>
            </h1>

            <!-- Supporting Text -->
            <p class="font-accent text-xl md:text-2xl text-gray-600 leading-relaxed mb-12 max-w-4xl mx-auto">
                Our objective is clear: We transform underprivileged students into job-ready professionals through comprehensive education, mentoring, and career placement support.
            </p>

            <!-- Official Website Notice -->
            <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-8 shadow-sm">
                <p class="font-accent text-amber-700 text-center text-sm">
                    This is an unofficial version. Visit our <a href="https://nayantaratrust.com/" target="_blank" class="text-amber-800 font-semibold hover:underline">official website</a> for complete information.
                </p>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16">
                <a href="<?= base_url($language . '/beneficiaries') ?>" class="bg-gradient-to-r from-primary-600 to-primary-700 text-white px-10 py-5 rounded-xl font-heading font-semibold hover:from-primary-700 hover:to-primary-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center text-lg">
                    <i class="fas fa-users mr-3"></i>
                    Meet Students
                </a>
                <a href="<?= base_url($language . '/success-stories') ?>" class="bg-white border-2 border-gray-200 text-gray-700 px-10 py-5 rounded-xl font-heading font-semibold hover:border-primary-300 hover:text-primary-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-1 flex items-center justify-center text-lg">
                    <i class="fas fa-star mr-3"></i>
                    Success Stories
                </a>
            </div>

            <!-- Trust Indicators -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 max-w-5xl mx-auto">
                <div class="text-center bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-primary-100 hover:shadow-xl transition-all duration-300">
                    <div class="font-display text-3xl md:text-4xl font-bold text-primary-600 mb-2">500+</div>
                    <div class="font-accent text-gray-600">Students Supported</div>
                </div>
                <div class="text-center bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-accent-100 hover:shadow-xl transition-all duration-300">
                    <div class="font-display text-3xl md:text-4xl font-bold text-accent-500 mb-2">95%</div>
                    <div class="font-accent text-gray-600">Employment Rate</div>
                </div>
                <div class="text-center bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-emerald-100 hover:shadow-xl transition-all duration-300">
                    <div class="font-display text-3xl md:text-4xl font-bold text-emerald-500 mb-2">100+</div>
                    <div class="font-accent text-gray-600">Industry Mentors</div>
                </div>
                <div class="text-center bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-purple-100 hover:shadow-xl transition-all duration-300">
                    <div class="font-display text-3xl md:text-4xl font-bold text-purple-500 mb-2">₹50L+</div>
                    <div class="font-accent text-gray-600">Scholarships Given</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Three Pillars Section -->
<section class="py-20 bg-white border-t-4 border-gray-100">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <div class="inline-block bg-gradient-to-r from-primary-50 to-accent-50 rounded-2xl p-8 shadow-lg border border-primary-100 mb-8">
                <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Complete Student Development
                </h2>
                <p class="font-accent text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Three comprehensive pillars that ensure every student receives world-class support for their academic and professional journey
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Education Pillar -->
            <div class="group bg-gradient-to-br from-primary-50 to-primary-100 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up border-2 border-primary-200 hover:border-primary-300">
                <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-gray-900 mb-4">Quality Education</h3>
                <p class="font-accent text-gray-600 mb-6 leading-relaxed">
                    Complete academic fee coverage with modern learning tools and industry-relevant curriculum designed for success.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center font-accent text-sm text-gray-700">
                        <i class="fas fa-check text-primary-500 mr-3"></i>
                        Full academic coverage
                    </li>
                    <li class="flex items-center font-accent text-sm text-gray-700">
                        <i class="fas fa-check text-primary-500 mr-3"></i>
                        Modern learning tools
                    </li>
                    <li class="flex items-center font-accent text-sm text-gray-700">
                        <i class="fas fa-check text-primary-500 mr-3"></i>
                        Industry-relevant skills
                    </li>
                </ul>
            </div>

            <!-- Mentoring Pillar -->
            <div class="group bg-gradient-to-br from-accent-50 to-accent-100 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up border-2 border-accent-200 hover:border-accent-300" style="animation-delay: 0.2s;">
                <div class="w-16 h-16 bg-gradient-to-br from-accent-500 to-accent-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-gray-900 mb-4">Personal Mentoring</h3>
                <p class="font-accent text-gray-600 mb-6 leading-relaxed">
                    One-on-one guidance from industry professionals for comprehensive career and personal development.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center font-accent text-sm text-gray-700">
                        <i class="fas fa-check text-accent-500 mr-3"></i>
                        Industry mentors
                    </li>
                    <li class="flex items-center font-accent text-sm text-gray-700">
                        <i class="fas fa-check text-accent-500 mr-3"></i>
                        Regular guidance sessions
                    </li>
                    <li class="flex items-center font-accent text-sm text-gray-700">
                        <i class="fas fa-check text-accent-500 mr-3"></i>
                        Personality development
                    </li>
                </ul>
            </div>

            <!-- Career Development Pillar -->
            <div class="group bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up border-2 border-emerald-200 hover:border-emerald-300" style="animation-delay: 0.4s;">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <i class="fas fa-briefcase text-white text-2xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-gray-900 mb-4">Career Placement</h3>
                <p class="font-accent text-gray-600 mb-6 leading-relaxed">
                    Job placement assistance and professional training for sustainable, well-paying careers in top companies.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center font-accent text-sm text-gray-700">
                        <i class="fas fa-check text-emerald-500 mr-3"></i>
                        Job placement support
                    </li>
                    <li class="flex items-center font-accent text-sm text-gray-700">
                        <i class="fas fa-check text-emerald-500 mr-3"></i>
                        Interview training
                    </li>
                    <li class="flex items-center font-accent text-sm text-gray-700">
                        <i class="fas fa-check text-emerald-500 mr-3"></i>
                        Career advancement
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Impact Statistics -->
<section class="py-20 bg-gradient-to-br from-gray-900 via-gray-800 to-primary-900 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 80%, #ffffff 1px, transparent 1px), radial-gradient(circle at 80% 20%, #ffffff 1px, transparent 1px); background-size: 60px 60px, 40px 40px;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                Lives Transformed, Futures Built
            </h2>
            <p class="font-accent text-lg md:text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Every number represents a family with new hope, a student achieving dreams, and communities growing stronger together
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="text-center group animate-fade-in-up">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/15 transition-all duration-300 group-hover:scale-105">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <div class="font-display text-3xl md:text-4xl font-bold mb-2"><?= $total_beneficiaries ?? '500' ?>+</div>
                    <div class="font-accent text-gray-300 font-medium">Lives Transformed</div>
                    <div class="font-accent text-xs text-gray-400 mt-1">From struggle to success</div>
                </div>
            </div>

            <div class="text-center group animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/15 transition-all duration-300 group-hover:scale-105">
                    <div class="w-12 h-12 bg-gradient-to-br from-accent-400 to-accent-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-briefcase text-white text-xl"></i>
                    </div>
                    <div class="font-display text-3xl md:text-4xl font-bold mb-2">95%</div>
                    <div class="font-accent text-gray-300 font-medium">Employment Rate</div>
                    <div class="font-accent text-xs text-gray-400 mt-1">In chosen fields</div>
                </div>
            </div>

            <div class="text-center group animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/15 transition-all duration-300 group-hover:scale-105">
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-white text-xl"></i>
                    </div>
                    <div class="font-display text-3xl md:text-4xl font-bold mb-2">50+</div>
                    <div class="font-accent text-gray-300 font-medium">Industry Mentors</div>
                    <div class="font-accent text-xs text-gray-400 mt-1">Professional guidance</div>
                </div>
            </div>

            
        </div>

        <!-- Transparency Link -->
        <div class="text-center mt-12 animate-fade-in-up" style="animation-delay: 0.4s;">
            <a href="#impact-report" class="inline-flex items-center bg-white/10 backdrop-blur-sm text-white px-8 py-4 rounded-xl font-heading font-semibold hover:bg-white/20 transition-all duration-200 border border-white/20 hover:border-white/30">
                <i class="fas fa-file-alt mr-2"></i>
                View Full Impact Report
            </a>
        </div>
    </div>
</section>

<!-- Students Showcase Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                Meet Our Amazing Students
            </h2>
            <p class="font-accent text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Dedicated individuals transforming their lives through education, determination, and the support of our community
            </p>
        </div>

        <?php 
        $beneficiaryModel = new \App\Models\BeneficiaryModel();
        $featured_beneficiaries = $beneficiaryModel->getActiveBeneficiaries(3);
        ?>

        <?php if (!empty($featured_beneficiaries)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($featured_beneficiaries as $index => $beneficiary): ?>
                    <div class="group bg-white rounded-3xl p-6 shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 animate-fade-in-up" style="animation-delay: <?= $index * 0.1 ?>s;">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-16 h-16 rounded-2xl overflow-hidden bg-gray-100 flex-shrink-0">
                                <?php if (!empty($beneficiary['image']) && file_exists(WRITEPATH . 'uploads/beneficiaries/' . $beneficiary['image'])): ?>
                                    <img src="<?= base_url('uploads/beneficiaries/' . $beneficiary['image']) ?>"
                                         alt="<?= esc($beneficiary['name']) ?>" 
                                         class="w-full h-full object-cover">
                                <?php else: ?>
                                    <div class="w-full h-full bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                                        <i class="fas fa-user-graduate text-primary-600 text-xl"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <h3 class="font-heading text-lg font-bold text-gray-900"><?= esc($beneficiary['name']) ?></h3>
                                <p class="font-accent text-gray-600"><?= esc($beneficiary['course']) ?></p>
                                <span class="inline-flex items-center bg-primary-100 text-primary-800 px-3 py-1 rounded-full text-xs font-accent font-medium mt-2">
                                    <i class="fas fa-graduation-cap mr-1"></i>
                                    <?= $beneficiary['is_passout'] ? 'Alumni' : 'Active Student' ?>
                                </span>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-university text-primary-500 mr-3"></i>
                                <span class="font-accent text-sm"><?= esc($beneficiary['institution']) ?></span>
                            </div>
                            <?php if (!empty($beneficiary['city'])): ?>
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-map-marker-alt text-primary-500 mr-3"></i>
                                    <span class="font-accent text-sm"><?= esc($beneficiary['city']) ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-12 animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="<?= base_url(($language ?? 'en') . '/beneficiaries') ?>" 
                   class="inline-flex items-center bg-gradient-to-r from-primary-600 to-primary-700 text-white px-8 py-4 rounded-xl font-heading font-semibold hover:from-primary-700 hover:to-primary-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-users mr-2"></i>
                    Meet All Our Students
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Success Stories Preview -->
<?php if (!empty($success_stories)): ?>
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Success Stories That Inspire
                </h2>
                <p class="font-accent text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Discover the journeys of brave individuals who transformed challenges into triumphs through determination and education
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach (array_slice($success_stories, 0, 3) as $index => $story): ?>
                    <div class="group bg-gradient-to-br from-white to-gray-50 rounded-3xl p-6 shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 animate-fade-in-up" style="animation-delay: <?= $index * 0.1 ?>s;">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-16 h-16 rounded-2xl overflow-hidden bg-gray-100 flex-shrink-0">
                                <?php if (!empty($story['image'])): ?>
                                    <img src="<?= base_url('uploads/success_stories/' . $story['image']) ?>"
                                         alt="<?= esc($story['name']) ?>" 
                                         class="w-full h-full object-cover">
                                <?php else: ?>
                                    <div class="w-full h-full bg-gradient-to-br from-emerald-100 to-emerald-200 flex items-center justify-center">
                                        <i class="fas fa-user text-emerald-600 text-xl"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <h3 class="font-heading text-lg font-bold text-gray-900"><?= esc($story['name']) ?></h3>
                                <p class="font-accent text-gray-600"><?= esc($story['current_position']) ?></p>
                                <span class="inline-flex items-center bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-xs font-accent font-medium mt-2">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Employed
                                </span>
                            </div>
                        </div>

                        <p class="font-accent text-gray-700 leading-relaxed mb-4">
                            <?= esc(substr($story['story'], 0, 120)) ?>...
                        </p>

                        <div class="flex justify-between items-center mb-4">
                            <div class="text-xs text-gray-500 font-accent">
                                <i class="fas fa-calendar mr-1"></i>
                                Graduate <?= date('Y', strtotime($story['created_at'] ?? 'now')) ?>
                            </div>
                            <div class="flex space-x-2">
                                <?php if (!empty($story['linkedin_url'])): ?>
                                    <a href="<?= esc($story['linkedin_url']) ?>" target="_blank" 
                                       class="inline-flex items-center text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full hover:bg-blue-200 transition-colors duration-200">
                                        <i class="fab fa-linkedin mr-1"></i>
                                        LinkedIn
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($story['company_url'])): ?>
                                    <a href="<?= esc($story['company_url']) ?>" target="_blank" 
                                       class="inline-flex items-center text-xs bg-gray-100 text-gray-800 px-2 py-1 rounded-full hover:bg-gray-200 transition-colors duration-200">
                                        <i class="fas fa-building mr-1"></i>
                                        Company
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-12 animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="<?= base_url($language . '/success-stories') ?>" 
                   class="inline-flex items-center bg-white border-2 border-gray-200 text-gray-700 px-8 py-4 rounded-xl font-heading font-semibold hover:border-emerald-300 hover:text-emerald-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                    <i class="fas fa-arrow-right mr-2"></i>
                    View All Success Stories
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>



<?= $this->endSection() ?>