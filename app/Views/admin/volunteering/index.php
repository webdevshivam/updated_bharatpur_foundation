
<?php $this->extend('admin/layout') ?>

<?php $this->section('content') ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0"><i class="fas fa-heart text-danger"></i> Volunteering Management</h1>
        <div>
            <a href="<?= base_url('admin/volunteering/settings') ?>" class="btn btn-outline-primary me-2">
                <i class="fas fa-cog"></i> Settings
            </a>
            <form method="post" action="<?= base_url('admin/volunteering/send-reminders') ?>" class="d-inline">
                <button type="submit" class="btn btn-success" onclick="return confirm('Send reminder emails to all active beneficiaries?')">
                    <i class="fas fa-envelope"></i> Send Reminders
                </button>
            </form>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Submissions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stats['total'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed Work</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stats['completed'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Emergency Skips</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stats['skipped'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Completion Rate</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $stats['completion_rate'] ?>%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $stats['completion_rate'] ?>%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-pie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Submissions Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Monthly Submissions (<?= date('F Y', strtotime($currentMonth . '-01')) ?>)</h6>
            <a href="<?= base_url('admin/volunteering/email-logs') ?>" class="btn btn-sm btn-outline-info">
                <i class="fas fa-envelope"></i> Email Logs
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Beneficiary</th>
                            <th>Work Type</th>
                            <th>Description</th>
                            <th>Hours</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($submissions as $submission): ?>
                            <tr>
                                <td><?= $submission['id'] ?></td>
                                <td>
                                    <strong><?= esc($submission['name']) ?></strong>
                                    <br><small class="text-muted"><?= esc($submission['email']) ?></small>
                                </td>
                                <td>
                                    <?php if ($submission['is_emergency_skip']): ?>
                                        <span class="badge bg-warning">Emergency Skip</span>
                                    <?php else: ?>
                                        <span class="badge bg-info"><?= esc($submission['work_type']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($submission['is_emergency_skip']): ?>
                                        <em>Reason: <?= esc($submission['skip_reason']) ?></em>
                                    <?php else: ?>
                                        <?= esc(substr($submission['work_description'], 0, 100)) ?>...
                                    <?php endif; ?>
                                </td>
                                <td><?= $submission['hours_spent'] ? $submission['hours_spent'] . ' hrs' : '-' ?></td>
                                <td>
                                    <?php 
                                    $statusClass = [
                                        'pending' => 'warning',
                                        'approved' => 'success',
                                        'rejected' => 'danger'
                                    ];
                                    ?>
                                    <span class="badge bg-<?= $statusClass[$submission['status']] ?>">
                                        <?= ucfirst($submission['status']) ?>
                                    </span>
                                </td>
                                <td><?= date('d M Y', strtotime($submission['created_at'])) ?></td>
                                <td>
                                    <a href="<?= base_url('admin/volunteering/view/' . $submission['id']) ?>" 
                                       class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
