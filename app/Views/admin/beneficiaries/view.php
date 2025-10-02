<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-eye"></i> View Beneficiary Details</h4>
    <div>
        <a href="<?= base_url('admin/beneficiaries/edit/' . $beneficiary['id']) ?>" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="<?= base_url('admin/beneficiaries') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
</div>

<div class="row">
    <!-- Personal Information -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-user"></i> Personal Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>ID:</strong></div>
                    <div class="col-sm-8">#<?= esc($beneficiary['id']) ?></div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Name:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['name']) ?></div>
                </div>

                <?php if (!empty($beneficiary['age'])): ?>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Age:</strong></div>
                        <div class="col-sm-8"><?= esc($beneficiary['age']) ?> years</div>
                    </div>
                <?php endif; ?>

                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Education Level:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['education_level']) ?></div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Course:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['course']) ?></div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Institution:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['institution']) ?></div>
                </div>

                <?php if (!empty($beneficiary['city']) || !empty($beneficiary['state'])): ?>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Location:</strong></div>
                        <div class="col-sm-8">
                            <?php
                            $location = [];
                            if (!empty($beneficiary['city'])) $location[] = esc($beneficiary['city']);
                            if (!empty($beneficiary['state'])) $location[] = esc($beneficiary['state']);
                            echo implode(', ', $location);
                            ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Phone:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['phone'] ?? 'Not provided') ?></div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Email:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['email'] ?? 'Not provided') ?></div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4"><strong>LinkedIn URL:</strong></div>
                    <div class="col-sm-8">
                        <?php if (!empty($beneficiary['linkedin_url'])): ?>
                            <a href="<?= esc($beneficiary['linkedin_url']) ?>" target="_blank"><?= esc($beneficiary['linkedin_url']) ?></a>
                        <?php else: ?>
                            Not provided
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Company Link:</strong></div>
                    <div class="col-sm-8">
                        <?php if (!empty($beneficiary['company_link'])): ?>
                            <a href="<?= esc($beneficiary['company_link']) ?>" target="_blank"><?= esc($beneficiary['company_link']) ?></a>
                        <?php else: ?>
                            Not provided
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Status:</strong></div>
                    <div class="col-sm-8">
                        <span class="badge bg-<?= $beneficiary['status'] == 'active' ? 'success' : 'secondary' ?>">
                            <?= esc(ucfirst($beneficiary['status'])) ?>
                        </span>
                    </div>
                </div>

                <?php if (!empty($beneficiary['family_background'])): ?>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Family Background:</strong></div>
                        <div class="col-sm-8"><?= nl2br(esc($beneficiary['family_background'])) ?></div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($beneficiary['academic_achievements'])): ?>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Academic Achievements:</strong></div>
                        <div class="col-sm-8"><?= nl2br(esc($beneficiary['academic_achievements'])) ?></div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($beneficiary['career_goals'])): ?>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Career Goals:</strong></div>
                        <div class="col-sm-8"><?= nl2br(esc($beneficiary['career_goals'])) ?></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Academic Information -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-graduation-cap"></i> Academic Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Course:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['course']) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>University:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['institution']) ?></div>
                </div>


                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Education Level:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['education_level']) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Age:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['age']) ?> years</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact & Links Information -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-link"></i> Contact & Links</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($beneficiary['phone'])): ?>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Phone:</strong></div>
                        <div class="col-sm-8"><?= esc($beneficiary['phone']) ?></div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($beneficiary['email'])): ?>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Email:</strong></div>
                        <div class="col-sm-8"><?= esc($beneficiary['email']) ?></div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($beneficiary['linkedin_url'])): ?>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>LinkedIn:</strong></div>
                        <div class="col-sm-8"><a href="<?= esc($beneficiary['linkedin_url']) ?>" target="_blank">View Profile</a></div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($beneficiary['company_name'])): ?>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Company Name:</strong></div>
                        <div class="col-sm-8"><?= esc($beneficiary['company_name']) ?></div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($beneficiary['company_link'])): ?>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Company Link:</strong></div>
                        <div class="col-sm-8"><a href="<?= esc($beneficiary['company_link']) ?>" target="_blank">View Link</a></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Family Information -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-home"></i> Family Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Father's Name:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['father_name']) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Father's Occupation:</strong></div>
                    <div class="col-sm-8"><?= esc($beneficiary['father_occupation']) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Address:</strong></div>
                    <div class="col-sm-8"><?= nl2br(esc($beneficiary['address'])) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Timeline -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-clock"></i> Record Timeline</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><i class="fas fa-plus-circle text-success"></i> <strong>Added:</strong> <?= date('F j, Y g:i A', strtotime($beneficiary['created_at'])) ?></p>
            </div>
            <div class="col-md-6">
                <p><i class="fas fa-edit text-warning"></i> <strong>Last Updated:</strong> <?= date('F j, Y g:i A', strtotime($beneficiary['updated_at'])) ?></p>
            </div>
        </div>
    </div>
</div>

<script>
    var page_title = 'View Beneficiary';
</script>

<?= $this->endSection() ?>
