# Contributing
Contributions and discussions are always welcome, no matter how large or small.

Statamic Peak is a mono repo containing the kit that gets installed for users, a development environment and the docs.

## Repo structure

| Location | Purpose |
| --- | --- |
| `/` | The root level contains the actual kit that gets installed by Statamic. |
| `/docs/` | The documentation auto deployed to [peak.1902.studio](https://peak.1902.studio) running on Netlify. |
| `/dev/` | The actual development environment. A running Statamic Peak instance. |

## Development environment
If you want to contribute to the core Starter Kit **make sure you update the files in the `dev` folder of the repository**.
After making changes please run a local starter kit install from this folder to check everything installs properly.

When you use valet you can navigate to the `dev` folder and type: `valet link statamic-peak`.
After this your site will be available on `http://statamic-peak.test` (or whatever you configured for your TLD).

## Test the kit export
You can test the kit export by running `php please starter-kit:export .././` in the dev environment. After running this command the git status should reflect all changed and new files in the root of the repo. Please don't commit those kit export changes. Exporting the starter kit, maintaining the changelog and tagging releases is something the maintainer(s) of the project do.

If you want to install and test your locally exported kit, make sure you add the repo's local path to your global Composer `config.json` file as a repository:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "/Users/robdekort/statamic-peak"
        }
    ]
}
```

You can then run `statamic new site studio1902/statamic-peak --local` to run the Statamic installer using your own locally exported starter kit.

## Docs
The documentation run on https://vuepress.vuejs.org. To locally install this navigate to the `docs` dir in this repo and:

1. `npm i`
2. `npm run docs:dev`
3. Visit http://localhost:8080.

Commits to these docs are automatically deployed to production on https://peak.1902.studio using [Netlify](https://netlify.com).

## Attribution
These docs are initially setup using VuePress 1 by [Robert Guss](https://github.com/robertguss/). Thank you so much! Today we run VuePress 2.
