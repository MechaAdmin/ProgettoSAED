CREATE SCHEMA Saed;
CREATE TABLE Saed.Utente(
	idUtente int AUTO_INCREMENT PRIMARY KEY,
	email varchar(50) NOT NULL UNIQUE,
	password varchar(30) NOT NULL,
	nome varchar(30),
	cognome varchar(30),
	indirizzo varchar(50),
	citta varchar(50),
	cap varchar(5),
	superuser boolean
);
CREATE TABLE Saed.Prodotto(
	idProdotto int AUTO_INCREMENT PRIMARY KEY,
	nome varchar(30) NOT NULL UNIQUE,
	descrizione varchar(500),
	immagine varchar(500),
	prezzo decimal
);


CREATE TABLE Saed.Ordine(
	idOrdine int AUTO_INCREMENT PRIMARY KEY,
	Utente varchar(50) NOT NULL REFERENCES Saed.Utente.email,
	indirizzoSpedizione varchar(50);
	data datetime,
	totale decimal
);

CREATE TABLE Saed.Ordine_Prodotto(
	idOrdine int REFERENCES Saed.Ordine.idOrdine,
	idProdotto int REFERENCES Saed.Prodotto.idProdotto,
	quantita int,
	PRIMARY KEY(idOrdine, idProdotto)
);