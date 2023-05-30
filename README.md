<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>


# Laravel-training (Basic Online Store)
'MidnightGaze Store' is a basic online store created in Laravel that offers both Clothing/Apparel products and Electronic/Gadget products. It includes featues such as user registration and authentication, displaying product details, searching products by name or category, adding and removing products to cart, checkout with PayPal sandbox, a basic admin page for the owner to add products, and it also offers REST API services that exposes most of the same functionality as the web interface.

## Tech Stack

- Laravel
- PHP
- JavaScript
- HTML
- CSS
- Tailwind CSS
- XAMPP

# Prerequisite
You need to have the following installad
1. PHP
2. Composer
3. XAMPP
4. Node.js

You will so need to create your own PayPal developer and Sandbox account.

# Installation

## 1. Git Clone:

Navigate to the directory where you want to clone the repository, and open your terminal or command prompt.
Run the command: 

```
git clone https://github.com/Dreadnought-1k2M5/laravel-store-project.git
```
 
## 2. Launch XAMPP and create a new Database.
Launch the XAMPP application. Start the Apache server and MySQL database, go to http://localhost/phpmyadmin/ and create a new database called "laravel_store_db".

## 3. Configure Environment Variables
Navigate to the project directory. Open the ".env.example" file and copy the content. Create a new file named ".env" to paste and save.
Configure database name:

In the .env file, find the line that specifies DB_DATABASE and set the same name as the database name you created in the http://localhost/phpmyadmin/ (laravel_store_db).

After that, paste the following to the .env file.

```
PAYPAL_CLIENT_ID=(replace placeholder including parenthesis)

PAYPAL_CLIENT_SECRET=(replace placeholder including parenthesis)

PAYPAL_CURRENCY=(replace placeholder including parenthesis)
```

You will need a PayPal Developer and Sandbox accound to get the Client ID and Secret. Make sure to replace the right operand including the parenthesis (e.g. PAYPAL_CLIENT_ID=AXLNeOPqC80ACM....). You can specifiy the PAYPAL_CURRENCY as 'USD' (without quotes).

In the .env file, locate the line that specifies the application key.
If the key is not already generated, run the command: php artisan key:generate.
Copy the generated key and paste it in the appropriate line of the .env file.
Paste PayPal client:

## 4. Generate application key
Within your project folder, open your terminal or command prompt and generate an application key for your Laravel application by entering the command:
``` php artisan key:generate ```

## 5. Install Dependencies
Install Node and PHP dependecies by entering command (Make sure your terminal is at the project folder.)

```
cd laravel_store_project

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

## 6. Migrate and Seed the Database
Run the command execute the database migrations and seed data.
```
php artisan migrate:fresh --seed
```

## 7. Run Vite.
Enter the command to run Vite. This is for tailwind and other node depenecies.
```
npm run dev
```

## Serve the Application
Enter the command to run the application. Make sure you're running both Apache and MySQL in your XAMPP.
```
php artisan serve.
```
