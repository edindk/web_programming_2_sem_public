const RemoveConsolePlugin = require('remove-console-webpack-plugin')

module.exports = {
  pwa: {
    manifestOptions: {
      name: "Cooking app",
      short_name: "Cooking app",
      theme_color: "#4DBA87",
      icons: [
        {
          "src": "./img/icons/android-chrome-192x192.png",
          "sizes": "192x192",
          "type": "image/png"
        },
        {
          "src": "./img/icons/android-chrome-512x512.png",
          "sizes": "512x512",
          "type": "image/png"
        },
        {
          "src": "./img/icons/android-chrome-maskable-192x192.png",
          "sizes": "192x192",
          "type": "image/png",
          "purpose": "maskable"
        },
        {
          "src": "./img/icons/android-chrome-maskable-512x512.png",
          "sizes": "512x512",
          "type": "image/png",
          "purpose": "maskable"
        }
      ],
      start_url: ".",
      display: "standalone",
      background_color: "#000000"
    },
    workboxOptions: {
      runtimeCaching: [{
        urlPattern: new RegExp('^https://api-ca-production.herokuapp.com/recipe'),
        handler: 'NetworkFirst',
        method: 'GET',
        options: {
          cacheName: 'cooking_app'
        }
      },
      ]
    }
  },
  transpileDependencies: [
    'vuetify'
  ],
  configureWebpack: {
    plugins: [new RemoveConsolePlugin({ include: ['*'] })]
  },
}
