DROP TABLE IF EXISTS Categorie ;
CREATE TABLE Categorie (
	id_cat SERIAL 	PRIMARY KEY,
	lib_cat VARCHAR(100)
);

DROP TABLE IF EXISTS Produit ;
CREATE TABLE Produit (
	num_pr VARCHAR(100) PRIMARY KEY,
	id_cat INT,
	lib_pr VARCHAR(10000),
	prix_uni FLOAT,
	prix_vente FLOAT,
	prix_achat FLOAT,
	qte_stock INT, 
	CONSTRAINT fk_categorie FOREIGN KEY (id_cat) REFERENCES Categorie(id_cat) ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Personne;
CREATE TABLE Personne (
	id SERIAL PRIMARY KEY ,
	nom VARCHAR(100),
	prenom VARCHAR(100),
	email_ VARCHAR(1000),
	adr VARCHAR(1000),
	tele VARCHAR(20)
);

DROP TABLE IF EXISTS Client ;
CREATE TABLE Client (PRIMARY KEY (id))INHERITS(Personne);

DROP TABLE IF EXISTS Fournisseur ;
CREATE TABLE Fournisseur (PRIMARY KEY (id))INHERITS(Personne);

DROP TABLE IF EXISTS Admin ;
CREATE TABLE Admin (PRIMARY KEY (id))INHERITS(Personne);

DROP TABLE IF EXISTS Commande ;
CREATE TABLE Commande (
	num_com VARCHAR(50) PRIMARY KEY,
	date_com DATE,
	id_cli INT,
	CONSTRAINT fk_com_cli FOREIGN KEY (id_cli) REFERENCES Client(id) ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Contient_pr ;
CREATE TABLE Contient_pr (
	num_pr VARCHAR(100),
	num_com VARCHAR(50),
	qte_pr INT,
	PRIMARY KEY (num_pr,num_com),
	CONSTRAINT fk_com_pr FOREIGN KEY (num_com) REFERENCES Commande(num_com) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT fk_pr_com FOREIGN KEY (num_pr) REFERENCES Produit(num_pr) ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Approvisionnement ;
CREATE TABLE Approvisionnement (
	num_app VARCHAR(50) PRIMARY KEY,
	date_app DATE,
	id_four INT,
	CONSTRAINT fk_four_app FOREIGN KEY (id_four) REFERENCES Fournisseur(id) ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS est_compose ;
CREATE TABLE est_compose (
	num_app VARCHAR(50),
	num_pr VARCHAR(100),
	qte_achete INT,
	PRIMARY KEY (num_app,num_pr),
	CONSTRAINT fk_app_pr FOREIGN KEY (num_app) REFERENCES Approvisionnement(num_app) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT fk_pr_app FOREIGN KEY (num_pr) REFERENCES Produit(num_pr) ON UPDATE CASCADE ON DELETE CASCADE
);