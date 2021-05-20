drop database if exists mustapha_shop;
create database if not exists mustapha_shop character set utf8 collate "utf8_general_ci";

use mustapha_shop;

CREATE TABLE `categories` (
  `idcategorie` int(11) NOT NULL,
  `nomcategorie` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`idcategorie`, `nomcategorie`) VALUES
(1, 'Vetements'),
(2, 'Livres'),
(3, 'Informatiques');


CREATE TABLE `sous_categories` (
  `idsscategorie` int(11) NOT NULL,
  `nomsscategorie` varchar(48) NOT NULL,
  `idcategorieparent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `sous_categories` (`idsscategorie`, `nomsscategorie`, `idcategorieparent`) VALUES
(1, 'Pulls', 1),
(2, 'Chemises', 1),
(3, 'Robes', 1),
(4, 'Jupes', 1),
(5, 'Scientifique', 2),
(6, 'Science Fiction', 2),
(7, 'Horreur', 2),
(8, 'Aventure', 2),
(9, 'Cartes meres', 3),
(10, 'Processeur', 3),
(11, 'Barrettes Memoires', 3),
(12, 'Disques Durs', 3);


CREATE TABLE `produits` (
  `idArticle` int(11) NOT NULL,
  `nomArticle` varchar(64) DEFAULT NULL,
  `idSscategorie` int(11) DEFAULT NULL,
  `photoArticle` varchar(127) DEFAULT NULL,
  `descArticle` longtext,
  `prixArticle` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `produits` (`idArticle`, `nomArticle`, `idSscategorie`, `photoArticle`, `descArticle`, `prixArticle`) VALUES
(1, 'Pull à manche rasta', 1, 'img_articles/img01.jpg', '\r\nSweat-shirt broderie florale - MANGO<br>\r\nDescription:<br>\r\n\r\n    Tissu en coton, Broderie à fleurs, Fermeture à noeud aux manches, Col rond, Bords côtelés<br>\r\n\r\n<br>\r\n· Longueur sous manche. 29.0 cm<br>\r\n· Dos long 51.5 cm<br>\r\n· Ces mesures sont calculées pour une taille M.<br>\r\n<br>\r\nComposition:<br>\r\n<br>\r\n    100% cotton<br>\r\n    Rib: 97% cotton,3% elastane<br>\r\n    Embroidery: 100% polyester<br>', '19.25'),
(2, 'Pull à cotes ', 1, 'img_articles/img02.jpg', 'Détails produit<br>\r\n •  Manches longues<br>\r\n •  Col roulé<br>\r\n •  Grosse maille<br>\r\n<br>\r\nComposition et Entretien<br>\r\n •  30% laine, 70% acrylique<br>\r\n •  Température de lavage 30° cycle délicat<br>\r\n •  Pas de nettoyage à sec / pas de blanchiments<br>\r\n •  Séchage à plat<br>\r\n •  Ne pas repasser<br>\r\n<br>\r\nCouleurs<br>\r\n    Bordeaux, Blanc Cassé, Bleu Marine<br>\r\nTailles<br>\r\n    S, M, L, XL, 2XL <br>', '24.20'),
(3, 'Pull coeur croise', 1, 'img_articles/img03.jpg', 'Pull esprit marinière, fil teint, 10% laine - ANNE WEYBURN<br>\r\nLe pull esprit marinière, fil teint. Encolure V, patte de boutonnage avec petits boutons, esprit nacre ton sur ton. Emmanchures diminuées. Manches longues. Rayures raccordées.<br>\r\n<br>\r\n\r\nComposition & détails :<br>\r\nMatière : Maille 66% acrylique, 24% polyamide, 10% laine.<br>\r\nLongueur 62 cm.<br>\r\nMarque : Anne Weyburn<br>\r\n<br>\r\nEntretien :<br>\r\nLavage en machine à 30° modéré, sur envers.<br>\r\nRepassage à température moyenne, sur envers.<br>\r\n<br>\r\nCouleurs<br>\r\n    Marine Rayé Écru, Bordeaux Rayé Écru<br>\r\nTailles<br>\r\n    38/40, 42/44, 46/48, 50/52 <br>', '19.85'),
(4, 'Pull irlandais', 1, 'img_articles/img04.jpg', '\r\nPull col roulé, laine - Collections<br>\r\n-Détails produit<br>\r\n •  Manches longues<br>\r\n •  Col roulé<br>\r\n •  Grosse maille<br>\r\n<br>\r\nComposition et Entretien<br>\r\n •  25% laine, 67% acrylique, 8% alpaga<br>\r\n •  Pour l entretien, merci de vous référer aux indications figurant sur l étiquette du produit<br>\r\n<br>\r\nCouleurs<br>\r\n    Beige Chiné, Rose<br>\r\nTailles<br>\r\n    S, M, L, XL, 2XL <br>', '32.50'),
(5, 'Pull gris fiesta', 1, 'img_articles/img05.jpg', '\r\nPull haut ajouré, 100% laine - Collections<br>\r\n-Détails produit<br>\r\n •  Manches longues<br>\r\n •  Col rond<br>\r\n •  Fine maille<br>\r\n<br>\r\nComposition et Entretien<br>\r\n •  100% laine mérinos<br>\r\n •  Lavage à la main<br>\r\n •  Pas de nettoyage à sec / pas de blanchiments<br>\r\n •  Séchage à plat<br>\r\n •  Température de repassage faible<br>\r\n<br>\r\n\r\nCouleurs<br>\r\n    Noir, Ivoire, Rouge<br>\r\nTailles<br>\r\n    S, M, L, XL, 2XL <br>', '29.95'),
(7, 'juppe plisée', 4, 'img_articles/img10.jpg', '\r\nJupe plissée dorée - MANGO<br>\r\nDescription:<br>\r\n\r\n    Belle jupe pour la fête<br>\r\n\r\n<br>\r\n· Hauteur 33 cm<br>\r\n· Tailles S, M, L<br>\r\n· Ces mesures sont calculées pour une taille M.<br>\r\n<br>\r\nComposition:<br>\r\n<br>\r\n    100% cotton<br>\r\n    Rib: 97% cotton,3% elastane<br>', '19.25'),
(8, 'Jupe Bureau', 4, 'img_articles/img11.jpg', 'Détails produit<br>\r\n •  Jupes classique<br>\r\n\r\n<br>\r\nComposition et Entretien<br>\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta, quia vero! Dolore quo a voluptatem. Maiores nobis fuga omnis tempora dolore possimus, accusamus eius at.\r\n<br>\r\nCouleurs<br>\r\n    Bordeaux, Blanc Cassé, Bleu Marine<br>\r\nTailles<br>\r\n    S, M, L, XL, 2XL <br>', '24.20'),
(9, 'Jupe Cuir', 4, 'img_articles/img12.jpg', 'Jupe en cuir rouge - ANNE WEYBURN<br>\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta, quia vero! Dolore quo a voluptatem. Maiores nobis fuga omnis tempora dolore possimus, accusamus eius at.<br>\r\n<br>\r\n\r\nComposition & détails :<br>\r\nMatière : peau de mouton.<br>\r\nLongueur 55 cm.<br>\r\nMarque : Anne Weyburn<br>\r\n<br>\r\nEntretien :<br>\r\nlavage à sec\r\n<br>\r\nCouleurs<br>\r\n    Rouge, Marine Rayé Écru, Bordeaux Rayé Écru<br>\r\nTailles<br>\r\n    38/40, 42/44, 46/48, 50/52 <br>', '19.85'),
(10, 'Le cycle des robot - Isaac Asimov', 6, 'img_articles/img31.jpg', '			Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, cum! Ipsa quos placeat impedit incidunt architecto, deserunt molestias consequuntur. Exercitationem voluptatem neque odit harum cum?\r\n				<br>\r\n				Earum molestiae officiis quis beatae? Error, recusandae voluptates reprehenderit animi perspiciatis nemo eaque minima. Ducimus illo ullam laboriosam! Possimus, temporibus vero expedita voluptatum quasi recusandae.\r\n				<br>\r\n				Vero quo totam tempora dolorem! Cum commodi perspiciatis ratione illum laboriosam atque accusamus culpa fugit impedit cumque repudiandae exercitationem aliquam natus distinctio sit, inventore dicta.\r\n				<br>', '32.50'),
(11, 'Dune de Frank Herbert', 6, 'img_articles/img32.jpg', '			Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, cum! Ipsa quos placeat impedit incidunt architecto, deserunt molestias consequuntur. Exercitationem voluptatem neque odit harum cum?\r\n				<br>\r\n				Earum molestiae officiis quis beatae? Error, recusandae voluptates reprehenderit animi perspiciatis nemo eaque minima. Ducimus illo ullam laboriosam! Possimus, temporibus vero expedita voluptatum quasi recusandae.\r\n				<br>\r\n				Vero quo totam tempora dolorem! Cum commodi perspiciatis ratione illum laboriosam atque accusamus culpa fugit impedit cumque repudiandae exercitationem aliquam natus distinctio sit, inventore dicta.\r\n				<br>', '29.95'),
(12, 'Anatomie de l horreur - Stephen King', 7, 'img_articles/img41.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, cum! Ipsa quos placeat impedit incidunt architecto, deserunt molestias consequuntur. Exercitationem voluptatem neque odit harum cum?\r\n<br>Earum molestiae officiis quis beatae? Error, recusandae voluptates reprehenderit animi perspiciatis nemo eaque minima. Ducimus illo ullam laboriosam! Possimus, temporibus vero expedita voluptatum quasi recusandae.\r\n<br>\r\nVero quo totam tempora dolorem! Cum commodi perspiciatis ratione illum laboriosam atque accusamus culpa fugit impedit cumque repudiandae exercitationem aliquam natus distinctio sit, inventore dicta.<br>', '19.25'),
(13, 'Chair de poule', 7, 'img_articles/img42.jpg', '	Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n	<br>\r\n	Assumenda veniam illum quidem quae possimus ipsam itaque.\r\n	<br>\r\n	Quis quisquam, quam eveniet laboriosam voluptatibus incidunt pariatur!\r\n	<br>\r\n	Exercitationem commodi dignissimos labore laboriosam officia possimus harum.\r\n	<br>\r\n	Maxime fuga ab laudantium quaerat magnam numquam odit?\r\n	<br>\r\n	Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n	<br>\r\n	Assumenda veniam illum quidem quae possimus ipsam itaque.\r\n	<br>\r\n	Quis quisquam, quam eveniet laboriosam voluptatibus incidunt pariatur!\r\n	<br>\r\n	Exercitationem commodi dignissimos labore laboriosam officia possimus harum.\r\n	<br>\r\n	Maxime fuga ab laudantium quaerat magnam numquam odit?\r\n	<br>', '24.20');


-- --------------------------------------------------------

CREATE TABLE `utilisateurs` (
  `iduser` int(11) NOT NULL,
  `nomuser` varchar(48) NOT NULL,
  `prenomuser` varchar(48) NOT NULL,
  `emailuser` varchar(48) NOT NULL,
  `validuser` varchar(1) NOT NULL DEFAULT 'N',
  `lastlogin` datetime NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `adresse` varchar(128) DEFAULT NULL,
  `cpostal` varchar(5) DEFAULT NULL,
  `ville` varchar(36) DEFAULT NULL,
  `telephone` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `categories`
  ADD PRIMARY KEY (`idcategorie`);

ALTER TABLE `produits`
  ADD PRIMARY KEY (`idArticle`),
  ADD UNIQUE KEY `nomArticle_UNIQUE` (`nomArticle`);


ALTER TABLE `sous_categories`
  ADD PRIMARY KEY (`idsscategorie`);


ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `emailuser` (`emailuser`);


ALTER TABLE `categories`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `produits`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;


ALTER TABLE `sous_categories`
  MODIFY `idsscategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `utilisateurs`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;

