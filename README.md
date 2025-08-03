# 🛒 Laravel 12 Multi-Vendor E-Commerce Platform

A full-featured multi-vendor marketplace built using **Laravel 12**, designed to support multiple sellers under one platform — similar to Amazon or Etsy. This project focuses on modular architecture, clean code structure, and practical implementation of vendor, admin, and customer workflows.

---

## 🚀 Why Laravel?

Laravel is a modern PHP framework known for its expressive syntax, powerful ORM (Eloquent), robust security, and vast ecosystem. Laravel 12 introduces performance improvements, better developer ergonomics, and advanced support for APIs and service layers — making it an ideal choice for scalable e-commerce platforms.

---

## 🏬 What is a Multi-Vendor Marketplace?

A multi-vendor platform allows multiple independent sellers to register, list products, and manage sales under a single storefront. The platform owner (admin) oversees operations, takes commissions on orders, and ensures a consistent user experience across vendors.

---

## 🔑 Key Features

### 🧑‍💼 Vendor
- Vendor registration & authentication
- Product listing, editing, and inventory control
- Dashboard to view sales, orders, and earnings
- Ability to manage coupons and request new categories

### 🛠️ Admin
- Manage vendor approvals and activity
- Approve/disapprove vendor product listings
- Monitor transactions, commissions, and site analytics
- Full control over categories, banners, and featured products
- Handle disputes and customer support

### 🛍️ Customer
- Browse and search products across vendors
- Add to cart, checkout, and track orders
- Write product reviews and rate vendors
- Secure account and order history access

---

## ⚙️ Technical Highlights

- **Laravel 12** — Latest version with enhanced performance and features
- **MVC Architecture** — Clear separation of concerns
- **Blade Templates** — Fast and dynamic UI rendering
- **Eloquent ORM** — Powerful database relationships and query handling
- **AJAX File Uploads** — Product image & video uploads with progress feedback
- **Role-Based Access** — Authentication for Admins, Vendors, and Customers
- **Service Layer Pattern** — Business logic decoupled from controllers
- **Commission Engine** — Admin-set commission on vendor orders
- **SEO Fields** — Meta title, description, and keyword management

---

## 📁 Project Structure

- `app/Models` – Eloquent models for core entities (Product, Category, Vendor, etc.)
- `app/Http/Controllers` – Controllers grouped by responsibility (Admin, Vendor, Front)
- `app/Services` – Business logic for handling products, images, pricing, etc.
- `resources/views` – Blade templates for frontend and dashboard interfaces
- `routes/web.php` – Route definitions with middleware separation
- `public/front` – Public-facing assets like product images and videos
