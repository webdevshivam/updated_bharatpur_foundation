
-- Remove all existing beneficiary data
DELETE FROM beneficiaries;

-- Reset auto increment
ALTER TABLE beneficiaries AUTO_INCREMENT = 1;

-- Insert new beneficiary data
-- Graduated beneficiaries (those with company information)
INSERT INTO `beneficiaries` (`name`, `age`, `education_level`, `course`, `institution`, `phone`, `linkedin_url`, `company_name`, `company_link`, `status`, `is_passout`, `created_at`, `updated_at`) VALUES
('PRAHLAD SINGH', 25, 'Undergraduate', 'B.Tech(CS) (2013-2017)', 'Technical Institute', '9785852630', 'https://shorturl.at/F7R6R', 'INVENTIA TECHNOLOGY CONSULTANTS PVT LTD', 'https://www.inventia.in', 'active', 1, NOW(), NOW()),
('JEETENDRA SINGH', 25, 'Undergraduate', 'B.Tech(CS) (2013-2017)', 'Technical Institute', '9660148331', 'https://shorturl.at/g4Vw2', 'TECHMAHINDRA LTD', 'https://www.techmahindra.com/', 'active', 1, NOW(), NOW()),
('HITESH KUMAR', 25, 'Undergraduate', 'B.Tech(CS) (2013-2017)', 'Technical Institute', '8239731128', 'https://shorturl.at/pZqbC', 'TEKSKILLS INDIA PVT LTD', 'https://www.tekskillsinc.com/', 'active', 1, NOW(), NOW()),
('RAVINDRA SINGH', 23, 'Postgraduate', 'MCA(CS) (2021-2023)', 'Technical Institute', '7568565831', 'https://shorturl.at/r5BBA', 'AMBIENT SCIENTIFIC INDIA PVT LTD', 'https://www.ambientscientific.ai/', 'active', 1, NOW(), NOW()),
('SACHIN SAIN', 22, 'Undergraduate', 'B.Tech(CS) (2019-2023)', 'Technical Institute', '7240653210', 'https://shorturl.at/ez1da', 'AMBIENT SCIENTIFIC INDIA PVT LTD', 'https://www.ambientscientific.ai/', 'active', 1, NOW(), NOW()),
('NEERAJ KUMAR', 22, 'Undergraduate', 'B.Tech(CS) (2019-2023)', 'Technical Institute', '9636492758', 'https://shorturl.at/FsN1q', 'INVENTIA TECHNOLOGY CONSULTANTS PVT LTD', 'https://www.inventia.in/', 'active', 1, NOW(), NOW()),
('KHEMRAJ DEVATWAL', 22, 'Undergraduate', 'B.Tech(CS) (2019-2023)', 'Technical Institute', '7615992247', 'https://shorturl.at/2o8eW', 'DREAMSEARCH TECHNOLOGY', 'https://shorturl.at/zyZ5j', 'active', 1, NOW(), NOW()),
('MUKESH SINGH', 21, 'Undergraduate', 'B.Tech(CS) (2020-2024)', 'Technical Institute', '6378248523', 'https://shorturl.at/xY8f7', 'CELEBAL TECHNOLOGIES', 'https://celebaltech.com/', 'active', 1, NOW(), NOW());

