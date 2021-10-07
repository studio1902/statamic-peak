# Contributing
Contributions and discussions are always welcome, no matter how large or small. Treat each other with respect. Read the [Code of Conduct](https://github.com/studio1902/statamic-peak/blob/main/.github/CODE_OF_CONDUCT.md).

Statamic Peak is a mono repo containing both a development environment and the docs.

## Repo structure

| Location | Purpose |
| --- | --- |
| `/` | The root level contains the actual kit that gets installed by Statamic. |
| `/docs/` | The documentation auto deployed to [peak.studio1902.nl](https://peak.studio1902.nl) running on Netlify. |
| `/dev/` | The actual development environment. A running Statamic Peak instance. |

## Development environment
If you want to contribute to the core Starter Kit make sure you target files the `/dev/` folder and run your local install from this folder. When you use valet you can navigate to the folder and type: `valet link statamic-peak`.

## Docs
The documentation run on https://vuepress.vuejs.org. To locally install this navigate to the `docs` dir in this repo and:

1. `npm i`
2. `npm run docs:dev`
3. Visit http://localhost:8080.

Commits to these docs are automatically deployed to production on https://peak.studio1902.nl using [Netlify](https://netlify.com).

## Thanks
These docs are initially setup using VuePress 1 by [Robert Guss](https://github.com/robertguss/). Thank you so much! Today we run VuePress 2.
