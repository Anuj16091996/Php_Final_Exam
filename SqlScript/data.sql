drop DATABASE if EXISTS dating;
CREATE DATABASE dating;
use dating;

drop TABLE if EXISTS customer;
CREATE TABLE customer(
    CustomerID int not null AUTO_INCREMENT PRIMARY KEY,
    Email varchar(60) NOT NULL,
    FirstName VARCHAR(30),
    LastName VARCHAR(30),
    City VARCHAR(15),
    Age varchar(10) NOT NULL,
    Sex varchar(6) NOT NULL,
    DateOfBirth date NOT NULL,
     AboutMe text NOT NULL,
     Password  VARCHAR(30) not null
);


drop TABLE if EXISTS Images;
CREATE TABLE Images(
    ImageID  int PRIMARY KEY AUTO_INCREMENT not null,
   CustomerID  int, 
    ImageName VARCHAR(300),
    FOREIGN KEY(CustomerID) REFERENCES customer(CustomerID)
);


drop TABLE if EXISTS CustomerPrefrence;
CREATE TABLE CustomerPrefrence(
    CustomerPrefrence  int PRIMARY KEY AUTO_INCREMENT not null,
    CustomerID  int,
    Like1 VARCHAR(100),
    Like2 VARCHAR(100),
    Like3 VARCHAR(100),
	IntrestedIn VARCHAR(6) not null,
    FOREIGN KEY(CustomerID) REFERENCES customer(CustomerID)
);

drop TABLE if EXISTS favorite;
CREATE TABLE favorite(
    favorite  int PRIMARY KEY AUTO_INCREMENT not null,
    CustomerID  int,
   ParnerId int,
    FOREIGN KEY(CustomerID) REFERENCES customer(CustomerID),
    FOREIGN KEY(ParnerId) REFERENCES customer(CustomerID)
);

drop TABLE if EXISTS Message;
CREATE TABLE Message(
      Message  int PRIMARY KEY AUTO_INCREMENT not null,
    SenderID  int,
  	ReciverID int,
    MESSAGE varchar(255),
    Time varchar(255),
    FOREIGN KEY(SenderID) REFERENCES customer(CustomerID),
    FOREIGN KEY(ReciverID) REFERENCES customer(CustomerID)
);



Insert into customer(Email,FirstName,LastName,City,Age,Sex,DateOfBirth,AboutMe,Password)VALUES
('anuj161996@gmail.com','Anuj','Narang','Montreal','25','Male','1996-09-16','Hello There i am using Dating','Admin@123'),
('dadasd@asd.com','dadas','Narang','Ontario','30','Female','1996-12-12','Hello There','Admin@123'),
('Jennifer@gmail.com','Jennifer','NoIdea','Toronto','35','Female','1990-10-10','Hello There','Admin@123'),
('Raquel@gmail.com','Raquel','Yes','Montreal','30','Female','1990-06-16','Hey','Admin@123'),
('Raqu@gmail.com','Rauel','Yes','Montreal','30','Female','1990-06-16','Hey','Admin@123'),
('Chan@gmail.com','Chan','Yes','Montreal','30','Female','1990-06-16','Hey','Admin@123'),
('han@gmail.com','han','Yes','Montreal','30','Female','1990-06-16','Hey','Admin@123');


INSERT into Images(CustomerID,ImageName) VALUES('1','anuj161996@gmail.com.jpg');
INSERT into Images(CustomerID,ImageName) VALUES('2','dadasd@asd.com.jpg');
INSERT into Images(CustomerID,ImageName) VALUES('3','Jennifer@gmail.com.jpg');
INSERT into Images(CustomerID,ImageName) VALUES('4','Raquel@gmail.com.jpg');
INSERT into Images(CustomerID,ImageName) VALUES('5','Raqu@gmail.com.jpg');
INSERT into Images(CustomerID,ImageName) VALUES('6','Chan@gmail.com.jpg');
INSERT into Images(CustomerID,ImageName) VALUES('7','han@gmail.com.jpg');

INSERT into CustomerPrefrence(CustomerID,Like1,Like2,Like3,IntrestedIn) VALUES('1','Swimmimg','Chess','Coding','Female');
INSERT into CustomerPrefrence(CustomerID,Like1,Like2,Like3,IntrestedIn) VALUES('2','Swimmimg','Chess','Coding','Male');         
INSERT into CustomerPrefrence(CustomerID,Like1,Like2,Like3,IntrestedIn) VALUES('3','Swimmimg','Chess','Coding','Male');
INSERT into CustomerPrefrence(CustomerID,Like1,Like2,Like3,IntrestedIn) VALUES('4','Swimmimg','Chess','Coding','Male');
INSERT into CustomerPrefrence(CustomerID,Like1,Like2,Like3,IntrestedIn) VALUES('5','Swimmimg','Chess','Coding','Male');
INSERT into CustomerPrefrence(CustomerID,Like1,Like2,Like3,IntrestedIn) VALUES('6','Swimmimg','Chess','Coding','Male');
INSERT into CustomerPrefrence(CustomerID,Like1,Like2,Like3,IntrestedIn) VALUES('7','Swimmimg','Chess','Coding','Male');


INSERT into favorite(CustomerID,ParnerId) VALUES('1','2');
INSERT into favorite(CustomerID,ParnerId) VALUES('2','1');                                               
INSERT into favorite(CustomerID,ParnerId) VALUES('3','1');
INSERT into favorite(CustomerID,ParnerId) VALUES('4','1');
INSERT into favorite(CustomerID,ParnerId) VALUES('5','1');
INSERT into favorite(CustomerID,ParnerId) VALUES('6','1');
INSERT into favorite(CustomerID,ParnerId) VALUES('7','2'); 
