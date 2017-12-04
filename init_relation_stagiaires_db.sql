/* Ce document est placé sous la licence Creative Commons CC-BY-SA.
 * Auteurs : Maxence Le Doré, Rémi Cordelet
 */

/* DROP USER gestrel; */
/* DROP DATABASE Relation_stagiaires; */

CREATE USER IF NOT EXISTS 'gestrel'@'localhost' IDENTIFIED BY 'HappyAFPA2017';
ALTER USER 'gestrel'@'localhost' PASSWORD EXPIRE NEVER;

CREATE DATABASE IF NOT EXISTS Relation_stagiaires;

/* set global max_connections = 10; */

USE Relation_stagiaires;
CREATE TABLE IF NOT EXISTS Fiche_contacts (
id              INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,

media_connaissance_manif VARCHAR(64),

/* coordonées */

nom             VARCHAR(128) NOT NULL,
prenom          VARCHAR(128),
date_naissance  VARCHAR(10),
lieu_naissance  VARCHAR(128),
nationalite     VARCHAR(32),
tel_fix         VARCHAR(16),
tel_mobile      VARCHAR(16),
email           VARCHAR(64),
adresse_voie    VARCHAR(128),
adresse_ville   VARCHAR(64),
adresse_cp      VARCHAR(5),
diplome_classe  VARCHAR(64),

/* situation */

status_actif    VARCHAR(256), /* enum Demandeur d'emploi, CSP, Salarié public, privé  */
contrat_salarie VARCHAR(3), /* enum CDI, CDD */
identifiant_pe  VARCHAR(8),

anciens_salaries_situ_5ans   BOOLEAN,
anciens_salaries_situ_12mois BOOLEAN,
anciens_interim_situ_18mois  BOOLEAN, /* totalise 1600h sur 18mois */

structure_accompagnement     VARCHAR(512), /* PE, Mission Locale, Cap Emploi ...  */
accompagnement_referent_nom  VARCHAR(128),
accompagnement_referent_mail VARCHAR(64),
accompagnement_referent_tel  VARCHAR(16),

/* projet */

secteur_ou_metier_cible VARCHAR(128),
formation_cible_nom     VARCHAR(128),
formation_cible_lieu    VARCHAR(128),

/* commentaires */

commentaires VARCHAR(2048),

/* suite donnée (réservé administration) */

saisie_brique BOOLEAN,
suivi         VARCHAR(2048),

date_envoi_form TIMESTAMP
) CHARACTER SET=utf8;

ALTER TABLE Fiche_contacts AUTO_INCREMENT = 200;

/* grant select,insert,delete,update on Relation_stagiaires.Fiche_contacts to 'gestrel'@'localhost'; */
grant select,insert on Relation_stagiaires.Fiche_contacts to 'gestrel'@'localhost';
/* GRANT ALL PRIVILEGES ON Relation_stagiaires.* TO 'gestrel'@'localhost'; */
