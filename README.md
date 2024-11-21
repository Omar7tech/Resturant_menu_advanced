

# 🔵Laravel Admin Dashboard with Product and Category Management

## Overview
This project is a comprehensive Laravel application designed to manage products, categories, and application-wide settings. The admin dashboard offers powerful tools to control various aspects of the application, including authentication, dynamic settings, and an intuitive interface powered by modern web development technologies.

---

## Features

### **Core Functionalities**
1. **Product Management**
   - Full CRUD operations for products.
   - Manage attributes such as:
     - Prices (original and discounted).
     - Preparation time (e.g., for food items).
     - Features such as "spicy," "vegan," and "top seller."
   - Image upload support with Laravel's storage system.
   - Filter and search options for streamlined product discovery.

2. **Category Management**
   - CRUD operations for categories.
   - Advanced sorting powered by **Sortify.js** for drag-and-drop reordering.
   - Toggle `enabled` and `featured` statuses for each category.
   - Categories linked to products with soft delete functionality.

3. **Settings Management**
   - Update global application preferences through an admin interface.
   - Configurable options include:
     - Display formats (e.g., card or list view).
     - Theme selection (light/dark mode).
     - Currency settings.
     - Menu design layout.
     - Feature toggles such as showing images, descriptions, and preparation times.

4. **User Interface Features**
   - **Dynamic Dashboard:** Includes metrics and charts to display key application statistics (e.g., product counts by category).
   - **Responsive Design:** Built with **TailwindCSS** and **DaisyUI** to provide a seamless experience on both desktop and mobile.

### **Authentication and Security**
- **Authentication Middleware:** Restricts access to admin routes to logged-in users.
- **Security Practices:** Admin panel is accessible only through `/admin` to reduce exposure.

### **Frontend and Backend Integrations**
- Frontend powered by Blade templates with reusable components.
- Backend APIs utilize AJAX for real-time updates.
- Real-time sorting and toggling for categories and products.

---

## Installation Guide

### Prerequisites
Before you begin, ensure your system meets the following requirements:
- PHP >= 8.0
- Composer
- Laravel Framework
- Node.js and npm (for frontend dependencies)

### Steps to Install
1. Clone the repository:
   ```bash
   git clone https://github.com/Omar7tech/Resturant_menu_advanced
   ```
2. Navigate to the project directory:
   ```bash
   cd Resturant_menu_advanced
   ```
3. Install dependencies:
   ```bash
   composer install
   npm install
   ```
4. Set up your environment file:
   ```bash
   cp .env.example .env
   ```
   Update `.env` with database credentials, mail configuration, and other relevant settings.

5. Run migrations and seeders to set up the database schema and initial data:
   ```bash
   php artisan migrate --seed
   ```

6. Serve the application:
   ```bash
   php artisan serve
   ```
   Visit the application at `http://127.0.0.1:8000`.

---

## Project Structure

### **Routes**
The routes are defined in `web.php` and follow a clear hierarchy:
- `/`: User-facing homepage displaying categorized and uncategorized products.
- `/about`: Static page for informational content.
- `/admin`: Admin dashboard (authentication required).

#### **Admin Routes**
Admin-specific routes are grouped under the `admin` prefix and middleware for enhanced organization:
- **Settings Management:**
  - `/admin/settings` (GET/POST)
- **Categories Management:**
  - `/admin/categories` (CRUD with sortable features)
- **Products Management:**
  - `/admin/products` (CRUD with image management)

### **Database Schema**
1. **Categories Table**
   - Stores category details and supports sorting and soft deletes.
   - Key fields:
     - `id`, `name`, `description`, `enabled`, `featured`, `sort`.

2. **Products Table**
   - Stores product details with foreign key linking to categories.
   - Key fields:
     - `id`, `name`, `price`, `new_price`, `preparation_time`, `image_url`, `category_id`.

3. **Settings Table**
   - Stores global application settings in a key-value pair format.

### **Controllers**
1. **CategoryController**
   - Handles CRUD operations for categories.
   - Provides APIs for sorting, enabling/disabling, and toggling featured status.
2. **ProductController**
   - Manages products, including image uploads, CRUD operations, and toggling features.
3. **SettingsController**
   - Updates and stores global application settings.
4. **HomeController**
   - Manages user-facing pages and admin dashboard metrics.

---

## Customization

### **Themes and Design**
- Built using **TailwindCSS** and **DaisyUI** for effortless customization.
- Toggle between dark and light modes directly from the admin interface.

### **Sorting Categories**
- The sortable feature is implemented using **Sortify.js** for a drag-and-drop interface.

### **Dynamic Settings**
- Admin can control visibility and layout of elements on the frontend (e.g., product descriptions, calorie counts).

---

## Development Notes

### **AJAX Features**
- Category and product toggles use AJAX for real-time updates.
- Sorting operations send asynchronous requests to persist changes.

### **Seeder for Default Settings**
The application ships with a seeder (`SettingsSeeder`) to pre-populate default configurations.

---

## Contributing
We welcome contributions! Follow these steps to contribute:
1. Fork the repository.
2. Create a feature branch (`git checkout -b feature-name`).
3. Commit your changes (`git commit -m 'Add feature-name'`).
4. Push to the branch (`git push origin feature-name`).
5. Submit a pull request.

---

## Troubleshooting

### Common Issues
1. **Missing `.env` Configuration:**
   - Ensure you copy `.env.example` to `.env` and provide valid credentials.
2. **Database Errors:**
   - Run `php artisan migrate --seed` to initialize tables and default data.

---

## License
This project is licensed under the [MIT License](LICENSE).

---

## Contact
For support or questions, please reach out to: <a href="mailto:omar.7tech@gmail.com">omar.7tech@gmail.com</a>

----------------------------------
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
