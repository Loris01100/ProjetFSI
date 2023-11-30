CREATE TABLE BilanUn(
                        idBilanUn int auto_increment,
                        noteEts DECIMAL(4,2),
                        dateBilanUn DATETIME,
                        noteDossierUn DECIMAL(4,2),
                        noteOralUn DECIMAL(4,2),
                        rqBilanUn VARCHAR(500),
                        CONSTRAINT bilanun_PK PRIMARY KEY(idBilanUn)
)
    ENGINE INNODB;

CREATE TABLE BilanDeux(
                          idBilanDeux int auto_increment,
                          noteOralDeux DECIMAL(4,2),
                          noteDossierDeux DECIMAL(4,2),
                          dateBilanDeux DATETIME,
                          rqBilanDeux VARCHAR(500),
                          sujetMemoire VARCHAR(500),
                          CONSTRAINT bilandeux_PK PRIMARY KEY(idBilanDeux)
)ENGINE INNODB;

CREATE TABLE Entreprise(
                           idEts int auto_increment,
                           nomEts VARCHAR(50),
                           adresseEts VARCHAR(100),
                           cpEts VARCHAR(5),
                           villeEts VARCHAR(50),
                           CONSTRAINT entreprise_PK PRIMARY KEY(idEts)
)ENGINE INNODB;

CREATE TABLE MaitreApp(
                          idMaitreApp int auto_increment,
                          nomMaitreApp VARCHAR(50),
                          preMaitreApp VARCHAR(50),
                          telMaitreApp VARCHAR(10),
                          mailMaitreApp VARCHAR(50),
                          CONSTRAINT maitreapp_PK PRIMARY KEY(idMaitreApp)
)ENGINE INNODB;

CREATE TABLE Classe(
                       idClasse int auto_increment,
                       nomClasse VARCHAR(50),
                       CONSTRAINT classe_PK PRIMARY KEY(idClasse)
)ENGINE INNODB;

CREATE TABLE Specialisation(
                               idSpe int auto_increment,
                               nomSpe VARCHAR(50),
                               CONSTRAINT specialisation_PK PRIMARY KEY(idSpe)
)ENGINE INNODB;

CREATE TABLE Utilisateur(
                            idUtilisateur int auto_increment,
                            identifiant VARCHAR(50),
                            mdpUtilisateur VARCHAR(100),
                            CONSTRAINT utilisateur_PK PRIMARY KEY(idUtilisateur)
)ENGINE INNODB;

CREATE TABLE TuteurEcole(
                            numTutEco int auto_increment,
                            nomTutEco VARCHAR(50),
                            preTutEco VARCHAR(50),
                            telTutEco VARCHAR(10),
                            mailTutEco VARCHAR(50),
                            privilegeTutEco VARCHAR(30),
                            cheminPhoto VARCHAR(255),
                            idUtilisateur int,
                            CONSTRAINT tuteurecole_PK PRIMARY KEY(numTutEco),
                            CONSTRAINT tuteurecole_utilisateur_FK FOREIGN KEY(idUtilisateur) REFERENCES Utilisateur(idUtilisateur)
)ENGINE INNODB;

CREATE TABLE Etudiant(
                         numEtu int auto_increment,
                         nomEtu VARCHAR(50),
                         preEtu VARCHAR(50),
                         mailEtu VARCHAR(50),
                         cheminPhoto VARCHAR(255),
                         idUtilisateur int,
                         idBilanUn int,
                         idBilanDeux int,
                         numTutEco int,
                         idSpe int,
                         idClasse int,
                         CONSTRAINT etudiant_PK PRIMARY KEY(numEtu),
                         CONSTRAINT etudiant_utilisateur_FK FOREIGN KEY(idUtilisateur) REFERENCES Utilisateur(idUtilisateur),
                         CONSTRAINT etudiant_bilanun_FK FOREIGN KEY(idBilanUn) REFERENCES BilanUn(idBilanUn),
                         CONSTRAINT etudiant_bilandeux_FK FOREIGN KEY(idBilanDeux) REFERENCES BilanDeux(idBilanDeux),
                         CONSTRAINT etudiant_tuteurecole_FK FOREIGN KEY(numTutEco) REFERENCES TuteurEcole(numTutEco),
                         CONSTRAINT etudiant_specialisation_FK FOREIGN KEY(idSpe) REFERENCES Specialisation(idSpe),
                         CONSTRAINT etudiant_classe_FK FOREIGN KEY(idClasse) REFERENCES Classe(idClasse)
)ENGINE INNODB;

CREATE TABLE Travail(
                        numEtu int,
                        idEts int,
                        idMaitreApp int,
                        CONSTRAINT travail_PK PRIMARY KEY(numEtu, idEts, idMaitreApp),
                        CONSTRAINT travail_etudiant_FK FOREIGN KEY(numEtu) REFERENCES Etudiant(numEtu),
                        CONSTRAINT travail_entreprise_FK FOREIGN KEY(idEts) REFERENCES Entreprise(idEts),
                        CONSTRAINT travail_maitreapp_FK FOREIGN KEY(idMaitreApp) REFERENCES MaitreApp(idMaitreApp)
)ENGINE INNODB;