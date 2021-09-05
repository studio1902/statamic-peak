export const siteData = {
  "base": "/",
  "lang": "en-US",
  "title": "Statamic Peak Docs",
  "description": "Statamic Peak is an opinionated starter kit for all your bespoke Statamic sites.",
  "head": [
    [
      "link",
      {
        "rel": "icon",
        "href": "/favicon.svg"
      }
    ],
    [
      "link",
      {
        "rel": "mask-icon",
        "href": "/favicon.svg",
        "color": "#FF0274"
      }
    ],
    [
      "script",
      {
        "src": "https://cdn.usefathom.com/script.js",
        "data-site": "CCKEJUTO",
        "defer": true
      }
    ],
    [
      "meta",
      {
        "property": "og:title",
        "content": "Statamic Peak Docs"
      }
    ],
    [
      "meta",
      {
        "property": "og:description",
        "content": "Statamic Peak is an opinionated starter kit for all your bespoke Statamic sites."
      }
    ],
    [
      "meta",
      {
        "property": "og:image",
        "content": "https://peak.studio1902.nl/visuals/statamic-peak-og.png"
      }
    ],
    [
      "meta",
      {
        "name": "twitter:card",
        "content": "summary_large_image"
      }
    ],
    [
      "meta",
      {
        "name": "twitter:site",
        "content": "studio1902"
      }
    ],
    [
      "meta",
      {
        "name": "twitter:title",
        "content": "Statamic Peak Docs"
      }
    ],
    [
      "meta",
      {
        "name": "twitter:description",
        "content": "Statamic Peak is an opinionated starter kit for all your bespoke Statamic sites."
      }
    ],
    [
      "meta",
      {
        "name": "twitter:image",
        "content": "https://peak.studio1902.nl/visuals/statamic-peak-twitter.png"
      }
    ]
  ],
  "locales": {}
}

if (import.meta.webpackHot) {
  import.meta.webpackHot.accept()
  if (__VUE_HMR_RUNTIME__.updateSiteData) {
    __VUE_HMR_RUNTIME__.updateSiteData(siteData)
  }
}

if (import.meta.hot) {
  import.meta.hot.accept(({ siteData }) => {
    __VUE_HMR_RUNTIME__.updateSiteData(siteData)
  })
}
