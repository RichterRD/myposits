create table roles (
id INT primary key auto_increment,
role_name VARCHAR(20),
enabled BIT,
created_at DATETIME,
updated_at DATETIME
)


insert into roles(role_name,enabled,created_at,updated_at) 
values ('admin',1,now(),now());

insert into roles(role_name,enabled,created_at,updated_at) 
values ('user',1,now(),now());
