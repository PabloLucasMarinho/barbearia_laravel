# ✂️ Barber Shop System

> 🚧 **Work in Progress**  
> This project is currently under active development and may change frequently.

A barbershop management system developed with **Laravel 12**, using **Laravel Fortify** for authentication and **Blade** as the templating engine.

📱 **Mobile First Approach**  
The interface is being designed primarily for mobile devices.  
Because of that, the desktop version may currently look unpolished or visually inconsistent.  
A dedicated responsive layout for larger screens is planned for future updates.

The application runs in a fully **Dockerized environment**, ensuring easy setup and consistent execution across different machines.

---

## 🧠 System Architecture

Below is a high-level overview of the system structure until now:

![barbershop_der](https://github.com/user-attachments/assets/d4689bf1-2db6-4493-afc0-682d2dafcd8f)

---

## Technologies Used

- PHP 8+
- Laravel 12
- Laravel Fortify
- Blade Templates
- HTML5 and CSS3
- MySQL
- Mailpit
- Docker
- Docker Compose

---

## Prerequisites

Before starting, make sure you have the following installed on your machine:

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

---

## How to Run the Application

### 1. Clone the repository

```bash
git clone https://github.com/PabloLucasMarinho/barbearia_laravel.git
cd barber-shop-system
```

### 2. Build and start the containers

```bash
docker compose up -d --build
```

Wait until the build process finishes.

### 3. File Permissions (Docker + Linux)

<strong style="color: red;">ONLY ON THE FIRST RUN OF THE APPLICATION IN DEVELOPMENT PRODUCTION!</strong>

This project uses **bind mounts** (`.:/var/www`) to allow editing files directly from the host (VS Code, Git, etc.).  
To avoid permission issues, the PHP container runs with the **same UID/GID as the host user**.

#### Why is this necessary?

Without this setup, the following problems are common:

- Permission errors when saving files in VS Code
- Files created as `root` or `www-data`
- Git warnings such as _"detected dubious ownership"_
- The need to use `sudo` unnecessarily

### 3. Install dependencies and configure the application

Run the following commands in order:

```bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

Seed the database with sample data:

```bash
docker compose exec app php artisan db:seed
```

### 4. Access the application

After completing the steps above, the application will be available at:

```bash
http://localhost:8000
```

And the Mailpit at:

```bash
http://localhost:8025
```

---

## Stopping the Application

To stop and remove the containers, run:

```bash
docker compose down
```

---

## Notes

Environment variables are managed through the .env file.
If needed, copy the example file:

```bash
cp .env.example .env
```

Authentication is handled by Laravel Fortify, without using front-end frameworks such as Vue or React.
The UI is built using Blade + HTML + CSS only, with no external UI libraries.

---

## License

The Laravel framework is open-source software licensed under the [MIT license](LICENSE). This project follows the same licensing.
