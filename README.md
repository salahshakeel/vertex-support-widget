# VertexInvo Support Widget

A Laravel package that adds a floating support widget to your application and securely authenticates logged-in users into the VertexInvo Support Portal using Single Sign-On (SSO).

## Features

* 🚀 Easy installation via Composer
* 🔐 Secure server-side SSO authentication
* 👤 Widget is only visible to authenticated users
* 🎨 Configurable button and icon colors
* 📍 Configurable widget position
* ⚙️ Laravel package auto-discovery
* 🛡️ API key is never exposed to the browser

---

## Requirements

* PHP 8.1+
* Laravel 10.x, 11.x or 12.x

---

## Installation

Install the package using Composer:

```bash
composer require vertexinvo/support-widget
```

---

## Publish Configuration

Publish the package configuration:

```bash
php artisan vendor:publish --tag=vertex-support-config
```

This creates:

```
config/vertex-support.php
```

---

## Publish Assets

Publish the package assets:

```bash
php artisan vendor:publish --tag=vertex-support-assets
```

---

## Environment Configuration

Add your API key to your `.env` file:

```env
VERTEX_SUPPORT_API_KEY=your_api_key
```

---

## Configuration

Example configuration:

```php
return [

    'enabled' => true,

    'api_key' => env('VERTEX_SUPPORT_API_KEY'),

    'endpoint' => 'https://support.vertexinvo.com/api/v1/sso',

    'position' => 'bottom-right',

    'button_color' => '#000000',

    'icon_color' => '#ffffff',

];
```

---

## Widget Visibility

The support widget is displayed **only** for authenticated users.

| User          | Widget    |
| ------------- | --------- |
| Guest         | ❌ Hidden  |
| Authenticated | ✅ Visible |

---

## SSO Flow

When the user clicks the widget:

1. The package sends a **server-side** request to the VertexInvo SSO endpoint.
2. The API validates the product API key.
3. A secure redirect URL is returned.
4. The user is redirected to the VertexInvo Support Portal.

Request:

```
POST https://support.vertexinvo.com/api/v1/sso
```

Payload:

```json
{
    "api_key": "YOUR_API_KEY",
    "email": "user@example.com",
    "name": "John Doe"
}
```

Success Response:

```json
{
    "redirect_url": "https://support.vertexinvo.com/...",
    "expires_in": 600
}
```

Error Response:

```json
{
    "error": "Invalid or inactive product API key."
}
```

---

## Security

* The API key is never sent to the browser.
* All SSO requests are made from your Laravel backend.
* Only the generated redirect URL is returned to the frontend.

---

## Updating

To update the package:

```bash
composer update vertexinvo/support-widget
```

---

## Support

If you experience any issues or would like to request a feature, please open an issue on the GitHub repository.

Repository:

https://github.com/salahshakeel/vertex-support-widget

---

## License

This package is released under the MIT License.
