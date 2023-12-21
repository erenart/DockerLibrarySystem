# Library System

The Library System is a web application designed to manage all aspects of a library's book inventory. The system features an admin panel and user login functionality. The primary goal of the application is to facilitate efficient library management, primarily benefiting librarians. It allows for comprehensive book management, including functions such as adding, updating, and deleting books. Additionally, the system provides a user-friendly interface, enabling users to access and display book data seamlessly.
There are 2 different databases connected: "librarysystem" for library system (website/system general), "user_db" for users (user data).



## Set up the project 🔋

To set up the project, you'll need Docker and Docker Compose. Follow these steps:

1. Clone the repository:
   ```
   git clone https://github.com/erenart/DockerLibrarySystem
   cd DockerLibrarySystem
2. In project directory start the project using Docker Compose command:
    ```
    docker-compose up --build
3. After a successful launch, your project and database will be accessible
    ```
    PROJECT at: http://localhost:9000/
    DATABASE at: http://localhost:9001/
## BEFORE USING THE WEB APPLICATION DON'T FORGET TO SET UP THE DATABASE
4. Access phpMyAdmin interface at http://localhost:9001/
    ```
    username: root
    password: root
5. Copy SQL queries below to create both databases called "user_db" and "librarysystem" we need for project.
    Run it on SQL tab in phpMyAdmin (server “mysql_db”):
   ```
   CREATE DATABASE user_db; CREATE DATABASE librarysystem; USE `user_db`; USE `user_db`; SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"; START TRANSACTION; SET time_zone="+00:00"; CREATE TABLE `user_log` (`ID` int NOT NULL, `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL, `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL, `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL, `user_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user', `account_created_on` timestamp DEFAULT CURRENT_TIMESTAMP, `avatar` enum('Bulbasaur','Charmander','Squirtle') COLLATE utf8mb4_general_ci DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; INSERT INTO `user_log` (`ID`, `name`, `email`, `password`, `user_type`, `account_created_on`, `avatar`) VALUES (1,'admin','admin@librarysys.xan','81dc9bdb52d04dc20036dbd8313ed055','admin','0000-00-00 00:00:00',''),(8,'Jack Russell','jackrussell21@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055','user','2023-05-20 16:59:52','Charmander'),(50,'John Doe','johndoe@example.com','123456','user','2023-05-23 13:32:22','Bulbasaur'),(51,'Jane Smith','janesmith@example.com','qwerty','user','2023-05-23 13:32:22','Charmander'),(52,'Michael Johnson','michaeljohnson@example.com','password','user','2023-05-23 13:32:22','Squirtle'),(53,'Emily Davis','emilydavis@example.com','pass123','user','2023-05-23 13:32:22','Bulbasaur'),(54,'David Wilson','davidwilson@example.com','abc123','user','2023-05-23 13:32:22','Charmander'),(55,'Sarah Anderson','sarahanderson@example.com','ilovecats','user','2023-05-23 13:32:22','Squirtle'),(56,'Christopher Taylor','christophertaylor@example.com','football','user','2023-05-23 13:32:22','Bulbasaur'),(57,'Jessica Thomas','jessicathomas@example.com','welcome','user','2023-05-23 13:32:22','Charmander'),(59,'Amanda Martinez','amandamartinez@example.com','secret123','user','2023-05-23 13:32:22','Bulbasaur'),(102,'Mark Henry','mark@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055','user','2023-05-22 17:09:44','Bulbasaur'),(116,'Terka Bryz','terka@bryz.com','81dc9bdb52d04dc20036dbd8313ed055','user','2023-05-24 01:37:04','Squirtle'),(117,'Liam Kayne','super.kayne995@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','user','2023-12-17 20:27:25','Squirtle'); ALTER TABLE `user_log` ADD PRIMARY KEY (`ID`); ALTER TABLE `user_log` MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118; USE `user_db`; SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"; START TRANSACTION; SET time_zone="+00:00"; CREATE DATABASE IF NOT EXISTS `librarysystem`; USE `librarysystem`; CREATE TABLE `books` (`ID` int NOT NULL, `book_category` varchar(200) COLLATE utf8mb4_general_ci NOT NULL, `book_author` varchar(200) COLLATE utf8mb4_general_ci NOT NULL, `book_location_rack` varchar(100) COLLATE utf8mb4_general_ci NOT NULL, `book_name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL, `book_isbn_number` varchar(30) COLLATE utf8mb4_general_ci NOT NULL, `book_status` enum('Available','Issued') COLLATE utf8mb4_general_ci NOT NULL, `issued_user_ID` int DEFAULT NULL, `book_issued_on` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL, `book_added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, `book_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; INSERT INTO `books` (`ID`, `book_category`, `book_author`, `book_location_rack`, `book_name`, `book_isbn_number`, `book_status`, `issued_user_ID`, `book_issued_on`, `book_added_on`, `book_updated_on`) VALUES (1,'Novel','Fyodor Dostoevsky','A1','The Gambler','9783442075331','Available',NULL,NULL,'2021-11-11 13:06:35','2023-05-23 22:46:42'),(2,'Novel','Fyodor Dostoevsky','A1','Crime and Punishment','9788420741468','Issued',117,'2023-12-17','2021-11-11 15:25:03','2023-12-17 20:39:01'),(3,'Novel','Victor Hugo','A1','Les Misérables','9780449300022','Available',NULL,NULL,'2021-11-11 19:06:35','2023-05-23 23:38:13'),(4,'Romance','Jennifer Crusie','A2','Welcome to Temptation','9780312932800','Available',NULL,NULL,'2021-11-15 10:43:55','2021-11-15 09:43:55'),(5,'Romance','Lisa Kleypas','A2','Where Dreams Begin','9780380802319','Available',NULL,NULL,'2021-11-15 10:43:55','2021-11-15 09:43:55'),(13,'Fiction','Azra Kohen','A5','Phi','9788804708100','Issued',102,'2023-05-24','2023-05-19 21:52:50','2023-05-23 23:30:08'),(24,'Crime','Thomas Mullen','A8','Blind Spots','9780691156224','Issued',8,'2023-05-14','2022-01-05 13:18:01','2023-05-23 23:22:18'),(25,'Criminal','Delia Owens','A8','Where the Crawdads Sing','9786057879134','Issued',57,'2023-05-10','2023-03-10 01:29:31','2023-05-24 00:37:17'); CREATE TABLE `settings` (`ID` int NOT NULL, `set_title` varchar(160) COLLATE utf8mb4_general_ci DEFAULT NULL, `set_key` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL, `set_description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL, `set_url` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; INSERT INTO `settings` (`ID`, `set_title`, `set_key`, `set_description`, `set_url`) VALUES (1,'Xan Library','Xan Library','Library display, management system.','http://localhost:9000/'); ALTER TABLE `books` ADD PRIMARY KEY (`ID`); ALTER TABLE `settings` ADD PRIMARY KEY (`ID`); ALTER TABLE `books` MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109; ALTER TABLE `settings` MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
6. You are ready to use the library system web application. 😇
   ```
   Admin login:
   username: admin@librarysys.xan
   password: 1234

   Random user login:
   username: super.kayne995@gmail.com
   password: 1234
## Admin Panel 📑
There is an admin panel belongs to library. In admin account admin has a bunch of authorities on library data over these 3 pages;
     ***Books Panel***
     ***Issue Book***
     ***User Panel***

1. _Books Panel_
    ```
    1) Admin can display info about all books and their status (available/issued).
    2) Admin can add a new book to the system.
    3) Admin can edit current book in the system.
    4) Admin can delete current book from the system.
3. _Issue Book_
    ```
    1) Admin can display information about all issued books, including details about who issued them and for how many days
    2) Admin can issue a book to a user by their id.
    3) Admin can revoke the book that was returned by the person who had borrowed it from the reception desk.
<sup>feedback mechanism: you need to issue with correct info and you can not issue a book to more than one person or admin account otherwise you got warning:</sup>
    -THIS BOOK IS NOT AVAILABLE
    -INVALID User ID
    -INVALID Book ID
    
5. _User Panel_
    ```
    1) Admin can display information about all users.
    2) Admin can delete a user's account.

## User Login 📑
Users can create account for displaying virtual library for borrowing book. In user login;

    ```
    1) Users can display info about all books and their status (available/issued).
    2) Users can display all issued book to themselves.
    3) Users can display their account information and change their password
<sup>feedback mechanism: you need to enter old password correctly, correct confirmation of new password and new password can't be previous one otherwise you got warning:</sup>
    -WRONG PASSWORD
    -PASSWORDS DO NOT MATCH
    -NEW PASSWORD CAN NOT BE THE SAME AS YOUR OLD PASSWORD
    -YOUR PASSWORD HAS BEEN CHANGED!









    
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
- phpMyAdmin
- Docker and docker compose
- AdminLTE

### **Authors 👨‍💻👨‍💻**

- Ahmet Eren Artam - 41155                                 | Recep Enes Karatekin - 40796
- https://github.com/erenart                               |
