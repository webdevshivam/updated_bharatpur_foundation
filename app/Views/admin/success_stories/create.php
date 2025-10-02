
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-plus"></i> Add New Success Story</h4>
    <a href="<?= base_url('admin/success-stories') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
</div>

<?php if (session('errors')): ?>
<div class="alert alert-danger">
    <ul class="mb-0">
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach ?>
    </ul>
</div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-star"></i> Success Story Information</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/success-stories/store') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?= old('name') ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="age" class="form-label">Age <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="age" name="age" 
                               value="<?= old('age') ?>" required min="18" max="100">
                    </div>
                    
                    <div class="mb-3">
                        <label for="education" class="form-label">Education <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="education" name="education" 
                               value="<?= old('education') ?>" placeholder="e.g., B.Tech in Computer Science" required>
                    </div>

                    <div class="mb-3">
                        <label for="current_position" class="form-label">Current Position <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="current_position" name="current_position" 
                               value="<?= old('current_position') ?>" placeholder="e.g., Software Engineer" required>
                    </div>

                    <div class="mb-3">
                        <label for="company" class="form-label">Company <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="company" name="company" 
                               value="<?= old('company') ?>" required>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="city" name="city" 
                               value="<?= old('city') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="state" name="state" 
                               value="<?= old('state') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                        <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" 
                               value="<?= old('linkedin_url') ?>" placeholder="https://linkedin.com/in/username">
                    </div>

                    <div class="mb-3">
                        <label for="company_link" class="form-label">Company Website</label>
                        <input type="url" class="form-control" id="company_link" name="company_link" 
                               value="<?= old('company_link') ?>" placeholder="https://company.com">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Profile Image (Optional)</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/jpeg,image/jpg,image/png,image/gif">
                        <div class="form-text">Upload a profile picture (JPG, PNG, GIF - max 2MB)</div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="active" <?= old('status') == 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= old('status') == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="story" class="form-label">Success Story <span class="text-danger">*</span></label>
                <textarea class="form-control" id="story" name="story" rows="8" required><?= old('story') ?></textarea>
                <div class="form-text">Tell the inspiring journey of this student and how they achieved success.</div>
            </div>

            <div class="mb-3">
                <label for="achievements" class="form-label">Key Achievements</label>
                <textarea class="form-control" id="achievements" name="achievements" rows="4"><?= old('achievements') ?></textarea>
                <div class="form-text">List major achievements, awards, or recognitions.</div>
            </div>
            
            <div class="d-flex justify-content-end">
                <a href="<?= base_url('admin/success-stories') ?>" class="btn btn-secondary me-2">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Success Story
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
