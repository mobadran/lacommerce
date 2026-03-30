# LaCommerce — Project Presentation

---

## 1. 💡 Project Idea

LaCommerce is a full-stack e-commerce web application built as a school project to demonstrate real-world web development using the Laravel framework.

The idea was to simulate an actual online store — one where customers can browse and buy products, and where a store owner (admin) can manage the entire business from a dedicated panel.

The project covers the complete shopping journey:

> **Browse products → Add to cart → Checkout → Order confirmed**

And behind the scenes, an admin manages:

> **Product inventory → Incoming orders → User accounts & roles**

The only payment method implemented is **Cash on Delivery (COD)**, keeping the focus on the application architecture rather than third-party payment integration.

---

## 2. 🎨 Design

The UI was built with **Tailwind CSS**, aiming for a clean, modern, and premium feel.

**Design principles followed:**

- Minimal and uncluttered layouts with generous whitespace
- Consistent card-based components with subtle shadows and rounded corners
- A neutral color palette (whites, grays) with **blue** as the primary accent
- **Indigo** reserved exclusively for admin/role-related actions to visually separate them
- Color-coded order status badges (yellow = pending, blue = shipped, green = delivered, red = cancelled)
- Mobile-first responsive layout with a hamburger menu drawer on smaller screens
- Micro-interactions: hover states, focus rings, smooth transitions on all interactive elements

**Two distinct layout systems:**
| Area | Layout |
|---|---|
| Customer-facing store | Full-width with sticky header, footer, and centered content |
| Admin panel | Fixed sidebar navigation + scrollable main content area |

---

## 3. 🛠️ Technologies Used

| Technology           | Role                                                                             |
| -------------------- | -------------------------------------------------------------------------------- |
| **Laravel 11**       | PHP backend framework — routing, controllers, Eloquent ORM, middleware, sessions |
| **Blade**            | Laravel's templating engine for all views and layouts                            |
| **Tailwind CSS v4**  | Utility-first CSS framework for styling                                          |
| **Vite**             | Frontend asset bundler — compiles and hot-reloads CSS/JS during development      |
| **SQLite**           | Lightweight database used for local development                                  |
| **Laravel Eloquent** | ORM for interacting with the database using PHP models                           |
| **Laravel Sessions** | Used to store the shopping cart without requiring user login                     |
| **PHP 8.2**          | Server-side language                                                             |
| **Git & GitHub**     | Version control and code hosting                                                 |

No external authentication packages (like Breeze or Jetstream) were used. Auth was built entirely from scratch.

---

## 4. ✨ Key Features

### 🛍️ Customer Side

- **Product catalogue** with image, title, price, and stock indicator
- **Individual product pages** with full description and Add to Cart
- **Session-based shopping cart** — add, update quantity, remove items, running total
- **Checkout form** capturing name, email, phone, address, and city
- **Cash on Delivery** as the payment method — order is saved and stock is decremented
- **Order confirmation page** with the order ID
- **User registration & login** (no starter kit — built from scratch)
- **Account page** — edit name, email, and password

### 🔐 Admin Panel (`/admin`)

- Protected by `IsAdmin` middleware — regular users are redirected
- **Products**: Create, edit, delete products; upload images directly from disk
- **Orders**: View all orders, drill into order detail, update order status
- **Users**: Promote any registered user to Admin
- **Admins**: View all admins, revoke admin rights (cannot remove yourself)
- Active page highlighted in sidebar navigation

### 📱 Responsive

- Mobile hamburger menu with all nav links, auth links, and admin panel button included in the drawer

---

## 5. ⚡ Challenges

**1. Building auth from scratch**
Not using a starter kit meant manually implementing password hashing, `Auth::attempt()`, session regeneration on login, and proper guest/auth middleware on routes. This was more educational but required careful attention to security details.

**2. Session-based cart without a user account**
Designing a cart that works for guests (no login required) using only Laravel sessions meant carefully keying items by product ID and handling edge cases like updating vs. adding items that already exist.

**3. Database transaction in checkout**
The checkout process creates an `Order` and then multiple `OrderItem` rows. Without a transaction, a crash halfway through would leave a corrupted order. Wrapping the entire operation in `DB::transaction()` ensures all-or-nothing atomicity.

**4. Role-based access without a package**
Implementing admin access control using a simple `is_admin` boolean column and a custom `IsAdmin` middleware — rather than a full RBAC package — required thinking through all the edge cases (e.g. blocking the route group at the middleware level, not just hiding buttons in the view).

**5. Image uploads vs. URL strings**
Switching from storing image URLs as plain text to handling actual file uploads required configuring Laravel's filesystem, running `php artisan storage:link`, and updating both the controller validation rules and the form `enctype`. The edit form also needed to preserve the existing image when no new file is uploaded.

---

## 6. 🔗 Links

- **GitHub Repository**: [https://github.com/mobadran/lacommerce](https://github.com/mobadran/lacommerce)
- **Local Dev URL**: [http://127.0.0.1:8000](http://127.0.0.1:8000)
- **Admin Panel**: [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)
