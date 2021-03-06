[![Latest Stable Version](https://poser.pugx.org/fish/one-validator/v/stable.svg)](https://packagist.org/packages/fish/one-validator) [![Total Downloads](https://poser.pugx.org/fish/one-validator/downloads.svg)](https://packagist.org/packages/fish/one-validator) [![Latest Unstable Version](https://poser.pugx.org/fish/one-validator/v/unstable.svg)](https://packagist.org/packages/fish/one-validator) [![License](https://poser.pugx.org/fish/one-validator/license.svg)](https://packagist.org/packages/fish/one-validator)

# Server->Client Validation Converter

While client-side validation is a standard nowadays, setting it is tedious and anti-DRYful.
This Laravel 4+ package will convert your server-side rules to the popular [JQuery validate](http://jqueryvalidation.org/) plugin format, while adding all of the necessary assets to support the Laravel set of rules (including remote rules) and messages (including custom attributes and localization).
File and date rules are not supported and will be ignored.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `fish/one-validator`.

	"require-dev": {
		"fish/one-validator": "dev-master"
	}

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    Fish\OneValidator\OneValidatorServiceProvider

Next, publish the assets to your project:

    php artisan validator:init

The file that handles the validation methods and messages will be placed under `public/one-validator.min.js`.
Be sure to include the script in your page.

That's it! You're all set to go.

## Usage

The syntax is:

    php artisan validator:convert path/to/file [--target=validation.js]

The first argument is the path to a PHP file with a valid `$rules` array, relative to the `app` folder.

By default the output will be echoed to the console.
You can send the output to a file instead by using the `target` option, providing a path relative to the `app` folder.

Remember to replace the default `.my-form` selector with your own form selector.