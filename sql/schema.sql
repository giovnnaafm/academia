CREATE DATABASE IF NOT EXISTS academia;
USE academia;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    idade INT,
    genero ENUM('Masculino', 'Feminino', 'Outro') NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(255) NOT NULL UNIQUE,
    endereco VARCHAR(255),
    data_inicio DATE
);

CREATE TABLE treinos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    nivel ENUM('Iniciante', 'Intermediário', 'Avançado') NOT NULL,
    duracao INT,  
    tipo ENUM('Cardio', 'Força', 'Flexibilidade') NOT NULL
);

CREATE TABLE treinos_alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aluno_id INT NOT NULL,
    treino_id INT NOT NULL,
    data_atribuicao DATE NOT NULL DEFAULT CURRENT_DATE,
    status ENUM('Pendente', 'Concluído') DEFAULT 'Pendente',

    FOREIGN KEY (aluno_id) REFERENCES alunos(id) ON DELETE CASCADE,
    FOREIGN KEY (treino_id) REFERENCES treinos(id) ON DELETE CASCADE
);

INSERT INTO usuarios (nome, email, senha) VALUES ('Admin', 'admin@example.com', MD5('123456'));
