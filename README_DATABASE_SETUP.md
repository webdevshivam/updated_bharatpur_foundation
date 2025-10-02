# Database Setup Instructions

## For MySQL/phpMyAdmin (Recommended)

1. **Import the Database:**
   - Open phpMyAdmin in your browser
   - Create a new database named `nayantar_cms`
   - Import the `database.sql` file located in the root directory
   - This will create all tables and insert sample data

2. **Update Database Configuration:**
   - Edit `app/Config/Database.php`
   - Change the database settings to MySQL:
   ```php
   public array $default = [
       'DSN'          => '',
       'hostname'     => 'localhost',
       'username'     => 'your_mysql_username',
       'password'     => 'your_mysql_password',
       'database'     => 'nayantar_cms',
       'DBDriver'     => 'MySQLi',
       // ... rest of the configuration
   ];
   ```

## Current Setup (SQLite - Temporary)

The application is currently configured to use SQLite for demonstration purposes. This allows you to:
- Test the application immediately
- View the frontend and admin panel
- See all functionality working

## Admin Panel Access

- **URL:** `/admin/login`
- **Username:** `admin`
- **Password:** `admin123`

## Sample Data Included

- 1 Admin user
- 1 Sample beneficiary (Rahul Kumar Sharma)
- 1 Sample success story (Priya Kumari)

## Features Available

1. **Frontend:**
   - Beautiful landing page
   - Beneficiaries listing
   - Success stories display

2. **Admin Panel:**
   - Dashboard with statistics
   - Complete beneficiaries management (Create, Read, Update, Delete)
   - Success stories management
   - Secure login system

## Next Steps

1. Test the application with SQLite
2. When ready, switch to MySQL by following the MySQL setup instructions above
3. Import the database.sql file to get the same data structure in MySQL