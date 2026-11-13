

classDiagram
    direction TB

    class Coach {
        - int id_coach
        - string nom
        - string prenom
        - string telephone
        - string email
        - string photo
        + getters()
    }

    class Discipline {
        - int id_discipline
        - string libelle
        - string description
        + getters()
    }

    class Seance {
        - int id_seance
        - string titre
        - date date_seance
        - time heure_debut
        - int duree_minutes
        - string niveau
        - int nb_places
        - decimal prix
        - boolean actif
        - int id_coach
        - int id_discipline
        + getters()
    }

    %% Relations (Clés étrangères)
    Coach "1" -- "0..*" Seance : anime
    Discipline "1" -- "0..*" Seance : contient