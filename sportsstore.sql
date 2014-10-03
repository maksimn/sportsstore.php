CREATE DATABASE SportsStore;

USE SportsStore;

CREATE TABLE Products
(
   ProductID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   Name VARCHAR(100) NOT NULL,
   Description VARCHAR(500) NOT NULL,
   Category VARCHAR(50) NOT NULL,
   Price DECIMAL(16,2) NOT NULL
);

INSERT INTO Products (Name, Description, Category, Price) 
   VALUES ('Kayak', 'A boat for one person', 'Watersports', CAST(275.00 AS DECIMAL(16, 2)));
INSERT INTO Products (Name, Description, Category, Price) 
   VALUES ('Lifejacket', 'Protective and fashionable', 'Watersports', CAST(48.95 AS DECIMAL(16, 2)));
INSERT INTO Products (Name, Description, Category, Price) 
   VALUES ('Soccer ball', 'FIFA-approved size and weight', 'Soccer', CAST(19.50 AS DECIMAL(16, 2)));
INSERT INTO Products (Name, Description, Category, Price) 
   VALUES ('Corner flags', 'Give your playing field a professional touch', 'Soccer', CAST(34.95 AS DECIMAL(16, 2)));
INSERT INTO Products (Name, Description, Category, Price) 
   VALUES ('Stadium', 'Flat-packed 35,000 seat stadium', 'Soccer', CAST(79500.00 AS DECIMAL(16, 2)));
INSERT INTO Products (Name, Description, Category, Price) 
   VALUES ('Thinking cap', 'Improve your brain efficiency by 75%', 'Chess', CAST(16.00 AS DECIMAL(16, 2)));
INSERT INTO Products (Name, Description, Category, Price) 
   VALUES ('Unsteady chair', 'Secretly give your opponent a disadvantage', 'Chess', CAST(29.95 AS DECIMAL(16, 2)));
INSERT INTO Products (Name, Description, Category, Price) 
   VALUES ('Human Chess Board', 'A fun game for the family', 'Chess', CAST(75.00 AS DECIMAL(16, 2)));
INSERT INTO Products (Name, Description, Category, Price) 
   VALUES ('Bling-Bling King', 'Gold-plated, diamond-studded King', 'Chess', CAST(1200.00 AS DECIMAL(16, 2)));


