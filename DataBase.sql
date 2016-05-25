CREATE SCHEMA IF NOT EXISTS Saed;
CREATE TABLE IF NOT EXISTS Saed.Utente(
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
CREATE TABLE IF NOT EXISTS Saed.Prodotto(
	idProdotto int AUTO_INCREMENT PRIMARY KEY,
	nome varchar(30) NOT NULL UNIQUE,
	descrizione varchar(500),
	immagine varchar(500),
	prezzo decimal
);


CREATE TABLE IF NOT EXISTS Saed.Ordine(
	idOrdine int AUTO_INCREMENT PRIMARY KEY,
	Utente varchar(50) NOT NULL REFERENCES Saed.Utente.email,
	indirizzoSpedizione varchar(50);
	data datetime,
	totale decimal
);

CREATE TABLE IF NOT EXISTS Saed.Ordine_Prodotto(
	idOrdine int REFERENCES Saed.Ordine.idOrdine,
	idProdotto int REFERENCES Saed.Prodotto.idProdotto,
	quantita int,
	PRIMARY KEY(idOrdine, idProdotto)
);