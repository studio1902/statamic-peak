<p align="center"><img src="https://cdn.studio1902.nl/assets/statamic-peak/peak-logo.svg" width="130" alt="Statamic Logo" /></p>
<h1 align="center">
  Statamic Peak
</h1>

![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)

 Statamic Peak is an opinionated starter kit for all your Statamic sites. It's design agnostic but comes bundled with tools like Tailwind and AlpineJS. Peak features a block rich collection of starter templates, fieldsets, blueprints, configuration and more to get you started on your client site straight away without having to copy / paste all the basics every time.

## Work in progress
Statamic Peak is work in progress. I'm currently ripping all the goodies from all the sites I made and bundling them together in this starter kit for v3. I still need to add and remove stuff and document everything. 

## Features
- [Tailwind](https://tailwindcss.com) as a CSS framework.
- Tailwind Custom Forms (with configuration).
- Tailwind Typography (with configuration).
- A custom Tailwind config file with added components and utilities used by Peak. 
- [AlpineJS](https://github.com/alpinejs/alpine/) as a JS framework.
- A block builder (replicator) with basic templates for your scaffolding your content. Easily extendible to your clients needs. 
- An article block (bard) with some default sets like a figure, pull quote and an embedded video set. Easily extendible.
- A button system for adding buttons to your site.
- Sane default configuration.
- The [Responsive Images](https://github.com/spatie/statamic-responsive-images) addon by Spatie to make using images in your templates a breeze.
- Asset compilation with Laravel Mix.
- Modernizr support (webp detection as a default).
- Inline documentation for all the various parts.

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

**4. Build!**

If you're using [Laravel Valet](https://laravel.com/docs/valet), your site should be available at `http://my-site.test`. You can access the control panel at `http://my-site.test/cp` and login with your new user. Build your site, read the [Statamic Docs](https://statamic.dev) and have fun!

## Contributing

Contributions and discussions are always welcome, no matter how large or small. Treat each other with respect.