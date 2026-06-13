<div align="center">
  <img src="https://ui-avatars.com/api/?name=Nexlify&background=0D8ABC&color=fff&size=150&rounded=true" alt="Nexlify Logo" width="150" />

  # ✍️ Nexlify — Laravel Blog Site

  *A modern, minimalist, and feature-rich blog platform built with Laravel.* <br>
  *Designed for clarity, performance, and delightful authoring.*

  [![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
  [![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
  [![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev)
  [![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
  [![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)

  [Explore Demo](#) · [Report Bug](#) · [Request Feature](#)
</div>

---

## 🌟 About The Project

Nexlify is a sleek content management system (CMS) tailored for small blogs and independent publishers. It allows users to write posts, follow their favorite authors, interact with content, and explore topics by category. Built on a robust Laravel foundation, it boasts a snappy user interface powered by Tailwind CSS and Vite.

### ✨ Key Features

- **📝 Post Management:** Create, edit, and delete beautifully formatted posts with image uploads and categorizations.
- **👤 User Profiles:** Dedicated author pages featuring their published posts, bio, and follower count.
- **🤝 Social Interaction:** Follow other authors to curate your feed and "clap" (like) posts to show appreciation.
- **🔍 Explore & Filter:** Browse posts seamlessly across various categories (Technology, Health, Science, Sports, etc.).
- **🔒 Authentication:** Secure user registration, login, and profile management.
- **📱 Responsive Design:** Fully optimized for mobile, tablet, and desktop views.

---

## 🛠️ Tech Stack

This project is built using modern web technologies:

- **Backend:** Laravel 11.x, PHP 8.2+
- **Frontend:** Blade Templates, Tailwind CSS
- **Build Tool:** Vite
- **Database:** MySQL
- **Testing:** Pest

---

## 📸 Screenshots

*(Add your screenshots here by placing them in a `screenshots` folder and uncommenting the markdown tables below)*

<img width="1907" height="1015" alt="Image" src="https://github.com/user-attachments/assets/90a23d7c-cf54-40d1-94fa-6667b6a72cbc" />

<img width="1912" height="1017" alt="Image" src="https://github.com/user-attachments/assets/3b58438b-cbfc-43c9-aabc-0e9438c4019a" />

<img width="1906" height="1007" alt="Image" src="https://github.com/user-attachments/assets/5600ce1e-2f36-4b60-8bdd-0ef081984c1e" />

<img width="1912" height="1016" alt="Image" src="https://github.com/user-attachments/assets/8aae2ba2-9a19-4a24-8c08-f8316f98bef7" />

---

## 🚀 Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

Make sure you have the following installed:
- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL or any compatible relational database

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/widushan/Laravel-Blog-Site.git
   cd "Laravel Blog Site"
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install frontend dependencies:**
   ```bash
   npm install
   ```

4. **Environment Setup:**
   Copy the example `.env` file and generate the app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Configuration:**
   Create a database locally and update your `.env` file with the database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nexlify_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run Migrations & Seeders:**
   *(Optional: Use `--seed` to populate the database with dummy users, categories, and posts)*
   ```bash
   php artisan migrate --seed
   ```

7. **Link Storage:**
   This is required to make uploaded images publicly accessible.
   ```bash
   php artisan storage:link
   ```

8. **Build Assets & Start Server:**
   Open two terminals and run the following commands:
   ```bash
   # Terminal 1: Compile assets
   npm run dev

   # Terminal 2: Start Laravel development server
   php artisan serve
   ```

9. **Visit the App:**
   Open `http://localhost:8000` in your browser. 🎉

---

## 📂 Project Structure

A quick look at the top-level files and directories you'll see in the project:

```text
├── app/
│   ├── Http/Controllers/   # Application logic & request handling
│   └── Models/             # Eloquent models (Post, User, Category, Clap, Follower)
├── database/
│   ├── migrations/         # Database schema definitions
│   └── seeders/            # Database mock data population
├── public/                 # Publicly accessible files & compiled assets
├── resources/
│   ├── css/                # Tailwind CSS entry points
│   └── views/              # Blade templates (UI components & pages)
├── routes/
│   └── web.php             # Web routes definition
├── tests/                  # Pest testing suite
└── ...
```

---

## 🤝 Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

Distributed under the MIT License. See `LICENSE` for more information.

---

<div align="center">
  Made with ❤️ by <b><a href="https://github.com/widushan">widushan</a></b>
</div>
