#!/bin/sh

curl -X POST \
  -H "X-Project-Id: 9845fa01a1" \
  -H "X-Project-Key: 75f90c1a7e497216100914f693df5e314d628c90" \
  -H "Content-Type: application/json" \
  -d '{
    "purchases": [
        {
            "customer": {
                "firstName": "Tom",
                "lastName": "Smith"
            },
            "id": "1849506679",
            "product": "12 red roses",
            "purchasePrice": 34.95
        },
        {
            "customer": {
                "firstName": "Jane",
                "lastName": "Doe"
            },
            "id": "123456",
            "product": "1 daisy",
            "purchasePrice": 8.95
        }
    ],
    "refunds": [
        {
            "customer": {
                "firstName": "Tom",
                "lastName": "Smith"
            },
            "id": "REF-1234",
            "product": "12 red roses",
            "purchasePrice": -34.95
        }
    ]
}' \
  https://api.shushuo.com/events/
