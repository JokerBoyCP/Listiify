**Listiify**

The ultimate To Do List webapp that will help you organize and streamline your daily tasks. With Listiify, you can say goodbye to scattered notes and forgetful moments, and say hello to a more organized and productive life. Listiify is designed with simplicity and ease-of-use in mind, so you can start using it right away without any complications.It has a clean and modern interface that is easy on the eyes, allowing you to focus on your tasks without any distractions.

Database import:

//First create a new database called "listiify_db".
![image](https://user-images.githubusercontent.com/99121408/233114553-295d6827-6b9a-47d6-ad95-3f9e788706ac.png)

//Import the listiify_db.sql file from the repository.
![image](https://user-images.githubusercontent.com/99121408/233115166-dcc140d5-d2c5-4395-a76b-57503d060b7a.png)


//Create an DB user

CREATE USER 'listiify'@'localhost' IDENTIFIED BY 'BBZBL12345';



//Give the user permissions on the

GRANT USAGE ON *.* TO `listiify`@`localhost` IDENTIFIED BY PASSWORD '*A3194D9B7702C833857AA6257D7E2D53E252C44A';
GRANT SELECT, INSERT, UPDATE, DELETE ON `listiify_db`.* TO `listiify`@`localhost`;
