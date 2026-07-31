````markdown
# VertexInvo Support Widget

A Laravel package that adds a floating support widget to your application and securely authenticates logged-in users into the VertexInvo Support Portal using Single Sign-On (SSO).

The widget allows your users to access support instantly without creating a separate support account. Authentication is handled securely through your Laravel backend, keeping your API credentials private.

---

## Features

- 🚀 Easy installation via Composer
- 🔐 Secure server-side SSO authentication
- 👤 Widget visible only to authenticated users
- 🎨 Configurable button and icon colors
- 📍 Configurable widget position
- ⚙️ Laravel package auto-discovery support
- 🛡️ API key never exposed to the browser
- 🔄 Supports Laravel 10, 11, 12, and 13

---

## Requirements

| Requirement | Version |
|------------|---------|
| PHP | 8.1+ |
| Laravel | 10.x, 11.x, 12.x, 13.x |

### Laravel Compatibility

| Laravel Version | PHP Version |
|----------------|-------------|
| Laravel 10.x | PHP 8.1+ |
| Laravel 11.x | PHP 8.2+ |
| Laravel 12.x | PHP 8.2+ |
| Laravel 13.x | PHP 8.3+ |

---

# Installation

Install the package using Composer:

```bash
composer require vertexinvo/support-widget
````

Laravel package auto-discovery will automatically register the service provider.

---

# Publish Configuration

Publish the package configuration:

```bash
php artisan vendor:publish --tag=vertex-support-config
```

This will create:

```
config/vertex-support.php
```

---

# Publish Assets

Publish the widget assets:

```bash
php artisan vendor:publish --tag=vertex-support-assets
```

---

# Environment Configuration

Add your VertexInvo Support API key to your `.env` file:

```env
VERTEX_SUPPORT_API_KEY=your_api_key
```

---

# Configuration

The configuration file is located at:

```
config/vertex-support.php
```

Example:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Enable Widget
    |--------------------------------------------------------------------------
    */

    'enabled' => true,


    /*
    |--------------------------------------------------------------------------
    | VertexInvo API Key
    |--------------------------------------------------------------------------
    */

    'api_key' => env('VERTEX_SUPPORT_API_KEY'),


    /*
    |--------------------------------------------------------------------------
    | SSO API Endpoint
    |--------------------------------------------------------------------------
    */

    'endpoint' => 'https://support.vertexinvo.com/api/v1/sso',


    /*
    |--------------------------------------------------------------------------
    | Widget Position
    |--------------------------------------------------------------------------
    |
    | Available positions:
    | bottom-right
    | bottom-left
    |
    */

    'position' => 'bottom-right',


    /*
    |--------------------------------------------------------------------------
    | Widget Colors
    |--------------------------------------------------------------------------
    */

    'button_color' => '#000000',

    'icon_color' => '#ffffff',

];
```

---

# Add Widget To Your Layout

After publishing the package assets, add the widget component to your main Blade layout.

Add this before the closing `</body>` tag:

```blade
@include('vertex-support::widget')
```

Example:

```blade
<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    {{ $slot ?? '' }}

    @include('vertex-support::widget')

</body>

</html>
```

The widget will automatically check authentication status and only display for logged-in users.

---

# Widget Visibility

The support widget is only available for authenticated users.

| User               | Widget    |
| ------------------ | --------- |
| Guest User         | ❌ Hidden  |
| Authenticated User | ✅ Visible |

---

# Single Sign-On (SSO) Flow

When a user clicks the support widget:

1. The package sends a secure server-side request from Laravel.
2. VertexInvo validates the product API key.
3. A temporary redirect URL is generated.
4. The user is redirected to the VertexInvo Support Portal.

The API key is never sent to the browser.

---

# SSO Request

Endpoint:

```
POST https://support.vertexinvo.com/api/v1/sso
```

Request payload:

```json
{
    "api_key": "YOUR_API_KEY",
    "email": "user@example.com",
    "name": "John Doe"
}
```

---

# Successful Response

```json
{
    "redirect_url": "https://support.vertexinvo.com/...",
    "expires_in": 600
}
```

---

# Error Response

```json
{
    "error": "Invalid or inactive product API key."
}
```

---

# Security

The package follows secure authentication practices:

* API keys are stored only on the server.
* API keys are never exposed to JavaScript.
* SSO requests are processed through Laravel.
* Only temporary redirect URLs are returned to users.
* Only authenticated users can access the support widget.

---

# Updating

Update the package using Composer:

```bash
composer update vertexinvo/support-widget
```

---

# Troubleshooting

Clear Laravel caches after configuration changes:

```bash
php artisan optimize:clear
```

If the widget does not appear, verify:

1. The user is logged in.
2. The widget include exists in your Blade layout.
3. Assets have been published.
4. The API key exists in your `.env` file.
5. Laravel cache has been cleared.

---

# Support

If you experience any issues or want to request a feature, please open an issue on GitHub:

Repository:

[https://github.com/salahshakeel/vertex-support-widget](https://github.com/salahshakeel/vertex-support-widget)

---

# License

This package is open-source software licensed under the MIT License.

```
```
