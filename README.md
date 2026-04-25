# Laravel Docker Setup

This repository contains a containerized Laravel application using Docker Compose. The environment includes PHP-FPM, Nginx, MySQL 8.0, Redis, and phpMyAdmin.

## Prerequisites

Before starting, make sure you have the following installed on your host machine:
- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- Git

---

## Zero to Hero: Setup Instructions

Follow these steps exactly to set up the project from a fresh clone until it is fully working.

### 1. Clone the Repository

Clone the project to your local machine and enter the directory:

```bash
git clone <repository-url> laravel-docker
cd laravel-docker
```

### 2. Fix Local Permissions & Ownership

After cloning, ensure your local user owns the files properly and base permissions are set. Run these commands from the root of the project:

```bash
sudo chown $USER:$USER . -R
sudo chmod 755 src -R
```

### 3. Set Up Environment Variables

The Laravel application is located in the `src/` directory. You need to create an environment file.

```bash
cp src/.env.example src/.env
```

Open `src/.env` and ensure your database and redis connection settings match the `docker-compose.yml` configuration:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=root

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### 4. Start the Docker Containers

Build the Docker images and start the containers in detached mode:

```bash
docker compose up -d --build
```

### 5. Install Dependencies

Once the containers are running, install the PHP dependencies using Composer directly inside the `laravel_app` container:

```bash
docker exec -it laravel_app composer install
```

### 6. Generate Application Key

Generate the Laravel application key:

```bash
docker exec -it laravel_app php artisan key:generate
```

### 7. Make Storage Writable for Docker

Because Docker's PHP process (`www-data`) needs to write to your logs and cache, you must grant write permissions to the storage and cache folders. 
*(Note: Do this step **after** the `chmod 755 src -R` command you ran earlier)*

```bash
chmod -R 777 src/storage src/bootstrap/cache
```

### 8. Run Database Migrations (Optional)

If your project has database tables set up, run the migrations:

```bash
docker exec -it laravel_app php artisan migrate
```

---

### Developing Assets (Tailwind CSS)

Now that Node.js is included in the container, you can compile your styles:

1. **Rebuild the container** (first time only):
   ```bash
   docker compose up -d --build
   ```

2. **Run the Dev Server** (for Hot Reload):
   ```bash
   docker exec -it laravel_app npm run dev
   ```

3. **Or Build for Production**:
   ```bash
   docker exec -it laravel_app npm run build
   ```

## Accessing the Services

Your application environment should now be fully up and running! 

- **Laravel App:** [http://localhost:8000](http://localhost:8000)
- **phpMyAdmin:** [http://localhost:8080](http://localhost:8080) (Use username: `laravel` and password: `root`)

Ensure everything renders correctly in your browser.

---

## Useful Docker Commands

- **Stop containers:** `docker compose down`
- **View logs for all services:** `docker compose logs -f`
- **View logs for webserver:** `docker compose logs -f webserver`
- **Execute an artisan command:** `docker exec -it laravel_app php artisan <command>`
- **Open an interactive terminal inside the app container:** `docker exec -it laravel_app bash`
