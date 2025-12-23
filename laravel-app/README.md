# Simple Task Management (Laravel 11)

This is a minimal single-user Task Management app built with Laravel 11, PHP 8.1+, and MySQL.

Features:
- Create, read, update, delete tasks
- Mark tasks as completed
- Filter by status
- Simple Bootstrap UI

Setup
1. Clone or copy the project into your workspace.
2. Install dependencies:

```bash
composer install
```

3. Create `.env` and set your database credentials (MySQL).

4. Generate app key:

```bash
php artisan key:generate
```

5. Run migrations and seed sample data:

```bash
php artisan migrate --seed
```

6. Serve the app:

```bash
php artisan serve
```

Files of interest
- `app/Models/Task.php` - Eloquent model
- `app/Enums` - `Priority` and `Status` enums
- `app/Http/Controllers/TaskController.php` - Resource controller
- `app/Http/Requests/TaskRequest.php` - Validation
- `database/migrations/*create_tasks_table.php` - Migration
- `resources/views/tasks` - Blade templates
- `routes/web.php` - Resource routes

Notes
- No authentication (single-user). Use environment DB for persistent storage.
- Enums used for `priority` and `status` keep domain values consistent.

How it could be extended
- Add user authentication and per-user tasks
- Add due dates, categories, attachments
- Add pagination and API endpoints
- Add tests (feature/unit)
