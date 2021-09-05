export const data = {
  "key": "v-4e8563af",
  "path": "/getting-started/installation.html",
  "title": "Installation",
  "lang": "en-US",
  "frontmatter": {},
  "excerpt": "",
  "headers": [
    {
      "level": 2,
      "title": "Installation via the CLI",
      "slug": "installation-via-the-cli",
      "children": []
    },
    {
      "level": 2,
      "title": "Install into an existing Statamic v3.2+ project",
      "slug": "install-into-an-existing-statamic-v3-2-project",
      "children": []
    },
    {
      "level": 2,
      "title": "Compile the frontend assets",
      "slug": "compile-the-frontend-assets",
      "children": []
    }
  ],
  "filePathRelative": "getting-started/installation.md",
  "git": {
    "updatedTime": 1629895665000,
    "contributors": [
      {
        "name": "Rob de Kort",
        "email": "rob@studio1902.nl",
        "commits": 10
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
