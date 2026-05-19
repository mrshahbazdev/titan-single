# PK Titan - Laravel

A full-stack Laravel application with a **frontend** (member-facing) and a **Livewire-powered admin backend**.

---

## Requirements

- PHP 8.2+
- Composer
- MySQL 5.7+ / MariaDB 10.3+

---

## Installation & Setup

```bash
# 1. Go to the laravel directory
cd laravel/

# 2. Install PHP dependencies
composer install

# 3. Copy environment file and set your database credentials
cp .env.example .env
php artisan key:generate
```

### Database Configuration

Edit your `.env` file and set your MySQL database details:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pkproject
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Run Migrations & Seed Test Users

```bash
# This will create all tables AND add test users automatically
php artisan migrate --seed
```

### Start the Server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

---

## Login Links & Test Credentials

### Frontend (Member Panel)

| | |
|---|---|
| **URL** | [http://localhost:8000/auth/login](http://localhost:8000/auth/login) |
| **Username** | `testuser` |
| **Password** | `test123` |

**Frontend Features:**
- Dashboard / Home
- Journey (task system)
- Wallet & Balance
- Deposit & Withdrawal
- Invitation & Referral system
- Bank info management
- Security (password change)
- About, FAQs, Terms pages

---

### Backend (Admin Panel - Livewire)

| | |
|---|---|
| **URL** | [http://localhost:8000/admin](http://localhost:8000/admin) |
| **Username** | `admin` |
| **Password** | `admin123` |

**Admin Features:**
- Member management (`/member`)
- Agent management (`/member/agent`)
- Member grade/levels (`/member/grade`)
- Continuous orders (`/member/continuousOrder`)
- Recharge records (`/trade/rechargelist`)
- Withdrawal records (`/trade/withdrawlist`)
- Recharge requests (`/trade/rechargerequest`)
- Product management (`/mall/product`)
- Text/page management (`/mall/text`)
- Role management (`/systems/role`)
- Admin user management (`/systems/users`)
- Bank management (`/systems/bank`)
- Trial period config (`/systems/trialperiod`)
- Announcements (`/systems/announcements`)

---

## Project Structure

```
laravel/
├── app/
│   ├── Http/Controllers/Front/    # Frontend controllers (Auth, Home, Wallet, etc.)
│   ├── Livewire/Backend/          # Livewire admin components
│   ├── Models/                    # Eloquent models
│   ├── Services/                  # Business logic services
│   └── Helpers/                   # Utility helpers
├── database/
│   ├── migrations/                # Database migrations
│   └── seeders/                   # Test data seeders
├── resources/views/
│   ├── front/                     # Frontend blade views
│   ├── livewire/backend/          # Livewire admin views
│   └── components/layouts/        # Layout components (admin.blade.php, sidebar, header)
├── public/
│   ├── assets/                    # Frontend assets (CSS, JS, images)
│   └── backend/                   # Admin panel assets
└── routes/
    └── web.php                    # All routes (frontend + admin)
```

---

## Quick Reference

| Action | Command |
|---|---|
| Install dependencies | `composer install` |
| Run migrations | `php artisan migrate` |
| Seed test data | `php artisan db:seed` |
| Migrate + Seed together | `php artisan migrate --seed` |
| Fresh migrate + seed | `php artisan migrate:fresh --seed` |
| Start dev server | `php artisan serve` |
| Clear cache | `php artisan cache:clear` |

---

## Notes

- Frontend auth uses **session-based** authentication (MD5 password hashing, matching the original CodeIgniter system)
- Admin backend uses **Laravel Auth** with bcrypt password hashing (via Livewire)
- Frontend and backend have separate authentication systems
- File uploads for products go to `public/backend/productImage/`
- Level images are stored in `public/backend/level/`
