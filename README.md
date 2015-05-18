Froxlor Contrib commands
========================

Provides extra command line commands that can be used with your Froxlor install.

Whats it do?
------------

Currently provides a single command to generate a slave zone file for Bind.
You'll want to do this so you can have backup DNS. At the moment Froxlor
supports the ability to specify servers that can XFER but you will need to
manually create the zones on your slave/s so that they will listen to the
notify.

To install
----------

Installation is simple

    composer install

This should mark the file `app/console` as executable but if not you'll need to
do this on your command line.

    chmod a+x app/console

Create an `app/config/parameters.yml` file with your Froxlor database connection
details. Use the `parameters.yml.dist` file in that folder for guidance.

To use
------

    app/console bind:slave

Will output your zones to the command line. If you want it written directly to a
file the argument `--path` can be used. For example:

    app/console bind:slave --path=/home/user/zonefile.conf
