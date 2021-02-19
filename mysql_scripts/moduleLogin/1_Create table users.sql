create table users (

id INT primary key auto_increment,
user VARCHAR(50),
password VARCHAR(400),
name VARCHAR(400),
role_id INT,
created_at DATETIME,
updated_at DATETIME

)
