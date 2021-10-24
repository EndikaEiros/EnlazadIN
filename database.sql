
CREATE TABLE usuarios (
  Nombre varchar(20) NOT NULL,
  Apellidos varchar(20) NOT NULL,
  Email varchar(40) PRIMARY KEY,
  DNI varchar(10) UNIQUE,
  Telefono int(9) UNIQUE,
  Fecha_nacimiento varchar(10) NOT NULL,
  Contrasena varchar(20) NOT NULL

);

CREATE TABLE comentarios (
  ID int(4) PRIMARY KEY,
  NRECEP varchar(20) NOT NULL,
  ARECEP varchar(20) NOT NULL,
  ERECEP varchar(40) NOT NULL,
  Telefono int(9) NOT NULL,
  MSG varchar(8000) NOT NULL,
  EMISOR varchar(40) NOT NULL
);


INSERT INTO usuarios VALUES  ('Endika','Eiros','endika.eiros@gmail.com','79008225-M',671024023,'2000/03/06','dinosaurio');
INSERT INTO usuarios VALUES  ('Iker','Valcarcel','ikervalcarcel@gmail.com','92639771-A',123456789,'2001/05/14','seguridad');
INSERT INTO usuarios VALUES  ('test1','test1','test1@gmail.com','42918286-X', 429182866,'2001/05/14','seguridad');


INSERT INTO comentarios VALUES  (0000,'test1','test1','test1@gmail.com',429182866,'Eres muy pesado, no me importa tu vida ','ikervalcarcel@gmail.com');
INSERT INTO comentarios VALUES  (0001,'Endika','Eiros','endika.eiros@gmail.com',671024023,'Se pone  a hacer cosas extra cuando las obligatorias no estan erminadas','ikervalcarcel@gmail.com');

COMMIT;