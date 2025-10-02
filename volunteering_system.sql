
-- Volunteering System Database Schema

-- Volunteering Settings Table
CREATE TABLE `volunteering_settings` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `reminder_interval_days` int(11) NOT NULL DEFAULT 10,
    `email_template` text,
    `is_active` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` datetime DEFAULT NULL,
    `updated_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
);

-- Volunteering Submissions Table
CREATE TABLE `volunteering_submissions` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `beneficiary_id` int(11) UNSIGNED NOT NULL,
    `submission_month` varchar(7) NOT NULL,
    `work_description` text NOT NULL,
    `work_type` varchar(100) NOT NULL,
    `hours_spent` decimal(5,2) DEFAULT NULL,
    `proof_image` varchar(255) DEFAULT NULL,
    `is_emergency_skip` tinyint(1) NOT NULL DEFAULT 0,
    `skip_reason` text,
    `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
    `admin_notes` text,
    `created_at` datetime DEFAULT NULL,
    `updated_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Email Logs Table
CREATE TABLE `email_logs` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `beneficiary_id` int(11) UNSIGNED NOT NULL,
    `email` varchar(255) NOT NULL,
    `subject` varchar(255) NOT NULL,
    `status` enum('sent','failed') NOT NULL,
    `error_message` text,
    `sent_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Insert default settings
INSERT INTO `volunteering_settings` (`reminder_interval_days`, `email_template`, `is_active`, `created_at`, `updated_at`) 
VALUES (10, 'Default reminder template', 1, NOW(), NOW());
