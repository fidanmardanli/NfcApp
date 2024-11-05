GET:

1) task.bazarlook.com/api/getAllUsers - Returns information for all users.

2) task.bazarlook.com/api/getUserById/{userId} - Returns user information based on their unique ID (for example: https://task.bazarlook.com/api/user/1).

3) task.bazarlook.com/api/getUserDatasByUid/{uid} - Returns user information based on their unique UID (for example: https://task.bazarlook.com/api/getUserDatasByUid/Az12345).

4) task.bazarlook.com/api/getUserDatasByUsername/{username} - Returns user information based on their username (for example: https://task.bazarlook.com/api/getUserDatasByUsername/username).


POST:

4) task.bazarlook.com/api/createUser- Inserts new user to the database (for example: https://task.bazarlook.com/api/createUser => {
    "fullname": "User fullname",
    "uid": "Az67890",
    "username": "username",
    "birthdate": "1900-01-01",
    "gender": "male",
    "profile_image": "new.jpg"
}

).

5) task.bazarlook.com/api/updateUserById/{id}- Inserts new user to the database (for example: https://task.bazarlook.com/api/updateUserById/4 => {
    "fullname": "Updated fullname",
    "uid": "Az67890",
    "username": "username",
    "birthdate": "1900-01-01",
    "gender": "male",
    "profile_image": "Updated.jpg"
}
).

6) task.bazarlook.com/api/deleteById/{id} - Deletes user by id (for example: https://task.bazarlook.com/api/deleteById/4).

