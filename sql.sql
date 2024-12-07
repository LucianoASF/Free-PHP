CREATE DATABASE free;
USE free;
CREATE TABLE perfil(
    id INT PRIMARY KEY auto_increment,
    perfil varchar(20) NOT NULL
);

CREATE TABLE usuarios(
    id INT PRIMARY KEY auto_increment,
    nome varchar(60) NOT NULL,
    email varchar(60) NOT NULL UNIQUE,
    senha varchar(60) NOT NULL,
    perfil_id INT NOT NULL,
    FOREIGN KEY (perfil_id) REFERENCES perfil(id));

CREATE TABLE pedidos_de_software(
    id INT PRIMARY KEY auto_increment,
    titulo varchar(45) NOT NULL,
    descricao varchar(255) NOT NULL,
    data DATE NOT null,
    cliente_id INT NOT NULL,
    desenvolvedor_id INT,
    FOREIGN KEY (cliente_id) REFERENCES usuarios(id),
    FOREIGN KEY (desenvolvedor_id) REFERENCES usuarios(id));

CREATE TABLE candidata(
    usuario_id INT NOT NULL,
    pedidos_de_software_id INT NOT NULL,
    data_candidatura DATE NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (pedidos_de_software_id) REFERENCES pedidos_de_software(id),
    PRIMARY KEY(usuario_id, pedidos_de_software_id));
    
INSERT INTO perfil(id, perfil) VALUES
(1, "Desenvolvedor"),
(2, "Cliente");