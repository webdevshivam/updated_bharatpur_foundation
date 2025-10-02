
CREATE TABLE `ngo_works` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL COMMENT 'e.g., Education, Healthcare, Environment, Community Service',
  `location` varchar(255) DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  `beneficiaries_count` int(11) DEFAULT NULL COMMENT 'Number of people impacted',
  `budget_amount` decimal(10,2) DEFAULT NULL,
  `partners` text DEFAULT NULL COMMENT 'Partner organizations involved',
  `achievements` text DEFAULT NULL COMMENT 'Key achievements and outcomes',
  `images` text DEFAULT NULL COMMENT 'JSON array of image filenames',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data
INSERT INTO `ngo_works` (`title`, `description`, `category`, `location`, `date_completed`, `beneficiaries_count`, `budget_amount`, `partners`, `achievements`, `status`) VALUES
('Digital Literacy Program', 'Comprehensive computer training program for underprivileged youth', 'Education', 'Mumbai, Maharashtra', '2024-12-15', 150, 250000.00, 'Microsoft India, Local Schools', 'Trained 150 students in basic computer skills, 80% found employment or continued education', 'active'),
('Healthcare Camp', 'Free medical checkup and treatment camp in rural areas', 'Healthcare', 'Raigad District, Maharashtra', '2024-11-20', 500, 180000.00, 'Apollo Hospitals, Local PHC', 'Provided free medical consultation to 500+ people, distributed medicines worth Rs. 50,000', 'active'),
('Tree Plantation Drive', 'Environmental conservation initiative to plant trees in urban areas', 'Environment', 'Thane, Maharashtra', '2024-10-05', 1000, 75000.00, 'BMC, Local Residents', 'Planted 1000+ trees, involved 200 volunteers, improved air quality index', 'active');
