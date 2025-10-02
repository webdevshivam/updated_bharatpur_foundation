
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-edit"></i> Edit NGO Work</h2>
    <a href="<?= base_url('admin/ngo-works') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
</div>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-heart"></i> NGO Work Information</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/ngo-works/update/' . $ngo_work['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Project Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="<?= old('title', $ngo_work['title']) ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="Education" <?= old('category', $ngo_work['category']) === 'Education' ? 'selected' : '' ?>>Education</option>
                            <option value="Healthcare" <?= old('category', $ngo_work['category']) === 'Healthcare' ? 'selected' : '' ?>>Healthcare</option>
                            <option value="Environment" <?= old('category', $ngo_work['category']) === 'Environment' ? 'selected' : '' ?>>Environment</option>
                            <option value="Community Service" <?= old('category', $ngo_work['category']) === 'Community Service' ? 'selected' : '' ?>>Community Service</option>
                            <option value="Women Empowerment" <?= old('category', $ngo_work['category']) === 'Women Empowerment' ? 'selected' : '' ?>>Women Empowerment</option>
                            <option value="Child Welfare" <?= old('category', $ngo_work['category']) === 'Child Welfare' ? 'selected' : '' ?>>Child Welfare</option>
                            <option value="Disaster Relief" <?= old('category', $ngo_work['category']) === 'Disaster Relief' ? 'selected' : '' ?>>Disaster Relief</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" 
                               value="<?= old('location', $ngo_work['location']) ?>" placeholder="e.g., Mumbai, Maharashtra">
                    </div>
                    
                    <div class="mb-3">
                        <label for="date_completed" class="form-label">Date Completed</label>
                        <input type="date" class="form-control" id="date_completed" name="date_completed" 
                               value="<?= old('date_completed', $ngo_work['date_completed']) ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="beneficiaries_count" class="form-label">Number of Beneficiaries</label>
                        <input type="number" class="form-control" id="beneficiaries_count" name="beneficiaries_count" 
                               value="<?= old('beneficiaries_count', $ngo_work['beneficiaries_count']) ?>" min="0">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="budget_amount" class="form-label">Budget Amount (₹)</label>
                        <input type="number" step="0.01" class="form-control" id="budget_amount" name="budget_amount" 
                               value="<?= old('budget_amount', $ngo_work['budget_amount']) ?>" min="0">
                    </div>
                    
                    <div class="mb-3">
                        <label for="partners" class="form-label">Partner Organizations</label>
                        <textarea class="form-control" id="partners" name="partners" rows="3" 
                                  placeholder="List partner organizations involved"><?= old('partners', $ngo_work['partners']) ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="achievements" class="form-label">Key Achievements</label>
                        <textarea class="form-control" id="achievements" name="achievements" rows="3" 
                                  placeholder="Describe key achievements and outcomes"><?= old('achievements', $ngo_work['achievements']) ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="images" class="form-label">Project Images</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                        <small class="form-text text-muted">Leave empty to keep existing images. Select new images to replace all existing ones.</small>
                        
                        <?php if (!empty($ngo_work['images'])): ?>
                            <?php $images = json_decode($ngo_work['images'], true); ?>
                            <?php if ($images): ?>
                                <div class="mt-2">
                                    <small class="text-muted">Current images:</small>
                                    <div class="d-flex flex-wrap gap-2 mt-1">
                                        <?php foreach ($images as $image): ?>
                                            <img src="<?= base_url('uploads/ngo_works/' . $image) ?>" 
                                                 alt="Project Image" style="width: 60px; height: 60px; object-fit: cover;" 
                                                 class="rounded border">
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="active" <?= old('status', $ngo_work['status']) === 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= old('status', $ngo_work['status']) === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Project Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description" name="description" rows="4" required 
                          placeholder="Provide detailed description of the project"><?= old('description', $ngo_work['description']) ?></textarea>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="<?= base_url('admin/ngo-works') ?>" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update NGO Work
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
