-- Génération de 20 enregistrements pour BilanUn avec des dates entre septembre 2023 et décembre 2023
INSERT INTO BilanUn (noteEts, dateBilanUn, noteDossierUn, noteOralUn, rqBilanUn)
VALUES
    (NULL, '2023-09-01 08:00:00', 16.2, 14.8, 'Remarques pour le Bilan 1'),
    (NULL, '2023-09-15 09:30:00', 18.5, 15.5, 'Remarques pour le Bilan 2'),
    (NULL, '2023-10-01 10:15:00', 16.8, 13.5, 'Remarques pour le Bilan 3'),
    (NULL, '2023-10-15 11:45:00', 15.0, 17.2, 'Remarques pour le Bilan 4'),
    (NULL, '2023-11-01 12:30:00', 17.5, 16.0, 'Remarques pour le bilan 5'),
    (NULL, '2023-11-15 13:15:00', NULL, NULL, NULL),
    (NULL, '2023-11-30 14:30:00', NULL, NULL, NULL),
    (NULL, '2023-12-10 15:45:00', NULL, NULL, NULL),
    (NULL, '2023-12-25 16:30:00', NULL, NULL, NULL),
    (17.3, '2023-12-05 17:45:00', 16.0, 18.2, 'Remarques pour le Bilan 10'),
    (18.1, '2023-12-20 18:30:00', 18.5, 15.7, 'Remarques pour le Bilan 11'),
    (15.6, '2023-12-05 19:15:00', 16.3, 14.0, 'Remarques pour le Bilan 12'),
    (17.8, '2023-12-20 20:30:00', 15.7, 17.5, 'Remarques pour le Bilan 13'),
    (16.4, '2023-12-04 21:45:00', 17.0, 15.8, 'Remarques pour le Bilan 14'),
    (18.0, '2023-12-19 22:00:00', 16.8, 17.2, 'Remarques pour le Bilan 15'),
    (15.2, '2023-12-04 23:15:00', 14.5, 16.0, 'Remarques pour le Bilan 16'),
    (17.2, '2023-12-19 23:30:00', 15.8, 17.5, 'Remarques pour le Bilan 17'),
    (16.5, '2023-12-05 00:45:00', 17.3, 16.0, 'Remarques pour le Bilan 18'),
    (18.5, '2023-12-20 01:00:00', 16.0, 18.2, 'Remarques pour le Bilan 19'),
    (16.7, '2023-12-05 02:15:00', 17.5, 16.8, 'Remarques pour le Bilan 20');


-- Génération de 20 enregistrements pour BilanDeux
INSERT INTO BilanDeux (noteOralDeux, noteDossierDeux, dateBilanDeux, rqBilanDeux, sujetMemoire)
VALUES
    (NULL, NULL, '2024-06-01 10:45:00', NULL, NULL),
    (NULL, NULL, '2024-06-01 11:15:00', NULL, NULL),
    (NULL, NULL, '2024-06-01 12:30:00', NULL, NULL),
    (NULL, NULL, '2024-06-01 14:00:00', NULL, NULL),
    (NULL, NULL, '2024-06-01 15:30:00', NULL, NULL),
    (NULL, NULL, '2024-06-01 17:00:00', NULL, NULL),
    (NULL, NULL, '2024-06-01 18:30:00', NULL, NULL),
    (NULL, NULL, '2024-06-01 20:00:00', NULL, NULL),
    (NULL, NULL, '2024-06-01 21:30:00', NULL, NULL),
    (NULL, NULL, '2024-06-01 23:00:00', NULL, NULL),
    (NULL, NULL, '2024-06-02 00:30:00', NULL, NULL),
    (NULL, NULL, '2024-06-02 02:00:00', NULL, NULL),
    (NULL, NULL, '2024-06-02 03:30:00', NULL, NULL),
    (NULL, NULL, '2024-06-02 05:00:00', NULL, NULL),
    (NULL, NULL, '2024-06-02 06:30:00', NULL, NULL),
    (NULL, NULL, '2024-06-02 08:00:00', NULL, NULL),
    (NULL, NULL, '2024-06-02 09:30:00', NULL, NULL),
    (NULL, NULL, '2024-06-02 11:00:00', NULL, NULL),
    (NULL, NULL, '2024-06-02 12:30:00', NULL, NULL),
    (NULL, NULL, '2024-06-02 14:00:00', NULL, NULL);


