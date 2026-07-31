# VertexInvo Support Widget

[![Latest Version](https://img.shields.io/packagist/v/vertexinvo/support-widget.svg?style=flat-square)](https://packagist.org/packages/vertexinvo/support-widget)
[![Total Downloads](https://img.shields.io/packagist/dt/vertexinvo/support-widget.svg?style=flat-square)](https://packagist.org/packages/vertexinvo/support-widget)
[![License](https://img.shields.io/packagist/l/vertexinvo/support-widget.svg?style=flat-square)](https://github.com/salahshakeel/vertex-support-widget)

A Laravel package that adds a floating support widget to your application and securely authenticates logged-in users into the VertexInvo Support Portal using Single Sign-On (SSO).

The package allows your users to open support directly from your application without requiring a separate login. Authentication is securely handled through your Laravel backend.

---

## Features

- 🚀 Easy installation via Composer
- 🔐 Secure server-side SSO authentication
- 👤 Widget visible only to authenticated users
- 🎨 Customizable widget colors
- 📍 Customizable widget position
- ⚙️ Laravel package auto-discovery
- 🛡️ API key never exposed to the browser
- 🔄 Supports Laravel 10, 11, 12, and 13

---

## Requirements

| Requirement | Version |
|------------|---------|
| PHP | 8.1+ |
| Laravel | 10.x, 11.x, 12.x, 13.x |

### Compatibility

| Laravel | PHP |
|---------|-----|
| Laravel 10 | PHP 8.1+ |
| Laravel 11 | PHP 8.2+ |
| Laravel 12 | PHP 8.2+ |
| Laravel 13 | PHP 8.3+ |

---

# Installation

Install the package using Composer:

```bash
composer require vertexinvo/support-widget
```

Laravel will automatically discover and register the package service provider.

---

# Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag=vertex-support-config
```

This will create:

```
config/vertex-support.php
```

---

# Assets

Publish the widget assets:

```bash
php artisan vendor:publish --tag=vertex-support-assets
```

---

# Environment Setup

Add your VertexInvo Support API key to your `.env` file:

```env
VERTEX_SUPPORT_API_KEY=your_api_key
```

---

# Configuration Example

`config/vertex-support.php`

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
    | API Key
    |--------------------------------------------------------------------------
    */

    'api_key' => env('VERTEX_SUPPORT_API_KEY'),


    /*
    |--------------------------------------------------------------------------
    | SSO Endpoint
    |--------------------------------------------------------------------------
    */

    'endpoint' => 'https://support.vertexinvo.com/api/v1/sso',


    /*
    |--------------------------------------------------------------------------
    | Widget Position
    |--------------------------------------------------------------------------
    |
    | Available:
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

Add the widget component before the closing `</body>` tag in your main Blade layout:

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

The widget automatically checks authentication and only displays for logged-in users.

---

# Widget Visibility

| User | Widget |
|------|--------|
| Guest | ❌ Hidden |
| Authenticated User | ✅ Visible |

---

# SSO Authentication Flow

When a user clicks the support widget:

1. Laravel receives the request.
2. Laravel sends a secure server-side request to VertexInvo.
3. VertexInvo validates the API key.
4. A temporary secure redirect URL is generated.
5. The user is redirected to the Support Portal.

Your API key is never exposed to the frontend.

---

# API Request

The package communicates with:

```
POST https://support.vertexinvo.com/api/v1/sso
```

Request:

```json
{
    "api_key": "YOUR_API_KEY",
    "email": "user@example.com",
    "name": "John Doe"
}
```

---

# API Response

Success:

```json
{
    "redirect_url": "https://support.vertexinvo.com/...",
    "expires_in": 600
}
```

Error:

```json
{
    "error": "Invalid or inactive product API key."
}
```

---

# Security

This package is designed with security in mind:

- API keys remain server-side.
- No sensitive credentials are sent to the browser.
- All SSO requests are performed by Laravel.
- Users receive only a temporary redirect URL.
- Access is limited to authenticated users.

---

# Updating

Update the package:

```bash
composer update vertexinvo/support-widget
```

Clear Laravel cache after updating:

```bash
php artisan optimize:clear
```

---

# Troubleshooting

If the widget does not appear:

1. Confirm the user is authenticated.
2. Confirm the Blade include exists.
3. Publish the package assets.
4. Check your `.env` API key.
5. Clear Laravel cache.

---

# Support

For issues, feature requests, or questions:

GitHub Repository:

https://github.com/salahshakeel/vertex-support-widget

---

# License

The VertexInvo Support Widget package is open-source software licensed under the MIT License.