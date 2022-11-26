create database inventarios;

-- --------------------creacion de las tablas de login-----------------------
create table usuarios  (
    idusuario numeric(3) primary key not null,
    usuario varchar(30) not null,
    contraseña varchar(50) not null,
    nombre varchar(50),
    apellido varchar(50),
    administrador numeric(1) not null
);

insert into usuarios (idusuario, usuario, contraseña, nombre, apellido, administrador) values (1,'admin','admin',"usuario","administrador",1 ); 
insert into usuarios (idusuario, usuario, contraseña, nombre, apellido, administrador) values (2,'irays','admin',"Irays","Araiza",1 ); 
insert into usuarios (idusuario, usuario, contraseña, nombre, apellido, administrador) values (3,'Sol','admin',"Marisol","estrada" ,1 ); 
insert into usuarios (idusuario, usuario, contraseña, nombre, apellido, administrador) values (4,'Mario','admin',"Mario","Garcia" ,1 ); 

-- --------------------creacion de las tablas de herramientas-----------------------

create table herramientas (
    idHerramienta numeric (4)primary key not null,
    herramienta varchar(40) not null,
    cantidad numeric(4) default 0,
    max  numeric(4) default 1
);

insert into herramientas (idHerramienta, herramienta, cantidad, max) values (1,"careta",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (2,"guantes anticorte",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (3,"guantes japoneses",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (4,"mandil de cuero",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (5,"zapato de seguridad",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (6,"mangas de mezclilla",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (7,"casco",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (8,"mascarilla respiratoria",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (9,"porta dectoro",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (10,"pulidor",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (11,"lona antichispa",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (12,"cortadora",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (13,"maquina de soldar",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (14,"Estuche de medición",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (15,"cepillo",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (16,"soplete",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (17,"pasta para soldar",1, 2);
insert into herramientas (idHerramienta, herramienta, cantidad, max) values (18,"Láser",1, 2); 

-- --------------------creacion de los alumnos-----------------------

create table carreras (
    idCarrera numeric (2)primary key not null,
    carrera varchar(40) not null 
);

insert into carreras (idCarrera, carrera) values (1, 'Produccion');
insert into carreras (idCarrera, carrera) values (2, 'Almacen');  

create table alumnos (
    numControl varchar (10)primary key not null,
    Carrera numeric (2) not null, 
    nombres varchar(40) not null, 
    apellidos varchar(40) not null,
    DeudoresSiNo numeric (1) not null
);

insert into alumnos (numControl, carrera, nombres, apellidos, DeudoresSiNo) values ('1a-aa', 1,'David','Gil',0);
insert into alumnos (numControl, carrera, nombres, apellidos, DeudoresSiNo) values ('2b-bb', 1,'Constance','Nouvelle',0);
insert into alumnos (numControl, carrera, nombres, apellidos, DeudoresSiNo) values ('3c-cc', 2,'Barry','Allen',0);
insert into alumnos (numControl, carrera, nombres, apellidos, DeudoresSiNo) values ('4d-dd', 2,'Phoenix','Wright',0);

-- ---------------------tabla de prestamos -------------------------------
CREATE TABLE `prestamos` (
  `idPrestamo` integer(5) NOT NULL,
  `numControl` varchar(10) NOT NULL,
  `idHerramienta` decimal(4,0) NOT NULL,
  `cantidad` decimal(4,0) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idusuario` decimal(3,0) NOT NULL,
  `status` decimal(1,0) NOT NULL,
  PRIMARY KEY (`idPrestamo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE inventarios.prestamos MODIFY COLUMN idPrestamo int(5) auto_increment NOT NULL;


select al.numControl, concat(al.nombres, " ", al.apellidos) as alumno, h.herramienta, p.fecha, concat(u.nombre, " ", u.apellido) as prestamista  
from prestamos p 
join alumnos al on p.numControl = al.numControl 
join herramientas h on p.idHerramienta  = h.idHerramienta
join usuarios u on p.idusuario = u.idusuario; 