Clone the project.

```bash
git clone whatever
```

Install the dependencies

```bash
composer install
```

Create a mysql/mariadb database and create the initial tables.

```bash
mysql -u root -e "create database invoice_manager; use invoice_manager; source database/create-tables.sql;"
```

Create a .env file based on the .env-example and connect to the database.

```bash
cp .env-example .env && vi .env
```

You're all set!

Optionally, you may load mock data for testing.
```bash
mysql -u root -e "use invoice_manager; source database/mock-data.sql;"
```

Additionally, you can test the admin functionality.
Run this cli tool to create an admin user.
```bash
database/create-admin-user.sh
```

