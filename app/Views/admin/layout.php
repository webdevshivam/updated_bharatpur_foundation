<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Admin Panel - Bharatpur Foundation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --admin-primary: #3498db;
            --admin-secondary: #2c3e50;
            --admin-success: #27ae60;
            --admin-danger: #e74c3c;
            --admin-warning: #f39c12;
            --admin-sidebar: #2c3e50;
            --admin-sidebar-hover: #34495e;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        /* Preloader Styles */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .preloader .spinner {
            border: 8px solid #f3f3f3;
            border-top: 8px solid var(--admin-primary);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--admin-sidebar), #34495e);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 1.5rem;
            background: rgba(0,0,0,0.1);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h4 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-menu li a {
            display: block;
            padding: 1rem 1.5rem;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidebar-menu li a:hover,
        .sidebar-menu li a.active {
            background-color: var(--admin-sidebar-hover);
            color: white;
            border-left: 4px solid var(--admin-primary);
        }

        .sidebar-menu li a i {
            width: 20px;
            margin-right: 10px;
        }

        /* Dropdown styles for sidebar menu */
        .sidebar-menu .dropdown-toggle::after {
            display: none; /* Hide default caret */
        }
        .sidebar-menu .dropdown-toggle i.fa-chevron-down {
            float: right;
            transition: transform 0.3s ease;
        }
        .sidebar-menu li a.active i.fa-chevron-down {
            transform: rotate(180deg);
        }
        .sidebar-menu .dropdown-menu {
            background-color: var(--admin-sidebar-hover);
            padding-left: 1.5rem;
            border: none;
            display: none; /* Hidden by default */
        }
        .sidebar-menu li.show .dropdown-menu {
            display: block; /* Show when parent li has 'show' class */
        }
        .sidebar-menu .dropdown-menu li a {
            padding: 0.75rem 1.5rem;
            color: white !important; /* Ensure dropdown links are white */
        }
        .sidebar-menu .dropdown-menu li a:hover,
        .sidebar-menu .dropdown-menu li a.active {
            background-color: #34495e; /* Slightly darker for sub-items */
            border-left: 4px solid var(--admin-primary);
        }


        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            background-color: #f8f9fa;
            transition: margin-left 0.3s ease;
        }

        .top-navbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-bottom: 1px solid #dee2e6;
        }

        .content-wrapper {
            padding: 2rem;
        }

        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 4px solid var(--admin-primary);
            transition: transform 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-2px);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--admin-primary);
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .card-header {
            background: linear-gradient(135deg, var(--admin-primary), #2980b9);
            color: white;
            border-radius: 10px 10px 0 0 !important;
            border: none;
        }

        .btn-primary {
            background: var(--admin-primary);
            border-color: var(--admin-primary);
        }

        .btn-primary:hover {
            background: #2980b9;
            border-color: #2980b9;
        }

        .btn-success {
            background: var(--admin-success);
            border-color: var(--admin-success);
        }

        .btn-danger {
            background: var(--admin-danger);
            border-color: var(--admin-danger);
        }

        .table {
            background: white;
        }

        .table thead th {
            background: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            color: var(--admin-secondary);
        }

        .badge {
            font-size: 0.75rem;
            padding: 0.5em 0.75em;
        }

        .alert {
            border: none;
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                margin-left: -250px; /* Ensure it's out of view */
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.show {
                transform: translateX(0);
                margin-left: 0; /* Bring it back into view */
            }
        }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>

    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <!-- Changed "Our Team" to "Founders" -->
            <h4><i class="fas fa-user-cog"></i> Admin Panel</h4>
            <small>Nayantar Memorial Trust</small>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="<?= base_url('admin') ?>" <?= (current_url() == base_url('admin')) ? 'class="active"' : '' ?>>
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/beneficiaries') ?>" <?= (strpos(current_url(), 'beneficiaries') !== false) ? 'class="active"' : '' ?>>
                    <i class="fas fa-graduation-cap"></i> Beneficiaries
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/success-stories') ?>" <?= (strpos(current_url(), 'success-stories') !== false) ? 'class="active"' : '' ?>>
                    <i class="fas fa-star"></i> Success Stories
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/ngo-works') ?>" <?= (strpos(current_url(), 'ngo-works') !== false) ? 'class="active"' : '' ?>>
                    <i class="fas fa-heart"></i> NGO Works
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/volunteering') ?>" <?= (current_url() == base_url('admin/volunteering')) ? 'class="active"' : '' ?>>
                    <i class="fas fa-hands-helping"></i> Volunteering
                </a>
            </li>
            <li class="dropdown">
                <?php 
                $current_url = current_url();
                $is_join_us_active = (strpos($current_url, 'admin/join-us') !== false);
                $current_page_segment = '';
                if (strpos($current_url, 'join-us/students') !== false) $current_page_segment = 'join-students';
                elseif (strpos($current_url, 'join-us/volunteers') !== false) $current_page_segment = 'join-volunteers';
                elseif (strpos($current_url, 'join-us/donors') !== false) $current_page_segment = 'join-donors';
                ?>
                <a href="#" class="dropdown-toggle <?= $is_join_us_active ? 'active' : '' ?>">
                    <i class="fas fa-user-plus"></i> Join Us Applications
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('admin/join-us/students') ?>" class="<?= $current_page_segment == 'join-students' ? 'active' : '' ?>">Student Applications</a></li>
                    <li><a href="<?= base_url('admin/join-us/volunteers') ?>" class="<?= $current_page_segment == 'join-volunteers' ? 'active' : '' ?>">Volunteer Applications</a></li>
                    <li><a href="<?= base_url('admin/join-us/donors') ?>" class="<?= $current_page_segment == 'join-donors' ? 'active' : '' ?>">Donor Applications</a></li>
                </ul>
            </li>
                <li><a href="<?= base_url('admin/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <button class="btn btn-link d-md-none" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h5 class="mb-0"><?= isset($page_title) ? $page_title : 'Dashboard' ?></h5>
                </div>
                <div>
                    <span class="text-muted">Welcome, <?= session('admin_username') ?></span>
                    <a href="<?= base_url('admin/logout') ?>" class="btn btn-outline-danger btn-sm ms-2">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content-wrapper">
            <!-- Flash Messages -->
            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> <?= session('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle"></i> <?= session('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php if(session('validation')): ?>
            <div class="alert alert-warning alert-dismissible fade show">
                <i class="fas fa-exclamation-triangle"></i> Please fix the following errors:
                <ul class="mb-0 mt-2">
                    <?php foreach(session('validation') as $error): ?>
                    <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Preloader
        window.addEventListener('load', () => {
            const preloader = document.querySelector('.preloader');
            if (preloader) {
                preloader.style.display = 'none';
            }
        });

        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
            // Adjust main content margin based on sidebar visibility
            const mainContent = document.querySelector('.main-content');
            if (window.innerWidth <= 768) { // Only adjust for mobile view
                if (document.querySelector('.sidebar').classList.contains('show')) {
                    mainContent.style.marginLeft = '250px'; // Or adjust as needed
                } else {
                    mainContent.style.marginLeft = '0';
                }
            } else {
                 mainContent.style.marginLeft = '250px'; // Default for larger screens
            }
        });

        // Toggle dropdown menus in sidebar
        document.querySelectorAll('.sidebar-menu .dropdown-toggle').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const parent = this.parentElement;
                parent.classList.toggle('show');
            });
        });


        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>