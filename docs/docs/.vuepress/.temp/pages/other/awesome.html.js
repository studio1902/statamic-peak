export const data = {
  "key": "v-37bcd9ae",
  "path": "/other/awesome.html",
  "title": "Awesome",
  "lang": "en-US",
  "frontmatter": {},
  "excerpt": "",
  "headers": [
    {
      "level": 2,
      "title": "Articles on Peak",
      "slug": "articles-on-peak",
      "children": []
    },
    {
      "level": 2,
      "title": "Made with Peak",
      "slug": "made-with-peak",
      "children": []
    },
    {
      "level": 2,
      "title": "Peak Branding",
      "slug": "peak-branding",
      "children": []
    }
  ],
  "filePathRelative": "other/awesome.md",
  "git": {
    "updatedTime": 1627760024000,
    "contributors": [
      {
        "name": "Rob de Kort",
        "email": "rob@studio1902.nl",
        "commits": 3
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
