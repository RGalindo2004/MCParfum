INSERT INTO `products` (`productName`, `productDescription`, `productPrice`, `productImgUrl`, `productStatus`) VALUES
('Azzaro Chrome', 'Azzaro Chrome es una fragancia fresca y elegante, perfecta para ocasiones especiales.', 120.50, 'img/azzaro_chrome.png', 'ACT'),
('Azzaro Wanted', 'Azzaro Wanted es un perfume con una mezcla de notas cítricas y especiadas, ideal para hombres audaces.', 150.99, 'img/azzaro_wanted.jpg', 'ACT'),
('Calvin Klein Be', 'Calvin Klein Be es una fragancia fresca y limpia, perfecta para el uso diario.', 100.00, 'img/calvin_klein_be.jpg', 'ACT'),
('Calvin Klein Eternity', 'Calvin Klein Eternity es una fragancia atemporal, con notas florales y cítricas.', 130.75, 'img/calvin_klein_eternity.jpg', 'ACT'),
('Calvin Klein Euphoria', 'Calvin Klein Euphoria es una fragancia sensual y exótica, ideal para la noche.', 140.25, 'img/calvin_klein_euphoria.jpg', 'ACT'),
('Calvin Klein One', 'Calvin Klein One es una fragancia fresca y unisex, perfecta para todos los días.', 110.99, 'img/calvin_klein_one.jpg', 'ACT'),
('Club The Nuit Dama', 'Club The Nuit Dama es una fragancia sofisticada con un toque floral y afrutado.', 160.30, 'img/club_the_nuit_dama.jpg', 'ACT'),
('Club The Nuit Iconic', 'Club The Nuit Iconic es una fragancia intensa y vibrante, pensada para el hombre moderno.', 180.00, 'img/club_the_nuit_iconic.jpg', 'ACT'),
('Club The Nuit Intense', 'Club The Nuit Intense es una fragancia audaz y misteriosa, perfecta para la noche.', 170.80, 'img/club_the_nuit_intense.jpg', 'ACT'),
('Hawas', 'Hawas es una fragancia fresca y especiada, ideal para hombres con una personalidad fuerte.', 125.00, 'img/hawas.jpg', 'ACT'),
('Hugo Boss 200ml', 'Hugo Boss 200ml es una fragancia elegante y atemporal, con notas amaderadas.', 155.99, 'img/hugo_boss_200ml.jpg', 'ACT'),
('Hugo Boss Bottled', 'Hugo Boss Bottled es una fragancia cálida y especiada, perfecta para el hombre sofisticado.', 145.60, 'img/hugo_boss_bottled.jpg', 'ACT'),
('Nautica Blue', 'Nautica Blue es una fragancia fresca con toques acuáticos y florales, ideal para el verano.', 110.10, 'img/nautica_blue.jpg', 'ACT'),
('Nautica Clasica', 'Nautica Clasica es una fragancia atemporal y fresca, perfecta para cualquier ocasión.', 120.90, 'img/nautica_clasica.jpg', 'ACT'),
('Nautica Voyage', 'Nautica Voyage es una fragancia ligera y fresca, inspirada en la brisa marina.', 135.25, 'img/nautica_voyage.jpg', 'ACT'),
('Odyssey Mandarinsky', 'Odyssey Mandarinsky es una fragancia oriental, cálida y envolvente.', 140.50, 'img/odyssey_mandarinsky.jpg', 'ACT'),
('Perfume Guess Tradicional Dama', 'Perfume Guess Tradicional Dama es una fragancia femenina y elegante, con un toque floral.', 175.00, 'img/perfume_guess_tradicional_dama.jpg', 'ACT'),
('Set Guess Tradicional Dama', 'Set Guess Tradicional Dama es un conjunto de fragancias sofisticadas y femeninas.', 250.00, 'img/set_guess_tradicional_dama.jpg', 'ACT'),
('Yara', 'Yara es una fragancia exótica y dulce, perfecta para ocasiones especiales.', 130.75, 'img/yara.jpg', 'ACT'),
('Perfume Guess Seductive Homme Blue Caballero', 'Perfume Guess Seductive Homme Blue Caballero es una fragancia fresca y sofisticada para hombres seguros.', 200.30, 'img/perfume_guess_seductive_homme_blue_caballero.jpg', 'ACT'),
('Perfume Guess Seductive Homme Red Caballero', 'Perfume Guess Seductive Homme Red Caballero es una fragancia ardiente con notas especiadas.', 190.00, 'img/perfume_guess_seductive_homme_red_caballero.jpg', 'ACT');

DELETE FROM `products`
WHERE `productName` IN ('Perfume Guess Seductive Homme Blue Caballero', 'Perfume Guess Seductive Homme Red Caballero');
--Por algún motivo no funcionan las imagenes
