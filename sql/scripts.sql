-- dbName = products_crud_php_mvc

CREATE TABLE users(
	id INT PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(75) NOT NULL UNIQUE,
  password VARCHAR(75) NOT NULL
);

CREATE TABLE products(		
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  name VARCHAR(200) NOT NULL,
  price DECIMAL(17,2),
  userId INT NOT NULL,
  FOREIGN KEY (userId) REFERENCES users(id)
);