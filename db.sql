CREATE DATABASE CLIENTS;
USE CLIENTS;
CREATE TABLE admin(
id_admin INT NOT NULL UNIQUE, 
email VARCHAR(20),
username varchar(20),
password varchar(20) NOT NULL,
PRIMARY KEY(id_admin)
);

CREATE TABLE PRODUITS(
code_prod INT NOT NULL UNIQUE,
nom_prod varchar(30),
type_prod varchar(20),
marque varchar(15),
description_prod varchar(255),
ingredients_prod varchar(100),
PRIMARY KEY(code_prod)
);
CREATE TABLE INGREDIENTS(
id_ingredient INT NOT NULL UNIQUE,
nom_ingredient varchar(15),
PRIMARY KEY(id_ingredient)
);
CREATE TABLE ENTREPRISES_PHARMACEUTIQUE(
id_entr_pharm INT NOT NULL UNIQUE,
name VARCHAR(20),
username varchar(20),
password varchar(20) NOT NULL,
coordonnees_entre_pharm VARCHAR(30),
id_admin INT NOT NULL,
PRIMARY KEY(id_entr_pharm),
FOREIGN KEY (id_admin) REFERENCES ADMINISTRATEURS(id_admin)
);
CREATE TABLE PARTENAIRES(
id_partenaire INT NOT NULL UNIQUE,
nom_part VARCHAR(30),
username varchar(20),
password varchar(20) NOT NULL,
coordonneees VARCHAR(20),
domaine VARCHAR(20),
id_admin INT NOT NULL,
PRIMARY KEY(id_partenaire),
FOREIGN KEY (id_admin) REFERENCES ADMINISTRATEURS(id_admin)
);
CREATE TABLE FEMMES_ENCEINTE(
id_fe_en INT NOT NULL UNIQUE,
nom_complet VARCHAR(30),
username varchar(20),
password varchar(20) NOT NULL,
poids_fe FLOAT NOT NULL,
tension_arterielle FLOAT NOT NULL,
niveau_de_fer FLOAT NOT NULL,
date_accouchement DATETIME,
glycemie FLOAT NOT NULL,
date_debut_grossesse DATE,
allergies varchar(50),
preferences varchar(127),
antecedents_medicaux varchar(255),
PRIMARY KEY(id_fe_en)
);
CREATE TABLE MEDICAMENTS(
id_medic INT NOT NULL UNIQUE,
nom_medic VARCHAR(30),
description_medic VARCHAR(255),
id_entr_pharm INT NOT NULL,
PRIMARY KEY(id_medic),
FOREIGN KEY (id_entr_pharm) REFERENCES ENTREPRISES_PHARMACEUTIQUE(id_entr_pharm)
);
CREATE TABLE PROFESSIONNELS_DE_SANTE(
id_pr_sante INT NOT NULL UNIQUE,
nom_pr_sante VARCHAR(30),
username varchar(20),
password varchar(20) NOT NULL,
description_pr_sante VARCHAR(255),
specialite BOOLEAN,
id_admin INT NOT NULL,
id_fe_en INT NOT NULL,
PRIMARY KEY(id_pr_sante),
FOREIGN KEY (id_admin) REFERENCES ADMINISTRATEURS(id_admin),
FOREIGN KEY (id_fe_en) REFERENCES FEMMES_ENCEINTE(id_fe_en)
);
CREATE TABLE PUBLICATIONS(
id_pub INT NOT NULL UNIQUE,
titre_pub VARCHAR(15),
text_pub VARCHAR(600),
id_fe_en INT,
PRIMARY KEY(id_pub),
FOREIGN KEY (id_fe_en) REFERENCES FEMMES_ENCEINTE(id_fe_en)
);
CREATE TABLE COMMENTAIRES(
id_comment INT UNIQUE,
text_comment VARCHAR(100),
id_fe_en INT,
PRIMARY KEY(id_comment),
FOREIGN KEY (id_fe_en) REFERENCES FEMMES_ENCEINTE(id_fe_en)
);
CREATE TABLE SCANNER(
id_fe_en INT,
code_prod INT,
FOREIGN KEY (id_fe_en) REFERENCES FEMMES_ENCEINTE(id_fe_en),
FOREIGN KEY (code_prod) REFERENCES PRODUITS(code_prod)
);
CREATE TABLE REPAS(
id_repas INT NOT NULL UNIQUE,
nom_repas VARCHAR(15),
description VARCHAR(500),
id_fe_en INT NOT NULL,
PRIMARY KEY(id_repas),
FOREIGN KEY (id_fe_en) REFERENCES FEMMES_ENCEINTE(id_fe_en)
);
CREATE TABLE CONTENIR(
id_repas INT NOT NULL,
id_ingredient INT,
FOREIGN KEY (id_repas) REFERENCES REPAS(id_repas),
FOREIGN KEY (id_ingredient) REFERENCES INGREDIENTS(id_ingredient)
);
CREATE TABLE PROPOSER(
id_medic INT,
id_pr_sante INT,
FOREIGN KEY (id_medic) REFERENCES MEDICAMENTS(id_medic),
FOREIGN KEY (id_pr_sante) REFERENCES PROFESSIONNELS_DE_SANTE(id_pr_sante)
);
CREATE TABLE RAPPORT_DE_SANTE(
id_rapp INT NOT NULL UNIQUE,
type_de_maladid VARCHAR(10),
description_rapp VARCHAR(600),
id_pr_sante INT NOT NULL,
id_fe_en INT NOT NULL,
PRIMARY KEY(id_rapp),
FOREIGN KEY (id_pr_sante) REFERENCES PROFESSIONNELS_DE_SANTE(id_pr_sante),
FOREIGN KEY (id_fe_en) REFERENCES FEMMES_ENCEINTE(id_fe_en)
);
