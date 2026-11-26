# MVC_Template-main — gestion des disciplines

Application PHP 8 orientée objet, sans framework, organisée en contrôleur HTTP, service applicatif, entité et DAO PDO. Le frontend appelle `backend/api/api.php` en GET et POST.

Ce README recense les changements de code réalisés pour appliquer chaque principe SOLID. Les tutoriels pédagogiques avec exemples sont dans [`../Lab/`](../Lab/README.md).

## Résumé des changements par principe

### SRP — Responsabilité unique

Une classe porte une responsabilité cohérente. Le modèle métier ne gère plus la persistance et les responsabilités de l'application sont réparties entre entité, DAO, validateur, service et contrôleur.

- [`backend/models/Discipline.php`](backend/models/Discipline.php) — supprimé `require_once DisciplineDAO.php`, `extends DisciplineDAO` et l'appel au constructeur parent. La classe contient maintenant seulement les données d'une discipline, ses getters et `toArray()`. Les propriétés sont déclarées dans le constructeur PHP 8.
- [`backend/models/DisciplineDAO.php`](backend/models/DisciplineDAO.php) — devient l'adaptateur PDO. La méthode `findAll()` exécute le SELECT et hydrate des objets `Discipline`; `add()` exécute l'INSERT préparé. La connexion reste paresseuse : le constructeur accepte un PDO optionnel et `connection()` utilise `Database::getConnection()` si nécessaire.
- [`backend/services/DisciplineInputValidator.php`](backend/services/DisciplineInputValidator.php) — nouvelle classe dédiée à la validation du libellé et de la description.
- [`backend/services/DisciplineService.php`](backend/services/DisciplineService.php) — ne crée plus le modèle ni le DAO. Il coordonne les cas d'usage : valider, construire l'entité, demander son insertion, ou transformer les entités lues en tableaux de réponse.
- [`backend/controllers/DisciplineController.php`](backend/controllers/DisciplineController.php) — se charge de lire la méthode HTTP, décoder le JSON et écrire la réponse JSON avec son statut HTTP.
- [`backend/services/BaseService.php`](backend/services/BaseService.php) — supprimé : il ne contenait que la validation du libellé, désormais portée par le validateur spécifique.

### OCP — Ouvert à l'extension, fermé à la modification

Le code client peut recevoir une autre politique de validation sans être modifié.

- [`backend/contracts/InputValidatorInterface.php`](backend/contracts/InputValidatorInterface.php) — nouvelle abstraction commune avec `validate(array $input): void`.
- [`backend/services/DisciplineInputValidator.php`](backend/services/DisciplineInputValidator.php) — implémentation de validation par défaut du formulaire Discipline : libellé d'au moins quatre caractères après `trim()` et description de type chaîne.
- [`backend/services/DisciplineService.php`](backend/services/DisciplineService.php) — reçoit `InputValidatorInterface` au constructeur et appelle `validate()`. Une autre implémentation peut être fournie sans ajouter de branchement au service.
- [`../Lab/OCP/exemple.php`](../Lab/OCP/exemple.php) — montre l'injection d'une variante plus stricte dans le véritable `DisciplineService`, avec un dépôt mémoire.

### LSP — Substitution de Liskov

Une implémentation peut remplacer le contrat attendu en respectant ses entrées, sorties et effets observables.

- [`backend/contracts/DisciplineReaderInterface.php`](backend/contracts/DisciplineReaderInterface.php) — nouveau contrat de lecture; `findAll()` fournit une liste d'entités `Discipline`.
- [`backend/contracts/DisciplineWriterInterface.php`](backend/contracts/DisciplineWriterInterface.php) — nouveau contrat d'écriture; `add()` reçoit une `Discipline` et renvoie un booléen.
- [`backend/models/DisciplineDAO.php`](backend/models/DisciplineDAO.php) — implémente les deux contrats pour MySQL/PDO.
- [`backend/services/DisciplineService.php`](backend/services/DisciplineService.php) — n'exige plus le DAO concret; il consomme les contrats.
- [`../Lab/LSP/exemple.php`](../Lab/LSP/exemple.php) — remplace le DAO par `InMemoryDisciplineStore`, qui implémente les mêmes contrats et permet d'exécuter le même service sans base.

### ISP — Ségrégation des interfaces

Les clients dépendent uniquement des opérations nécessaires.