-- Insertion de données dans la table Entreprise
INSERT INTO Entreprise (nomEts, adresseEts, cpEts, villeEts)
VALUES
    ('Entreprise A', 'Adresse A', '12345', 'Ville A'),
    ('Entreprise B', 'Adresse B', '23456', 'Ville B'),
    ('Entreprise C', 'Adresse C', '34567', 'Ville C'),
    ('Entreprise D', 'Adresse D', '45678', 'Ville D');

-- Insertion de données dans la table MaitreApp
INSERT INTO MaitreApp (nomMaitreApp, preMaitreApp, telMaitreApp, mailMaitreApp)
VALUES
    ('Maitre A', 'Apprentissage A', '1234567890', 'maitreA@apprentissage.com'),
    ('Maitre B', 'Apprentissage B', '2345678901', 'maitreB@apprentissage.com'),
    ('Maitre C', 'Apprentissage C', '3456789012', 'maitreC@apprentissage.com'),
    ('Maitre D', 'Apprentissage D', '4567890123', 'maitreD@apprentissage.com');

-- Insertion de données dans la table Classe
INSERT INTO Classe (nomClasse)
VALUES
    ('Classe A'),
    ('Classe B'),
    ('Classe C');

-- Insertion de données dans la table Specialisation
INSERT INTO Specialisation (nomSpe)
VALUES
    ('Cybersécurité'),
    ('Réseaux'),
    ('Développement');

-- Insertion de données dans la table Utilisateur
INSERT INTO Utilisateur (identifiant, mdpUtilisateur)
VALUES
    ('utilisateur1', 'motdepasse1'),
    ('utilisateur2', 'motdepasse2'),
    ('utilisateur3', 'motdepasse3'),
    ('utilisateur4', 'motdepasse4'),
    ('utilisateur5', 'motdepasse5');

-- Insertion de données dans la table TuteurEcole
INSERT INTO TuteurEcole (nomTutEco, preTutEco, telTutEco, mailTutEco, privilegeTutEco, cheminPhoto, idUtilisateur)
VALUES
    ('Tuteur1', 'Ecole1', '1234567890', 'tuteur1@ecole.com', 'PrivilegeCommun', '/chemin/photo1.jpg', 1),
    ('Tuteur2', 'Ecole2', '2345678901', 'tuteur2@ecole.com', 'PrivilegeCommun', '/chemin/photo2.jpg', 2),
    ('Tuteur3', 'Ecole3', '3456789012', 'tuteur3@ecole.com', 'PrivilegeCommun', '/chemin/photo3.jpg', 3),
    ('Tuteur4', 'Ecole4', '4567890123', 'tuteur4@ecole.com', 'PrivilegeCommun', '/chemin/photo4.jpg', 4),
    ('Tuteur5', 'Ecole5', '5678901234', 'tuteur5@ecole.com', 'PrivilegeDifferent', '/chemin/photo5.jpg', 5);

