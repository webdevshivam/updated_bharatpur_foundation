
<?php $this->extend('admin/layout') ?>

<?php $this->section('content') ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0"><i class="fas fa-cog"></i> Volunteering Settings</h1>
        <a href="<?= base_url('admin/volunteering') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Configuration Settings</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/volunteering/settings') ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="reminder_interval_days" class="form-label">Reminder Interval (Days)</label>
                            <input type="number" class="form-control" id="reminder_interval_days" 
                                   name="reminder_interval_days" value="<?= $settings['reminder_interval_days'] ?>" 
                                   min="1" max="30" required>
                            <div class="form-text">How often to send reminder emails (in days)</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_active" 
                                       name="is_active" <?= $settings['is_active'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="is_active">
                                    Enable Volunteering System
                                </label>
                            </div>
                            <div class="form-text">Turn the entire volunteering system on/off</div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email_template" class="form-label">Email Template</label>
                    <textarea class="form-control" id="email_template" name="email_template" 
                              rows="5" placeholder="Custom email template (optional)"><?= esc($settings['email_template']) ?></textarea>
                    <div class="form-text">Leave empty to use default template</div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Settings
                </button>
            </form>
        </div>
    </div>

    <!-- Email Configuration Info -->
    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">SMTP Configuration</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>SMTP Host:</strong> smtp.hostinger.com</p>
                    <p><strong>Port:</strong> 465 (SSL)</p>
                    <p><strong>From Email:</strong> info@megastarpremiercricketleague.com</p>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>Note:</strong> Email credentials are configured in the system. 
                        Emails will be sent automatically based on the reminder interval.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
