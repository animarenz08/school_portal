School Portal
========================
This is a symfony project.

Configuring Apache config hosts
========================

### Step 1: Create new config host file.
````
nano /etc/apache2/sites-available/[filename].conf
````

### Step 2: Add this code to your config host file.
````
<VirtualHost *:80>
    ServerName school-portal.local
    ServerAlias www.school-portal.local
    DocumentRoot /var/www/school_portal/public

    <Directory /var/www/school_portal/public>
        AllowOverride None
        Order Allow,Deny
        Allow from All

        <IfModule mod_rewrite.c>
        Options -MultiViews
        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^(.*)$ index.php [QSA,L]
        #FallbackResource "index.php"
        RewriteCond %{HTTP:Authorization} .
        RewriteRule ^ - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
        </IfModule>
    </Directory>

    <Directory /var/www/school_portal>
        Options FollowSymlinks
    </Directory>

    <Directory /var/www/school_portal/web/bundles>
        <IfModule mod_rewrite.c>
            RewriteEngine Off
        </IfModule>
    </Directory>

    ErrorLog /var/log/apache2/school_portal.log
    CustomLog /var/log/apache2/school_portal.log combined
</VirtualHost>
````

### Step 3: Required to restart the apache server.
````
systemctl reload apache2.service
````

### Step 4: Add the ip address into your local hosts.
1. Go to

    ````
    sudo nano /etc/hosts
    ````
2. Then add your ip address and domain name.

    ````
    192.168.1.x [domain name]
    ````
    