-- Insertion de données dans la table Utilisateur pour les étudiants
INSERT INTO Utilisateur (identifiant, mdpUtilisateur)
VALUES
    ('Etudiant1', 'motdepasse1'),
    ('Etudiant2', 'motdepasse2'),
    ('Etudiant3', 'motdepasse3'),
    ('Etudiant4', 'motdepasse4'),
    ('Etudiant5', 'motdepasse5'),
    ('Etudiant6', 'motdepasse6'),
    ('Etudiant7', 'motdepasse7'),
    ('Etudiant8', 'motdepasse8'),
    ('Etudiant9', 'motdepasse9'),
    ('Etudiant10', 'motdepasse10'),
    ('Etudiant11', 'motdepasse11'),
    ('Etudiant12', 'motdepasse12'),
    ('Etudiant13', 'motdepasse13'),
    ('Etudiant14', 'motdepasse14'),
    ('Etudiant15', 'motdepasse15'),
    ('Etudiant16', 'motdepasse16'),
    ('Etudiant17', 'motdepasse17'),
    ('Etudiant18', 'motdepasse18'),
    ('Etudiant19', 'motdepasse19'),
    ('Etudiant20', 'motdepasse20'),
    ('Etudiant21', 'motdepasse21'),
    ('Etudiant22', 'motdepasse22'),
    ('Etudiant23', 'motdepasse23'),
    ('Etudiant24', 'motdepasse24'),
    ('Etudiant25', 'motdepasse25'),
    ('Etudiant26', 'motdepasse26'),
    ('Etudiant27', 'motdepasse27'),
    ('Etudiant28', 'motdepasse28'),
    ('Etudiant29', 'motdepasse29'),
    ('Etudiant30', 'motdepasse30');


