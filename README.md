# 📋 Laravel Task Manager

> A modern, SaaS-style Task Manager built with Laravel — featuring a Kanban board, drag & drop, and real-time UI updates.

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-16-336791?style=flat-square&logo=postgresql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

---

## ✨ Features

- 🔐 **User Authentication** — Secure login and registration system
- 📝 **Full Task CRUD** — Create, update, and delete tasks effortlessly
- 📌 **Status Management** — Organize tasks across `Todo`, `Doing`, and `Done` columns
- 🎯 **Kanban Board** — Drag & drop interface for intuitive task management
- ⚡ **Real-Time Updates** — UI reflects changes instantly without page reloads
- 📊 **Personal Dashboard** — Overview of all your tasks in one place
- 🎨 **Modern UI** — Clean, responsive design powered by Tailwind CSS

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel (PHP) |
| Frontend | Blade Templates + Vite + JavaScript |
| Styling | Tailwind CSS |
| Database | PostgreSQL |
| Deployment | Render (Docker) |

---

## 📦 Installation (Local Development)

### Prerequisites

- PHP 8.2+
- Composer
- Node.js & npm
- PostgreSQL

### Steps

```bash
# 1. Clone the repository
git clone https://github.com/DIYA73/laravel-task-manager.git
cd laravel-task-manager

# 2. Install PHP dependencies
composer install

# 3. Set up environment
cp .env.example .env
php artisan key:generate

# 4. Configure your database in .env (see below)

# 5. Run migrations
php artisan migrate

# 6. Install frontend dependencies and build
npm install
npm run dev

# 7. Start the development server
php artisan serve
```

Visit `http://localhost:8000` in your browser. 🎉

---

## ⚙️ Environment Variables

Copy `.env.example` to `.env` and fill in the following:

```env
APP_NAME=Laravel Task Manager
APP_ENV=local
APP_KEY=base64:YOUR_GENERATED_KEY
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=task_manager
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

---

## 🐳 Deployment (Render via Docker)

This project includes a `Dockerfile` for containerized deployment.

1. Push your code to GitHub
2. Create a new **Web Service** on [Render](https://render.com)
3. Connect your repository
4. Set environment variables in the Render dashboard
5. Add a **PostgreSQL** database on Render and link it via `DATABASE_URL`
6. Deploy 🚀

---

## 🧪 Useful Artisan Commands

```bash
# Run database migrations
php artisan migrate

# Run migrations (force in production)
php artisan migrate --force

# Clear cached config
php artisan config:clear

# Clear application cache
php artisan cache:clear

# Run tests
php artisan test
```

---

## 📁 Project Structure

```
laravel-task-manager/
├── app/
│   ├── Http/Controllers/     # Request handling logic
│   └── Models/               # Eloquent models
├── database/
│   └── migrations/           # Database schema
├── resources/
│   └── views/                # Blade templates
├── routes/
│   └── web.php               # Application routes
├── public/                   # Publicly accessible assets
├── Dockerfile                # Docker configuration
└── .env.example              # Environment variable template
```

---

## 📸 Screenshots

### 🔐 Login Page
![Login](https://raw.githubusercontent.com/DIYA73/laravel-task-manager/main/public/screenshots/login.png)

### 📋 Dashboard & Kanban Board
![Dashboard](https://raw.githubusercontent.com/DIYA73/laravel-task-manager/main/public/screenshots/dashboard.png)

### 📝 Register Page
![Register](https://raw.githubusercontent.com/DIYA73/laravel-task-manager/main/public/screenshots/register.png)

---

## 🔮 Roadmap & Future Improvements

- [ ] 🔔 In-app Notifications
- [ ] 📅 Task Due Dates & Reminders
- [ ] 👥 Team Collaboration & Role Management
- [ ] 📱 Full Mobile Optimization
- [ ] 🏷️ Task Labels & Priority Levels
- [ ] 📈 Productivity Analytics

---

## 🧑‍💻 Author

**Diya Taib Ismahil**

- 🌐 Full-stack Developer (in progress 🚀)
- 💡 Passionate about web development & UI/UX
- 🔗 [GitHub Profile](https://github.com/DIYA73)

---

## 📄 License

This project is licensed under the **MIT License** — see the [LICENSE](LICENSE) file for details.

---

## ⭐ Support

If you found this project useful or interesting, please give it a ⭐ on GitHub — it means a lot!

---

> Built with ❤️ using Laravel & Tailwind CSS
