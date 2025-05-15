
-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS lasucre;
USE lasucre;

-- Criação da tabela `doces`
CREATE TABLE IF NOT EXISTS doces (
    doce_cod INT AUTO_INCREMENT PRIMARY KEY,
    doce_nome VARCHAR(100) NOT NULL,
    doce_descricao TEXT,
    doce_url_img VARCHAR(255)
);
