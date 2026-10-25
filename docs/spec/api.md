# Спецификация REST API (docs/spec/api.md)

**Базовый URL:** `http://localhost:8080/api`  
**Формат данных:** `application/json`  
**Аутентификация:** Заголовок `Authorization: Bearer <jwt_token>` (для защищенных роутов)

---

## 1. Стандартные форматы ответов

### Успешный ответ (200 OK, 201 Created)
```json
{
  "success": true,
  "data": {  }
}
```

### Ответ с ошибкой (400, 401, 403, 404, 422)
```json
{
  "success": false,
  "error": {
    "code": "VALIDATION_FAILED",
    "message": "Некорректные входные данные",
    "details": [
      "Поле email обязательно для заполнения"
    ]
  }
}
```