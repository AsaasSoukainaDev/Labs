DROP DATABASE IF EXISTS salle_sport;
CREATE DATABASE salle_sport CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE salle_sport;

-- TABLE : SCIENCE (classe principale)
CREATE TABLE science (
    id_science  INT AUTO_INCREMENT PRIMARY KEY,
    libelle     VARCHAR(50) NOT NULL UNIQUE,
    description TEXT
);

-- TABLE : DISCIPLINE (classification rattachée à une science)
CREATE TABLE discipline (
    id_discipline INT AUTO_INCREMENT PRIMARY KEY,
    libelle       VARCHAR(50) NOT NULL UNIQUE,
    description   TEXT,
    id_science    INT NOT NULL,
    FOREIGN KEY (id_science) REFERENCES science(id_science)
);

INSERT INTO science (libelle, description) VALUES
('Sciences du Sport', 'Sciences liées à l''activité physique'),
('Sciences Humaines', 'Sciences sociales et comportementales');

INSERT INTO discipline (libelle, description, id_science) VALUES
('Yoga',        'Discipline relaxante',       1),
('Musculation', 'Renforcement musculaire',    1),
('Cardio',      'Exercices cardiovasculaires',1);