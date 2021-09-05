export const data = {
  "key": "v-13d510dd",
  "path": "/features/assets.html",
  "title": "Assets",
  "lang": "en-US",
  "frontmatter": {},
  "excerpt": "",
  "headers": [
    {
      "level": 2,
      "title": "Images",
      "slug": "images",
      "children": []
    },
    {
      "level": 2,
      "title": "Background images",
      "slug": "background-images",
      "children": []
    }
  ],
  "filePathRelative": "features/assets.md",
  "git": {
    "updatedTime": 1628609827000,
    "contributors": [
      {
        "name": "Rob de Kort",
        "email": "rob@studio1902.nl",
        "commits": 4
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
