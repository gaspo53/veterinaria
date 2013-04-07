veterinaria
=========

Red Solidaria Veterinaria - Proyecto de Software 2007

=========

<b>You MUST read the file 'Entrega III.txt' before doing ANYTHING (in Spanish)</b>


Pre-requisites
--------------

As it is a Web Application, you need to have installed at least this packages: 
<pre>
  <code>
      $ apache2
      $ mysql-server
      $ php5-cli
      $ php-pear
      $ libapache2-mod-php5
      $ php5-mysqlnd 
      $ git-core (for clonning the repository)
   </code>
</pre>
Installation
------------

First of all, check that your WebServer is running [here]

[here]: http://localhost

After that, it is recommended that you edit your /etc/hosts file and put this line: 
<pre>
  <code>
       $ 127.0.0.1 veterinaria.local
   </code>
</pre>

Now, you have to set-up a VirtualHost. As an example, you have to make one like this:
<pre>
  <code>
     &lt;VirtualHost *:80&gt;

      	ServerAdmin webmaster@localhost
	ServerName  veterinaria.local
	DocumentRoot /path/to/project/veterinaria
	&lt;Directory /&gt;
		Options FollowSymLinks
		AllowOverride None
	&lt;/Directory&gt;
	&lt;Directory /path/to/project/veterinaria/&gt;
		Options Indexes FollowSymLinks MultiViews
		AllowOverride None
		Order allow,deny
		allow from all
	&lt;/Directory&gt;

	ScriptAlias /cgi-bin/ /usr/lib/cgi-bin/
	&lt;Directory &quot;/usr/lib/cgi-bin&quot;&gt;
		AllowOverride None
		Options +ExecCGI -MultiViews +SymLinksIfOwnerMatch
		Order allow,deny
		Allow from all
	&lt;/Directory&gt;
     &lt;/VirtualHost&gt;

  </code>
</pre>

And of course, enable it with:
<pre>
  <code>
      $# a2ensite veterinaria (if you named the VH 'veterinaria')
  </code>
</pre>

The PHP5 Apache2 Module and Rewrite:
<pre>
  <code>
      $# a2enmod php5
      $# a2enmod rewrite
      $# service apache2 restart
  </code>
</pre>


This is a PHP 5.3.x App, so, you need to check your environment.

Set-up project permissions:
<pre>
  <code>
    $ chown www-data:www-data PATH_TO_PROJECT -R 
  </code>
</pre>

If for any reason, you can't set permissions because of the lack of system privileges for the logged user, 
please run that command as root.

Also, if Apache2 is always showing the default "It's works" page, and you are not expert setting up a WebServer, you should
disable the 'default' site:

<pre>
  <code>
     $ a2dissite default
     $ service apache2 restart
  </code>
</pre>
  
Usage
-----

That's all.

If you have edited your /etc/hosts file with the line above, you can start to browse the app at this [address]

[address]: http://veterinaria.local

If it doesn't work, see what's happening in your Apache2 config file and error.log.
