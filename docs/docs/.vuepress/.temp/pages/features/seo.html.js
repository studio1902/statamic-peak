export const data = {
  "key": "v-e7003356",
  "path": "/features/seo.html",
  "title": "SEO",
  "lang": "en-US",
  "frontmatter": {},
  "excerpt": "",
  "headers": [
    {
      "level": 2,
      "title": "SEO features",
      "slug": "seo-features",
      "children": []
    },
    {
      "level": 2,
      "title": "Cookie consent banner",
      "slug": "cookie-consent-banner",
      "children": []
    }
  ],
  "filePathRelative": "features/seo.md",
  "git": {
    "updatedTime": 1627565711000,
    "contributors": [
      {
        "name": "Rob de Kort",
        "email": "rob@studio1902.nl",
        "commits": 13
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
