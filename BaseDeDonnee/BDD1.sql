CREATE DATABASE db_Elearning;
USE db_Elearning;

-- TABLE utlisateur --

CREATE TABLE utilisateur (
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nom VARCHAR(150) NOT NULL,
    Prenom VARCHAR(150) NOT NULL,
    Username VARCHAR(150) NOT NULL UNIQUE,
    Email VARCHAR(150) NOT NULL UNIQUE,
    MotPasse VARCHAR(150) NOT NULL,
    LeRole ENUM('Formateur','Apprenant','Admin') NOT NULL,
    Photo_Profil VARCHAR(150),
  
);

-- TABLE cours --

CREATE TABLE cours (
     id INTEGER PRIMARY KEY  NOT NULL AUTO_INCREMENT,
     Titre VARCHAR(100) NOT NULL,
     Date_Poster Date NOT NULL,
     Domaine VARCHAR(150) NOT NULL,
     Description_C VARCHAR(250) NOT NULL,
     Image_cours VARCHAR(150),
     user_id INTEGER
);

-- cle etranger ---

ALTER TABLE cours ADD CONSTRAINT FK_CoursFormateur FOREIGN KEY (user_id)
REFERENCES utilisateur(id) ON DELETE CASCADE ON UPDATE CASCADE;

-- table utilisateurs_courses cours --

CREATE TABLE utilisateurs_courses (
     cours_id INTEGER,
     user_id INTEGER 
);


-- cle etranger --

ALTER TABLE utilisateurs_courses ADD CONSTRAINT FK_cours_user FOREIGN KEY (cours_id) 
REFERENCES cours(id) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE utilisateurs_courses ADD CONSTRAINT FK_user_cours FOREIGN KEY (user_id) 
REFERENCES utilisateur(id) ON DELETE CASCADE ON UPDATE CASCADE ;

-- TABLE commentaire --

CREATE TABLE commentaire (
     id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
     text_C VARCHAR(500),
     user_id INTEGER,
     Date datetime(1),
     cours_id INTEGER
);

-- cle etrangere -- 

ALTER TABLE commentaire ADD CONSTRAINT FK_commentaireUser FOREIGN KEY (user_id)
REFERENCES utilisateur(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE commentaire ADD CONSTRAINT FK_CoursCommentaire FOREIGN KEY (cours_id)
REFERENCES cours(id) ON DELETE CASCADE ON UPDATE CASCADE;


-- Table test --
/*
CREATE TABLE test (
     id INTEGER PRIMARY KEY  NOT NULL AUTO_INCREMENT,
     Durée TIME DEFAULT(0),
     user_id INTEGER NOT NULL
);

-- cle etrangere -- 

ALTER TABLE test ADD CONSTRAINT FK_test_user FOREIGN KEY (user_id) 
REFERENCES utilisateur(id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Table utilisateurs_test --

CREATE TABLE utilisateurs_test(
     test_id INTEGER,
     user_id INTEGER,
     Note INTEGER
);

-- cle primaire -- 

ALTER TABLE utilisateurs_test ADD CONSTRAINT PK_utilisateurs_test
PRIMARY KEY (test_id,user_id);
*/
-- Table video --

CREATE TABLE video (
       id INTEGER PRIMARY KEY NOT NULL ,
       Type_v VARCHAR(15),
       Emplacement VARCHAR(150),
       cours_id INTEGER NOT NULL
);

-- cle etrangere -- 

ALTER TABLE video ADD CONSTRAINT FK_Cours_video FOREIGN KEY (cours_id) 
REFERENCES cours(id) ON DELETE CASCADE ON UPDATE CASCADE;

-- table support --

CREATE TABLE support (
      id INTEGER PRIMARY KEY NOT NULL ,
      Type_S VARCHAR(15),
      Emplacement VARCHAR(150),
      cours_id INTEGER 
);

-- cle etrangere --

ALTER TABLE support ADD CONSTRAINT FK_Cours_support FOREIGN KEY (cours_id) 
REFERENCES cours(id) ON DELETE CASCADE ON UPDATE CASCADE;



-- Structure de la table `counter`--

DROP TABLE IF EXISTS `counter`;
CREATE TABLE IF NOT EXISTS `counter` (
  `visit` int(100) NOT NULL,
  `id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `counter`
--

INSERT INTO `counter` (`visit`, `id`) VALUES
(0, 0),
(0, 1),
(0, 2),
(0, 3);
COMMIT;

-- Structure de la table `chattable`
--

DROP TABLE IF EXISTS `chattable`;
CREATE TABLE IF NOT EXISTS `chattable` (
  `username` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


- Structure de la table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `username` varchar(20) NOT NULL,
  `ui` int(10) NOT NULL,
  `performance` int(10) NOT NULL,
  `design` int(10) NOT NULL,
  `usablity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


- Structure de la table `reviewtable`
--

DROP TABLE IF EXISTS `reviewtable`;
CREATE TABLE IF NOT EXISTS `reviewtable` (
  `username` varchar(20) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



create table utilisateurs_chattable (
      id_user INTEGER NOT NULL,
                                      
        id_chatt INTEGER NOT NULL
          );

create table utilisateurs_evaluations ( 
     id_user INTEGER  NOT NULL,
     id_eva INTEGER  NOT NULL
          );