# Event Push - Web Application

## Get Started
1. clone project
    ```bash
    git clone https://github.com/natthapach/01418443-Project-1.git
    ```
2. create database named **webtech1** in your database system
3. import [webtech1.sql](https://github.com/natthapach/01418443-Project-1/blob/master/service/webtech1.sql) to your database
4. start page at ```{project-path}/web/admin/```

## Project Structure
This project separate code structure into two sides (service side and web side) and divide into three subsystem includes admin subsystem, organizer subsystem and attendant subsystem
* service  
    this folder contain *php file* for receive request from web-side and connect to database
    * admin  
        this folder contain *php file* for recieve request from admin-subsystem such as "login service", "register service" etc.
    * organizer  
        this folder contain *php file* for recieve request from organizer-subsysten such as "create event service", "checkin service" etc.
    * attendant  
        this folder contain *php file* for recieve request from attendant-subsystem such as "show event", "join event", "buy event" etc.
    * pictures  
        this folder contain pictures of each event
    * slip  
        this folder contain slip's picture
    * profile  
        this folder contain user's profile picture
* web  
    this folder contain *web page file*
    * admin  
        this folder contain web page for admin-subsystem (html or php)
    * attendant  
        this folder contain web page for attendant-subsytem (html or php)
        * js  
            this folder contain javascript file for control behavior and send/recieve data (to service-side) for attendant-web
        * css  
            this folder contain cascade style sheet file for model webpage
    * organizer  
        this folder contain web page for organizer-subsytem (html or php)
        * js  
            this folder contain javascript file for control behavior and send/receive data (to service-side) for attendant-web
        * css  
            this folder contain cascade style sheet file for model webpage
## Issue
### #1 export all event to pdf
We use tfpdf for export pdf file with support utf-8 and THSarabun font. But this library save abslute path to font file. The error may occur when move/rename project directory or receive thier tmp file from other.
#### Solution
1. go to directory
    ```bash
        {project-path}/service/organizer/tfpdf/font/unifont
    ```
2. Please delete ```thsarabun.cw.dat```, ```thsarabun.cw127.php```, ```thsarabun.mtx.php```
3. Restart project again
