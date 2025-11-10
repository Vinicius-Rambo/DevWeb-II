/* ===========================
   TABELA: padrao_lancamento
=========================== */
CREATE TABLE padrao_lancamento (
  id INT NOT NULL,
  nome VARCHAR(100) NOT NULL
);

/* CHAVE PRIMÁRIA + AUTO_INCREMENT */
ALTER TABLE padrao_lancamento 
  ADD CONSTRAINT pk_padrao_lancamento PRIMARY KEY (id);

ALTER TABLE padrao_lancamento 
  MODIFY COLUMN id INT AUTO_INCREMENT;

/* INSERTs */
INSERT INTO padrao_lancamento (nome) VALUES
('Rolling Release'),
('LTS'),
('Semi-Rolling Release'),
('Continuous Release'),
('Fixed Release');


/* ===========================
   TABELA: pacotes_padrao
=========================== */
CREATE TABLE pacotes_padrao (
  id INT NOT NULL,
  nome VARCHAR(100) NOT NULL
);

ALTER TABLE pacotes_padrao 
  ADD CONSTRAINT pk_pacotes_padrao PRIMARY KEY (id);

ALTER TABLE pacotes_padrao 
  MODIFY COLUMN id INT AUTO_INCREMENT;

INSERT INTO pacotes_padrao (nome) VALUES
('APT'),
('DNF'),
('YUM'),
('Zypper'),
('Pacman'),
('Nix'),
('Guix'),
('Independente');


/* ===========================
   TABELA: derivados
=========================== */
CREATE TABLE derivados (
  id INT NOT NULL,
  nome VARCHAR(100) NOT NULL
);

ALTER TABLE derivados 
  ADD CONSTRAINT pk_derivados PRIMARY KEY (id);

ALTER TABLE derivados 
  MODIFY COLUMN id INT AUTO_INCREMENT;

INSERT INTO derivados (nome) VALUES
('Debian'),
('Ubuntu'),
('Arch Linux'),
('Fedora'),
('openSUSE'),
('Independente'),
('RHEL');


/* ===========================
   TABELA: sistemas
=========================== */
CREATE TABLE sistemas (
  id INT NOT NULL,
  nome VARCHAR(100) NOT NULL,
  desenvolvedora VARCHAR(100) NOT NULL,
  versao VARCHAR(50) NOT NULL,
  id_padrao_lancamento INT NOT NULL,
  id_pacotes_padrao INT NOT NULL,
  id_derivado INT NOT NULL
);

ALTER TABLE sistemas 
  ADD CONSTRAINT pk_sistemas PRIMARY KEY (id);

ALTER TABLE sistemas 
  MODIFY COLUMN id INT AUTO_INCREMENT;

/* CHAVES ESTRANGEIRAS */
ALTER TABLE sistemas 
  ADD CONSTRAINT fk_padrao_lancamento FOREIGN KEY (id_padrao_lancamento) REFERENCES padrao_lancamento (id),
  ADD CONSTRAINT fk_pacotes_padrao FOREIGN KEY (id_pacotes_padrao) REFERENCES pacotes_padrao (id),
  ADD CONSTRAINT fk_derivado FOREIGN KEY (id_derivado) REFERENCES derivados (id);