-- Current students (pursuing education)
INSERT INTO `beneficiaries` (`name`, `age`, `education_level`, `course`, `institution`, `phone`, `linkedin_url`, `status`, `is_passout`, `created_at`, `updated_at`) VALUES
('RAKESH KUMAR', 21, 'Undergraduate', 'B.Tech(CS)', 'NATIONAL INSTITUTE OF TECHNOLOGY', '6378450059', NULL, 'active', 0, NOW(), NOW()),
('PRIYANSHI', 21, 'Undergraduate', 'B.Tech(CS)', 'RAJASTHAN TECHNOLOGY UNIVERSITY', '7455948427', 'https://shorturl.at/ih1Nz', 'active', 0, NOW(), NOW()),
('SUNDRAM', 19, 'Undergraduate', 'B.Tech(CS)', 'RAJASTHAN TECHNOLOGY UNIVERSITY', '7878036114', 'https://shorturl.at/qw3A1', 'active', 0, NOW(), NOW()),
('SHIVAM KUSHWAH', 19, 'Undergraduate', 'B.Tech(CS)', 'RAJASTHAN TECHNOLOGY UNIVERSITY', '9520683039', 'https://shorturl.at/Wy5rd', 'active', 0, NOW(), NOW()),
('VANSH SHARMA', 18, 'Undergraduate', 'B.Tech(CS)', 'BANARAS HINDU UNIVERSITY', '7454974823', NULL, 'active', 0, NOW(), NOW()),
('PALKI SOLANKI', 18, 'Undergraduate', 'B.Tech(CS)', 'RAJASTHAN TECHNOLOGY UNIVERSITY', '7302389547', NULL, 'active', 0, NOW(), NOW()),
('SHIVANI FOUZDAR', 18, 'Undergraduate', 'B.Tech(CS)', 'RAJASTHAN TECHNOLOGY UNIVERSITY', '7877377948', NULL, 'active', 0, NOW(), NOW()),
('ANANT KHANDELWAL', 24, 'Professional', 'CHARTERED ACCOUNTANT(FINAL)', 'Professional Institute', '7976598177', NULL, 'active', 0, NOW(), NOW()),
('UTSAV GOEL', 24, 'Professional', 'CHARTERED ACCOUNTANT(FINAL)', 'Professional Institute', '9389724384', NULL, 'active', 0, NOW(), NOW()),
('NEHA GOYAL', 25, 'Postgraduate', 'MBA', 'Business School', '6396055396', NULL, 'active', 0, NOW(), NOW()),
('SAKSHI BANSAL', 22, 'Undergraduate', 'B.A./B.ED', 'MAHARAJA SURAJMAL BRIJ UNIVERSITY', '8700353824', NULL, 'active', 0, NOW(), NOW()),
('ABHISHEK FAUJDAR', 19, 'Diploma', 'NEET(ASPIRANT)', 'Coaching Institute', '9887026570', NULL, 'active', 0, NOW(), NOW()),
('SATYAM KUMAR', 19, 'Diploma', 'NEET(ASPIRANT)', 'Coaching Institute', '6376220217', NULL, 'active', 0, NOW(), NOW()),
('PALLAVI', 17, 'Certificate', '12TH (BIO)', 'RAJASTHAN BOARD', '9887378275', NULL, 'active', 0, NOW(), NOW()),
('ANKUR SINGH', 17, 'Certificate', '12TH', 'RAJASTHAN BOARD', '6376606495', NULL, 'active', 0, NOW(), NOW()),
('SAMIKSHA', 17, 'Certificate', '12TH (BIO)', 'RAJASTHAN BOARD', '8094809713', NULL, 'active', 0, NOW(), NOW()),
('SAKSHI VYAS', 17, 'Certificate', '12TH', 'RAJASTHAN BOARD', '7906835639', NULL, 'active', 0, NOW(), NOW()),
('ANUJ FAUJDAR', 16, 'Certificate', '11TH', 'RAJASTHAN BOARD', '9521855374', NULL, 'active', 0, NOW(), NOW()),
('SANVI GUPTA', 20, 'Undergraduate', 'BBA', 'Business School', NULL, NULL, 'active', 0, NOW(), NOW()),
('ANVI GOEL', 15, 'Certificate', '10TH', 'School', NULL, NULL, 'active', 0, NOW(), NOW()),
('SHIVAM KUMAR', 18, 'Certificate', 'PREPARATION FOR NAVY & AIRFORCE', 'Training Institute', '8302585193', NULL, 'active', 0, NOW(), NOW());
