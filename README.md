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

# Installation

## 1. Git Clone:

Navigate to the directory where you want to clone the repository, and open your terminal or command prompt.
Run the command: 
 (```) git clone https://github.com/Dreadnought-1k2M5/laravel-store-project.git (```) 
 
## 2. Launch XAMPP and create a new Database.
Launch the XAMPP application. Start the Apache server and MySQL database, go to http://localhost/phpmyadmin/ and create a new database called "laravel_store_db".
## 3. Configure Environment Variables
Navigate to the project directory. Open the ".env.example" file and copy the content. Create a new file named ".env" to paste and save.
Configure database name:

In the .env file, find the line that specifies the database name.
Replace the placeholder value with the desired name for your database.
Generate key:

In the .env file, locate the line that specifies the application key.
If the key is not already generated, run the command: php artisan key:generate.
Copy the generated key and paste it in the appropriate line of the .env file.
Paste PayPal client:

In the .env file, find the line that specifies the PayPal client ID.
Paste the PayPal client ID provided to you into the appropriate line of the .env file.
NPM install and NPM run dev:

Open a new terminal or command prompt.
Navigate to the project directory.
Run the command: npm install to install the necessary dependencies.
After the installation is complete, run the command: npm run dev to build the project's assets.
PHP migrate and seed:

In the terminal or command prompt, navigate to the project directory.
Run the command: php artisan migrate to execute the database migrations.
After the migration is complete, run the command: php artisan db:seed to seed the database with initial data if applicable.
PHP serve:

In the terminal or command prompt, navigate to the project directory.
Run the command: php artisan serve to start the PHP development server.
The application should now be accessible in your browser at the specified server address.
