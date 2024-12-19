CREATE DATABASE recetas;

-- Tabla Usuarios
CREATE TABLE Usuarios (
    ID INT(11) PRIMARY KEY AUTO_INCREMENT,
    Nombre_Usuario VARCHAR(255) NOT NULL,
    Correo_Electronico VARCHAR(255) NOT NULL UNIQUE,
    Contrasena VARCHAR(255) NOT NULL
);

-- Tabla Recetas
CREATE TABLE Recetas (
    ID INT(11) PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(255) NOT NULL,
    Preparacion TEXT,
    Ingredientes TEXT,
    ID_Usuario INT(11),
    FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID)
);

-- Tabla Favoritos
CREATE TABLE Favoritos (
    ID INT(11) PRIMARY KEY AUTO_INCREMENT,
    ID_Receta INT(11),
    ID_Usuario INT(11),
    FOREIGN KEY (ID_Receta) REFERENCES Recetas(ID),
    FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID)
);

-- Tabla Votados
CREATE TABLE Votados (
    ID INT(11) PRIMARY KEY AUTO_INCREMENT,
    ID_Receta INT(11),
    ID_Usuario INT(11),
    FOREIGN KEY (ID_Receta) REFERENCES Recetas(ID),
    FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID)
);

