<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-edit"></i> Edit Beneficiary</h4>
    <a href="<?= base_url('admin/beneficiaries') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-user-edit"></i> Update Beneficiary Information</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/beneficiaries/update/' . $beneficiary['id']) ?>" method="post">
            <div class="row">
                <!-- Basic Information -->
                <div class="col-md-6">
                    <h6 class="text-primary mb-3"><i class="fas fa-user"></i> Personal Details</h6>

                    

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?= esc($beneficiary['name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" 
                               value="<?= esc($beneficiary['age']) ?>">
                    </div>
                </div>

                <!-- Academic Information -->
                <div class="col-md-6">
                    <h6 class="text-primary mb-3"><i class="fas fa-graduation-cap"></i> Academic Details</h6>

                    <div class="mb-3">
                        <label for="education_level" class="form-label">Education Level <span class="text-danger">*</span></label>
                        <select class="form-control" id="education_level" name="education_level" required>
                            <option value="">Select Education Level</option>
                            <option value="Undergraduate" <?= $beneficiary['education_level'] == 'Undergraduate' ? 'selected' : '' ?>>Undergraduate</option>
                            <option value="Postgraduate" <?= $beneficiary['education_level'] == 'Postgraduate' ? 'selected' : '' ?>>Postgraduate</option>
                            <option value="Diploma" <?= $beneficiary['education_level'] == 'Diploma' ? 'selected' : '' ?>>Diploma</option>
                            <option value="Certificate" <?= $beneficiary['education_level'] == 'Certificate' ? 'selected' : '' ?>>Certificate</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="course" class="form-label">Course <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="course" name="course" 
                               value="<?= esc($beneficiary['course']) ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="institution" class="form-label">Institution <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="institution" name="institution" 
                               value="<?= esc($beneficiary['institution']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" 
                               value="<?= esc($beneficiary['city']) ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" 
                               value="<?= esc($beneficiary['state']) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" 
                               value="<?= esc($beneficiary['phone'] ?? '') ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="<?= esc($beneficiary['email'] ?? '') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                        <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" 
                               value="<?= esc($beneficiary['linkedin_url'] ?? '') ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" 
                               value="<?= esc($beneficiary['company_name'] ?? '') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="company_link" class="form-label">Company Link</label>
                        <input type="url" class="form-control" id="company_link" name="company_link" 
                               value="<?= esc($beneficiary['company_link'] ?? '') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="active" <?= $beneficiary['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= $beneficiary['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_passout" name="is_passout" value="1" <?= (isset($beneficiary['is_passout']) && $beneficiary['is_passout']) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="is_passout">
                                <strong>Passed Out</strong>
                                <small class="text-muted d-block">Check if the student has completed their studies</small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="family_background" class="form-label">Family Background</label>
                        <textarea class="form-control" id="family_background" name="family_background" rows="3"><?= esc($beneficiary['family_background'] ?? '') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="academic_achievements" class="form-label">Academic Achievements</label>
                        <textarea class="form-control" id="academic_achievements" name="academic_achievements" rows="3"><?= esc($beneficiary['academic_achievements'] ?? '') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="career_goals" class="form-label">Career Goals</label>
                        <textarea class="form-control" id="career_goals" name="career_goals" rows="3"><?= esc($beneficiary['career_goals'] ?? '') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <?php if (!empty($beneficiary['image'])): ?>
                            <small class="text-muted">Current image: <?= esc($beneficiary['image']) ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <hr>
                    <div class="d-flex justify-content-end">
                        <a href="<?= base_url('admin/beneficiaries') ?>" class="btn btn-secondary me-2">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Beneficiary
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
var page_title = 'Edit Beneficiary';
</script>

<?= $this->endSection() ?>