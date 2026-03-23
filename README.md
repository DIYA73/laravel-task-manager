
# Laravel Task Manager

A modern Laravel Task Manager web application with a Kanban-style board, drag & drop functionality, and real-time task updates.

⸻

✨ Features
	•	🔐 User Authentication (Login / Register)
	•	📝 Create, update, and delete tasks
	•	📌 Task status management (Todo / Doing / Done)
	•	🎯 Drag & Drop task board (Kanban style)
	•	⚡ Real-time UI updates
	•	📊 Dashboard with user tasks
	•	🎨 Clean and modern UI

⸻

🛠️ Tech Stack
	•	Backend: Laravel (PHP)
	•	Frontend: Blade + Vite + JavaScript
	•	Database: PostgreSQL
	•	Deployment: Render (Docker)
	•	Styling: Tailwind CSS

⸻

📦 Installation (Local)

git clone https://github.com/YOUR_USERNAME/laravel-task-manager.git
cd laravel-task-manager/task-app

cp .env.example .env
composer install
php artisan key:generate

# Configure database in .env

php artisan migrate
npm install
npm run dev

php artisan serve


⸻

⚙️ Environment Variables

Example .env configuration:

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:YOUR_KEY
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=task_manager
DB_USERNAME=postgres
DB_PASSWORD=your_password


⸻

🌐 Deployment (Render)
	•	Docker-based deployment
	•	Environment variables configured in Render dashboard
	•	PostgreSQL database connected via Render

⸻

📸 Screenshots
	•	Dashboard
	•	Task Board (Kanban)
	•	Task Management UI

(Add screenshots here later)

⸻

🧪 Commands

php artisan migrate --force
php artisan config:clear
php artisan cache:clear


⸻

📁 Project Structure

app/
routes/
resources/views/
database/
public/


⸻

📌 Future Improvements
	•	🔔 Notifications
	•	📅 Due dates
	•	👥 Team collaboration
	•	📱 Mobile optimization

⸻

🧑‍💻 Author

Diya Taib Ismahil
	•	Full-stack developer (in progress 🚀)
	•	Passionate about web development & UI/UX

⸻

⭐ Support

If you like this project, give it a ⭐ on GitHub!

⸻
