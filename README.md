# RMPOS
Web based Point Of Sale Software

## Credits
### Projects Used
- AdminLTE v2.4.0-alpha [link](https://github.com/almasaeed2010/AdminLTE)
- Bootstrap notify v3.1.3 [link](https://github.com/mouse0270/bootstrap-notify)
- Browser Detection [link](https://github.com/cbschuld/Browser.php)
- Animate CSS v3.5.2 [link](https://github.com/daneden/animate.css)
- Chartjs v2.6.0 [link](https://github.com/chartjs/Chart.js)
- ESC/POS Print Driver for PHP v1.5.2 [link](https://github.com/mike42/escpos-php)
- Fastclick v1.0.6 [link](https://github.com/ftlabs/fastclick)
- Fontawesome v4.7.0 [link](http://fontawesome.io)
- iCheck v1.0.2 [link](http://git.io/arlzeA)
- ionicons v2.0.1 [link](ionicons.com)
- jQuery v3.2.1 [link](jquery.org)
- moment js v2.18.1 [link](momentjs.com)
- Select2 [link](https://select2.github.io)
- Slimscroll v1.3.8 by Piotr Rochala [link](http://rocha.la)
- DataTables [link](https://datatables.net)

### Guides Used
- Custom File Upload by shahrouq [link](https://bootsnipp.com/shahrouq)
- Import CSV by cloudways [link](https://www.cloudways.com/blog/import-export-csv-using-php-and-mysql/)
- DataTable ajax code by charaf JRA [link](RefreshMyMind.com)
- Stackoverflow (link)[https://stackoverflow.com)
> I here to say thanks the above project's developers for their work and guides 

## Installation
### Prerequisites
- Need xampp server(php7.1.4) or above
- EPSON TM-T81 Driver for Windows 10
- Chrome Browser v58 or above
- This Web application [Download](https://github.com/AsathalMannan/rmpos/releases)

### Configuration
**Install Xampp Server**
Install Xampp Server with apache,mysql and phpmyadmin enabled. then configure the virtual host, the file located on `C:\xampp\apache\conf\extra\httpd-vhosts.conf` and add following link at the end of the file.
```
<VirtualHost *:80>
    ServerName www.rmpos.app
    ServerAlias rmpos.app
    DocumentRoot C:/rmpos/app
    <Directory C:/rmpos/app/>.
    Require all granted 
    </Directory>
</VirtualHost>
```

then, add host name as follow in `host` file located on `C:\Windows\System32\drivers\etc`. this file need admin permission to write.
```
127.0.0.1	rmpos.app
```
**Extract Web application**
Extract downloaded web application on the location `C:/rmpos/`


