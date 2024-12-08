# Bedrock Sage Project Setup

This guide provides instructions for setting up the development environment, importing the database, and running the
project locally using **Local by Flywheel**, **Bedrock**, **Sage**, and **ACF Composer**.

## Files Included

-   **bedrock-local-wp-20241208-154720-bpg0zhf9usj5.wpress**: Exported database file via All-in-One WP Migration.
-   **Project Code (ZIP)**: Contains all the code used to develop the project, including the **Sage theme**, **ACF
    configurations**, and other custom code.
-   **ACF Plugin**: Custom ACF plugin used to create 3 custom blocks with **ACF Composer** (not the GUI).

---

## 1. Clone the Repository

To start, clone the repository to your local machine using Git:

```bash
git clone https://bitbucket.org/alogo-theme/alogo-theme.git
```

## 2. Configure Nginx and .env File

**Configure Nginx** If you're using Nginx for your local development environment (outside of Local by Flywheel), you
will need to configure it to serve your Bedrock projet

**Configure the .env File**

## 3. Install Project Dependencies

**Install PHP Dependencies**

```bash
cd alogo-theme
composer install
```

**Install Frontend DependenciesI**

```bash
yarn install
```

## 4. Import the Database

**1. Install the All-in-One WP Migration Plugin**

Username: neilmallia Password: root

Log in to the WordPress dashboard. Go to Plugins > Add New. Search for All-in-One WP Migration. Install and activate the
plugin

**2. Import the Database**

n the WordPress dashboard, go to All-in-One WP Migration > Import. Upload the
bedrock-local-wp-20241208-154720-bpg0zhf9usj5.wpress file. The database will be imported, including all posts, settings,
and ACF blocks.

## 5. Build Assets

```bash
npm run dev
```
