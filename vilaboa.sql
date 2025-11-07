CREATE DATABASE farmacia_vilaboa;
USE farmacia_vilaboa;

CREATE TABLE materiais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    unidade VARCHAR(20) NOT NULL,
    estoque_atual INT NOT NULL DEFAULT 0,
    preco DECIMAL(10,2) NOT NULL DEFAULT 0.00
);
INSERT INTO materiais (nome, unidade, estoque_atual, preco) VALUES
('Dipirona', 'ml', 50, 3.50),
('Soro Fisiológico', 'L', 20, 12.00),
('Seringa 5ml', 'un', 100, 1.25);
