# QuickSale POS

A basic Point-of-Sale starter website built with CodeIgniter 4. This version provides static Customer Accounts and User Accounts pages; it does not use a database yet.

## Features

- Landing page (`/`)
- About page (`/about`)
- Customer Accounts page (`/customers`) with full name, email, and phone records
- User Accounts page (`/users`) with username, full name, and role records
- Shared navigation between all pages
- Sample data stored in PHP arrays inside the controllers

## Requirements

- PHP 8.1 or later
- Composer
- PHP extensions: `intl`, `mbstring`, and `zip`
- XAMPP is recommended for local Windows development

## Set up the project

1. Open PowerShell in the project folder:

   ```powershell
   cd C:\xampp\htdocs\TA1
   ```

2. Install PHP packages with Composer:

   ```powershell
   composer install
   ```

   If `composer` is not in your PATH and you use XAMPP, run Composer through PHP instead:

   ```powershell
   C:\xampp\php\php.exe composer.phar install
   ```

3. Create `.env` from the supplied `env` template if it does not already exist:

   ```powershell
   Copy-Item env .env
   ```

4. Set the local application URL in `.env`:

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost/TA1/public/'
   ```

## Run locally

### Option A: XAMPP Apache

1. Start Apache from the XAMPP Control Panel.
2. Visit [http://localhost/TA1/public/](http://localhost/TA1/public/) in a browser.

### Option B: CodeIgniter development server

Run this from the project folder:

```powershell
C:\xampp\php\php.exe spark serve
```

Then visit the address shown in the terminal, normally [http://localhost:8080](http://localhost:8080).

## Available pages

| Page | XAMPP URL |
| --- | --- |
| Home | `http://localhost/TA1/public/index.php/` |
| About | `http://localhost/TA1/public/index.php/about` |
| Customer Accounts | `http://localhost/TA1/public/index.php/customers` |
| User Accounts | `http://localhost/TA1/public/index.php/users` |

## Project structure

```text
app/
├── Config/Routes.php          # URL-to-controller mappings
├── Controllers/
│   ├── Pages.php              # Home and About pages
│   ├── Customers.php          # Static customer records
│   └── Users.php              # Static staff records
└── Views/
    ├── layouts/main.php       # Shared navigation and page layout
    ├── pages/                 # Home and About views
    ├── customers/index.php    # Customer table view
    └── users/index.php        # User table view
```

## Verify the application

After starting the app, open each page listed above. Every page should load successfully, and the Customer and User Accounts pages should each display five sample records.

## Deploy to a PHP host

Use a PHP-compatible host that allows its web root (document root) to be set to this project's `public` folder. This is important: do not expose the project root because it contains application configuration and source files.

1. Upload the project source, including `composer.json` and `composer.lock`.
2. On the host, run:

   ```bash
   composer install --no-dev --optimize-autoloader
   ```

3. Create a production `.env` file and set the real HTTPS URL:

   ```ini
   CI_ENVIRONMENT = production
   app.baseURL = 'https://your-domain.example/'
   ```

4. Set the host's document root to the uploaded `public` directory.
5. Confirm the live home, About, Customers, and Users URLs work.
6. Record the live URL here after deployment:

   ```text
   Hosted URL: <add the live HTTPS URL here>
   ```

The hosted site matches the submitted code when it is deployed from this exact project folder, with dependencies installed from the included `composer.lock` file.
