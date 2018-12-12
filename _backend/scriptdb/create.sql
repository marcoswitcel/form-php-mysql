CREATE DATABASE testedb;

CREATE TABLE contato (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(254) NOT NULL, /* emails podem ter ate 254 char */
    numero INT, /* numero e endereco so vao ser obrigatorios no endpoint */
    endereco VARCHAR(70)
);