
-- Remove existing beneficiary data
DELETE FROM beneficiaries;

-- Reset auto increment
ALTER TABLE beneficiaries AUTO_INCREMENT = 1;

-- Insert new beneficiary data
INSERT INTO beneficiaries (name, age, education_level, course, institution, city, state, phone, email, company_name, company_link, status, is_passout, created_at, updated_at) VALUES
('PRAHLAD SINGH', 27, 'Undergraduate', 'B.Tech(CS)', 'Engineering College', 'Bharatpur', 'Rajasthan', '9785852630', NULL, 'INVENTIA TECHNOLOGY CONSULTANTS PVT LTD', 'https://www.inventia.in', 'active', 1, NOW(), NOW()),
('JEETENDRA SINGH', 27, 'Undergraduate', 'B.Tech(CS)', 'Engineering College', 'Bharatpur', 'Rajasthan', '9660148331', NULL, 'TECHMAHINDRA LTD', 'https://www.techmahindra.com/', 'active', 1, NOW(), NOW()),
('HITESH KUMAR', 27, 'Undergraduate', 'B.Tech(CS)', 'Engineering College', 'Bharatpur', 'Rajasthan', '8239731128', NULL, 'TEKSKILLS INDIA PVT LTD', 'https://www.tekskillsinc.com/', 'active', 1, NOW(), NOW()),
('RAVINDRA SINGH', 25, 'Postgraduate', 'MCA(CS)', 'Computer Applications College', 'Bharatpur', 'Rajasthan', '7568565831', NULL, 'AMBIENT SCIENTIFIC INDIA PVT LTD', 'https://www.ambientscientific.ai/', 'active', 1, NOW(), NOW()),
('SACHIN SAIN', 23, 'Undergraduate', 'B.Tech(CS)', 'Engineering College', 'Bharatpur', 'Rajasthan', '7240653210', NULL, 'AMBIENT SCIENTIFIC INDIA PVT LTD', 'https://www.ambientscientific.ai/', 'active', 1, NOW(), NOW()),
('NEERAJ KUMAR', 23, 'Undergraduate', 'B.Tech(CS)', 'Engineering College', 'Bharatpur', 'Rajasthan', '9636492758', NULL, 'INVENTIA TECHNOLOGY CONSULTANTS PVT LTD', 'https://www.inventia.in/', 'active', 1, NOW(), NOW()),
('KHEMRAJ DEVATWAL', 23, 'Undergraduate', 'B.Tech(CS)', 'Engineering College', 'Bharatpur', 'Rajasthan', '7615992247', NULL, 'DREAMSEARCH TECHNOLOGY', 'https://shorturl.at/zyZ5j', 'active', 1, NOW(), NOW()),
('MUKESH SINGH', 22, 'Undergraduate', 'B.Tech(CS)', 'Engineering College', 'Bharatpur', 'Rajasthan', '6378248523', NULL, 'CELEBAL TECHNOLOGIES', 'https://celebaltech.com/', 'active', 1, NOW(), NOW()),
('RAKESH KUMAR', 21, 'Undergraduate', 'B.Tech(CS)', 'NATIONAL INSTITUTE OF TECHNOLOGY', 'Bharatpur', 'Rajasthan', '6378450059', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('PRIYANSHI', 21, 'Undergraduate', 'B.Tech(CS)', 'RAJASTHAN TECHNOLOGY UNIVERSITY', 'Bharatpur', 'Rajasthan', '7455948427', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('SUNDRAM', 19, 'Undergraduate', 'B.Tech(CS)', 'RAJASTHAN TECHNOLOGY UNIVERSITY', 'Bharatpur', 'Rajasthan', '7878036114', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('SHIVAM KUSHWAH', 19, 'Undergraduate', 'B.Tech(CS)', 'RAJASTHAN TECHNOLOGY UNIVERSITY', 'Bharatpur', 'Rajasthan', '9520683039', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('VANSH SHARMA', 18, 'Undergraduate', 'B.Tech(CS)', 'BANARAS HINDU UNIVERSITY', 'Bharatpur', 'Rajasthan', '7454974823', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('PALKI SOLANKI', 18, 'Undergraduate', 'B.Tech(CS)', 'RAJASTHAN TECHNOLOGY UNIVERSITY', 'Bharatpur', 'Rajasthan', '7302389547', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('SHIVANI FOUZDAR', 18, 'Undergraduate', 'B.Tech(CS)', 'RAJASTHAN TECHNOLOGY UNIVERSITY', 'Bharatpur', 'Rajasthan', '7877377948', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('ANANT KHANDELWAL', 23, 'Professional', 'CHARTERED ACCOUNTANT', 'CA Institute', 'Bharatpur', 'Rajasthan', '7976598177', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('UTSAV GOEL', 23, 'Professional', 'CHARTERED ACCOUNTANT', 'CA Institute', 'Bharatpur', 'Rajasthan', '9389724384', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('NEHA GOYAL', 24, 'Postgraduate', 'MBA', 'Management College', 'Bharatpur', 'Rajasthan', '6396055396', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('SAKSHI BANSAL', 21, 'Undergraduate', 'B.A./B.ED', 'MAHARAJA SURAJMAL BRIJ UNIVERSITY', 'Bharatpur', 'Rajasthan', '8700353824', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('ABHISHEK FAUJDAR', 19, 'Pre-Medical', 'NEET ASPIRANT', 'Coaching Institute', 'Bharatpur', 'Rajasthan', '9887026570', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('SATYAM KUMAR', 19, 'Pre-Medical', 'NEET ASPIRANT', 'Coaching Institute', 'Bharatpur', 'Rajasthan', '6376220217', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('PALLAVI', 17, 'Higher Secondary', '12TH (BIO)', 'RAJASTHAN BOARD', 'Bharatpur', 'Rajasthan', '9887378275', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('ANKUR SINGH', 17, 'Higher Secondary', '12TH', 'RAJASTHAN BOARD', 'Bharatpur', 'Rajasthan', '6376606495', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('SAMIKSHA', 17, 'Higher Secondary', '12TH (BIO)', 'RAJASTHAN BOARD', 'Bharatpur', 'Rajasthan', '8094809713', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('SAKSHI VYAS', 17, 'Higher Secondary', '12TH', 'RAJASTHAN BOARD', 'Bharatpur', 'Rajasthan', '7906835639', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('ANUJ FAUJDAR', 16, 'Higher Secondary', '11TH', 'RAJASTHAN BOARD', 'Bharatpur', 'Rajasthan', '9521855374', NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('SANVI GUPTA', 20, 'Undergraduate', 'BBA', 'Business College', 'Bharatpur', 'Rajasthan', NULL, NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('ANVI GOEL', 15, 'Secondary', '10TH', 'School', 'Bharatpur', 'Rajasthan', NULL, NULL, NULL, NULL, 'active', 0, NOW(), NOW()),
('SHIVAM KUMAR', 19, 'Professional', 'NAVY & AIRFORCE PREPARATION', 'Defense Coaching', 'Bharatpur', 'Rajasthan', '8302585193', NULL, NULL, NULL, 'active', 0, NOW(), NOW());
