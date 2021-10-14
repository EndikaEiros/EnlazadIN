
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE 'usuarios' {
  'Nombre' varchar(20) NOT NULL,
  'Apellidos' varchar(20) NOT NULL,
  'Email' varchar(40) NOT NULL,
  'DNI' int(8) NOT NULL,
  'Telefono' int(8) NOT NULL,
  'Fecha_nacimiento' varchar(20) NOT NULL,
  'Contraseña' varchar(20) NOT NULL,

  PRIMARY KEY ('Email')
  UNIQUE ('DNI','Teléfono') 

}


INSERT INTO `usuarios` ('Nombre','Apellidos','Email','DNI','Telefono','Fecha_nacimiento','Contraseña') VALUES

('Endika','Eiros','endika.eiros@gmail.com',79008225,'2000/03/06'),
('Iker','Valcarcer','ikervalcarcel@gmail.com',12345678,'2001/05/14');
