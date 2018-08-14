# e-office-new #
<ul>
<li>System & Software requirement:
    <ul>
<li>- XAMPP with PHP 7.1.3+ : https://www.apachefriends.org/download.html</li>
<li>- SQL Server 2014 + : https://www.microsoft.com/en-us/download/details.aspx?id=42299</li>
<li>- Composer : https://getcomposer.org/</li>
        </ul>
    </li>

<li>SQL server driver for PHP extension in /db. 
<ul>
    <li>Please copy 2 driver files and paste to C:\XAMPP\php\ext\</li>
    <li>Add 2 configuration lines to php.ini below **extension=php_bz2.dll**:
        <ul>
            <li>extension=php_pdo_sqlsrv_71_ts_x86.dll</li>
            <li>extension=php_sqlsrv_71_ts_x86.dll</li>
        </ul>
    </li>
    <li>
    Clone source to **C:\xampp\htdocs**
    </li>
    <li>
    Add these lines to end of file: C:/xampp/apache/conf/extra/httpd-vhosts.conf
        <pre><VirtualHost *:80>
    DocumentRoot "C:\xampp\htdocs\e-office-new\public"
    ServerName www.eoffice.local
    ServerAlias eoffice.local
    DirectoryIndex index.php
</VirtualHost></pre>
    </li>
    <li>
    - Add to your /etc/hosts
127.0.0.1    www.eoffice.local
    </li>

</ul>
</li>
</ul>
