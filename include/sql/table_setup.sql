DROP TABLE IF EXISTS Entries;
DROP TABLE IF EXISTS Transactions;
DROP TABLE IF EXISTS Accounts;
DROP TABLE IF EXISTS AccountTypes;
DROP TABLE IF EXISTS Owners;

CREATE TABLE Owners (
	id INTEGER(11) UNSIGNED AUTO_INCREMENT,
	name VARCHAR(255),
	PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE AccountTypes (
	id INTEGER(11) UNSIGNED AUTO_INCREMENT,
	title VARCHAR(255),
	PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE Accounts (
	id INTEGER(11) UNSIGNED AUTO_INCREMENT,
	title VARCHAR(255),
	owner INTEGER(11) UNSIGNED,
	PRIMARY KEY (id),
	FOREIGN KEY (owner) REFERENCES Owners (id) -- Set to Null for no owner (everybody owns it)
) ENGINE=InnoDB;

CREATE TABLE Transactions (
	id INTEGER(11) UNSIGNED AUTO_INCREMENT,
	event_date TIMESTAMP,
	description VARCHAR(255),
	PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE Entries (
	id INTEGER(11) UNSIGNED AUTO_INCREMENT,
	account1 INTEGER(11) UNSIGNED,
	account2 INTEGER(11) UNSIGNED,
	num INTEGER(11) UNSIGNED
	debit DECIMAL(13, 2),
	credit DECIMAL(13, 2),
	transaction_id INTEGER(11) UNSIGNED,
	PRIMARY KEY (id),
	FOREIGN KEY (transaction_id) REFERENCES Transactions (id)
) ENGINE=InnoDB;

INSERT INTO AccountTypes (title) VALUES
("Equity"),
("Liability"),
("Expense"),
("Income"),
("Asset");