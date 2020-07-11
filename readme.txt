<html>
    <title> Documentation of APIS </title>
    <body>
        <h2> ENDPOINTS </h2>

        <h4>Welcome</h4> <br/> 
        Endpoint: /welcome <br/>
        Request Type: GET <br/>
        
        Sample Success Response: <br/>
        {
            "data": "Welcome to game catalog"
        } <hr/>

        <h4>Players Login</h4> <br/> 
        Endpoint: /players/login <br/>
        Request Type: POST <br/>
        Payloads: email, password <br/> <br/>

        Sample Success Response: <br/>
        {
            "data": {
                "type": "success",
                "player": {
                    "id": 1,
                    "firstname": "ayodele",
                    "lastname": "oniosun",
                    "email": "ayodele@gmail.com",
                    "created_at": "July 11th, 2020, 01:15: PM",
                    "updated_at": "July 11th, 2020, 04:38: PM",
                    "deleted_at": "July 11th, 2020, 04:38: PM"
                },
                "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvcGxheWVyc1wvbG9naW4iLCJpYXQiOjE1OTQ0ODU0OTYsImV4cCI6MTU5NDQ4OTA5NiwibmJmIjoxNTk0NDg1NDk2LCJqdGkiOiJpQ085Q3BITld1NjVseXFwIiwic3ViIjoxLCJwcnYiOiIzN2I3YzUwYjI1MDQxYTRjMjBmZTQ3YzI0MmUxYmZkMGY2MzA5MmM1In0.m1cgDx3EBInv4y2-tfTpk3F4N-TNOufoex7daxH8osE"
            }
        } <br/>

        Sample Error Response:
        {
            "data": {
                "type": "error",
                "message": "Incorrect login details"
            }
        }
        <hr/>

        <h4>Players registration</h4> <br/>
        Endpoint: /players/register <br/> 
        Request Type: POST <br/>
        Payloads: nickname, firstname, lastname, email, password, password_confirmation  <br/> <br/>

        Sample Success Response: <br/>
        {
            "type": "success",
            "player": {
                "nickname": "ayo",
                "firstname": "abraham",
                "lastname": "oniosun",
                "email": "ayodeleabraham@gmail.com",
                "updated_at": "2020-07-11 16:45:32",
                "created_at": "2020-07-11 16:45:32",
                "id": 2
            }
        } <br/>

        Sample Error Response:
        {
            "type": "error",
            "message": "Email address exists. Try again."
        }

        <hr/>

        <h4>List of all players </h4> <br/>
        Endpoint: /players <br/> 
        Request Type: GET <br/>

        Sample Success Response: <br/>
        {
            "data": [
                {
                    "id": 2,
                    "firstname": "abraham",
                    "lastname": "oniosun",
                    "email": "ayodeleabraham@gmail.com",
                    "last_logged_in": null,
                    "created_at": "July 11th, 2020, 04:45: PM",
                    "updated_at": "July 11th, 2020, 04:45: PM",
                    "deleted_at": "July 11th, 2020, 04:51: PM"
                },
                {
                    "id": 1,
                    "firstname": "ayodele",
                    "lastname": "oniosun",
                    "email": "ayodele@gmail.com",
                    "last_logged_in": "12 minutes ago",
                    "created_at": "July 11th, 2020, 01:15: PM",
                    "updated_at": "July 11th, 2020, 04:38: PM",
                    "deleted_at": "July 11th, 2020, 04:51: PM"
                }
            ]
        }
        <hr/>

        <h4>List of all games created by a particular player </h4> <br/>
        Endpoint: /players/games/{playerId} <br/> 
        Request Type: GET <br/>

        Sample Success Response: <br/>
        [
            {
                "id": 6,
                "player_id": 1,
                "name": "PES",
                "version": "2.0",
                "created_at": "2020-07-11 15:37:49",
                "updated_at": "2020-07-11 15:37:49",
                "deleted_at": null
            },
            {
                "id": 5,
                "player_id": 1,
                "name": "FIFA",
                "version": "2.0",
                "created_at": "2020-07-11 15:37:41",
                "updated_at": "2020-07-11 15:37:41",
                "deleted_at": null
            },
            {
                "id": 4,
                "player_id": 1,
                "name": "FIFA",
                "version": "1.0",
                "created_at": "2020-07-11 15:37:37",
                "updated_at": "2020-07-11 15:37:37",
                "deleted_at": null
            },
            {
                "id": 3,
                "player_id": 1,
                "name": "PES",
                "version": "1.0",
                "created_at": "2020-07-11 15:22:49",
                "updated_at": "2020-07-11 15:22:49",
                "deleted_at": null
            }
        ]
        <hr/>

        <h4>List of all games played by a particular player </h4> <br/>
        Endpoint: /players/played-games/{playerId} <br/> 
        Request Type: GET <br/>

        Sample Success Response: <br/>
        [{
            "data": [
                {
                    "id": 15,
                    "invitation_id": null,
                    "game_id": 5,
                    "game_name": "FIFA",
                    "game_version": "2.0",
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "starter_id": 1,
                    "starter_fullname": "Ayodele Oniosun",
                    "status": "in-progress",
                    "played_on": null,
                    "type": "single",
                    "created_at": "July 13th, 2020, 03:38: PM",
                    "updated_at": "July 11th, 2020, 03:38: PM",
                    "deleted_at": "July 11th, 2020, 04:52: PM"
                },
                {
                    "id": 14,
                    "invitation_id": null,
                    "game_id": 4,
                    "game_name": "FIFA",
                    "game_version": "1.0",
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "starter_id": 1,
                    "starter_fullname": "Ayodele Oniosun",
                    "status": "in-progress",
                    "played_on": null,
                    "type": "single",
                    "created_at": "July 12th, 2020, 03:38: PM",
                    "updated_at": "July 11th, 2020, 03:38: PM",
                    "deleted_at": "July 11th, 2020, 04:52: PM"
                },
                {
                    "id": 13,
                    "invitation_id": null,
                    "game_id": 5,
                    "game_name": "FIFA",
                    "game_version": "2.0",
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "starter_id": 1,
                    "starter_fullname": "Ayodele Oniosun",
                    "status": "in-progress",
                    "played_on": null,
                    "type": "single",
                    "created_at": "July 11th, 2020, 03:38: PM",
                    "updated_at": "July 11th, 2020, 03:38: PM",
                    "deleted_at": "July 11th, 2020, 04:52: PM"
                },
                {
                    "id": 12,
                    "invitation_id": null,
                    "game_id": 3,
                    "game_name": "PES",
                    "game_version": "1.0",
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "starter_id": 1,
                    "starter_fullname": "Ayodele Oniosun",
                    "status": "in-progress",
                    "played_on": null,
                    "type": "single",
                    "created_at": "July 11th, 2020, 03:24: PM",
                    "updated_at": "July 11th, 2020, 03:24: PM",
                    "deleted_at": "July 11th, 2020, 04:52: PM"
                }
            ]
        }
        <hr/>

        <h4>Add new game (<i> Player must be logged in</i>) </h4> <br/>
        Endpoint: /games/add <br/> 
        Request Type: POST <br/>
        Payloads: name. version <br/> <br/>

        Sample Success Response: <br/>
        {
            "type": "success",
            "game": {
                "name": "PES",
                "version": "2019",
                "player_id": 1,
                "updated_at": "2020-07-11 16:56:17",
                "created_at": "2020-07-11 16:56:17",
                "id": 7
            }
        } <br/>

        Sample Error Response:
        {
            "type": "error",
            "message": "You have created this game before. Try again."
        }

        <hr/>

        <h4>Play a game (<i> Player must be logged in</i>) </h4> <br/>
        Endpoint: /games/play <br/> 
        Request Type: POST <br/>
        Payloads: name. version <br/> <br/>

        Sample Success Response: <br/>
        {
            "type": "success",
            "play_game": {
                "game_id": "7",
                "player_id": 1,
                "started_by": 1,
                "type": "single",
                "status": "in-progress",
                "updated_at": "2020-07-11 16:58:04",
                "created_at": "2020-07-11 16:58:04",
                "id": 17
            },
            "running-stats": {
                "runtime": "0.029337882995605 seconds",
                "memory-used": "9981 bytes"
            }
        }<br/>

        Sample Error Response:
        {
            "type": "error",
            "message": "You have played this game today",
            "running-stats": {
                "runtime": "0.017143964767456 seconds",
                "memory-used": "10008 bytes"
            }
        }

        <hr/>

        <h4>List of all games </h4> <br/>
        Endpoint: /games <br/> 
        Request Type: GET <br/>

        Sample Success Response: <br/>
        [{
            "data": [
                {
                    "id": 7,
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "name": "PES",
                    "version": "2019",
                    "created_at": "July 11th, 2020, 04:56: PM",
                    "updated_at": "July 11th, 2020, 04:56: PM",
                    "deleted_at": "July 11th, 2020, 04:58: PM"
                },
                {
                    "id": 6,
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "name": "PES",
                    "version": "2.0",
                    "created_at": "July 11th, 2020, 03:37: PM",
                    "updated_at": "July 11th, 2020, 03:37: PM",
                    "deleted_at": "July 11th, 2020, 04:58: PM"
                },
                {
                    "id": 5,
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "name": "FIFA",
                    "version": "2.0",
                    "created_at": "July 11th, 2020, 03:37: PM",
                    "updated_at": "July 11th, 2020, 03:37: PM",
                    "deleted_at": "July 11th, 2020, 04:58: PM"
                },
                {
                    "id": 4,
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "name": "FIFA",
                    "version": "1.0",
                    "created_at": "July 11th, 2020, 03:37: PM",
                    "updated_at": "July 11th, 2020, 03:37: PM",
                    "deleted_at": "July 11th, 2020, 04:58: PM"
                },
                {
                    "id": 3,
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "name": "PES",
                    "version": "1.0",
                    "created_at": "July 11th, 2020, 03:22: PM",
                    "updated_at": "July 11th, 2020, 03:22: PM",
                    "deleted_at": "July 11th, 2020, 04:58: PM"
                }
            ]
        }
        <hr/>

        <h4>List of all games played on a particular date </h4> <br/>
        Endpoint: /games/date/{date} <br/> 
        Request Type: GET <br/>

        Sample Success Response: <br/>
        {
            "data": [
                {
                    "id": 17,
                    "invitation_id": null,
                    "game_id": 7,
                    "game_name": "PES",
                    "game_version": "2019",
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "starter_id": 1,
                    "starter_fullname": "Ayodele Oniosun",
                    "status": "in-progress",
                    "played_on": null,
                    "type": "single",
                    "created_at": "July 11th, 2020, 04:58: PM",
                    "updated_at": "July 11th, 2020, 04:58: PM",
                    "deleted_at": "July 11th, 2020, 05:00: PM"
                },
                {
                    "id": 13,
                    "invitation_id": null,
                    "game_id": 5,
                    "game_name": "FIFA",
                    "game_version": "2.0",
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "starter_id": 1,
                    "starter_fullname": "Ayodele Oniosun",
                    "status": "in-progress",
                    "played_on": null,
                    "type": "single",
                    "created_at": "July 11th, 2020, 03:38: PM",
                    "updated_at": "July 11th, 2020, 03:38: PM",
                    "deleted_at": "July 11th, 2020, 05:00: PM"
                },
                {
                    "id": 12,
                    "invitation_id": null,
                    "game_id": 3,
                    "game_name": "PES",
                    "game_version": "1.0",
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "starter_id": 1,
                    "starter_fullname": "Ayodele Oniosun",
                    "status": "in-progress",
                    "played_on": null,
                    "type": "single",
                    "created_at": "July 11th, 2020, 03:24: PM",
                    "updated_at": "July 11th, 2020, 03:24: PM",
                    "deleted_at": "July 11th, 2020, 05:00: PM"
                }
            ]
        }
        <hr/>

        <h4>List of all games played on a particular date range</h4> <br/>
        Endpoint: /games/date-range/{startDate}/{endDate} <br/> 
        Request Type: GET <br/>

        Sample Success Response: <br/>
        {
            "data": [
                {
                    "id": 17,
                    "invitation_id": null,
                    "game_id": 7,
                    "game_name": "PES",
                    "game_version": "2019",
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "starter_id": 1,
                    "starter_fullname": "Ayodele Oniosun",
                    "status": "in-progress",
                    "played_on": null,
                    "type": "single",
                    "created_at": "July 11th, 2020, 04:58: PM",
                    "updated_at": "July 11th, 2020, 04:58: PM",
                    "deleted_at": "July 11th, 2020, 05:00: PM"
                },
                {
                    "id": 14,
                    "invitation_id": null,
                    "game_id": 4,
                    "game_name": "FIFA",
                    "game_version": "1.0",
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "starter_id": 1,
                    "starter_fullname": "Ayodele Oniosun",
                    "status": "in-progress",
                    "played_on": null,
                    "type": "single",
                    "created_at": "July 12th, 2020, 03:38: PM",
                    "updated_at": "July 11th, 2020, 03:38: PM",
                    "deleted_at": "July 11th, 2020, 05:00: PM"
                },
                {
                    "id": 13,
                    "invitation_id": null,
                    "game_id": 5,
                    "game_name": "FIFA",
                    "game_version": "2.0",
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "starter_id": 1,
                    "starter_fullname": "Ayodele Oniosun",
                    "status": "in-progress",
                    "played_on": null,
                    "type": "single",
                    "created_at": "July 11th, 2020, 03:38: PM",
                    "updated_at": "July 11th, 2020, 03:38: PM",
                    "deleted_at": "July 11th, 2020, 05:00: PM"
                },
                {
                    "id": 12,
                    "invitation_id": null,
                    "game_id": 3,
                    "game_name": "PES",
                    "game_version": "1.0",
                    "player_id": 1,
                    "player_fullname": "Ayodele Oniosun",
                    "starter_id": 1,
                    "starter_fullname": "Ayodele Oniosun",
                    "status": "in-progress",
                    "played_on": null,
                    "type": "single",
                    "created_at": "July 11th, 2020, 03:24: PM",
                    "updated_at": "July 11th, 2020, 03:24: PM",
                    "deleted_at": "July 11th, 2020, 05:00: PM"
                }
            ]
        }
        <hr/>

    </body>
</html>