## UIKit3 Laravel Frontend UI
The purpose of this package is to install the UIKit3 framework in to the laravel/ui package.

## Motivation
I found that I like the UIKit framework a lot. I know there are others out there that use it and I wanted to give a way for user to add it to their Laravel projects..

## Screenshots
![image](https://i.imgur.com/xVS4U3F.png)

## Tech/framework used

<b>Built with</b>
- [UIKit](http://getuikit.com)
- [Laravel](http://laravel.com)

## Features
In Laravel 7, the scaffolding was moved to the laravel/ui package and the options for installing whatever framework I want is limited. Just wanted to make the process a little easier for myself and others who use UIKit.

## Installation
To install this package - you call it just like you would when installing any of the other presets.

<pre>php artisan ui uikit3</pre>

This will install all the necessary pieces of the frontend scaffolding.

## How to use?
Since Laravel comes with Composer, we will be using it also. Please make sure it is installed in your development environment.

**Step 1** - <pre>composer require cartographr/uikit3-laravel-frontend-ui</pre>

**Step 2** - Once the package installs, make sure that it appears in your composer.json file in your Laravel project. If it doesn't, please submit an issue ticket.

**Step 3** - Once you verify it's in your composer.json file, it will install just like the other laravel ui packages. <pre>php artisan ui uikit3</pre>

**AUTH** - If you want auth routes, you can run <pre>php artisan ui uikit3 --auth</pre> to generate normal Laravel authentication methods. You have to install the framework piece first using <pre>php artisan ui uikit3</pre> before the auth routes will be generated.

**Step 4** - Once installed, you will be prompted on the CLI to run <pre>npm install && npm run dev</pre>
Once you do that, everything should be ready to go and UIKit should be installed in to your project.

Hope you enjoy it!

## Credits
Giving praise to the guys at [Laravel Frontend Presets](https://github.com/laravel-frontend-presets) for making the things they do.

Also, the [Laravel](http://laravel.com) team for just having it all together. Framework is awesome.

## License
This software is published with the MIT license.

MIT © [Cartographr]()
