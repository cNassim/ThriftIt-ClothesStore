#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client(
        Id_Client      Int  Auto_increment  NOT NULL ,
        Nom_Client     Varchar (50) NOT NULL ,
        Prenom_Client  Varchar (50) NOT NULL ,
        Email_Client   Varchar (50) NOT NULL ,
        Adresse_Client Varchar (50) NOT NULL
	,CONSTRAINT Client_PK PRIMARY KEY (Id_Client)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Article
#------------------------------------------------------------

CREATE TABLE Article(
        Id_Article      Int  Auto_increment  NOT NULL ,
        Nom_Article     Varchar (50) NOT NULL ,
        Prix_Article    DECIMAL (15,3)  NOT NULL ,
        Taille_Article  Varchar (50) NOT NULL ,
        Couleur_Article Varchar (50) NOT NULL
	,CONSTRAINT Article_PK PRIMARY KEY (Id_Article)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Lieu_Stock
#------------------------------------------------------------

CREATE TABLE Lieu_Stock(
        Id_Stock          Int  Auto_increment  NOT NULL ,
        Emplacement_Stock Varchar (50) NOT NULL
	,CONSTRAINT Lieu_Stock_PK PRIMARY KEY (Id_Stock)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Livreur
#------------------------------------------------------------

CREATE TABLE Livreur(
        Id_livreur  Int  Auto_increment  NOT NULL ,
        Nom_livreur Varchar (50) NOT NULL
	,CONSTRAINT Livreur_PK PRIMARY KEY (Id_livreur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Methode de paiemennt
#------------------------------------------------------------

CREATE TABLE Methode_de_paiemennt(
        id_MethodePaiement Int  Auto_increment  NOT NULL ,
        Methode_paiement   Varchar (50) NOT NULL
	,CONSTRAINT Methode_de_paiemennt_PK PRIMARY KEY (id_MethodePaiement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Stocker
#------------------------------------------------------------

CREATE TABLE Stocker(
        Id_Stock         Int NOT NULL ,
        Id_Article       Int NOT NULL ,
        Quantite_stockee Int NOT NULL
	,CONSTRAINT Stocker_PK PRIMARY KEY (Id_Stock,Id_Article)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commande
#------------------------------------------------------------

CREATE TABLE Commande(
        Id_Commande     Int  Auto_increment  NOT NULL ,
        Date_Commande   Date NOT NULL ,
        Statut_Commande Varchar (50) NOT NULL ,
        Id_Client       Int NOT NULL ,
        Id_Livraison    Int NOT NULL ,
        Id_Facture      Int NOT NULL
	,CONSTRAINT Commande_PK PRIMARY KEY (Id_Commande)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Livraison
#------------------------------------------------------------

CREATE TABLE Livraison(
        Id_Livraison      Int  Auto_increment  NOT NULL ,
        Adresse_Livraison Varchar (50) NOT NULL ,
        Date_Livraison    Date NOT NULL ,
        Statut_Livraison  Varchar (50) NOT NULL ,
        Id_Commande       Int NOT NULL ,
        Id_livreur        Int NOT NULL
	,CONSTRAINT Livraison_PK PRIMARY KEY (Id_Livraison)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Facture
#------------------------------------------------------------

CREATE TABLE Facture(
        Id_Facture         Int  Auto_increment  NOT NULL ,
        Date_Facture       Date NOT NULL ,
        Statut_Facture     Varchar (50) NOT NULL ,
        Id_Commande        Int NOT NULL ,
        id_MethodePaiement Int NOT NULL
	,CONSTRAINT Facture_PK PRIMARY KEY (Id_Facture)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contenir
#------------------------------------------------------------

CREATE TABLE Contenir(
        Id_Article         Int NOT NULL ,
        Id_Commande        Int NOT NULL ,
        Quantite_commandee Int NOT NULL
	,CONSTRAINT Contenir_PK PRIMARY KEY (Id_Article,Id_Commande)
)ENGINE=InnoDB;




ALTER TABLE Stocker
	ADD CONSTRAINT Stocker_Lieu_Stock0_FK
	FOREIGN KEY (Id_Stock)
	REFERENCES Lieu_Stock(Id_Stock);

ALTER TABLE Stocker
	ADD CONSTRAINT Stocker_Article1_FK
	FOREIGN KEY (Id_Article)
	REFERENCES Article(Id_Article);

ALTER TABLE Commande
	ADD CONSTRAINT Commande_Client0_FK
	FOREIGN KEY (Id_Client)
	REFERENCES Client(Id_Client);

ALTER TABLE Commande
	ADD CONSTRAINT Commande_Livraison1_FK
	FOREIGN KEY (Id_Livraison)
	REFERENCES Livraison(Id_Livraison);

ALTER TABLE Commande
	ADD CONSTRAINT Commande_Facture2_FK
	FOREIGN KEY (Id_Facture)
	REFERENCES Facture(Id_Facture);





	=======================================================================
	   Désolé, il faut activer cette version pour voir la suite du script ! 
	=======================================================================