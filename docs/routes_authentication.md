# Authentication routes


## Registration
**Route** - `[POST] /api/v1/auth/signup`

#### Input
```json
{
    "nickname": "example",
    "email": "example@example.com",
    "password": "password",
    "password_confirmation": "password",
    "ip_address": "127.0.0.1",
    "seo_source": "seo",
    "device_name": "Windows 11"
}
```
`seo_source`, `device_name` - optional

#### Output
```json
{
    "status": "success",
    "message": "User registered successfully.",
    "data": {
        "user": {
            "id": "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx",
            "nickname": "example",
            "email": "example@example.com",
            "avatar": null
        },
        "token": "token"
    }
}
```


## Authorization
**Route** - `[POST] /api/v1/auth/signin`

#### Input
```json
{
    "email": "example@example.com",
    "password": "password",
    "device_name": "Windows 11"
}
```
`device_name` - optional

#### Output
```json
{
    "status": "success",
    "message": "User registered successfully.",
    "data": {
        "user": {
            "id": "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx",
            "nickname": "example",
            "email": "example@example.com",
            "avatar": null
        },
        "token": "token"
    }
}
```


## Logout
**Route** - `[POST] /api/v1/auth/signout`

#### Output
```json
{
    "status": "success",
    "message": "User logged out successfully."
}
```
