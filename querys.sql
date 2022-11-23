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

insert into carreras (idCarrera, carrera) values (1, 'preparatoria');
insert into carreras (idCarrera, carrera) values (2, 'administracion de empresas');
insert into carreras (idCarrera, carrera) values (3, 'Arquitectura');
insert into carreras (idCarrera, carrera) values (4, 'Ciencias de la comunicacion');
insert into carreras (idCarrera, carrera) values (5, 'Contaduria publica');
insert into carreras (idCarrera, carrera) values (6, 'Criminologia');
insert into carreras (idCarrera, carrera) values (7, 'Derecho');
insert into carreras (idCarrera, carrera) values (8, 'Negocios internacionales');
insert into carreras (idCarrera, carrera) values (9, 'Psicologia Humanista');
insert into carreras (idCarrera, carrera) values (10, 'Industrial administrador');
insert into carreras (idCarrera, carrera) values (11, 'industrial en manufactura');
insert into carreras (idCarrera, carrera) values (12, 'Industrial y de sistemas');
insert into carreras (idCarrera, carrera) values (13, 'Direccion y gestion educativa');
insert into carreras (idCarrera, carrera) values (14, 'Finanzas y negocios internacionales');
insert into carreras (idCarrera, carrera) values (15, 'Ingenieria en sistemas y optimización');
insert into carreras (idCarrera, carrera) values (16, 'Litigacion'); 

create table alumnos (
    numControl varchar (10)primary key not null,
    Carrera numeric (2) not null, 
    nombres varchar(40) not null, 
    apellidos varchar(40) not null,
    DeudoresSiNo numeric (1) not null
);

insert into alumnos (numControl, carrera, nombres, apellidos, DeudoresSiNo) values ('1a-aa', 12,'David','Gil',0);
insert into alumnos (numControl, carrera, nombres, apellidos, DeudoresSiNo) values ('2b-bb', 15,'Constance','Nouvelle',0);
insert into alumnos (numControl, carrera, nombres, apellidos, DeudoresSiNo) values ('3c-cc', 6,'Barry','Allen',0);
insert into alumnos (numControl, carrera, nombres, apellidos, DeudoresSiNo) values ('4d-dd', 16,'Phoenix','Wright',0);

-- ---------------------tabla de prestamos -------------------------------
create table prestamos (
    idPrestamo varchar (5) primary key not null,
    numControl varchar (10) not null,
    idHerramienta numeric (4) not null,
    fecha date,
    idusuario numeric(3)  not null
);

select al.numControl, concat(al.nombres, " ", al.apellidos) as alumno, h.herramienta, p.fecha, concat(u.nombre, " ", u.apellido) as prestamista  
from prestamos p 
join alumnos al on p.numControl = al.numControl 
join herramientas h on p.idHerramienta  = h.idHerramienta
join usuarios u on p.idusuario = u.idusuario; 