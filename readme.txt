About this project:
-------------------
This project is setup using Core PHP, Mysql, Angular, Moment.js
Backend part of this application is designed to cater only GET call of devices.
Tough backend and frontend part are both setup in the same directory, the frontend part access the backend as if its a third part API.

Database:
---------
Create a database 'fleet' and execute the fleet.sql. This will automatically create 2 tables with initial data. The tables are designed to have minimal no of records. 
Table 'devices':
	This is the master table for the each devices
Table 'telemetrics':
	This is the table where each device is sending their position. The signal sent time is stored in created_on field.
	It was assumed that the backend responsible for inserting the data to this table stores the UTC time of the signal received irrespective of the device's local time.

Instructions to setup this project:
-----------------------------------
Place the FleetManagement folder in the document root of the machine. So that its accessible by http://localhost/ng-fleet-mgmt/public/index.html
URL is not prety good, but it would be nice if we configure a virutal host / url rewriting. But functionality wise it is fair enough.

Configure database in /ng-fleet-mgmt/database.php file
Use http://localhost/ng-fleet-mgmt/public/index.html
