module.exports = {
  inFrontend: false,
  server: {
    proxy: 'your.project.local', // Target host
    extraWatchFiles: ['resources/views/**/*.php']
  },
  roots: {
    source: 'resources',
    target: 'public'
  },
  paths: {
    source: {
      css: 'sass',
      js: 'js'
    }
  },
  styles: {
    extname: 'scss'
  },
  scripts: {
    entry: './resources/js/app.js'
  },
  assets: {
    cache: true
  }
};
