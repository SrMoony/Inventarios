-- --------------------creacion de las tablas de login-----------------------
create table usuarios  (
    idusuario numeric(3) primary key not null,
    usuario varchar(30) not null,
    contraseña varchar(50) not null,
    nombre varchar(50),
    apellido varchar(50),
    administrador numeric(1) not null
);

insert into usuarios (idusuario, usuario, contraseña, nombre, apellido, administrador) values (99,'admin','admin',"usuario","administrador",1 ); 
insert into usuarios (idusuario, usuario, contraseña, nombre, apellido, administrador) values (98,'Hermit','purple',"Joseph","Joestar",1 ); 
insert into usuarios (idusuario, usuario, contraseña, nombre, apellido, administrador) values (97,'Star','Platinum',"Jotaro","Kujo" ,1 ); 

