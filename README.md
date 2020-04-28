# simple-web-service
Simple web service that serve data in JSON or XML format

This work is based on @HGustavs code in https://github.com/HGustavs/Webbprogrammering-API-2014-

# Installation
1. Create a mysql database using the file: `mobilprog_mountains_db.sql`
2. Edit the file `booking/dbaccess.php`
    1. Replace "__ENTER_YOUR_DB_USER_HERE__" with a user that has read/write access to the newly created MobilProg database
    2. Replace "__ENTER_YOUR_DB_USER_PASSWORD_HERE__" for the db user in step 2.i

# Usage JSON
To get resources filtered by LOGIN
```
http://localhost/simple-web-service-api/admin/getdataasjson.php?login=LOGIN
```
