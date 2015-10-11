#!/bin/sh
 

curl -X POST \
  -H "X-Project-Id: 9845fa01a1" \
  -H "X-Project-Key: 75f90c1a7e497216100914f693df5e314d628c90" \
  -H "Content-Type: application/json" \
  -d '{ "customer": { "firstName1": "Tom", "lastName": "Smith" }, "product": "12 red roses", "purchasePrice": 34.95 }' \
  -w %{http_code} \
  https://api.shushuo.com/events/comsume/
