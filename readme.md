<h3> ENDPOINTS </h3>

<b>/players/login</b>
Payloads: email, password <br/>
Success Response: <br/>
{
    "data": {
        "type": "success",
        "player": {
            "id": 1,
            "firstname": "ayodele",
            "lastname": "oniosun",
            "email": "ayodele@gmail.com",
            "last_logged_in": "just now",
            "created_at": "July 11th, 2020, 01:15: PM",
            "updated_at": "July 11th, 2020, 04:38: PM",
            "deleted_at": "July 11th, 2020, 04:38: PM"
        },
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvcGxheWVyc1wvbG9naW4iLCJpYXQiOjE1OTQ0ODU0OTYsImV4cCI6MTU5NDQ4OTA5NiwibmJmIjoxNTk0NDg1NDk2LCJqdGkiOiJpQ085Q3BITld1NjVseXFwIiwic3ViIjoxLCJwcnYiOiIzN2I3YzUwYjI1MDQxYTRjMjBmZTQ3YzI0MmUxYmZkMGY2MzA5MmM1In0.m1cgDx3EBInv4y2-tfTpk3F4N-TNOufoex7daxH8osE"
    }
}

Error Response:
{
    "data": {
        "type": "error",
        "message": "Incorrect login details"
    }
}

