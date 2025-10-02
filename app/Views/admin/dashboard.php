<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Dashboard Statistics -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="stats-number"><?= $total_beneficiaries ?></div>
                    <h6 class="text-muted">Total Beneficiaries</h6>
                </div>
                <div class="align-self-center">
                    <i class="fas fa-graduation-cap fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="stats-number"><?= $active_beneficiaries ?></div>
                    <h6 class="text-muted">Active Students</h6>
                </div>
                <div class="align-self-center">
                    <i class="fas fa-user-check fa-2x text-success"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="stats-number"><?= $total_stories ?></div>
                    <h6 class="text-muted">Success Stories</h6>
                </div>
                <div class="align-self-center">
                    <i class="fas fa-star fa-2x text-warning"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="stats-number"><?= $total_beneficiaries - $active_beneficiaries ?></div>
                    <h6 class="text-muted">Graduated</h6>
                </div>
                <div class="align-self-center">
                    <i class="fas fa-trophy fa-2x text-info"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bolt"></i> Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="<?= base_url('admin/beneficiaries/create') ?>" class="btn btn-primary w-100">
                            <i class="fas fa-plus"></i> Add New Beneficiary
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="<?= base_url('admin/success-stories/create') ?>" class="btn btn-success w-100">
                            <i class="fas fa-plus"></i> Add Success Story
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="<?= base_url('admin/beneficiaries') ?>" class="btn btn-info w-100">
                            <i class="fas fa-list"></i> View All Beneficiaries
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="<?= base_url() ?>" target="_blank" class="btn btn-secondary w-100">
                            <i class="fas fa-external-link-alt"></i> View Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Beneficiaries -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-clock"></i> Recent Beneficiaries</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($recent_beneficiaries)): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Status</th>
                                <th>Added On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($recent_beneficiaries as $beneficiary): ?>
                            <tr>
                                <td><strong>#<?= esc($beneficiary['id']) ?></strong></td>
                                <td><?= esc($beneficiary['name']) ?></td>
                                <td><?= esc($beneficiary['course']) ?></td>
                                <td>
                                    <span class="badge bg-<?= $beneficiary['status'] == 'active' ? 'success' : 'secondary' ?>">
                                        <?= esc(ucfirst($beneficiary['status'])) ?>
                                    </span>
                                </td>
                                <td><?= date('M j, Y', strtotime($beneficiary['created_at'])) ?></td>
                                <td>
                                    <a href="<?= base_url('admin/beneficiaries/view/' . $beneficiary['id']) ?>" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= base_url('admin/beneficiaries/edit/' . $beneficiary['id']) ?>" 
                                       class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <a href="<?= base_url('admin/beneficiaries') ?>" class="btn btn-primary">
                        View All Beneficiaries <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <?php else: ?>
                <div class="text-center py-4">
                    <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No Beneficiaries Added Yet</h5>
                    <p class="text-muted">Start by adding your first beneficiary to the system.</p>
                    <a href="<?= base_url('admin/beneficiaries/create') ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add First Beneficiary
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
// Page variable for layout
var page_title = 'Dashboard';
</script>

<?= $this->endSection() ?>