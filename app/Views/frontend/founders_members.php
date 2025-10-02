
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative min-h-[70vh] bg-gradient-to-br from-gray-50 via-white to-blue-50 flex items-center overflow-hidden -mt-16 pt-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <h1 class="font-bold text-5xl md:text-6xl lg:text-7xl text-gray-900 leading-tight mb-8">
                Our 
                <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent">
                    Founders
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-12 max-w-4xl mx-auto">
                Meet the visionary leaders who founded Bharatpur Foundation to transform lives through education.
            </p>
        </div>
    </div>
</section>

<!-- Founders Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                Our Founding Team
            </h2>
            <p class="font-accent text-lg text-gray-600 max-w-3xl mx-auto">
                The passionate individuals who started this journey to make education accessible to all.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Founder 1 - Sanjeev Garg -->
            <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-gradient-to-br from-blue-100 to-indigo-200 flex items-center justify-center shadow-lg">
                        <i class="fas fa-user text-4xl text-blue-600"></i>
                    </div>
                    <h3 class="font-heading text-2xl font-bold text-gray-900 mb-2">Sanjeev Garg</h3>
                    <p class="font-accent text-blue-600 font-semibold mb-4">Founder & Chairman</p>
                    <p class="font-accent text-gray-600 leading-relaxed mb-6">
                        Visionary leader dedicated to educational empowerment and social transformation through innovative programs.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <a href="#" class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center hover:bg-blue-200 transition-colors duration-200">
                            <i class="fab fa-linkedin text-blue-600"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center hover:bg-blue-200 transition-colors duration-200">
                            <i class="fas fa-envelope text-blue-600"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Founder 2 - Chavi Goyal -->
            <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-gradient-to-br from-purple-100 to-pink-200 flex items-center justify-center shadow-lg">
                        <i class="fas fa-user text-4xl text-purple-600"></i>
                    </div>
                    <h3 class="font-heading text-2xl font-bold text-gray-900 mb-2">Chavi Goyal</h3>
                    <p class="font-accent text-purple-600 font-semibold mb-4">Co-Founder & Director</p>
                    <p class="font-accent text-gray-600 leading-relaxed mb-6">
                        Passionate advocate for inclusive education and community development with extensive experience in social work.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <a href="#" class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center hover:bg-purple-200 transition-colors duration-200">
                            <i class="fab fa-linkedin text-purple-600"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center hover:bg-purple-200 transition-colors duration-200">
                            <i class="fas fa-envelope text-purple-600"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Founder 3 - Sudip Majumdar -->
            <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 md:col-span-2 lg:col-span-1">
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto mb-6 rounded-full bg-gradient-to-br from-emerald-100 to-teal-200 flex items-center justify-center shadow-lg">
                        <i class="fas fa-user text-4xl text-emerald-600"></i>
                    </div>
                    <h3 class="font-heading text-2xl font-bold text-gray-900 mb-2">Sudip Majumdar</h3>
                    <p class="font-accent text-emerald-600 font-semibold mb-4">Co-Founder & Operations Head</p>
                    <p class="font-accent text-gray-600 leading-relaxed mb-6">
                        Strategic thinker focused on operational excellence and sustainable growth in educational initiatives.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <a href="#" class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center hover:bg-emerald-200 transition-colors duration-200">
                            <i class="fab fa-linkedin text-emerald-600"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center hover:bg-emerald-200 transition-colors duration-200">
                            <i class="fas fa-envelope text-emerald-600"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Statement -->
<section class="py-20 bg-gradient-to-br from-blue-50 to-indigo-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-8">
                United by a Common Vision
            </h2>
            <p class="font-accent text-lg md:text-xl text-gray-600 leading-relaxed mb-8">
                Our founders came together with a shared belief that education is the most powerful tool for transformation. 
                Together, they have created a foundation that bridges the gap between underprivileged students and quality education, 
                ensuring that financial constraints never limit potential.
            </p>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <blockquote class="font-display text-2xl text-gray-800 italic">
                    "Education is not just about learning; it's about empowering individuals to break barriers and create their own success stories."
                </blockquote>
                <p class="font-accent text-gray-500 mt-4">- Bharatpur Foundation Team</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 30% 40%, #ffffff 2px, transparent 2px), radial-gradient(circle at 70% 60%, #ffffff 1px, transparent 1px); background-size: 80px 80px, 60px 60px;"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-8">
                Join Our Mission
            </h2>
            <p class="text-xl md:text-2xl text-white/90 leading-relaxed mb-12 max-w-3xl mx-auto">
                Be part of our team and help us create lasting change in communities through education.
            </p>

            <div class="flex flex-col sm:flex-row gap-8 justify-center">
                <a href="<?= base_url(($language ?? 'en') . '/join-us') ?>" 
                   class="bg-white text-blue-700 px-12 py-5 rounded-2xl font-bold text-lg hover:bg-gray-50 transition-all duration-200 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 flex items-center justify-center">
                    <i class="fas fa-handshake mr-3"></i>
                    Join Our Team
                </a>
                <a href="<?= base_url(($language ?? 'en') . '/beneficiaries') ?>" 
                   class="bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white px-12 py-5 rounded-2xl font-bold text-lg hover:bg-white/20 hover:border-white/50 transition-all duration-200 flex items-center justify-center transform hover:-translate-y-2">
                    <i class="fas fa-users mr-3"></i>
                    Meet Our Students
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
