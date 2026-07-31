# Vertex Support Widget for Laravel

A Laravel package that adds a floating support button to your application.  
Authenticated users can open the Vertex Support portal through secure SSO authentication.

The package automatically communicates with:

```
POST https://support.vertexinvo.com/api/v1/sso
```

and generates a secure support session.

---

# Features

✅ Floating support button  
✅ Laravel package auto-discovery  
✅ Works with Laravel authentication  
✅ Hidden for guest users  
✅ Secure server-side SSO request  
✅ Custom button colors  
✅ Custom icon colors  
✅ Configurable API endpoint  
✅ Easy installation with Composer  

---

# Requirements

- PHP >= 8.1
- Laravel 10+
- Laravel Authentication enabled

---

# Installation

Install using Composer:

```bash
composer require vertexinvo/support-widget
```

---

# Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag=vertex-support-config
```

This creates:

```
config/vertex-support.php
```

---

# Environment Setup

Add your Vertex Support API key:

```env
VERTEX_SUPPORT_API_KEY=your_product_api_key
```

---

# Publish Assets

Publish CSS and JavaScript files:

```bash
php artisan vendor:publish --tag=vertex-support-assets
```

Files will be copied to:

```
public/vendor/vertex-support/
```

---

# Add Widget

Add the widget to your main Blade layout.

Example:

`resources/views/layouts/app.blade.php`

```blade
<html>

<head>

<meta name="csrf-token"
content="{{ csrf_token() }}">

</head>


<body>

@yield('content')


@include('vertex-support::widget')


</body>

</html>
```

---

# Authentication Behavior

The widget only appears when the user is authenticated.

Example:

Logged in user:

```
User
 |
 | 
 Laravel Application
 |
 |
 Support Widget
 |
 |
 Vertex Support Portal
```

Guest user:

```
No widget displayed
```

---

# Configuration Options

File:

```
config/vertex-support.php
```

Example:

```php
return [

    'api_key' =>
        env('VERTEX_SUPPORT_API_KEY'),


    'endpoint' =>
        'https://support.vertexinvo.com/api/v1/sso',


    'position' =>
        'bottom-right',


    'button_color' =>
        '#000000',


    'icon_color' =>
        '#ffffff',


    'enabled' =>
        true,

];
```

---

# Button Position

Available positions:

```
bottom-right
bottom-left
top-right
top-left
```

---

# SSO Flow

When a user clicks the support button:

```
User clicks widget
        |
        |
        v
Laravel Package Route

POST /vertex-support/sso

        |
        |
        v

Vertex Support API

POST /api/v1/sso

        |
        |
        v

Response

{
    "redirect_url": "...",
    "expires_in":600
}

        |
        |
        v

Open Support Portal
```

---

# API Request

The package sends:

```json
{
    "api_key": "PRODUCT_API_KEY",
    "email": "user@example.com",
    "name": "John Doe"
}
```

---

# Success Response

Example:

```json
{
    "redirect_url": "https://support.vertexinvo.com/session/xxxx",
    "expires_in": 600
}
```

The user is redirected to the support portal.

---

# Error Response

Example:

```json
{
    "error": "Invalid or inactive product API key."
}
```

The widget displays an error message.

---

# Security

The API key is never exposed to the browser.

The request flow is:

```
Browser
   |
   |
Laravel Backend
   |
   |
Vertex Support API
```

The frontend only receives the generated redirect URL.

---

# Updating Package

After modifying package code:

```bash
composer dump-autoload
```

---

# Local Development

Add the package repository:

```json
"repositories": [
    {
        "type": "path",
        "url": "../support-widget"
    }
]
```

Install:

```bash
composer require vertex/support-widget:@dev
```

---

# Publishing

## GitHub

Push the package:

```bash
git init

git add .

git commit -m "Initial release"

git branch -M main

git remote add origin git@github.com:Vertex/support-widget.git

git push -u origin main
```

---

# License

MIT License

Copyright © Vertex