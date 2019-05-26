
CREATE DATABASE bookstore ;

CREATE TABLE usuario(
	usua_idusuario SERIAL NOT NULL,
	usua_nombre VARCHAR(40) NOT NULL,
	usua_contrasenia VARCHAR(40) NOT NULL,
	usua_estatus VARCHAR(1) NOT NULL,
	usua_tipo VARCHAR(1) NOT NULL,

	CONSTRAINT pkusuario
	PRIMARY KEY(usua_idusuario)
);

CREATE TABLE cliente(
	clie_idcliente SERIAL NOT NULL,
	clie_nombre VARCHAR(40) NOT NULL,
	clie_apellidopaterno VARCHAR(40) NOT NULL,
	clie_apellidomaterno VARCHAR(40) NOT NULL,
	clie_fechanacimiento DATE NOT NULL,
	clie_telefono NUMERIC(10,0) NOT NULL
	clie_correo VARCHAR(40) NOT NULL,
	clie_contrasenia VARCHAR(40) NOT NULL,
	clie_estatus VARCHAR(1) NOT NULL,
	clie_iddireccion INTEGER NOT NULL,

	CONSTRAINT pkcliente
	PRIMARY KEY (clie_idcliente),

	CONSTRAINT fkclientedireccion
	FOREIGN KEY(clie_iddireccion)
	REFERENCES direccion(dire_iddireccion)
);

CREATE TABLE direccion(
	dire_iddireccion SERIAL NOT NULL,
	dire_estado VARCHAR(40) NOT NULL,
	dire_ciudad VARCHAR(40) NOT NULL,
	dire_calle VARCHAR(40) NOT NULL,
	dire_codigopostal CHAR(6) NOT NULL,
	dire_colonia VARCHAR(40) NOT NULL,
	dire_delegacion VARCHAR(40) NOT NULL,

	CONSTRAINT pkdireccion
	PRIMARY KEY(dire_iddireccion)
);

CREATE TABLE genero(
	gene_idgenero SERIAL NOT NULL,
	gene_nombre VARCHAR(40) NOT NULL,

	PRIMARY KEY pkgenero

);

CREATE TABLE libro(
	libr_idlibro SERIAL NOT NULL,
	libr_nombre VARCHAR(40) NOT NULL,
	libr_autor VARCHAR(40) NOT NULL,
	libr_descripcion VARCHAR(40) NOT NULL,
	libr_precio NUMERIC(6,2) NOT NULL,
	libr_estatus CHAR(1) NOT NULL,
	libr_valoracion CHAR(1) NULL
	libr_unidades NUMERIC(4,0) NOT NULL,
	libr_idgenero INTEGER NOT NULL,

	CONSTRAINT pklibro
	PRIMARY KEY (libr_idlibro),

	CONSTRAINT fklibrogenero
	FOREIGN KEY(libr_idgenero)
	REFERENCES genero(gene_idgenero)
);



CREATE TABLE pedido(
	pedi_idpedido SERIAL NOT NULL,
	pedi_total NUMERIC(5,0) NOT NULL,
	pedi_estatus CHAR(1) NOT NULL,
	pedi_fechaentrega DATE NOT NULL,
	pedi_idCliente INTEGER NOT NULL,

	CONSTRAINT pkpedido
	PRIMARY KEY (pedi_idpedido),

	CONSTRAINT fkpedidocliente
	FOREIGN KEY (pedi_idCliente)
	REFERENCES cliente(clie_idcliente)
);

CREATE TABLE pedidoXlibro(
	peli_idpedidolibro SERIAL NOT NULL,
	peli_idpedido INTEGER NOT NULL,
	peli_idlibro INTEGER NOT NULL,
	peli_cantidad NUMERIC(3,0) NOT NULL,

	CONSTRAINT pkpedidoxlibro
	PRIMARY KEY (peli_idpedidolibro),

	CONSTRAINT fkpedidoxlibropedido
	FOREIGN KEY(peli_idpedido)
	REFERENCES pedido(pedi_idpedido),

	CONSTRAINT fkpedidoxlibrolibro
	FOREIGN KEY (peli_idlibro)
	REFERENCES libro(libr_idlibro)
);

CREATE TABLE pago(
	pago_idpago SERIAL NOT NULL,
	pago_propietario VARCHAR(40) NOT NULL,
	pago_numerotarjeta CHAR(16) NOT NULL,
	pago_fechavigencia 	CHAR(4) NOT NULL,
	pago_codigoseguridad CHAR(4) NOT NULL,

	CONSTRAINT fkpago
	PRIMARY KEY(pago_idpago)
);

CREATE TABLE pagoXcliente(
	pacl_idpagocliente SERIAL NOT NULL,
	pacl_idcliente INTEGER NOT NULL,
	pacl_idpago INTEGER NOT NULL,

	CONSTRAINT pkpagoxcliente
	PRIMARY KEY (pacl_idpagocliente),

	CONSTRAINT fkpagoXclientecliente
	FOREIGN KEY (pacl_idcliente)
	REFERENCES cliente(clie_idcliente),

	CONSTRAINT pagoXclientepago
	FOREIGN KEY (pacl_idpago)
	REFERENCES pago(pago_idpago)
);
