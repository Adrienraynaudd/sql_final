CREATE TABLE If NOT EXISTS `Employes`
(
 `id_employe` INT PRIMARY KEY,
    `nom_employe` varchar(50) NOT NULL,
    `prenom` varchar(50) NOT NULL,
    `date_naissance` date NOT NULL,
    `genre` varchar(50) NOT NULL,
    `lieu_naissance` varchar(50) NOT NULL,
    `diplome` varchar(50) NOT NULL,
    `id_etablissement` int(11) NOT NULL,
    `id_responsable` int(11) NOT NULL,
    `id_poste` int(11) NOT NULL,
    `salaire` varchar(50) NOT NULL,
    `date_embauche` date NOT NULL,
    `num_tel` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `adresse` varchar(50) NOT NULL,
    `ville` varchar(50) NOT NULL,
    `pays` varchar(50) NOT NULL,
    `permis` varchar(50) NOT NULL,
)
CREATE TABLE if NOT EXISTS `Etablissements`
(
 `id_etablissement` INT PRIMARY KEY,
    `nom_etablissement` varchar(50) NOT NULL,
    `adresse` varchar(50) NOT NULL,
    `ville` varchar(50) NOT NULL,
    `pays` varchar(50) NOT NULL,
    `num_tel` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `site_web` varchar(50) NOT NULL,
    `id_responsable` int(11) NOT NULL,
    `nb_employes` int(11) NOT NULL,
)
CREATE TABLE if NOT EXISTS `Postes`
(
 `id_poste` INT PRIMARY KEY,
    `nom_poste` varchar(50) NOT NULL,
    `description` varchar(50) NOT NULL,
    `id_pole` int(11) NOT NULL,
)
CREATE TABLE if NOT EXISTS `Poles`
(
 `id_pole` INT PRIMARY KEY,
 `nom_poles` varchar(50) NOT NULL,
)