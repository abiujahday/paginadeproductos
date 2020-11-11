drop database if exists loginbd;
create database if not exists loginbd;
use loginbd;
create table if not exists usuario(
usuario varchar(100) not null primary key,
correo varchar(70) not null,
password varchar(10) not null
) engine=InnoDB;
insert into usuario 
values("admin","admin@gmail.com","contraseña");

select usuario,correo, password
from usuario;