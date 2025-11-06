/*
Modelo de base de dados inicial para a implementação do CRUD Sistemas Operacionais
*/

CREATE TABLE padrao_lancamento (
  id_lancamento INT AUTO_INCREMENT NOT NULL,
  padrao_lancamento VARCHAR(100) NOT NULL,
  CONSTRAINT pk_padrao_lancamento PRIMARY KEY (id_lancamento)
);

CREATE TABLE pacotes_padrao (
  id_padrao INT AUTO_INCREMENT NOT NULL,
  pacotes_padrao VARCHAR(100) NOT NULL,
  CONSTRAINT pk_pacotes_padrao PRIMARY KEY (id_padrao)
);

CREATE TABLE derivados (
  id_derivados INT AUTO_INCREMENT NOT NULL,
  derivados VARCHAR(100) NOT NULL,
  CONSTRAINT pk_derivados PRIMARY KEY (id_derivados)
);

CREATE TABLE sistemas (
  id_sistemas INT AUTO_INCREMENT NOT NULL,
  nome VARCHAR(100) NOT NULL,
  desenvolvedora VARCHAR(100) NOT NULL,
  versao VARCHAR(50) NOT NULL,
  padrao_lancamento INT NOT NULL,
  pacotes_padrao INT NOT NULL,
  derivados INT NOT NULL,
  CONSTRAINT pk_sistemas PRIMARY KEY (id_sistemas),
  CONSTRAINT fk_padrao_lancamento FOREIGN KEY (padrao_lancamento) REFERENCES padrao_lancamento (id_lancamento),
  CONSTRAINT fk_pacotes_padrao FOREIGN KEY (pacotes_padrao) REFERENCES pacotes_padrao (id_padrao),
  CONSTRAINT fk_derivados FOREIGN KEY (derivados) REFERENCES derivados (id_derivados)
);



INSERT INTO pacotes_padrao (pacotes_padrao) VALUES 
('APT'),
('DNF'),
('YUM'),
('Zypper'),
('Pacman'),
('Nix'),
('Guix');

INSERT INTO derivados (derivados) VALUES 
('Debian'),
('Ubuntu'),
('Arch Linux'),
('Fedora'),
('openSUSE'),
('Independente'),
('RHEL');

INSERT INTO padrao_lancamento (padrao_lancamento) VALUES 
('Rolling Release'),
('LTS'),
('Semi-Rolling Release'),
('Continuous Release'),
('Fixed Release');
