# LaCommerce

## 📋 Description

LaCommerce is a monolithic Laravel application designed as a demonstration of a complete e-commerce workflow. Customers can browse products, add them to a cart, and complete a checkout. Admins can manage inventory, track orders, and control user roles — all from a dedicated admin panel.

**Key features:**

- Product catalogue with individual product pages
- Session-based shopping cart (add, update quantity, remove)
- Checkout with Cash on Delivery (COD) — order saved to database, stock decremented
- User authentication (register, login, logout) built from scratch — no starter kit
- Role-based access: `is_admin` flag gates the admin panel via middleware
- Admin panel: manage products (with image upload), view/update orders, promote users to admin, and revoke admin rights
- Responsive design with a mobile hamburger menu
- About Us and Contact Us static pages

---

## ⚙️ Setup Steps

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL/MariaDB database

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/mobadran/lacommerce laravel-ecommerce
cd laravel-ecommerce

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Copy the environment file and generate an app key
cp .env.example .env
php artisan key:generate

# 5. Run database migrations and seed sample products
php artisan migrate --seed

# 6. Link the storage disk (for uploaded product images)
php artisan storage:link

# 7. Start the development servers (two terminals)
php artisan serve       # Laravel backend  →  http://127.0.0.1:8000
npm run dev             # Vite / Tailwind  →  watches assets
```

### Making yourself an Admin

After registering an account, you can promote it via Artisan Tinker:

```bash
php artisan tinker
>>> \App\Models\User::where('email', 'you@example.com')->update(['is_admin' => true]);
```

- Then go to [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin) to access the admin panel.
- From there you can manage admins instead of using artisan tinker again.

---

## 🗂️ Folder Structure

```
laravel-ecommerce/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/                  # Admin-only controllers
│   │   │   │   ├── AdminController.php
│   │   │   │   ├── OrderController.php
│   │   │   │   ├── ProductController.php
│   │   │   │   └── UserController.php
│   │   │   ├── AccountController.php   # Customer account management
│   │   │   ├── AuthController.php      # Register / Login / Logout
│   │   │   ├── CartController.php      # Session-based cart
│   │   │   ├── CheckoutController.php  # COD checkout & order creation
│   │   │   └── ProductController.php   # Public product listing/detail
│   │   └── Middleware/
│   │       └── IsAdmin.php             # Blocks non-admins from /admin/*
│   ├── Models/
│   │   ├── Order.php
│   │   ├── OrderItem.php
│   │   ├── Product.php
│   │   └── User.php
│   └── Providers/
│       └── AppServiceProvider.php
├── database/
│   ├── factories/
│   │   ├── ProductFactory.php
│   │   └── UserFactory.php
│   ├── migrations/                     # All table definitions
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── ProductSeeder.php
├── public/
│   └── storage/                        # Symlink → storage/app/public
├── resources/
│   ├── css/app.css                     # Tailwind entry point
│   ├── js/app.js
│   └── views/
│       ├── account/edit.blade.php      # Customer profile page
│       ├── admin/
│       │   ├── admins/index.blade.php  # Revoke admin rights
│       │   ├── layouts/app.blade.php   # Admin sidebar layout
│       │   ├── orders/                 # Order list + detail
│       │   ├── products/               # Product CRUD
│       │   └── users/index.blade.php   # Promote users to admin
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── cart/index.blade.php
│       ├── checkout/
│       │   ├── index.blade.php
│       │   └── success.blade.php
│       ├── layouts/
│       │   ├── header.blade.php        # Sticky nav + mobile menu
│       │   ├── footer.blade.php
│       │   └── master.blade.php        # Global page layout
│       ├── products/
│       │   ├── index.blade.php         # Product grid
│       │   └── show.blade.php          # Single product detail
│       ├── about.blade.php
│       ├── contact.blade.php
│       └── home.blade.php
├── routes/
│   └── web.php                         # All application routes
├── storage/app/public/products/        # Uploaded product images
├── .env
├── composer.json
├── package.json
└── vite.config.js
```

---

## 📄 Main Files Explanation

| File                                               | Purpose                                                                                                            |
| -------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------ |
| `routes/web.php`                                   | Registers all routes — public store, auth, cart, checkout, and admin group (protected by `IsAdmin` middleware)     |
| `app/Http/Middleware/IsAdmin.php`                  | Checks `Auth::user()->is_admin`; redirects non-admins away from `/admin/*`                                         |
| `app/Http/Controllers/AuthController.php`          | Handles registration (with hashed password), login via `Auth::attempt()`, and session-safe logout                  |
| `app/Http/Controllers/CartController.php`          | Stores cart items in the session keyed by product ID; supports add, update quantity, and remove                    |
| `app/Http/Controllers/CheckoutController.php`      | Validates shipping form, wraps order+items creation in a DB transaction, decrements product stock, clears cart     |
| `app/Http/Controllers/Admin/ProductController.php` | Full CRUD for products; handles image uploads to `storage/app/public/products/` via Laravel's filesystem           |
| `app/Http/Controllers/Admin/OrderController.php`   | Lists all orders; shows order detail with items; allows status updates (pending → shipped → delivered → cancelled) |
| `app/Http/Controllers/Admin/UserController.php`    | Promotes a standard user to admin (`is_admin = true`)                                                              |
| `app/Http/Controllers/Admin/AdminController.php`   | Demotes an admin back to standard user; prevents self-demotion                                                     |
| `app/Models/Order.php`                             | Eloquent model with `hasMany(OrderItem::class)` relationship                                                       |
| `app/Models/OrderItem.php`                         | Belongs to both `Order` and `Product`; stores price snapshot at time of purchase                                   |
| `resources/views/layouts/master.blade.php`         | Base layout — includes header, footer, and `@yield('content')` slot                                                |
| `resources/views/layouts/header.blade.php`         | Sticky responsive nav; desktop shows full links, mobile uses hamburger drawer with auth & admin links              |
| `resources/views/admin/layouts/app.blade.php`      | Admin sidebar layout with active-state highlighting for Products, Orders, Users, Admins                            |
| `database/seeders/ProductSeeder.php`               | Seeds sample products with titles, descriptions, prices, and stock for development                                 |

---

## 💭 Reflection

Building LaCommerce was an exercise in applying the full Laravel MVC stack without relying on pre-built scaffolding like Breeze or Jetstream. Doing authentication from scratch — manually hashing passwords and protecting routes with custom middleware — reinforced how these systems work under the hood rather than treating them as a black box.

The session-based cart was a deliberate choice over a database-backed cart to keep the system lightweight for guest shoppers. The trade-off is that cart contents don't persist across devices or sessions, which is an acceptable limitation for this scope.

The admin panel grew organically feature by feature — products, then orders, then user/role management — which mirrors how real admin tools often evolve. One area that would benefit from further development is **input sanitisation and security hardening**: currently there is no CSRF-beyond-form protection, no rate limiting on the auth routes, and no email verification step for new accounts — all standard additions for a production system.

Overall, the project demonstrates a solid foundation for a production-ready e-commerce platform and provides clear extension points for features like order email notifications, product categories, search, and payment gateway integration.
