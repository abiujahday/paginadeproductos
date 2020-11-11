drop database if exists mydb;
create database if not exists mydb;
use mydb;
create table if not exists misusuarios(
dniusuario int not null auto_increment primary key,
nombreusuario varchar(100) not null,
correousuario varchar(70) not null,
edad int not null
) engine=InnoDB;
insert into misusuarios values(7118,"Enrique Olvera","Chef Ejecutivo","24");
insert into misusuarios values(9563," Paul Bocuse","Jefe de Partida.com","37");
insert into misusuarios values(2258,"Massimo Bottura","Saucier","49");
insert into misusuarios values(1313,"Gordon Ramsay","lava platos","65");
select dniusuario,nombreusuario, correousuario,edad 
from misusuarios;