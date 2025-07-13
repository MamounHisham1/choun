# Electron - Modern E-commerce Platform

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo">
</p>

<p align="center">
<a href="https://github.com/yourusername/electron/actions"><img src="https://github.com/yourusername/electron/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Laravel Version"></a>
<a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/License-MIT-yellow.svg" alt="License"></a>
</p>

## About Electron

Electron is a modern, full-featured e-commerce platform built with Laravel 11. It provides a complete online shopping solution with an intuitive admin panel, advanced product management, and seamless customer experience.

## Features

### 🛍️ **Customer Features**
- **Product Catalog** - Browse products with advanced filtering and search
- **Shopping Cart** - Add/remove items with real-time updates
- **Wishlist** - Save favorite products for later
- **Secure Checkout** - Integrated with Stripe payment processing
- **Order Tracking** - Track order status and history
- **User Accounts** - Registration, login, and profile management
- **Blog** - Read articles and company updates

### 🎛️ **Admin Features**
- **Filament Admin Panel** - Modern, responsive admin interface
- **Product Management** - Create, edit, and organize products
- **Category & Brand Management** - Organize products efficiently
- **Order Management** - Process and track customer orders
- **Customer Management** - View and manage customer accounts
- **Inventory Management** - Track stock levels and variants
- **Coupon System** - Create and manage discount codes
- **Blog Management** - Publish and manage blog content
- **Analytics Dashboard** - Sales charts and order statistics

### 🔧 **Technical Features**
- **Search Engine** - Powered by Meilisearch for fast product discovery
- **Media Management** - Image uploads and optimization
- **Responsive Design** - Mobile-first approach
- **SEO Optimized** - Clean URLs and meta tags
- **Real-time Updates** - Livewire for dynamic interactions
- **API Ready** - Laravel Sanctum for API authentication

## Tech Stack

- **Backend:** Laravel 11, PHP 8.2+
- **Frontend:** Livewire 3, Alpine.js, Bootstrap
- **Admin Panel:** Filament 3
- **Database:** SQLite (development), MySQL/PostgreSQL (production)
- **Search:** Meilisearch
- **Payments:** Stripe
- **Media:** Spatie Media Library
- **Debugging:** Laravel Debugbar

## Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- SQLite/MySQL/PostgreSQL

### Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/electron.git
   cd electron
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure your database**
   Edit `.env` file with your database credentials:
   ```env
   DB_CONNECTION=sqlite
   # DB_DATABASE=/absolute/path/to/database.sqlite
   ```

5. **Run migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

6. **Create admin user**
   ```bash
   php artisan make:filament-user
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to see the application and `http://localhost:8000/admin` for the admin panel.

## Configuration

### Stripe Setup
Add your Stripe keys to `.env`:
```env
STRIPE_KEY=your_stripe_publishable_key
STRIPE_SECRET=your_stripe_secret_key
```

### Meilisearch Setup
Install and configure Meilisearch for search functionality:
```env
SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://localhost:7700
MEILISEARCH_KEY=your_master_key
```

## Usage

### Admin Panel
Access the admin panel at `/admin` to:
- Manage products, categories, and brands
- Process orders and manage customers
- Create blog posts and manage content
- View sales analytics and reports

### API Endpoints
The application provides API endpoints for:
- Product catalog
- Cart management
- Order processing
- User authentication

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## Testing

Run the test suite:
```bash
php artisan test
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

If you encounter any issues or have questions, please [open an issue](https://github.com/yourusername/electron/issues) on GitHub.

---

<p align="center">Built with ❤️ using Laravel</p>
