# The Lyon

Welcome to The Lyon Online! If people are doing their jobs, this repo should have the latest version of the William Lyon Mackenzie newspaper website. As a web dev it is your responsibility to know how this site works, inside and out, and to ensure that everything is working properly. Have fun!

~ The 2017/2018 Web Dev Team

## Built with:

```
Laravel 5.3
Bootstrap 4
JQuery
Eloquent
(HTML, CSS, JS, PHP)
```

## Installing

Laravel will not work on your computer if you just download the repo. You must have PHP and MySql installed. If you know what you're doing and have Homestead/Vagrant installed then knock yourself out (we were too lazy to intall Homestead/Vagrant). If you didn't understand a word of this then follow the steps below carefully.

### PC (Windows - 10)

1. Install XAMPP from [HERE](https://www.apachefriends.org/index.html). Only PHP and MySQL are required, but feel free to install anything which tickles your fancy.

2. Install Composer from [HERE](https://getcomposer.org/download/)

3. (Now the fun stuff) Navigate to 'C:\xampp\apache\conf\extra\httpd-vhosts.conf' and add the following lines to the end of the file:
```
<VirtualHost laravel.dev:80>
  DocumentRoot "C:\xampp\htdocs\laravel\public"
  ServerAdmin laravel.dev
  <Directory "C:\xampp\htdocs\laravel">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
  </Directory>
</VirtualHost>
```

4. Open Notepad as an administrator (right click -> run as admin) and navigate to 'C:\Windows\System32\drivers\etc'. Under the commented section, on the last line of the file add the following line:
```
127.0.0.1	laravel.dev
```
5. Download this repository

6. Navigate to 'C:\xampp\htdocs' and copy the 'laravel' folder from this repository into \htdocs.

7. Open the XAMPP control panel and start up the server.

8. Go to Laravel.dev in your browser and marvel at that beautiful website.

### MacOS (High Sierra)

If any web dev ever runs the site locally on a mac, please document the steps here. I would assume that the process is pretty similar to the Windows one but who knows.

## Styles

- You MUST use curly brackets like this:
```
something{
  (your code)
}
```
(Otherwise you are insane)

- Use tabs, not spaces.

## Publishing

Once code is pushed to the Production branch Heroku will automatically update from the commit.
