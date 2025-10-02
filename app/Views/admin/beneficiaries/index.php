<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-graduation-cap"></i> Manage Beneficiaries</h4>
    <a href="<?= base_url('admin/beneficiaries/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Beneficiary
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-list"></i> All Beneficiaries</h5>
    </div>
    <div class="card-body">
        <?php if (!empty($beneficiaries)): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Institution</th>
                            <th>Status</th>
                            <th>Contact</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($beneficiaries as $beneficiary): ?>
                            <tr>
                                <td><strong>#<?= esc($beneficiary['id']) ?></strong></td>
                                <td><?= esc($beneficiary['name']) ?></td>
                                <td><?= esc($beneficiary['course']) ?></td>
                                <td><?= esc($beneficiary['institution']) ?></td>
                                <td>
                                    <span class="badge bg-<?= $beneficiary['status'] == 'active' ? 'success' : 'secondary' ?>">
                                        <?= esc(ucfirst($beneficiary['status'])) ?>
                                    </span>
                                </td>
                                <td>
                                    <small>
                                        <?php if (!empty($beneficiary['phone'])): ?>
                                            <i class="fas fa-phone"></i> <?= esc($beneficiary['phone']) ?><br>
                                        <?php endif; ?>
                                        <?php if (!empty($beneficiary['email'])): ?>
                                            <i class="fas fa-envelope"></i> <?= esc($beneficiary['email']) ?>
                                        <?php endif; ?>
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <?php
                                        $location = [];
                                        if (!empty($beneficiary['city'])) $location[] = esc($beneficiary['city']);
                                        if (!empty($beneficiary['state'])) $location[] = esc($beneficiary['state']);
                                        echo !empty($location) ? implode(', ', $location) : 'Not specified';
                                        ?>
                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= base_url('admin/beneficiaries/view/' . $beneficiary['id']) ?>"
                                            class="btn btn-sm btn-outline-primary" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= base_url('admin/beneficiaries/edit/' . $beneficiary['id']) ?>"
                                            class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/beneficiaries/delete/' . $beneficiary['id']) ?>"
                                            class="btn btn-sm btn-outline-danger" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this beneficiary?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="fas fa-graduation-cap fa-5x text-muted mb-4"></i>
                <h4 class="text-muted">No Beneficiaries Found</h4>
                <p class="text-muted">Start by adding your first beneficiary to the system.</p>
                <a href="<?= base_url('admin/beneficiaries/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add First Beneficiary
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    var page_title = 'Manage Beneficiaries';
</script>

<?= $this->endSection() ?>
