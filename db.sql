create database cloudi;
use cloudi;
create table persona(
rut varchar(11)not null,
nombre varchar(50),
apellidos varchar(50),
fecha_nac date,
correo varchar(20),
primary key(rut)
);

create table usuario(
usuario varchar(20)not null,
contrasena varchar(20)not null,
rut varchar(11)not null,
primary key(usuario),
foreign key(rut) references persona(rut)
);

create table archivo(
id int auto_increment,
nombre varchar(100),
tipo varchar(20),
peso int,
fecha_subida date,
ruta varchar(100),
primary key(id)
);
