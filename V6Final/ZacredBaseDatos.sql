DROP DATABASE BD_ZACRED;
CREATE DATABASE BD_ZACRED;
USE BD_ZACRED;
CREATE TABLE TIPO_TRABAJADOR
(
id_tipo_trabajador int auto_increment,
tipo char(25),
CONSTRAINT PK_tipo_trabajador PRIMARY KEY (id_tipo_trabajador)
);
CREATE TABLE USUARIOS
(
id_usuario int auto_increment,
nombre char(50),
contraseña char(100),
A_Paterno char (50),
A_Materno char (50),
correo char(50),
telefono char(16),
CONSTRAINT PK_usuarios PRIMARY KEY (id_usuario)
);

CREATE TABLE TRABAJADORES
(
id_trabajador int auto_increment,
usuario_trabajador int,
estado_trabajador enum ('activo','desconectado'),
tipo_trabajador int,
CONSTRAINT PK_trabajadores PRIMARY KEY (id_trabajador),
CONSTRAINT FK_trabajadores_tipo FOREIGN KEY (tipo_trabajador) REFERENCES TIPO_TRABAJADOR(id_tipo_trabajador),
CONSTRAINT FK_usuario_trabajador FOREIGN KEY (usuario_trabajador) REFERENCES USUARIOS(id_usuario)
);

