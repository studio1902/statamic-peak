export const data = {
  "key": "v-766fed03",
  "path": "/features/page-builder.html",
  "title": "Page builder",
  "lang": "en-US",
  "frontmatter": {},
  "excerpt": "",
  "headers": [
    {
      "level": 2,
      "title": "Adding blocks",
      "slug": "adding-blocks",
      "children": []
    }
  ],
  "filePathRelative": "features/page-builder.md",
  "git": {
    "updatedTime": 1627565711000,
    "contributors": [
      {
        "name": "Rob de Kort",
        "email": "rob@studio1902.nl",
        "commits": 6
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
