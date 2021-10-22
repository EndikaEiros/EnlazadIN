
CREATE TABLE usuarios (
  Nombre varchar(20) NOT NULL,
  Apellidos varchar(20) NOT NULL,
  Email varchar(40) PRIMARY KEY,
  DNI int(8) UNIQUE,
  Telefono int(8) UNIQUE,
  Fecha_nacimiento varchar(10) NOT NULL,
  Contrasena varchar(20) NOT NULL

);

CREATE TABLE comentarios (
  ID int(10) PRIMARY KEY,
  FECHA varchar(10) NOT NULL,
  RECEP text(40) NOT NULL,
  ALIAS varchar(20) NOT NULL,
  MSG varchar(280) NOT NULL,
  EMISOR varchar(40) NOT NULL,

  FOREIGN KEY (emisor) REFERENCES usuarios(Email)

);


INSERT INTO usuarios VALUES  ('Endika','Eiros','endika.eiros@gmail.com',79008225,671024023,'2000/03/06','dinosaurio');
INSERT INTO usuarios VALUES  ('Iker','Valcarcel','ikervalcarcel@gmail.com',12345678,123456789,'2001/05/14','seguridad');
INSERT INTO usuarios VALUES  ('juan','test1','test1@gmail.com',11111111,111111111,'2001/05/14','seguridad');


INSERT INTO comentarios VALUES  (0000000001,'2021/10/22','test1@gmail.com',11111111,111111111,'2001/05/14','seguridad');


COMMIT;