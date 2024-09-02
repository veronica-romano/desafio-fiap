CREATE DATABASE desafio_fiap;

USE desafio_fiap;

DELIMITER //
CREATE TABLE aluno (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL UNIQUE,
    nascimento DATE NOT NULL,
    usuario VARCHAR(100) UNIQUE,
    CHECK (LENGTH(nome) >= 3)
);
//
CREATE TABLE turma (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    tipo ENUM('on', 'pos', 'nano', 'free') NOT NULL
);
//
CREATE TABLE matricula (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aluno_id INT NOT NULL,
    turma_id INT NOT NULL,
    FOREIGN KEY (aluno_id) REFERENCES aluno(id),
    FOREIGN KEY (turma_id) REFERENCES turma(id),
    UNIQUE (aluno_id, turma_id)
);

//

CREATE TRIGGER before_insert_aluno
BEFORE INSERT ON aluno
FOR EACH ROW
BEGIN
    SET NEW.usuario = CONCAT(
        LOWER(SUBSTRING_INDEX(NEW.nome, ' ', 1)), 
        '-', 
        (SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES 
         WHERE TABLE_SCHEMA = DATABASE() 
         AND TABLE_NAME = 'aluno')
    );
END
//
CREATE TRIGGER before_update_aluno
BEFORE UPDATE ON aluno
FOR EACH ROW
BEGIN
    IF NEW.nome != OLD.nome THEN
        SET NEW.usuario = CONCAT(
            LOWER(SUBSTRING_INDEX(NEW.nome, ' ', 1)), 
            '-', 
            NEW.id
        );
    END IF;
END//

DELIMITER ;

INSERT INTO aluno (nome, nascimento) VALUES ('Alice Souza', '2005-01-15');
INSERT INTO aluno (nome, nascimento) VALUES ('Bruno Lima', '2004-03-22');
INSERT INTO aluno (nome, nascimento) VALUES ('Carla Mendes', '2003-07-30');
INSERT INTO aluno (nome, nascimento) VALUES ('Diego Silva', '2005-09-10');
INSERT INTO aluno (nome, nascimento) VALUES ('Elena Martins', '2004-11-25');
INSERT INTO aluno (nome, nascimento) VALUES ('Felipe Castro', '2003-06-18');
INSERT INTO aluno (nome, nascimento) VALUES ('Gabriela Nunes', '2005-02-27');
INSERT INTO aluno (nome, nascimento) VALUES ('Henrique Alves', '2004-04-14');
INSERT INTO aluno (nome, nascimento) VALUES ('Isabela Pereira', '2003-08-05');
INSERT INTO aluno (nome, nascimento) VALUES ('Joao Fernandes', '2005-12-10');
INSERT INTO aluno (nome, nascimento) VALUES ('Karen Rocha', '2004-10-22');
INSERT INTO aluno (nome, nascimento) VALUES ('Leonardo Costa', '2003-02-01');
INSERT INTO aluno (nome, nascimento) VALUES ('Mariana Oliveira', '2005-06-15');
INSERT INTO aluno (nome, nascimento) VALUES ('Nicolas Ferreira', '2004-01-30');
INSERT INTO aluno (nome, nascimento) VALUES ('Olivia Ribeiro', '2003-09-20');
INSERT INTO aluno (nome, nascimento) VALUES ('Pedro Santos', '2005-05-25');
INSERT INTO aluno (nome, nascimento) VALUES ('Raquel Almeida', '2004-12-07');
INSERT INTO aluno (nome, nascimento) VALUES ('Samuel Araújo', '2003-03-19');
INSERT INTO aluno (nome, nascimento) VALUES ('Tatiana Gomes', '2005-08-12');
INSERT INTO aluno (nome, nascimento) VALUES ('Victor Barbosa', '2004-07-03');


INSERT INTO turma (nome, descricao, tipo) VALUES
('Desenvolvimento Web', 'Curso de criação sites', 'on'),
('Data Science', 'Ciência de dados avançada', 'pos'),
('Redes de Computadores', 'Fundamentos de redes', 'nano'),
('Cibersegurança', 'Segurança da informação', 'free'),
('Inteligência Artificial', 'IA para iniciantes', 'on'),
('Desenvolvimento Mobile', 'Aplicativos para Android', 'pos'),
('Cloud Computing', 'Computação em nuvem', 'nano'),
('Machine Learning', 'Aprendizado de máquina', 'free'),
('Programação em Python', 'Linguagem de programação Python', 'on'),
('Banco de Dados', 'Gerenciamento de dados', 'pos'),
('DevOps', 'Integração contínua e entrega', 'nano'),
('Análise de Dados', 'Ferramentas de análise', 'free'),
('Desenvolvimento de Games', 'Criação de jogos digitais', 'on'),
('Internet das Coisas', 'Dispositivos IoT inteligentes', 'pos'),
('Design de Interfaces', 'Experiência do usuário', 'nano'),
('Robótica', 'Automação com robôs', 'free'),
('Big Data', 'Processamento de grandes volumes', 'on'),
('Engenharia de Software', 'Princípios de engenharia', 'pos'),
('Realidade Virtual', 'Ambientes virtuais imersivos', 'nano'),
('Blockchain', 'Tecnologia de registros distribuídos', 'free');


INSERT INTO matricula (aluno_id, turma_id) VALUES (1, 1);
INSERT INTO matricula (aluno_id, turma_id) VALUES (1, 2);
INSERT INTO matricula (aluno_id, turma_id) VALUES (2, 3);
INSERT INTO matricula (aluno_id, turma_id) VALUES (2, 4);
INSERT INTO matricula (aluno_id, turma_id) VALUES (3, 5);
INSERT INTO matricula (aluno_id, turma_id) VALUES (3, 6);
INSERT INTO matricula (aluno_id, turma_id) VALUES (4, 7);
INSERT INTO matricula (aluno_id, turma_id) VALUES (4, 8);
INSERT INTO matricula (aluno_id, turma_id) VALUES (5, 9);
INSERT INTO matricula (aluno_id, turma_id) VALUES (5, 10);
INSERT INTO matricula (aluno_id, turma_id) VALUES (6, 11);
INSERT INTO matricula (aluno_id, turma_id) VALUES (6, 12);
INSERT INTO matricula (aluno_id, turma_id) VALUES (7, 13);
INSERT INTO matricula (aluno_id, turma_id) VALUES (7, 14);
INSERT INTO matricula (aluno_id, turma_id) VALUES (8, 15);
INSERT INTO matricula (aluno_id, turma_id) VALUES (8, 16);
INSERT INTO matricula (aluno_id, turma_id) VALUES (9, 17);
INSERT INTO matricula (aluno_id, turma_id) VALUES (9, 18);
INSERT INTO matricula (aluno_id, turma_id) VALUES (10, 19);
INSERT INTO matricula (aluno_id, turma_id) VALUES (10, 20);