- [`backend/contracts/DisciplineReaderInterface.php`](backend/contracts/DisciplineReaderInterface.php) — expose seulement la lecture.
- [`backend/contracts/DisciplineWriterInterface.php`](backend/contracts/DisciplineWriterInterface.php) — expose seulement l'écriture.
- [`backend/models/DisciplineDAO.php`](backend/models/DisciplineDAO.php) — implémente les deux interfaces car l'adaptateur SQL actuel fournit les deux capacités.
- [`backend/services/DisciplineService.php`](backend/services/DisciplineService.php) — reçoit séparément le lecteur et l'écrivain; ils peuvent être deux objets différents.
- [`../Lab/ISP/exemple.php`](../Lab/ISP/exemple.php) — illustre un client en lecture seule et un client en écriture seule avec des implémentations séparées.

### DIP — Inversion des dépendances

La logique applicative dépend d'abstractions; les classes concrètes sont assemblées au point d'entrée.

- [`backend/services/DisciplineService.php`](backend/services/DisciplineService.php) — reçoit `DisciplineReaderInterface`, `DisciplineWriterInterface` et `InputValidatorInterface` par son constructeur. Il n'exécute plus `new Discipline()` ni `new DisciplineDAO()`.
- [`backend/controllers/DisciplineController.php`](backend/controllers/DisciplineController.php) — reçoit le service par son constructeur plutôt que de le construire lui-même.
- [`backend/api/api.php`](backend/api/api.php) — devient le point de composition : crée le DAO, le validateur, le service puis le contrôleur, et démarre le traitement HTTP.
- [`../Lab/DIP/exemple.php`](../Lab/DIP/exemple.php) — assemble le vrai service avec un dépôt en mémoire afin de démontrer l'injection sans connexion PDO.

## Inventaire complet des fichiers de code

### Fichiers ajoutés

- `backend/contracts/DisciplineReaderInterface.php`
- `backend/contracts/DisciplineWriterInterface.php`
- `backend/contracts/InputValidatorInterface.php`
- `backend/services/DisciplineInputValidator.php`

### Fichiers modifiés

- `backend/api/api.php` — composition des dépendances.
- `backend/controllers/DisciplineController.php` — dépendances injectées, validation des requêtes JSON, réponses et codes HTTP.
- `backend/models/Discipline.php` — entité dissociée du DAO.
- `backend/models/DisciplineDAO.php` — implémentation PDO des contrats de lecture et écriture.
- `backend/services/DisciplineService.php` — orchestration par interfaces injectées.

### Fichier supprimé

- `backend/services/BaseService.php` — responsabilité de validation déplacée vers `DisciplineInputValidator`.

`backend/config/Database.php`, `backend/data/database.sql`, `backend/data/Domaines.json`, `index.html` et `assets/js/app.js` n'ont pas été modifiés.

## API et changements de comportement

- **GET** `/backend/api/api.php` renvoie toujours une liste d'objets contenant `id_discipline`, `libelle` et `description`.
- **POST** `/backend/api/api.php` accepte toujours un objet JSON tel que `{"libelle":"Cardio","description":"Endurance"}` et renvoie en cas de succès `{ "success": true, "message": "Discipline ajoutée avec succès" }`.
- Un corps JSON absent ou invalide, un libellé trop court ou une description de mauvais type renvoie HTTP 400 avec `success: false` et `message`.
- Une méthode HTTP non prise en charge renvoie HTTP 405.
- Une erreur interne est journalisée côté serveur et renvoie HTTP 500 avec un message générique; les détails SQL ne sont plus envoyés au navigateur.
- Le formulaire n'envoie pas `id_science`, alors que le schéma l'exige. L'INSERT sélectionne donc la science ayant le plus petit `id_science`. Cette règle est une décision de compatibilité à remplacer par un choix explicite si l'interface doit classer les disciplines.

## Démarrage local

1. Importer `backend/data/database.sql` dans MySQL.
2. Configurer l'accès PDO dans `backend/config/Database.php` pour l'environnement local.
3. Depuis ce dossier, démarrer le serveur PHP :

   ```powershell
   php -S localhost:8081
   ```

4. Ouvrir `http://localhost:8081/index.html`.

## Vérification

Les fichiers PHP de l'application et les exemples du lab ont passé `php -l`. Les exemples appliqués ont été exécutés avec leurs dépôts en mémoire. Les requêtes HTTP contre MySQL n'ont pas été testées dans cet environnement faute de base locale configurée.
