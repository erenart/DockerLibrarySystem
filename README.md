# Library System

The Library System is a web application designed to manage all aspects of a library's book inventory. The system features an admin panel and user login functionality. The primary goal of the application is to facilitate efficient library management, primarily benefiting librarians. It allows for comprehensive book management, including functions such as adding, updating, and deleting books. Additionally, the system provides a user-friendly interface, enabling users to access and display book data seamlessly.

There are 2 differen interface options: admin panel for managing the library, user log in for displaying the library.
There are 2 different databases connected: "librarysystem" for library system (website/system general), "user_db" for users (user data).



## Set up the project 🔋

To set up the project, you'll need Docker and Docker Compose. Follow these steps:

1. Clone the repository:

   ```
   git clone https://github.com/erenart/DockerLibrarySystem
   cd DockerLibrarySystem

2. Open the terminal in project directory and start the project using Docker Compose command:

    ```
    docker-compose up --build

3. After a successful launch, your database will be accessible at

    ```
    http://localhost:9001/
    
## BEFORE USE THE WEB APPLICATION DON'T FORGET TO SET UP THE DATABASE


1. Access the database at http://localhost:9001/

    ```
    username: root
    password: root


2. Run SQL query/queries on server “mysql_db”: 
   ```
    CREATE DATABASE user_db;
    CREATE DATABASE librarysys;

3. Select database "user_db"
   SQL Code of the tables:
   ```
   CREATE DATABASE user_db; USE `user_db`; SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"; START TRANSACTION; SET time_zone="+00:00"; CREATE TABLE `user_log` (`ID` int NOT NULL, `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL, `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL, `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL, `user_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user', `account_created_on` timestamp DEFAULT CURRENT_TIMESTAMP, `avatar` enum('Bulbasaur','Charmander','Squirtle') COLLATE utf8mb4_general_ci DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; INSERT INTO `user_log` (`ID`, `name`, `email`, `password`, `user_type`, `account_created_on`, `avatar`) VALUES (1,'admin','admin@librarysys.xan','81dc9bdb52d04dc20036dbd8313ed055','admin','0000-00-00 00:00:00',''),(8,'Jack Russell','jackrussell21@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055','user','2023-05-20 16:59:52','Charmander'),(50,'John Doe','johndoe@example.com','123456','user','2023-05-23 13:32:22','Bulbasaur'),(51,'Jane Smith','janesmith@example.com','qwerty','user','2023-05-23 13:32:22','Charmander'),(52,'Michael Johnson','michaeljohnson@example.com','password','user','2023-05-23 13:32:22','Squirtle'),(53,'Emily Davis','emilydavis@example.com','pass123','user','2023-05-23 13:32:22','Bulbasaur'),(54,'David Wilson','davidwilson@example.com','abc123','user','2023-05-23 13:32:22','Charmander'),(55,'Sarah Anderson','sarahanderson@example.com','ilovecats','user','2023-05-23 13:32:22','Squirtle'),(56,'Christopher Taylor','christophertaylor@example.com','football','user','2023-05-23 13:32:22','Bulbasaur'),(57,'Jessica Thomas','jessicathomas@example.com','welcome','user','2023-05-23 13:32:22','Charmander'),(59,'Amanda Martinez','amandamartinez@example.com','secret123','user','2023-05-23 13:32:22','Bulbasaur'),(102,'Mark Henry','mark@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055','user','2023-05-22 17:09:44','Bulbasaur'),(116,'Terka Bryz','terka@bryz.com','81dc9bdb52d04dc20036dbd8313ed055','user','2023-05-24 01:37:04','Squirtle'),(117,'Liam Kayne','super.kayne995@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','user','2023-12-17 20:27:25','Squirtle'); ALTER TABLE `user_log` ADD PRIMARY KEY (`ID`); ALTER TABLE `user_log` MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
## Admin Panel 📑

Administrators have access to the Django admin panel and pgAdmin4 where they can create custom access tiers with configurable parameters such as thumbnail sizes, the presence of links to the original file, and the ability to generate expiration links.


1. Create superuser for django-admin panel.

    ```
    1) Open the terminal in project directory
    2) Use command: docker-compose exec web python manage.py createsuperuser
    3) Enter: name, email, password, password(second time)
    4) Successfully you may enter to the adminstration panel: http://localhost:8000/admin/

2. Entering to pgAdmin4.

    ```
    1) Go to: http://localhost:5050/
    2) Log in with the email and password specified in the PGADMIN_DEFAULT_EMAIL and PGADMIN_DEFAULT_PASSWORD environment variables in your docker-compose.yml file.
    4) Successfully you may enter to the pgAdmin4 panel.

3. Connecting to the postgreSQL databse of project.
    
    ```
    1) In the pgAdmin interface, click on "Add New Server" (usually a plus icon or an "Add New Server" option in the menu).
    2) In the "General" tab, provide a name for your server in the "Name" field.
    3) Switch to the "Connection" tab.
    4) In the "Host name/address" field, enter the name of the PostgreSQL service in your Docker Compose setup. In your case, it's likely "db."
    5) In the "Port" field, enter the PostgreSQL port, which is 5432 by default.
    6) In the "Maintenance database" field, enter the name of your PostgreSQL database. In your case, it's "mydb."
    7) In the "Username" and "Password" fields, enter the PostgreSQL username and password. In your case, they are "myuser" and "mypassword."
    8) Click "Save" to save the connection details.
    9) In the pgAdmin interface, you should now see your server listed in the left sidebar. Click on it to expand the tree and see the databases, schemas, and other objects.
    10) You can now browse and manage your PostgreSQL database using pgAdmin.


## The API provides the following features 🎇

Image Upload:

To upload an image, make a POST request to /api/upload/. In the request, provide parameters such as the username (username), access tier (tier), image file (image), and expiration link duration (expire_link_duration).

1) Fetching the List of Images:

```
To get a list of all images, make a GET request to /api/images/.
```
2) Fetching User Images:

```
To get images of a specific user, make a GET request to /api/images/{username}/, where {username} is the username.
```
3) Fetching an Image via Expiring Link:

```
To get an image via an expiring link, make a GET request to /api/expire-links/{expire_link_token}/, where {expire_link_token} is the token for the expiration link.
```



## Technologies used during development ⚙

- PHP
- MySQL
- PHPMyAdmin
- Docker and docker compose
- AdminLTE

### **Authors 👨‍💻👨‍💻**

- Ahmet Eren Artam - 41155                                 | Recep Enes Karatekin - 40796
- https://github.com/erenart                               |
