export const data = {
  "key": "v-6c22e93e",
  "path": "/other/deployment-script.html",
  "title": "Deployment script",
  "lang": "en-US",
  "frontmatter": {},
  "excerpt": "",
  "headers": [],
  "filePathRelative": "other/deployment-script.md",
  "git": {
    "updatedTime": 1627471114000,
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
