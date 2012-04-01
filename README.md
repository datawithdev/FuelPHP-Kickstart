FuelPHP Bootstrap
-----------------
Preface this by saying that this is not an official FuelPHP application. FuelPHP Bootstrap is a maintained by me and used as a bootstrap for applications that I develop. I also use this as a
learning tool to try out new ideas that pop into my head from time to time.

Hopefully someone else will find this useful. Please do send me any feedback that you have. If you're curious as to why I've done something a certain way or if you have a better way of doing it,
please take a second to create an issue/pull request.

<hr />

What's Included?
================
Initially this will be just a real simple bootstrap. We'll have migrations to get you up and running a complete system with sessions management (mysql backed), authentication using sentry, 
a common controller that you can extend to your other controllers, and a few other goodies.

I've chosen to include Twitter Bootstrap for design and assets simply because it is quick and simple. Once installed you can change that to anything you like!

<hr />

Getting Things Going
====================
As of right now this is a manual install. Once the features are better in place, an installer and migrations will be added to automate the install process.

###Clone the KickStart Repo
The first step is to clone the fuelphp-kickstart repo!  We have a lot of submodules in here, so we need to make sure we recursively clone those. So from your command line run:
    
    git clone --recursive git://github.com/dberry37388/FuelPHP-Kickstart.git kickstart

What this does is tell git to clone the fuelphp-kickstart repo, and go through all of the submodules and clone them as well and put all of that into a folder named "kickstart".
You can rename the "kickstart" folder to whatever you want that folder to be called.

###Setup Your Database
Sessions, user information and other items will be stored in your database. So before we can setup these tables, we need to add our access information to the database config.

- Open up app/config/development/db.php
- Add your database name, database user and database password. You will see where these items go.
- Save this file and upload if not working on a local server.

###Session Table Task
Now that we've got the database configured and ready to rock, let's use the session table provided by FuelPHP to setup our session table. From the command line run:
	
	php oil r session

You will be presented with a couple of choices. Select "create".  Once the table has been created, a success message will appear. If you get database errors, please make sure
your database permissions are set correctly.

###Installing Sentry Table
Sentry comes with some really nifty migrations that will get you up and running quickly. From your command line run:
	
	php oil r migrate --packages=sentry

This will run and update you to the latest version 2.0 of the Sentry Auth Package.

Sentry is an awesome authentication package developed by the fellas at Cartalyst. For more information on Sentry please refer to the Sentry Website at http://sentry.cartalyst.com/
At the time of this writing the 2.0 docs are not available on the Sentry website. New feature usage is provided in the Sentry README.md

<hr />

Available Tasks:
================
I've included the following tasks to make your life a little easier. You may or may not need to run any or all of these tasks.  If you are using git, I do recommend running the "git" task
just to make sure certain files are ignored.

###Writable
use this if you are having issues with write permissions on your log, cache or config directories. This will set their permissions to 777.
	
	php oil r writable

###Git
This will do a simple "git update-index --assume-unchanged. This way you can upload to the repo with out these files being added, causing problems down the road and so you don't have
your DB password just hanging around in the web somewhere.
	
	php oil r git

<hr />