
<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative min-h-[70vh] bg-gradient-to-br from-orange-50 via-white to-red-50 flex items-center overflow-hidden -mt-16 pt-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <h1 class="font-bold text-5xl md:text-6xl lg:text-7xl text-gray-900 leading-tight mb-8">
                Media & 
                <span class="bg-gradient-to-r from-orange-600 via-red-600 to-pink-600 bg-clip-text text-transparent">
                    News
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-12 max-w-4xl mx-auto">
                Stay updated with our latest news, media coverage, and foundation activities.
            </p>
        </div>
    </div>
</section>

<!-- Media Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                Latest Updates
            </h2>
            <p class="font-accent text-lg text-gray-600 max-w-3xl mx-auto">
                Media coverage and news updates will be available soon. For the latest information, visit our official website.
            </p>
        </div>

        <div class="text-center">
            <a href="https://nayantaratrust.com/" target="_blank" 
               class="inline-flex items-center bg-orange-600 text-white px-8 py-4 rounded-xl font-heading font-semibold hover:bg-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                <i class="fas fa-external-link-alt mr-2"></i>
                Visit Official Website
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
