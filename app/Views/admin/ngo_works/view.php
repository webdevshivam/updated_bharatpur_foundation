
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-eye"></i> View NGO Work</h2>
    <div class="btn-group">
        <a href="<?= base_url('admin/ngo-works/edit/' . $ngo_work['id']) ?>" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="<?= base_url('admin/ngo-works') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-heart"></i> <?= esc($ngo_work['title']) ?></h5>
        <span class="badge bg-<?= $ngo_work['status'] === 'active' ? 'success' : 'secondary' ?> fs-6">
            <?= ucfirst($ngo_work['status']) ?>
        </span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="mb-4">
                    <h6 class="text-muted mb-2">Project Description</h6>
                    <p><?= nl2br(esc($ngo_work['description'])) ?></p>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Category</h6>
                        <span class="badge bg-info fs-6"><?= esc($ngo_work['category']) ?></span>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Location</h6>
                        <p><?= $ngo_work['location'] ? esc($ngo_work['location']) : '<span class="text-muted">Not specified</span>' ?></p>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Date Completed</h6>
                        <p><?= $ngo_work['date_completed'] ? date('M d, Y', strtotime($ngo_work['date_completed'])) : '<span class="text-muted">Not specified</span>' ?></p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted mb-2">Beneficiaries Count</h6>
                        <p><?= $ngo_work['beneficiaries_count'] ? '<span class="badge bg-success fs-6">' . number_format($ngo_work['beneficiaries_count']) . '</span>' : '<span class="text-muted">Not specified</span>' ?></p>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h6 class="text-muted mb-2">Budget Amount</h6>
                    <p><?= $ngo_work['budget_amount'] ? '₹ ' . number_format($ngo_work['budget_amount'], 2) : '<span class="text-muted">Not specified</span>' ?></p>
                </div>
                
                <?php if ($ngo_work['partners']): ?>
                <div class="mb-4">
                    <h6 class="text-muted mb-2">Partner Organizations</h6>
                    <p><?= nl2br(esc($ngo_work['partners'])) ?></p>
                </div>
                <?php endif; ?>
                
                <?php if ($ngo_work['achievements']): ?>
                <div class="mb-4">
                    <h6 class="text-muted mb-2">Key Achievements</h6>
                    <p><?= nl2br(esc($ngo_work['achievements'])) ?></p>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="col-md-4">
                <?php if (!empty($ngo_work['images'])): ?>
                    <?php $images = json_decode($ngo_work['images'], true); ?>
                    <?php if ($images): ?>
                        <h6 class="text-muted mb-3">Project Images</h6>
                        <div class="row g-2">
                            <?php foreach ($images as $image): ?>
                                <div class="col-6">
                                    <img src="<?= base_url('uploads/ngo_works/' . $image) ?>" 
                                         alt="Project Image" 
                                         class="img-fluid rounded shadow-sm" 
                                         style="height: 120px; width: 100%; object-fit: cover;">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                
                <div class="mt-4">
                    <h6 class="text-muted mb-2">Created</h6>
                    <p><small><?= date('M d, Y g:i A', strtotime($ngo_work['created_at'])) ?></small></p>
                </div>
                
                <div>
                    <h6 class="text-muted mb-2">Last Updated</h6>
                    <p><small><?= date('M d, Y g:i A', strtotime($ngo_work['updated_at'])) ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
