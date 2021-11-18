# Installation

## Installation via the CLI

The easiest way to install Statamic together with Peak is to use the [official CLI](https://github.com/statamic/cli). Install the CLI by running `composer global require statamic/cli` and for each project just run `statamic new my-site studio1902/statamic-peak`.

Make sure you use the provided `.env.example` file by running `cp .env.example .env && php artisan key:generate`.

## Install into an existing Statamic v3.2+ project

If you already have an existing Statamic installation you can run the following command: `php please starter-kit:install studio1902/statamic-peak`.

Make sure you update your `.env` file according to the the `.env.example`. Peak moves some Statamic [configuration options](/other/configuration-changes.html) to environment variables.

## Compile the frontend assets

The starter kit comes bundles with compiled assets. Run `npm i && npm run dev` to compile your frontend assets. Use `npm run watch` to watch and compile whenever you made any changes.

Since we use the Tailwind CSS JIT compiler, as soon as you make changes you need to compile them yourself. Compilation is configured in `webpack.mix.js`. Make sure you add your hostname to your `.env` file (`APP_URL`) as it's being used for Browsersync in `webpack.mix.js`.

```bash
npm i && npm run watch (or npm run dev)
```

To compile for production run this (on your server). Since Peak uses the Tailwind CSS JIT compiler this won't purge anything, but it will minify your assets:

```bash
npm run production
```
