# Statamic Peak

![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)

## Features
- 

## Quick Start

**1. Create a new site** cloning the repo and removing the origin repo.

```
git clone git@github.com:studio1902/statamic-peak.git my-site
cd my-site
rm -rf .git
composer install
cp .env.example .env && php artisan key:generate
```

**2. Make a new user** – you'll want it to be a `super` so you have access to everything.

```
php please make:user
```

**3. Compile the fontend assets** 

The [TailwindCSS](https://tailwindcss.com/) compiled assets aren't included in this repo. You need to compile it yourself.

```
npm i && npm run watch
```

To compile for production run this (on your server). It will purge all unnecessary utility classes and greatly reduce file size:
```
npm run production
```

**4. Do your thing!**

If you're using [Laravel Valet](https://laravel.com/docs/valet) (or similar), your site should be available at `http://my-site.test`. You can access the control panel at `http://my-site.test/cp` and login with your new user. Open up the source code, follow along with the [Statamic 3 docs](https://statamic.dev), and enjoy!

## Contributing

Contributions are always welcome, no matter how large or small.
