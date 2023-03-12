CREATE TABLE usersMessages(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    messages VARCHAR (255) NOT NULL
    
);

CREATE TABLE users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(250) NOT NULL,

);


INSERT INTO usersmessages (username, messages) 
VALUES ('tapsivanneil','hello Ivan');