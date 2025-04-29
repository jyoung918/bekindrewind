Baseline WordPress Theme
======================

## Deployments
Code deployment is managed with GitHub actions.

### Production
The current version of the theme is located at TBD. It deploys from the `main` branch.

### Staging
The new version of the theme is located at TBD. It deploys from the `staging` branch.

## Development

### Requirements
- **DevKinsta** for local WordPress development
- **Composer** for PHP dependency management
- **Node.js (v20)** and **Yarn** for JavaScript dependency management
- Access to the repository on GitHub

### Setup

1. Clone this repository into the `your-wp-root-directory/wp-content/themes/{{SITE-NAME}}` directory: git clone https://github.com/thecodezone/sage.git {{SITE-NAME}}
2. Run `composer install` from your theme directory
3. Run `yarn` from your theme directory to set up node modules. Make sure to use node 20
4. Run `yarn build` from your theme directory for the first time to compile assets
5. Copy .env.example to .env and update the values as needed
6. To sync database from production you can use the WP Migrate plugin.

### Build commands

* `yarn dev` — Compile assets when file changes are made
* `yarn build` — Compile assets for production

### This theme is built with Sage 10

Sage is a WordPress starter theme with block editor support.

- Harness the power of [Laravel](https://laravel.com) and its available packages thanks to [Acorn](https://github.com/roots/acorn)
- Clean, efficient theme templating utilizing [Laravel Blade](https://laravel.com/docs/master/blade)
- Modern frontend development workflow powered by [Bud](https://bud.js.org/)
- Out of the box support for [Tailwind CSS](https://tailwindcss.com/)

## Original code is a fork of the Sage theme to be used as a starter theme for CodeZone.

To update fork:

- git fetch upstream
- git checkout main
- git merge upstream/main

To start a new project off this theme:

 - git clone https://github.com/thecodezone/sage.git my-custom-site
 - cd my-custom-site
 - rm -rf .git
 - git init
 - git add .
 - git commit -m "Initial commit with customized Roots Sage theme"
 - git remote add origin https://github.com/thecodezone/my-custom-site.git
 - git push -u origin main