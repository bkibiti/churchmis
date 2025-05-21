# ⛪ ChurchMIS

**ChurchMIS** is a web-based Church Management Information System built to simplify the administration of church operations — from member registration and financial tracking to event planning and staff management.

Designed for churches of all sizes, ChurchMIS helps streamline processes, improve record-keeping, and enhance engagement with congregation members.

---

## ✨ Features

- 🙍 **Member Management**: Register, update, and track member profiles and attendance
- 💰 **Tithes & Offerings**: Record and report church income, donations, and pledges
- 🗓️ **Event Management**: Organize and monitor church programs, meetings, and services
- 🧾 **Expense Tracking**: Monitor and categorize church expenses for transparency
- 👥 **Staff Management**: Manage church workers, roles, and responsibilities
- 📊 **Reports**: Generate detailed reports for membership, finances, and activities
- 🔒 **Role-Based Access**: Admin, pastor, finance team, and user-level permissions

---

## 🛠️ Tech Stack

| Layer       | Technology     |
|-------------|----------------|
| Backend     | Laravel (PHP)  |
| Frontend    | jQuery, Blade, Bootstrap |
| Database    | MySQL / MariaDB |
| Auth System | Laravel Breeze or Sanctum |

---

## 🚀 Installation

### Requirements

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL or MariaDB

### Setup Instructions

```bash
# Clone the repo
git clone https://github.com/your-org/churchmis.git
cd churchmis

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure .env with your database and mail settings

# Run migrations and seed data
php artisan migrate --seed

# Build front-end assets
npm run dev

# Start local server
php artisan serve
