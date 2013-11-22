# Yh utbildning

## Skapa databas

När jag skapar denna databas öppnar jag upp mysqls command line verktyg med
`mysql -uroot`. Detta kan dock skilja sig beroende på operativsystem och
användaruppgifter. Nedanstående ska även gå att göra i tex phpmyadmin och
mysql workbench

````sql
/**
 * Skapa databas
 */
CREATE DATABASE myPortfolioSE CHARACTER SET utf8 COLLATE utf8_swedish_ci;

/**
 * Välj databas
 */
USE myPortfolioSE;

/**
 * Skapa tabell för kategorier
 */
CREATE TABLE categories (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(64) NOT NULL
)
ENGINE=InnoDB;

/**
 * Skapa tabell för portfolio items
 */
CREATE TABLE portfolioItems (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(64) NOT NULL,
  content TEXT,
  categoryId INT(11)
)
ENGINE=InnoDB;
````

