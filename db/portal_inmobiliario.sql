------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXISTS propietarios CASCADE;

CREATE TABLE propietarios
(
      id       bigserial    PRIMARY KEY
    , nombre   varchar(255) NOT NULL
    , apellido varchar(255) NOT NULL
    , dni      varchar(9)   UNIQUE -- Ricardo NOT NULL
                            CHECK (dni ~ '^[0-9]{8}[A-Z]{1}$')
    , telefono numeric(9)   NOT NULL
);

INSERT INTO propietarios (nombre,apellido,dni,telefono)
VALUES ('Juan', 'López', '54874587V', 956332211)
, ('Maria', 'Garcia', '89745879G', 622885566);

DROP TABLE IF EXISTS inmuebles CASCADE;

CREATE TABLE inmuebles(
      id                  bigserial  PRIMARY KEY
    , propietario_id      bigint     REFERENCES propietarios(id)
    , propietario_dni     varchar(9) REFERENCES propietarios(dni)
                                     CHECK (propietario_dni ~ '^[0-9]{8}[A-Z]{1}$')
    , precio              numeric(6,2) -- Ricardo (9,2)
    , numero_habitaciones integer
    , numero_banos        integer
    , caracteristicas     text
    , lavavajillas        bool
    , garaje              bool
    , trastero            bool
);

INSERT INTO inmuebles (propietario_id,propietario_dni,precio,numero_habitaciones,numero_banos,caracteristicas,lavavajillas,garaje,trastero)
     VALUES (1,'54874587V',450.50,4,2,'Un piso muy bonito',true,false,true)
          , (2,'89745879G',250.00,2,1,'Un piso regular',false,true,false);