CREATE TABLE LOCALIDAD
(
Id_localidad int auto_increment,
nombre char (50),
CONSTRAINT PK_ciudades PRIMARY KEY (Id_localidad)
);
CREATE TABLE RANCHOS
(
id_rancho int auto_increment,
nombre char(50),
Codigo_Postal char(8),
localidad int,
CONSTRAINT PK_rancho PRIMARY KEY (id_rancho),
CONSTRAINT FK_Localidad FOREIGN KEY (localidad) REFERENCES LOCALIDAD(Id_localidad)
);
CREATE TABLE CLIENTES
(
id_cliente int auto_increment,
usuario_cliente int,
estado_cliente enum ('activo','desconectado'),
no_casa char(6),
referencias char(150),
rancho_cliente int,
calle_uno char (50),
calle_dos char(50),
CONSTRAINT PK_usuarios PRIMARY KEY (id_cliente),
CONSTRAINT FK_Rancho_Cliente FOREIGN KEY (rancho_cliente) REFERENCES RANCHOS(id_rancho),
CONSTRAINT FK_usuario_cliente FOREIGN KEY (usuario_cliente) REFERENCES USUARIOS(id_usuario)
);
CREATE TABLE PAQUETES
(
n_paquete int auto_increment,
Velocidad_down int,
Velocidad_up int,
No_user_recomendados int,
Descripcion char(100),
CONSTRAINT PK_paquete PRIMARY KEY (n_paquete)
);
CREATE TABLE MARCAS_RADIOS
(
Id_marca_rad int auto_increment,
nombre_m_rad char(50),
CONSTRAINT PK_marca_radios PRIMARY KEY (Id_marca_rad),
);
CREATE TABLE MODELOS_RADIOS
(
Id_modelo_rad int auto_increment,
nombre_m_rad char(50),
marca_radio int,
CONSTRAINT PK_modelos_radios PRIMARY KEY (Id_modelo_rad),
CONSTRAINT fk_marcas_radios FOREIGN KEY(marca_radio) REFERENCES MARCAS_RADIOS(Id_marca_rad)
);
CREATE TABLE MARCAS_ROUTER
(
Id_marca_rou int auto_increment,
nombre_m_rou char(50),
CONSTRAINT PK_marca_router PRIMARY KEY (Id_marca_rou)
);
CREATE TABLE MODELOS_ROUTER
(
Id_modelo_rou int auto_increment,
nombre_m_rou char(50),
marca_router int,
CONSTRAINT PK_modelo_router PRIMARY KEY (Id_modelo_rou),
CONSTRAINT FK_marcas_router FOREIGN KEY (marca_router) REFERENCES MARCAS_ROUTER(Id_marca_rou)
);
CREATE TABLE RADIOS
(
id_radio int auto_increment,
modelo_radio int,
serie_radio char(17),
estado_radio enum ('asignado','sin usar'),
CONSTRAINT PK_radios PRIMARY KEY (id_radio),
CONSTRAINT FK_radio_modelo FOREIGN KEY (modelo_radio) REFERENCES MODELOS_RADIOS(Id_modelo_rad)
);
CREATE TABLE ROUTER
(
id_router int auto_increment,
modelo_router int,
serie_router char(17),
estado_router enum ('asignado','sin usar'),
CONSTRAINT PK_router PRIMARY KEY (id_router),
CONSTRAINT FK_router_modelo FOREIGN KEY (modelo_router) REFERENCES MODELOS_ROUTER(Id_modelo_rou)
);
CREATE TABLE TIPO_SOLICITUDES
(
id_tipo_solicitud int auto_increment,
Nombre_solicitud char(50),
CONSTRAINT PK_TIPO_SOLICITUD PRIMARY KEY(id_tipo_solicitud)
);
CREATE TABLE SOLICITUDES
(
Reg_Solicitud int auto_increment,
F_Solicitud date,
usuario int,
tipo_solicitud int,
detalles char(150),
CONSTRAINT PK_Solicitud PRIMARY KEY (Reg_Solicitud),
CONSTRAINT FK_Solicitud_usuario FOREIGN KEY (usuario) REFERENCES USUARIOS(id_usuario),
CONSTRAINT FK_tipo_solicitud FOREIGN KEY (tipo_solicitud) REFERENCES TIPO_SOLICITUDES(id_tipo_solicitud)
);
CREATE TABLE INSTALACION
(
reg int auto_increment,
fecha_instalacion date,
radio int,
router int,
paquete int,
direccion_ip_radio char(16) default '0.0.0.0',
direccion_ip_router char(16) default '0.0.0.0',
trabajador_instalacion int,
solicitud_instalacion int,
CONSTRAINT PK_Instalacion PRIMARY KEY (reg),
CONSTRAINT FK_Solicitud_Instalacion FOREIGN KEY (solicitud_instalacion) REFERENCES SOLICITUDES(Reg_Solicitud),
CONSTRAINT FK_instalacion_radio FOREIGN KEY (radio) REFERENCES RADIOS(id_radio),
CONSTRAINT FK_instalacion_router FOREIGN KEY (router) REFERENCES  ROUTER (id_router),
CONSTRAINT FK_instalacion_paquete FOREIGN KEY (paquete) REFERENCES PAQUETES(n_paquete),
CONSTRAINT FK_instalacion_trabajador FOREIGN KEY (trabajador_instalacion) REFERENCES TRABAJADORES (id_trabajador) 
);
CREATE TABLE TIPO_REPORTE
(
id_reporte int auto_increment,
nombre_reporte char(50),
prioridad enum ('alta','media','baja'),
CONSTRAINT PK_tipo_reporte PRIMARY KEY (id_reporte)
);
CREATE TABLE REPORTE
(
reg int auto_increment,
reporte int,
fecha_solucion date,
detalles_solucion char(150),
trabajador_reporte int,
solicitud_reporte int,
CONSTRAINT PK_reporte PRIMARY KEY(reg),
CONSTRAINT FK_Solicitud_Reporte FOREIGN KEY (solicitud_reporte) REFERENCES SOLICITUDES(Reg_Solicitud),
CONSTRAINT FK_reporte_tipo_reporte FOREIGN KEY (reporte) REFERENCES TIPO_REPORTE(id_reporte),
CONSTRAINT FK_reporte_trabajador FOREIGN KEY (trabajador_reporte) REFERENCES TRABAJADORES (id_trabajador) 
); /*10 350 -20 450 -50 600*/  