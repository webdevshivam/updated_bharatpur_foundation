
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-heart"></i> Manage NGO Works</h2>
    <a href="<?= base_url('admin/ngo-works/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Work
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-list"></i> All NGO Works</h5>
    </div>
    <div class="card-body">
        <?php if (empty($works)): ?>
            <div class="text-center py-5">
                <i class="fas fa-heart fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No NGO works found</h5>
                <p class="text-muted">Start by adding your first NGO work.</p>
                <a href="<?= base_url('admin/ngo-works/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add NGO Work
                </a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Date Completed</th>
                            <th>Beneficiaries</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($works as $work): ?>
                            <tr>
                                <td><?= $work['id'] ?></td>
                                <td>
                                    <strong><?= esc($work['title']) ?></strong>
                                    <br>
                                    <small class="text-muted"><?= character_limiter(esc($work['description']), 60) ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-info"><?= esc($work['category']) ?></span>
                                </td>
                                <td><?= esc($work['location']) ?></td>
                                <td>
                                    <?php if ($work['date_completed']): ?>
                                        <?= date('M d, Y', strtotime($work['date_completed'])) ?>
                                    <?php else: ?>
                                        <span class="text-muted">Not set</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($work['beneficiaries_count']): ?>
                                        <span class="badge bg-success"><?= number_format($work['beneficiaries_count']) ?></span>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($work['status'] === 'active'): ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= base_url('admin/ngo-works/view/' . $work['id']) ?>" 
                                           class="btn btn-sm btn-outline-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url('admin/ngo-works/edit/' . $work['id']) ?>" 
                                           class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/ngo-works/delete/' . $work['id']) ?>" 
                                           class="btn btn-sm btn-outline-danger" title="Delete"
                                           onclick="return confirm('Are you sure you want to delete this NGO work?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
