export const themeData = {
  "docsBranch": "main",
  "docsRepo": "studio1902/statamic-peak-docs",
  "docsDir": "docs",
  "editLinks": true,
  "editLinkText": "Improve this page on GitHub",
  "lastUpdated": true,
  "lastUpdatedText": "Last updated",
  "logo": "./visuals/statamic-peak-logo.svg",
  "navbar": [
    {
      "text": "Sponsor",
      "link": "https://github.com/sponsors/studio1902"
    },
    {
      "text": "Discord",
      "link": "https://discord.gg/sW7KXWaucH"
    },
    {
      "text": "Changelog",
      "link": "https://github.com/studio1902/statamic-peak/blob/main/CHANGELOG.md"
    }
  ],
  "repo": "studio1902/statamic-peak",
  "sidebar": [
    {
      "text": "Getting started",
      "link": "/getting-started/welcome.md",
      "children": [
        "/getting-started/welcome.md",
        "/getting-started/installation.md",
        "/getting-started/knowledge-assumptions.md",
        "/getting-started/tailwind-css.md"
      ]
    },
    {
      "text": "Features",
      "link": "/features/assets.md",
      "children": [
        "/features/assets.md",
        "/features/bard.md",
        "/features/browser-appearance.md",
        "/features/buttons.md",
        "/features/dark-mode.md",
        "/features/forms.md",
        "/features/globals.md",
        "/features/navigation.md",
        "/features/page-builder.md",
        "/features/pagination.md",
        "/features/redirects.md",
        "/features/search.md",
        "/features/social-images-generation.md",
        "/features/seo.md",
        "/features/typography.md"
      ]
    },
    {
      "text": "Other",
      "link": "/other/awesome.md",
      "children": [
        "/other/awesome.md",
        "/other/configuration-changes.md",
        "/other/custom-fonts.md",
        "/other/deployment-script.md",
        "/other/focus-visible.md",
        "/other/lighthouse.md",
        "/other/localization.md",
        "/other/reduced-motion.md",
        "/other/tags.md",
        "/other/toolbar.md",
        "/other/upcoming-features.md"
      ]
    },
    {
      "text": "Contributing & License",
      "link": "/other/contributing.md",
      "children": [
        "/other/contributing.md",
        "/other/license.md"
      ]
    }
  ],
  "locales": {
    "/": {
      "selectLanguageName": "English"
    }
  },
  "darkMode": true,
  "selectLanguageText": "Languages",
  "selectLanguageAriaLabel": "Select language",
  "sidebarDepth": 2,
  "editLink": true,
  "contributors": true,
  "contributorsText": "Contributors",
  "notFound": [
    "There's nothing here.",
    "How did we get here?",
    "That's a Four-Oh-Four.",
    "Looks like we've got some broken links."
  ],
  "backToHome": "Take me home",
  "openInNewWindow": "open in new window"
}

if (import.meta.webpackHot) {
  import.meta.webpackHot.accept()
  if (__VUE_HMR_RUNTIME__.updateThemeData) {
    __VUE_HMR_RUNTIME__.updateThemeData(themeData)
  }
}

if (import.meta.hot) {
  import.meta.hot.accept(({ themeData }) => {
    __VUE_HMR_RUNTIME__.updateThemeData(themeData)
  })
}
