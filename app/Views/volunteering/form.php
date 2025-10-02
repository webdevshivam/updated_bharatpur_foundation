
<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>स्वयंसेवी कार्य फॉर्म - नायंतार मेमोरियल चैरिटेबल ट्रस्ट</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .form-section { background: #f8f9fa; min-height: 100vh; }
        .motivation-box { background: #e3f2fd; border-left: 4px solid #2196f3; }
        .work-examples { background: #fff3e0; border-left: 4px solid #ff9800; }
    </style>
</head>
<body>
    <div class="hero-section py-5 text-center">
        <div class="container">
            <h1><i class="fas fa-heart text-danger"></i> स्वयंसेवी कार्य फॉर्म</h1>
            <h2>नायंतार मेमोरियल चैरिटेबल ट्रस्ट</h2>
            <p class="lead">प्रिय <?= esc($beneficiary['name']) ?>, इस महीने अपना स्वयंसेवी कार्य साझा करें</p>
        </div>
    </div>

    <div class="form-section py-5">
        <div class="container">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($existingSubmission): ?>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <strong>धन्यवाद!</strong> आपने इस महीने (<?= date('F Y', strtotime($currentMonth . '-01')) ?>) 
                    अपना स्वयंसेवी कार्य पहले से ही जमा कर दिया है।
                    <?php if ($existingSubmission['status'] === 'pending'): ?>
                        <br><small>आपका सबमिशन समीक्षा में है।</small>
                    <?php elseif ($existingSubmission['status'] === 'approved'): ?>
                        <br><small class="text-success">आपका सबमिशन स्वीकृत हो गया है।</small>
                    <?php endif; ?>
                </div>
            <?php else: ?>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <!-- Motivation Box -->
                    <div class="motivation-box p-4 rounded mb-4">
                        <h4><i class="fas fa-star text-warning"></i> प्रेरणा</h4>
                        <p class="mb-0">याद रखें, आपका छोटा सा प्रयास किसी की जिंदगी में बड़ा बदलाव ला सकता है। 
                        आप जो भी अच्छा काम करते हैं, वह न केवल दूसरों की मदद करता है बल्कि आपको भी खुशी और संतुष्टि देता है।</p>
                    </div>

                    <!-- Work Examples -->
                    <div class="work-examples p-4 rounded">
                        <h5><i class="fas fa-lightbulb text-warning"></i> स्वयंसेवी कार्य के उदाहरण:</h5>
                        <ul class="small">
                            <li>अनाथालय में बच्चों की सहायता करना</li>
                            <li>गरीब छात्रों को ट्यूशन देना</li>
                            <li>वृद्ध व्यक्तियों की मदद करना</li>
                            <li>भोजन वितरण करना</li>
                            <li>कपड़े दान करना</li>
                            <li>पार्क/स्कूल की सफाई करना</li>
                            <li>दिव्यांग व्यक्तियों की सहायता</li>
                            <li>गरीब लोगों को भोजन पैकेट वितरित करना</li>
                            <li>अंधे/मूक बधिर व्यक्ति की मदद करना</li>
                            <li>पुराने कपड़े या सामान दान करना</li>
                        </ul>
                        <p class="small text-muted">सूची चलती जाती है... जो भी अच्छा काम आपने किया हो, वह साझा करें!</p>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-edit"></i> अपना स्वयंसेवी कार्य साझा करें</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-check form-switch mb-4">
                                    <input class="form-check-input" type="checkbox" id="is_emergency_skip" name="is_emergency_skip" onchange="toggleSkipForm()">
                                    <label class="form-check-label text-danger" for="is_emergency_skip">
                                        <strong>आपातकालीन स्थिति:</strong> इस महीने मैं स्वयंसेवी कार्य नहीं कर सका/सकी
                                    </label>
                                </div>

                                <div id="skip-form" style="display: none;">
                                    <div class="alert alert-warning">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        <strong>कृपया बताएं कि आप इस महीने स्वयंसेवी कार्य क्यों नहीं कर सके:</strong>
                                    </div>
                                    <div class="mb-3">
                                        <label for="skip_reason" class="form-label">कारण <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="skip_reason" name="skip_reason" rows="4" 
                                                  placeholder="उदाहरण: बीमारी, पारिवारिक समस्या, परीक्षा की तैयारी, आदि..."></textarea>
                                    </div>
                                </div>

                                <div id="work-form">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="work_type" class="form-label">कार्य का प्रकार <span class="text-danger">*</span></label>
                                            <select class="form-control" id="work_type" name="work_type">
                                                <option value="">चुनें...</option>
                                                <option value="शिक्षा सहायता">शिक्षा सहायता (ट्यूशन, मार्गदर्शन)</option>
                                                <option value="भोजन वितरण">भोजन वितरण</option>
                                                <option value="कपड़े दान">कपड़े दान</option>
                                                <option value="सफाई कार्य">सफाई कार्य</option>
                                                <option value="वृद्ध सेवा">वृद्ध व्यक्तियों की सेवा</option>
                                                <option value="अनाथालय सहायता">अनाथालय में सहायता</option>
                                                <option value="दिव्यांग सहायता">दिव्यांग व्यक्तियों की सहायता</option>
                                                <option value="अन्य">अन्य</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="hours_spent" class="form-label">समय (घंटे में)</label>
                                            <input type="number" class="form-control" id="hours_spent" name="hours_spent" 
                                                   step="0.5" min="0.5" max="100" placeholder="उदाहरण: 2.5">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="work_description" class="form-label">कार्य का विवरण <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="work_description" name="work_description" rows="5" 
                                                  placeholder="कृपया विस्तार से बताएं कि आपने क्या काम किया, कहाँ किया, कितने लोगों की मदद की, आदि..."></textarea>
                                        <div class="form-text">हिंदी या अंग्रेजी में लिख सकते हैं। यदि आप कागज पर लिखकर फोटो लेना चाहते हैं तो वह भी ठीक है।</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="proof_image" class="form-label">प्रमाण फोटो (वैकल्पिक)</label>
                                        <input type="file" class="form-control" id="proof_image" name="proof_image" 
                                               accept="image/*">
                                        <div class="form-text">अपने कार्य की फोटो अपलोड करें (JPG, PNG, GIF)</div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane"></i> जमा करें
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSkipForm() {
            const skipCheckbox = document.getElementById('is_emergency_skip');
            const skipForm = document.getElementById('skip-form');
            const workForm = document.getElementById('work-form');
            const skipReason = document.getElementById('skip_reason');
            const workType = document.getElementById('work_type');
            const workDescription = document.getElementById('work_description');

            if (skipCheckbox.checked) {
                skipForm.style.display = 'block';
                workForm.style.display = 'none';
                skipReason.required = true;
                workType.required = false;
                workDescription.required = false;
            } else {
                skipForm.style.display = 'none';
                workForm.style.display = 'block';
                skipReason.required = false;
                workType.required = true;
                workDescription.required = true;
            }
        }
    </script>
</body>
</html>
