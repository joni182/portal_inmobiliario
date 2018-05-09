------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXISTS propietarios CASCADE;

CREATE TABLE propietarios
(
      id bigserial PRIMARY KEY
    , nombre varchar(255) NOT NULL
    , apellido varchar(255) NOT NULL
    , dni varchar(9) CHECK (dni ~ '^[0-9]{8}[A-Z]{1}$')
    , telefono NUMERIC(9) NOT NULL
);

INSERT INTO propietarios (nombre,apellido,dni,telefono)
VALUES ('Juan', 'López', '54874587V', 956332211);

--DROP TABLE IF EXISTS inmuebles CASCADE;

--CREATE TABLE inmuebles(

--);
