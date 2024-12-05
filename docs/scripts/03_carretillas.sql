CREATE TABLE `carretilla` (
    `usercod` BIGINT(10) NOT NULL,
    `productId` int(11) NOT NULL,
    `productName` varchar(255) NOT NULL,
    `crrctd` INT(5) NOT NULL,
    `crrprc` DECIMAL(12, 2) NOT NULL,
    `crrfching` DATETIME NOT NULL,
    PRIMARY KEY (`usercod`, `productId`),
    INDEX `productId_idx` (`productId` ASC),
    CONSTRAINT `carretilla_user_key` FOREIGN KEY (`usercod`) REFERENCES `usuario` (`usercod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `carretilla_prd_key` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `pagos` (
    `pagoId` INT AUTO_INCREMENT PRIMARY KEY,
    `usercod` BIGINT(10) NOT NULL,
    `total` DECIMAL(12, 2) NOT NULL,
    `metodoPago` VARCHAR(255) NOT NULL,
    `estado` VARCHAR(50) NOT NULL,
    `fechaPago` DATETIME NOT NULL,
    CONSTRAINT `pagos_user_key` FOREIGN KEY (`usercod`) REFERENCES `usuario` (`usercod`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `carretillaanon` (
    `anoncod` varchar(128) NOT NULL,
    `productId` bigint(18) NOT NULL,
    `crrctd` int(5) NOT NULL,
    `crrprc` decimal(12, 2) NOT NULL,
    `crrfching` datetime NOT NULL,
    PRIMARY KEY (`anoncod`, `productId`),
    KEY `productId_idx` (`productId`),
    CONSTRAINT `carretillaanon_prd_key` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE NO ACTION ON UPDATE NO ACTION
);