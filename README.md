# Fintek Managed Solutions - Official Website

![Fintek Logo](assets/images/fintek-logo.png)

A modern, high-performance corporate website for **Fintek Managed Solutions**, featuring a dynamic product catalog, object-oriented PHP architecture, and premium aesthetics.

## 🚀 Features

- **Object-Oriented Architecture**: Clean, maintainable PHP structure.
- **Dynamic Product Catalog**: Powered by a central repository with search and filtering.
- **Pretty URLs**: SEO-friendly extensionless paths (e.g., `/about-us` instead of `about.php`).
- **Premium Design**: Built with Tailwind CSS, AOS.js for animations, and Lucide Icons.
- **Responsive Inquiry System**: Integrated contact portal with PHPMailer support.

## 🛠️ Prerequisites

Before you begin, ensure you have the following installed:
- **XAMPP / WAMP / MAMP** (PHP 8.0 or higher)
- **Node.js & npm** (for Tailwind CSS development)

## 📦 Installation

1. **Clone the repository** to your local server directory (e.g., `htdocs` for XAMPP):
   ```bash
   git clone https://github.com/VishwaDhanujaya/Fintek.git
   cd Fintek
   ```

2. **Install Dependencies**:
   ```bash
   npm install
   ```

3. **Apache Configuration**:
   Ensure `mod_rewrite` is enabled in your Apache `httpd.conf` to support the Pretty URLs defined in `.htaccess`.

## 💻 Development Commands

This project uses Tailwind CSS for styling. Use the following commands to manage styles:

### Watch for Changes (Recommended)
Automatically compiles CSS whenever you modify your HTML/PHP files:
```bash
npm run watch
```

### Production Build
Generates a minified, optimized CSS file for deployment:
```bash
npm run build
```

## 🌐 Deployment

When deploying to a live server (e.g., `fintek.lk`):
1. The site is designed to **automatically detect** its environment.
2. Ensure you upload the `.htaccess` file along with the PHP files.
3. If your site is hosted in a subfolder, the `BASE_URL` in `config.php` will handle path resolution automatically.

## 📄 License

This project is proprietary and built for Fintek Managed Solutions (Pvt) Ltd.

---
*Built with ❤️ by Fintek Tech Team*
