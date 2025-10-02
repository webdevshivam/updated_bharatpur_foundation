<div class="card-body p-3">
                    <!-- Course & Institution - Clean two-line block -->
                    <div class="mb-3">
                        <h6 class="mb-1 text-dark fw-bold" style="font-size: 0.9rem; line-height: 1.2;">
                            <?= esc($beneficiary['course']) ?>
                        </h6>
                        <p class="text-muted mb-0" style="font-size: 0.8rem;" title="<?= esc($beneficiary['institution']) ?>">
                            <?= esc(strlen($beneficiary['institution']) > 35 ? substr($beneficiary['institution'], 0, 35) . '...' : $beneficiary['institution']) ?>
                        </p>
                    </div>

                    <!-- Education Level Badge -->
                    <div class="mb-3">
                        <span class="badge bg-light text-dark border" style="font-size: 0.75rem;">
                            <i class="fas fa-graduation-cap me-1"></i><?= $beneficiary['is_passout'] ? 'Graduated' : esc($beneficiary['education_level']) ?>
                        </span>
                    </div>

                    <!-- Company Name - Only if available -->
                    <?php if (!empty($beneficiary['company_name'])): ?>
                    <div class="mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-building text-success me-2" style="font-size: 0.8rem;"></i>
                            <span class="text-dark" style="font-size: 0.8rem;" title="<?= esc($beneficiary['company_name']) ?>">
                                <?= esc(strlen($beneficiary['company_name']) > 25 ? substr($beneficiary['company_name'], 0, 25) . '...' : $beneficiary['company_name']) ?>
                            </span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Action Buttons - Better positioned -->
                    <div class="d-flex gap-2 align-items-center">
                        <div class="d-flex gap-1 flex-grow-1">
                            <?php if (!empty($beneficiary['email'])): ?>
                                <a href="mailto:<?= esc($beneficiary['email']) ?>" 
                                   class="btn btn-outline-primary btn-sm" 
                                   style="font-size: 0.7rem; padding: 0.25rem 0.5rem;"
                                   title="Send Email">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($beneficiary['linkedin_url'])): ?>
                                <a href="<?= esc($beneficiary['linkedin_url']) ?>" 
                                   target="_blank" 
                                   class="btn btn-outline-info btn-sm" 
                                   style="font-size: 0.7rem; padding: 0.25rem 0.5rem;"
                                   title="LinkedIn Profile">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        <button class="btn btn-primary btn-sm read-more-btn" 
                                style="font-size: 0.75rem; padding: 0.3rem 0.8rem;"
                                data-beneficiary-id="<?= $beneficiary['id'] ?>"
                                data-beneficiary-name="<?= esc($beneficiary['name']) ?>"
                                data-beneficiary-age="<?= esc($beneficiary['age'] ?? '') ?>"
                                data-beneficiary-education="<?= esc($beneficiary['education_level']) ?>"
                                data-beneficiary-course="<?= esc($beneficiary['course']) ?>"
                                data-beneficiary-institution="<?= esc($beneficiary['institution']) ?>"
                                data-beneficiary-city="<?= esc($beneficiary['city'] ?? '') ?>"
                                data-beneficiary-state="<?= esc($beneficiary['state'] ?? '') ?>"
                                data-beneficiary-phone="<?= esc($beneficiary['phone'] ?? '') ?>"
                                data-beneficiary-email="<?= esc($beneficiary['email'] ?? '') ?>"
                                data-beneficiary-linkedin="<?= esc($beneficiary['linkedin_url'] ?? '') ?>"
                                data-beneficiary-company-name="<?= esc($beneficiary['company_name'] ?? '') ?>"
                                data-beneficiary-family="<?= esc($beneficiary['family_background'] ?? '') ?>"
                                data-beneficiary-achievements="<?= esc($beneficiary['academic_achievements'] ?? '') ?>"
                                data-beneficiary-goals="<?= esc($beneficiary['career_goals'] ?? '') ?>"
                                data-beneficiary-company="<?= esc($beneficiary['company_link'] ?? '') ?>"
                                data-beneficiary-status="<?= esc($beneficiary['status']) ?>"
                                title="View Details">
                            <i class="fas fa-info-circle me-1"></i>Details
                        </button>
                    </div>
                </div>