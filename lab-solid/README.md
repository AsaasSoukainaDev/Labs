# 🏋️ Projet : MVC_Template-main (Gestion des Disciplines - Salle de Sport)

## 1. Présentation du Projet
Ce projet est une application web backend développée en **PHP Orienté Objet (POO)** sans framework. Il s'agit du module de gestion des **Disciplines** (Yoga, Musculation, Cardio, etc.) pour une salle de sport.

L'objectif principal de ce dépôt est de servir de base de travail pour **apprendre, comprendre et appliquer les principes SOLID** sur une architecture MVC réelle.

## 2. Stack Technique
*   **Langage :** PHP 8.x
*   **Base de données :** MySQL (via PDO)
*   **Architecture :** MVC (Modèle-Vue-Contrôleur) avec séparation stricte des couches (DAO, Models, Services, Controllers).
*   **Frontend (test) :** HTML / JavaScript (Fetch API) / Tailwind CSS.

## 3. Architecture Actuelle du Code
Le flux de données suit une hiérarchie précise :
1.  **Point d'entrée :** `backend/api/api.php`
2.  **Contrôleur :** `backend/controllers/DisciplineController.php` (Gère les requêtes HTTP GET/POST)
3.  **Service :** `backend/services/DisciplineService.php` (Logique métier) + `BaseService.php` (Validations et exceptions)
4.  **Modèle :** `backend/models/Discipline.php` (Entité métier, hérite du DAO)
5.  **Accès aux données (DAO) :** `backend/models/DisciplineDAO.php` (Requêtes SQL)
6.  **Connexion :** `backend/config/Database.php` (Singleton PDO)

## 4. Fonctionnalités Actuelles
*   **Lister les disciplines** (GET) : Récupère et affiche la liste des disciplines au format JSON.
*   **Ajouter une discipline** (POST) : Valide les données (libellé > 4 caractères) et insère une nouvelle discipline en base de données.

---

## 🎯 Objectif de la Mission (Pour l'Agent IA)

L'objectif de cette mission est de **refactoriser le code existant** pour qu'il respecte les **5 principes SOLID**. 
Tu dois procéder en **deux phases distinctes**. Ne passe pas à la phase 2 sans ma validation.

### Phase 1 : Le Lab SOLID (Théorie et Pratique)
Crée un environnement d'apprentissage (Lab) avec des exemples abstraits et simples. Pour chaque principe (SRP, OCP, LSP, ISP, DIP), tu dois me fournir :
1. Une définition simple.
2. Un exemple de code "Mauvais" (qui viole le principe).
3. Un exemple de code "Bon" (qui respecte le principe).
4. Un mini-exercice à réaliser.

### Phase 2 : Pratique sur le Projet `MVC_Template-main`
Une fois le Lab validé, tu appliqueras ces principes sur mon code réel. Voici les consignes de refactorisation par principe :

*   **SRP (Single Responsibility) :** Vérifie que `DisciplineDAO` ne fait que du SQL, `BaseService` que de la validation, et le `Controller` que du HTTP. Sépare toute responsabilité qui serait mélangée.
*   **OCP (Open/Closed) :** Fais en sorte que l'ajout d'une nouvelle entité (ex: `Coach`) se fasse par extension (héritage/interfaces) sans modifier le code existant de `BaseService`.
*   **LSP (Liskov Substitution) :** Assure-toi que les sous-classes (ex: `DisciplineService`) peuvent remplacer leur classe parente (`BaseService`) sans altérer le comportement du programme.
*   **ISP (Interface Segregation) :** Crée des interfaces spécifiques (ex: `DisciplineReaderInterface` pour le GET, `DisciplineWriterInterface` pour le POST) au lieu de dépendre de classes lourdes.
*   **DIP (Dependency Inversion) :** Modifie `DisciplineService` pour qu'il ne fasse plus `new DisciplineDAO()` directement, mais qu'il dépende d'une **interface**. L'injection de dépendance se fera depuis le `Controller`.

---

## 🛠️ Livrables Attendus
1.  **Phase 1 :** Le code complet du Lab SOLID (dans un dossier `Lab/` à la racine).
2.  **Phase 2 :** L'arborescence mise à jour, les interfaces créées, les fichiers refactorisés, et un guide pour tester que l'API (GET/POST) fonctionne toujours parfaitement avec le frontend.

**Prêt à commencer ? Commence par me générer la Phase 1 (le Lab) en commençant par le principe SRP.**

## Lab pédagogique généré

- Parcours des cinq principes : [Lab/README.md](Lab/README.md)
- Présentation : [presentation.md](presentation.md)
- Application refactorisée : [MVC_Template-main/README.md](MVC_Template-main/README.md)

À la demande explicite de l'utilisateur, la phase 2 a été appliquée à `MVC_Template-main`; les détails et limites sont documentés dans le README de l'application et dans les tutoriels par principe.
