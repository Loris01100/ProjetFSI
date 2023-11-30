-- Ajouter des données à la table BilanUn
INSERT INTO BilanUn (noteEts, dateBilanUn, noteDossierUn, noteOralUn, rqBilanUn)
VALUES
    (8.5, '2023-01-15 10:30:00', 9.2, 8.8, 'Bilan réussi, bonnes compétences techniques'),
    (7.8, '2023-01-20 14:00:00', 8.0, 7.5, "Compétences en progression, besoin d'améliorer la communication"),
    (9.0, '2023-02-05 09:45:00', 9.5, 8.7, 'Excellent bilan, compétences exceptionnelles');

-- Ajouter des données à la table BilanDeux
INSERT INTO BilanDeux (noteOralDeux, noteDossierDeux, dateBilanDeux, rqBilanDeux, sujetMemoire)
VALUES
    (14.2, 13.5, '2023-05-10 13:15:00', 'BilanDeux réussi, bon travail', 'La sécurité informatique'),
    (12.8, 11.7, '2023-05-15 16:45:00', 'Améliorations nécessaires dans la gestion de projet', 'Développement durable des applications web'),
    (15.0, 14.2, '2023-06-02 11:00:00', 'BilanDeux exceptionnel, excellent mémoire', 'Intelligence artificielle dans les réseaux sociaux');

-- Ajouter des données à la table Entreprise
INSERT INTO Entreprise (nomEts, adresseEts, cpEts, villeEts)
VALUES
    ('Entreprise A', '123 Rue des Entreprises', '75001', 'Paris'),
    ('Entreprise B', '456 Avenue du Développement', '69001', 'Lyon'),
    ('Entreprise C', '789 Boulevard de la Technologie', '31000', 'Toulouse');

-- Ajouter des données à la table MaitreApp
INSERT INTO MaitreApp (nomMaitreApp, preMaitreApp, telMaitreApp, mailMaitreApp)
VALUES
    ('Dupont', 'Jean', '0123456789', 'jean.dupont@mail.com'),
    ('Martin', 'Alice', '0987654321', 'alice.martin@mail.com'),
    ('Lefevre', 'Pierre', '0123456789', 'pierre.lefevre@mail.com');

-- Ajouter des données à la table Classe
INSERT INTO Classe (nomClasse)
VALUES
    ('Classe A'),
    ('Classe B'),
    ('Classe C');

-- Ajouter des données à la table Specialisation
INSERT INTO Specialisation (nomSpe)
VALUES
    ('Informatique'),
    ('Réseaux'),
    ('Développement Web');

-- Ajouter des données à la table Utilisateur
INSERT INTO Utilisateur (identifiant, mdpUtilisateur)
VALUES
    ('utilisateur1', 'motdepasse1'),
    ('utilisateur2', 'motdepasse2'),
    ('utilisateur3', 'motdepasse3');

-- Ajouter des données à la table TuteurEcole
INSERT INTO TuteurEcole (nomTutEco, preTutEco, telTutEco, mailTutEco, privilegeTutEco, cheminPhoto, idUtilisateur)
VALUES
    ('Tuteur1', 'Ecole1', '0123456789', 'tuteur1.ecole@mail.com', 'Admin', '/photos/tuteur1.jpg', 1),
    ('Tuteur2', 'Ecole2', '0987654321', 'tuteur2.ecole@mail.com', 'Standard', '/photos/tuteur2.jpg', 2),
    ('Tuteur3', 'Ecole3', '0123456789', 'tuteur3.ecole@mail.com', 'Standard', '/photos/tuteur3.jpg', 3);

-- Ajouter des données à la table Etudiant
INSERT INTO Etudiant (nomEtu, preEtu, mailEtu, cheminPhoto, idUtilisateur, idBilanUn, idBilanDeux, numTutEco, idSpe, idClasse)
VALUES
    ('Dupont', 'Paul', 'paul.dupont@mail.com', '/photos/etudiant1.jpg', 1, 1, 1, 1, 1, 1),
    ('Martin', 'Sophie', 'sophie.martin@mail.com', '/photos/etudiant2.jpg', 2, 2, 2, 2, 2, 2),
    ('Lefevre', 'Luc', 'luc.lefevre@mail.com', '/photos/etudiant3.jpg', 3, 3, 3, 3, 3, 3);

-- Ajouter des données à la table Travail
INSERT INTO Travail (numEtu, idEts, idMaitreApp)
VALUES
    (1, 1, 1),
    (2, 2, 2),
    (3, 3, 3);