-- Insertion de données dans la table Etudiant
INSERT INTO Etudiant (nomEtu, preEtu, mailEtu, cheminPhoto, idUtilisateur, idBilanUn, idBilanDeux, numTutEco, idSpe, idClasse)
VALUES
    -- 5 étudiants sans bilan et sans entreprise
    ('Etudiant1', 'SansBilanSansEntreprise1', 'etudiant1@sansbilan.com', '/chemin/photo1.jpg', 6, NULL, NULL, 1, 1, 1),
    ('Etudiant2', 'SansBilanSansEntreprise2', 'etudiant2@sansbilan.com', '/chemin/photo2.jpg', 7, NULL, NULL, 2, 2, 2),
    ('Etudiant3', 'SansBilanSansEntreprise3', 'etudiant3@sansbilan.com', '/chemin/photo3.jpg', 8, NULL, NULL, 3, 3, 3),
    ('Etudiant4', 'SansBilanSansEntreprise4', 'etudiant4@sansbilan.com', '/chemin/photo4.jpg', 9, NULL, NULL, 4, 1, 1),
    ('Etudiant5', 'SansBilanSansEntreprise5', 'etudiant5@sansbilan.com', '/chemin/photo5.jpg', 10, NULL, NULL, 5, 2, 2),

    -- 5 étudiants avec entreprise sans bilan
    ('Etudiant6', 'AvecEntrepriseSansBilan6', 'etudiant6@avecentreprise.com', '/chemin/photo6.jpg', 11, NULL, NULL, 1, 1, 3),
    ('Etudiant7', 'AvecEntrepriseSansBilan7', 'etudiant7@avecentreprise.com', '/chemin/photo7.jpg', 12, NULL, NULL, 2, 2, 1),
    ('Etudiant8', 'AvecEntrepriseSansBilan8', 'etudiant8@avecentreprise.com', '/chemin/photo8.jpg', 13, NULL, NULL, 3, 3, 2),
    ('Etudiant9', 'AvecEntrepriseSansBilan9', 'etudiant9@avecentreprise.com', '/chemin/photo9.jpg', 14, NULL, NULL, 4, 1, 3),
    ('Etudiant10', 'AvecEntrepriseSansBilan10', 'etudiant10@avecentreprise.com', '/chemin/photo10.jpg', 15, NULL, NULL, 5, 2, 1),

    -- 5 étudiants avec bilan sans entreprise
    ('Etudiant11', 'SansEntrepriseAvecBilan11', 'etudiant11@sansentreprise.com', '/chemin/photo11.jpg', 16, 1, 1, 1, 2, 2),
    ('Etudiant12', 'SansEntrepriseAvecBilan12', 'etudiant12@sansentreprise.com', '/chemin/photo12.jpg', 17, 2, 2, 2, 3, 3),
    ('Etudiant13', 'SansEntrepriseAvecBilan13', 'etudiant13@sansentreprise.com', '/chemin/photo13.jpg', 18, 3, 3, 3, 1, 1),
    ('Etudiant14', 'SansEntrepriseAvecBilan14', 'etudiant14@sansentreprise.com', '/chemin/photo14.jpg', 19, 4, 4, 4, 2, 2),
    ('Etudiant15', 'SansEntrepriseAvecBilan15', 'etudiant15@sansentreprise.com', '/chemin/photo15.jpg', 20, 5, 5, 5, 3, 3),

    -- 15 étudiants avec bilan et avec entreprise
    ('Etudiant16', 'AvecEntrepriseAvecBilan16', 'etudiant16@avecentreprise.com', '/chemin/photo16.jpg', 21, 6, 6, 4, 3, 3),
    ('Etudiant17', 'AvecEntrepriseAvecBilan17', 'etudiant17@avecentreprise.com', '/chemin/photo17.jpg', 22, 7, 7, 2, 1, 1),
    ('Etudiant18', 'AvecEntrepriseAvecBilan18', 'etudiant18@avecentreprise.com', '/chemin/photo18.jpg', 23, 8, 8, 3, 2, 2),
    ('Etudiant19', 'AvecEntrepriseAvecBilan19', 'etudiant19@avecentreprise.com', '/chemin/photo19.jpg', 24, 9, 9, 1, 3, 3),
    ('Etudiant20', 'AvecEntrepriseAvecBilan20', 'etudiant20@avecentreprise.com', '/chemin/photo20.jpg', 25, 10, 10, 2, 1, 1),
    ('Etudiant21', 'AvecEntrepriseAvecBilan21', 'etudiant21@avecentreprise.com', '/chemin/photo21.jpg', 26, 11, 11, 3, 2, 2),
    ('Etudiant22', 'AvecEntrepriseAvecBilan22', 'etudiant22@avecentreprise.com', '/chemin/photo22.jpg', 27, 12, 12, 1, 3, 3),
    ('Etudiant23', 'AvecEntrepriseAvecBilan23', 'etudiant23@avecentreprise.com', '/chemin/photo23.jpg', 28, 13, 13, 2, 1, 1),
    ('Etudiant24', 'AvecEntrepriseAvecBilan24', 'etudiant24@avecentreprise.com', '/chemin/photo24.jpg', 29, 14, 14, 3, 2, 2),
    ('Etudiant25', 'AvecEntrepriseAvecBilan25', 'etudiant25@avecentreprise.com', '/chemin/photo25.jpg', 30, 15, 15, 1, 3, 3),
    ('Etudiant26', 'AvecEntrepriseAvecBilan26', 'etudiant26@avecentreprise.com', '/chemin/photo26.jpg', 31, 16, 16, 2, 1, 1),
    ('Etudiant27', 'AvecEntrepriseAvecBilan27', 'etudiant27@avecentreprise.com', '/chemin/photo27.jpg', 32, 17, 17, 3, 2, 2),
    ('Etudiant28', 'AvecEntrepriseAvecBilan28', 'etudiant28@avecentreprise.com', '/chemin/photo28.jpg', 33, 18, 18, 1, 3, 3),
    ('Etudiant29', 'AvecEntrepriseAvecBilan29', 'etudiant29@avecentreprise.com', '/chemin/photo29.jpg', 34, 19, 19, 2, 1, 1),
    ('Etudiant30', 'AvecEntrepriseAvecBilan30', 'etudiant30@avecentreprise.com', '/chemin/photo30.jpg', 35, 20, 20, 3, 2, 2);

-- Insertion de données dans la table Travail
INSERT INTO Travail (numEtu, idEts, idMaitreApp)
VALUES
    -- Étudiants avec entreprise 1
    (11, 1, 1),
    (12, 1, 1),
    (13, 1, 1),
    (14, 1, 1),
    (15, 1, 1),

    -- Étudiants avec entreprise 2
    (16, 2, 2),
    (17, 2, 2),
    (18, 2, 2),
    (19, 2, 2),
    (20, 2, 2),

    -- Étudiants avec entreprise 3
    (21, 3, 3),
    (22, 3, 3),
    (23, 3, 3),
    (24, 3, 3),
    (25, 3, 3),

    -- Étudiants avec entreprise 4
    (26, 4, 4),
    (27, 4, 4),
    (28, 4, 4),
    (29, 4, 4),
    (30, 4, 4);





