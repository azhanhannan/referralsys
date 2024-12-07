# ReferralSys

ReferralSys is a Laravel-based application that manages user referrals, tracks referral counts, and handles user bonuses. The system provides an easy-to-use interface for creating users, generating referral codes, and viewing referral statistics.

---

## Features
- User Management (Create, View, and List users)
- Automatic Referral Code Generation
- Referral Tracking
- Bonus Balance Calculation
- Clean and Simple Interface with Laravel Blade and DataTable

---

## Prerequisites
Before you begin, ensure you have the following installed:
- **PHP**: >= 8.0
- **Composer**
- **Laravel**: >= 10.x
- **MySQL** or any other database supported by Laravel
- **Node.js** & npm (for asset compilation)
- **Git**

---

## Installation Steps

### 1. Clone the Repository
Clone the project from GitHub to your local machine:
```bash
git clone https://github.com/azhanhannan/referralsys.git
cd referralsys

### 2. Install Dependencies
Run the following command to install PHP and Node.js dependencies:

```bash
composer install
npm install

### 3. Set Up Environment
Copy the .env.example file to .env and configure your environment variables:
```bash
cp .env.example .env

Set up the database configuration in the .env file:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

### 4. Generate Application Key
Run the following command to generate a new application key:
```bash
php artisan key:generate

### 5. Run Migrations
Set up the database by running migrations:
```bash
php artisan migrate

### 6. Seed Database (Optional)
Seed to populate the database with sample data, run:
```bash
php artisan db:seed --class=UsersTableSeeder

### 7. Serve the Application
Start the Laravel development server:
```bash
php artisan serve

The application will be available at http://127.0.0.1:8000.

--- 

### Usage
1. Navigate to the Users List page to view existing users.
2. Click Add New User to create a new user.
3. Enter user details, and enter referral code if you have. The system will generate a referral code automatically for the new user referral code.
4. To view referrals, click on a user's name.


