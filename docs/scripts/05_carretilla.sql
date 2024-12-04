CREATE TABLE `carretillaanon` (
    `anoncod` VARCHAR(128) NOT NULL,
    `productId` INT(11) NOT NULL,
    `productName` varchar(255) NOT NULL,
    `crrctd` INT(5) NOT NULL,
    `productPrice` DECIMAL(10,2) NOT NULL,
    `crrfching` DATETIME NOT NULL,
    FOREIGN KEY (`productId`) REFERENCES `products` (`productId`)
    ON DELETE NO ACTION 
    ON UPDATE NO ACTION
);
