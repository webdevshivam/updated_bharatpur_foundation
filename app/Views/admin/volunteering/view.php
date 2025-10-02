
<?php $this->extend('admin/layout') ?>

<?php $this->section('content') ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0"><i class="fas fa-eye"></i> View Submission #<?= $submission['id'] ?></h1>
        <a href="<?= base_url('admin/volunteering') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Submission Details</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3"><strong>Beneficiary:</strong></div>
                        <div class="col-sm-9"><?= esc($submission['name']) ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3"><strong>Email:</strong></div>
                        <div class="col-sm-9"><?= esc($submission['email']) ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3"><strong>Month:</strong></div>
                        <div class="col-sm-9"><?= date('F Y', strtotime($submission['submission_month'] . '-01')) ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3"><strong>Type:</strong></div>
                        <div class="col-sm-9">
                            <?php if ($submission['is_emergency_skip']): ?>
                                <span class="badge bg-warning">Emergency Skip</span>
                            <?php else: ?>
                                <span class="badge bg-info"><?= esc($submission['work_type']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php if ($submission['is_emergency_skip']): ?>
                        <div class="row mb-3">
                            <div class="col-sm-3"><strong>Skip Reason:</strong></div>
                            <div class="col-sm-9"><?= esc($submission['skip_reason']) ?></div>
                        </div>
                    <?php else: ?>
                        <div class="row mb-3">
                            <div class="col-sm-3"><strong>Hours Spent:</strong></div>
                            <div class="col-sm-9"><?= $submission['hours_spent'] ? $submission['hours_spent'] . ' hours' : 'Not specified' ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"><strong>Description:</strong></div>
                            <div class="col-sm-9"><?= nl2br(esc($submission['work_description'])) ?></div>
                        </div>
                        
                        <?php if ($submission['proof_image']): ?>
                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Proof Image:</strong></div>
                                <div class="col-sm-9">
                                    <img src="<?= base_url('writable/uploads/' . $submission['proof_image']) ?>" 
                                         class="img-thumbnail" style="max-width: 300px;">
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3"><strong>Submitted:</strong></div>
                        <div class="col-sm-9"><?= date('d M Y, H:i A', strtotime($submission['created_at'])) ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Status</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('admin/volunteering/update-status/' . $submission['id']) ?>">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="pending" <?= $submission['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="approved" <?= $submission['status'] === 'approved' ? 'selected' : '' ?>>Approved</option>
                                <option value="rejected" <?= $submission['status'] === 'rejected' ? 'selected' : '' ?>>Rejected</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="admin_notes" class="form-label">Admin Notes</label>
                            <textarea class="form-control" id="admin_notes" name="admin_notes" 
                                      rows="3" placeholder="Optional notes..."><?= esc($submission['admin_notes']) ?></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Status
                        </button>
                    </form>
                </div>
            </div>

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Current Status</h6>
                </div>
                <div class="card-body text-center">
                    <?php 
                    $statusClass = [
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger'
                    ];
                    ?>
                    <span class="badge bg-<?= $statusClass[$submission['status']] ?> fs-6">
                        <?= ucfirst($submission['status']) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
