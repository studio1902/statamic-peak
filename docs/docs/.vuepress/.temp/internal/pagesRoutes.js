import { Vuepress } from '@vuepress/client/lib/components/Vuepress'

const routeItems = [
  ["v-8daa1a0e","/","Welcome",["/index.html","/README.md"]],
  ["v-13d510dd","/features/assets.html","Assets",["/features/assets.md"]],
  ["v-f9e2efa2","/features/bard.html","Bard",["/features/bard.md"]],
  ["v-920e7512","/features/browser-appearance.html","Browser appearance",["/features/browser-appearance.md"]],
  ["v-c192959e","/features/buttons.html","Buttons",["/features/buttons.md"]],
  ["v-734ccc78","/features/dark-mode.html","Dark mode",["/features/dark-mode.md"]],
  ["v-1a461f83","/features/forms.html","Forms",["/features/forms.md"]],
  ["v-3f48b8e2","/features/globals.html","Globals",["/features/globals.md"]],
  ["v-58be7d28","/features/navigation.html","Navigation",["/features/navigation.md"]],
  ["v-766fed03","/features/page-builder.html","Page builder",["/features/page-builder.md"]],
  ["v-c029d0b4","/features/pagination.html","Pagination",["/features/pagination.md"]],
  ["v-a14a17ca","/features/redirects.html","Redirects",["/features/redirects.md"]],
  ["v-7375add8","/features/search.html","Search",["/features/search.md"]],
  ["v-e7003356","/features/seo.html","SEO",["/features/seo.md"]],
  ["v-5207f5b3","/features/social-images-generation.html","Social images generation",["/features/social-images-generation.md"]],
  ["v-62160f31","/features/typography.html","Typography",["/features/typography.md"]],
  ["v-4e8563af","/getting-started/installation.html","Installation",["/getting-started/installation.md"]],
  ["v-16e6e0f0","/getting-started/knowledge-assumptions.html","Knowledge assumptions",["/getting-started/knowledge-assumptions.md"]],
  ["v-7c9bdf5b","/getting-started/tailwind-css.html","Tailwind CSS configuration",["/getting-started/tailwind-css.md"]],
  ["v-efb9f832","/getting-started/welcome.html","Start out on top!",["/getting-started/welcome.md"]],
  ["v-37bcd9ae","/other/awesome.html","Awesome",["/other/awesome.md"]],
  ["v-002e88c5","/other/configuration-changes.html","Configuration changes",["/other/configuration-changes.md"]],
  ["v-a88cba52","/other/contributing.html","Contributing",["/other/contributing.md"]],
  ["v-59f408d9","/other/custom-fonts.html","Custom fonts",["/other/custom-fonts.md"]],
  ["v-6c22e93e","/other/deployment-script.html","Deployment script",["/other/deployment-script.md"]],
  ["v-2738f058","/other/focus-visible.html","Focus-visible",["/other/focus-visible.md"]],
  ["v-39107090","/other/license.html","License",["/other/license.md"]],
  ["v-32642cf7","/other/lighthouse.html","Lighthouse",["/other/lighthouse.md"]],
  ["v-6b48d588","/other/localization.html","Localization and template strings",["/other/localization.md"]],
  ["v-0b7bd8fc","/other/reduced-motion.html","Reduced motion",["/other/reduced-motion.md"]],
  ["v-5131fff0","/other/tags.html","Tags",["/other/tags.md"]],
  ["v-168a44d4","/other/toolbar.html","Toolbar",["/other/toolbar.md"]],
  ["v-979d8dba","/other/upcoming-features.html","Upcoming features",["/other/upcoming-features.md"]],
  ["v-3706649a","/404.html","",[]],
]

export const pagesRoutes = routeItems.reduce(
  (result, [name, path, title, redirects]) => {
    result.push(
      {
        name,
        path,
        component: Vuepress,
        meta: { title },
      },
      ...redirects.map((item) => ({
        path: item,
        redirect: path,
      }))
    )
    return result
  },
  [
    {
      name: "404",
      path: "/:catchAll(.*)",
      component: Vuepress,
    }
  ]
)
