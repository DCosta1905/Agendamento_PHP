CREATE TABLE accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE atendimentos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  sessions ENUM('5', '10') NOT NULL,
  price DECIMAL(10, 2)
)

CREATE TABLE consultas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente VARCHAR(255),
    atendimento VARCHAR(255),
    start DATETIME,
    end DATETIME
);

CREATE TABLE pacients(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    CPF VARCHAR(11),
    email VARCHAR(100),
    telephone_number VARCHAR(20),
    civil_state VARCHAR(50),
    address VARCHAR(255),
    date_of_birth DATE,
    queixa VARCHAR(255),
    observacao VARCHAR(255)
);