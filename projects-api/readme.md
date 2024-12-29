# Product API Documentation

## Overview
This documentation outlines the endpoints for creating a new product and fetching the details of an existing product. These endpoints are part of the **Product API** designed to manage product information efficiently.

---

## Endpoints

### 1. Create Product
**Endpoint:** `POST /api/products`

#### Description
This endpoint is used to create a new product in the system.

#### Request
- **URL:** `/api/products`
- **Method:** `POST`
- **Headers:**
  - `Content-Type: application/json`
  - `Authorization: Bearer <access_token>`

#### Request Body
```json
{
  "name": "string",
  "price": "number",
  "rating": "number",
  "photo": "string"
}
```

| Field          | Type     | Required | Description                         |
|----------------|----------|----------|-------------------------------------|
| `name`         | `string` | Yes      | Name of the product.               |
| `price`        | `number` | Yes      | Price of the product.              |
| `rating`       | `number` | No       | Rating of the product (0-5).       |
| `photo`        | `string` | No       | URL of the product's photo.        |

#### Response
- **Status Codes:**
  - `201 Created`: Product successfully created.
  - `400 Bad Request`: Invalid input data.
  - `401 Unauthorized`: Authentication failure.

#### Example Response
```json
{
  "id": 101,
  "name": "Sample Product",
  "price": 19.99,
  "rating": 4.5,
  "photo": "https://example.com/photo.jpg",
  "created_at": "2024-12-29T12:00:00Z"
}
```

---

### 2. Show Product
**Endpoint:** `GET /api/products/{id}`

#### Description
This endpoint retrieves the details of an existing product by its ID.

#### Request
- **URL:** `/api/products/{id}`
- **Method:** `GET`
- **Headers:**
  - `Authorization: Bearer <access_token>`

| Parameter | Type     | Required | Description                      |
|-----------|----------|----------|----------------------------------|
| `id`      | `integer`| Yes      | The ID of the product to retrieve.|

#### Response
- **Status Codes:**
  - `200 OK`: Product found.
  - `404 Not Found`: Product with the specified ID does not exist.
  - `401 Unauthorized`: Authentication failure.

#### Example Response
```json
{
  "id": 101,
  "name": "Sample Product",
  "price": 19.99,
  "rating": 4.5,
  "photo": "https://example.com/photo.jpg",
  "created_at": "2024-12-29T12:00:00Z",
  "updated_at": "2024-12-29T12:00:00Z"
}
```

---

## Error Handling

| Status Code | Message                    | Description                               |
|-------------|----------------------------|-------------------------------------------|
| `400`       | `Bad Request`             | Invalid input data provided.              |
| `401`       | `Unauthorized`            | Access token is missing or invalid.       |
| `404`       | `Not Found`               | Product not found with the specified ID.  |

---

## Authentication
All endpoints require a valid Bearer token to be included in the `Authorization` header.

---

## Notes
- Ensure the `price` field is a positive number.
- Rating should be a number between 0 and 5.
- Stock information has been removed as it's no longer part of the product attributes.

---
