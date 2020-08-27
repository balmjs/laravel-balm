# Laravel Balm

> versioning / cache busting by [BalmJS](https://balm.js.org/)

## Requirements

- Laravel >= 5.3.x (requires PHP)
- BalmJS >= 3.x (requires Node.js)

```sh
npm install -g balm-core # required for balm 3.0
```

## For Back-end

### 1.1 Installation

If you have composer installed globally you can run:

```sh
composer require balmjs/laravel-balm
```

Then run these commands to publish assets and config:

```sh
php artisan vendor:publish --provider="Balm\Runtime\BalmServiceProvider" --force
```

⚠️ `--force`: overwrite `package.json` or manual edit it:

```json
{
  "scripts": {
    "dev": "balm",
    "prod": "balm -p"
  },
  "devDependencies": {
    "balm": "^3.0.0-rc.2"
  }
}
```

### 1.2 Configuration

You should use Laravel's global `balm` function within your **views** to load the appropriately hashed asset. The `balm` function will automatically determine the current name of the hashed file:

```html
<link rel="stylesheet" href="balm('css/app.css')" />

<script src="{{ balm('js/app.js') }}"></script>
```

## For Front-end

### 2.1 Installation

Run the command in your project directory:

```sh
npm install
```

Then, you can install awesome libraries for your front-end project. (e.g. `vue`)

### 2.2 Configuration

Edit `balm.config.js` in your project directory, modify to your virtual host:

```js
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
    app: './resources/js/app.js'
  },
  assets: {
    cache: true
  }
};
```

### 2.3 Usage

Run the command in your project directory:

```sh
# For development
npm run dev

# For production
npm run prod
```
