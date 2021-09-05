export const data = {
  "key": "v-8daa1a0e",
  "path": "/",
  "title": "Welcome",
  "lang": "en-US",
  "frontmatter": {
    "lang": "en-US",
    "title": "Welcome",
    "description": "Statamic Peak, an opinionated starter kit for all your Statamic sites.",
    "home": true,
    "heroImage": "./visuals/statamic-peak-logo-wide.svg",
    "heroText": "Start out on top",
    "tagline": "A Statamic Starter Kit",
    "actions": [
      {
        "text": "Get Started",
        "link": "/getting-started/welcome.html",
        "type": "primary"
      },
      {
        "text": "Features",
        "link": "/features/assets.html",
        "type": "secondary"
      }
    ],
    "features": [
      {
        "title": "For bespoke websites",
        "details": "A design agnostic starter kit for all your bespoke Statamic sites pushing SEO and a11y best practices."
      },
      {
        "title": "Opinionated",
        "details": "Peak comes bundled with preconfigured tools like Tailwind CSS and AlpineJS so it's easy to use with any design system."
      },
      {
        "title": "Page builder",
        "details": "This kit features a very extendible page builder using native Statamic fields, including Bard for long form content."
      },
      {
        "title": "SEO",
        "details": "Peak comes with full blown professional SEO support including various tracker support and a built in cookie banner."
      },
      {
        "title": "Social Images",
        "details": "Let your client generate themed custom social images for all entries based on your own templates."
      },
      {
        "title": "A lot more",
        "details": "Responsive assets, browser appearance configuration, favicon generation, button system, dark mode support, forms and more."
      }
    ],
    "footer": "© 2020 - 2021 | Studio 1902",
    "footerHTML": true,
    "editLink": false,
    "lastUpdated": false,
    "contributers": false
  },
  "excerpt": "",
  "headers": [],
  "filePathRelative": "README.md",
  "git": {
    "updatedTime": 1627891710000,
    "contributors": [
      {
        "name": "Rob de Kort",
        "email": "rob@studio1902.nl",
        "commits": 19
      },
      {
        "name": "vannut",
        "email": "richard@vannut.nl",
        "commits": 1
      }
    ]
  }
}

if (import.meta.webpackHot) {
  import.meta.webpackHot.accept()
  if (__VUE_HMR_RUNTIME__.updatePageData) {
    __VUE_HMR_RUNTIME__.updatePageData(data)
  }
}

if (import.meta.hot) {
  import.meta.hot.accept(({ data }) => {
    __VUE_HMR_RUNTIME__.updatePageData(data)
  })
}
