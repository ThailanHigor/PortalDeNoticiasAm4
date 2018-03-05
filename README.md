# PortalDeNoticiasAm4

tabelas:
Tabelas: CREATE TABLE usuarios ( User_ID int(11) AUTO_INCREMENT NOT NULL,
User_nome varchar(40) NOT NULL,
User_email varchar(40) NOT NULL,
User_login varchar(30) NOT NULL,
User_senha varchar(30) NOT NULL, 
User_cargo varchar(30) NOT NULL )
ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE usuarios ADD PRIMARY KEY (User_ID);

CREATE TABLE noticias ( Not_ID int(11) AUTO_INCREMENT NOT NULL,
Not_titulo varchar(20) NOT NULL, 
Not_chamada varchar(40) NOT NULL,
Not_texto text NOT NULL, 
Not_data date NOT NULL,
Not_autor varchar(30) NOT NULL )
ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE noticias ADD PRIMARY KEY (Not_ID);
