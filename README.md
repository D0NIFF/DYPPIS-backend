# DYPPIS

## Routes

### Users
`[GET] /api/v1/users/{id}` - Get user by ID <br>

### Media files and images
`[GET] /api/v1/media-storage/{id}` - Get image by ID <br>
`[POST] /api/v1/media-storage"` - Create image. Requirements:  
- `file: file`
- `category_id: string`

`[DELETE] /api/v1/media-storage/{id}` - Delete image by ID <br>

### Platform types
`[GET] /api/v1/platform-types` - Get all platform types. Query params:
- `field: string` _(optional)_. Can be a type slug or **"all"**

`[GET] /api/v1/platform-types/{id}` - Get the platform type by ID <br>

### Platforms
`[GET] /api/v1/platform-types/{id}/platforms` - Get all platforms by the platform type ID. Query params:
- `perPage: int` _(optional)_
- `page: int` _(optional)_

`[GET] /api/v1/platforms/{id}` - Get platform by ID.

### Categories
`[GET] /api/v1/platforms/{id}/categories` - Get all categories of the platform by ID.

`[GET] /api/v1/categories` - Get all categories. Query params:
- `perPage: int` _(optional)_
- `page: int` _(optional)_


`[GET] /api/v1/platforms/{id}` - Get platform by ID.

### Continue
