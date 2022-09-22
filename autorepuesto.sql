create database autorepuesto;

create table Servicio(
  ServicioID int not null primary key AUTO_INCREMENT,
  NombreServicio varchar(100) not null,
  Descripcion varchar(200),
  Precio decimal(6,2) not null
);

insert into Servicio(NombreServicio, Descripcion, Precio)
values ("Cambio del Cristal Delantero", "", 3500.00),
("Cambio del Cristal Trasero", "", 4500.00),
("Cambio del Cristal Lateral Delantero", "", 2000.00),
("Cambio del Cristal Lateral Trasero", "", 2000.00),
("Tintado semi Oscuro", "", 1800.00),
("Tintado full Oscuro", "", 3800.00)

create table Usuarios(
  UsuarioID int not null primary key AUTO_INCREMENT,
  Nombre varchar(50) not null,
  Apellido varchar(50) not null,
  Telefono varchar(50),
  NombreUsuario varchar(20) not null,
  Email varchar(100),
  Password varchar(20) not null
);

insert into Usuario(Nombre, Apellido, Telefono, NombreUsuario, Email, Password)
values ("Felix", "Veras", "849-452-8882", "FelixAVeras", "fcarvajal@gmail.com", "123456"),
("Isargenys", "Contreras", "849-220-2882", "Isargenys", "isargenys@gmail.com", "123456"),
("Emmy", "Ogando", "", "Nathanael", "", "123456"),

create table Orden(
  OrdenID int not null primary key AUTO_INCREMENT,
  NombreCliente varchar(100),
  OrderItem varchar(100) not null,
  MontoTotal decimal(6,2) not null,
  FechaVenta datetime not null 
);