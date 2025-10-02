
<?php $this->extend('admin/layout') ?>

<?php $this->section('content') ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0"><i class="fas fa-envelope"></i> Email Logs</h1>
        <a href="<?= base_url('admin/volunteering') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Recent Email Activity</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Beneficiary</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Sent At</th>
                            <th>Error (if any)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logs as $log): ?>
                            <tr>
                                <td><?= $log['id'] ?></td>
                                <td><?= esc($log['name']) ?></td>
                                <td><?= esc($log['email']) ?></td>
                                <td><?= esc($log['subject']) ?></td>
                                <td>
                                    <span class="badge bg-<?= $log['status'] === 'sent' ? 'success' : 'danger' ?>">
                                        <?= ucfirst($log['status']) ?>
                                    </span>
                                </td>
                                <td><?= date('d M Y, H:i A', strtotime($log['sent_at'])) ?></td>
                                <td>
                                    <?php if ($log['error_message']): ?>
                                        <small class="text-danger"><?= esc(substr($log['error_message'], 0, 100)) ?>...</small>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
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
