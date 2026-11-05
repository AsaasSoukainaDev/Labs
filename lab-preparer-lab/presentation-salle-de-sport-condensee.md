---
marp: true
theme: default
paginate: true
style: |
  section { font-size: 24px; }
  pre { font-size: 17px; }
  table { font-size: 20px; }
---

# Lab : Gestion d'une Salle de Sport avec PHP POO & JSON

**Présenté par :** Asaas Soukayna  
**Encadrant :** ES-SARRAJ Fouad  
**Date :** 05 Novembre 2026

---

## Plan

1. **Stack technique**
2. **Définitions et concepts clés**
3. **Problème et besoin**
4. **Solution et mise en pratique**
5. **Résultats et démonstration**
6. **Conclusion et apprentissages**

---

## Stack technique

- **Backend** : PHP 8.2 (POO), architecture MVC (Entité, Gestionnaire, Contrôleur)
- **Frontend** : HTML5 / JavaScript (fetch), Tailwind CSS
- **Stockage** : JSON (`json_encode` / `json_decode`)
- **Outils** : Git, VS Code

---

## Définitions

- **MVC** (Entité / Gestionnaire / Contrôleur) : sépare les données, la logique métier et l'orchestration des requêtes
- **POO** : code organisé en classes et objets (attributs, méthodes, encapsulation)
- **CRUD** : **C**reate, **R**ead, **U**pdate, **D**elete
- **Persistance JSON** : sauvegarde des données dans un fichier `.json`

---

## Problème et besoin

### Problème
- Gestion manuelle des disciplines et des séances
- Suivi des coachs difficile, risque d'erreurs et de perte de données

### Besoins
✓ Centraliser les informations  
✓ Faciliter l'ajout, la modification et la suppression  
✓ Interface responsive  
✓ Sécuriser et valider les données

### Utilité du Lab
- CRUD en POO, architecture MVC, persistance JSON

---

## Solution et pratique

### Architecture
1. **Entité** (`Discipline.php`) : données
2. **Gestionnaire** (`GestionDiscipline.php`) : logique et accès JSON
3. **Contrôleur** (`DisciplineController.php`) : requêtes
4. **Interface** (`index.html` / `app.js`) : Tailwind CSS

### Extrait : Gestionnaire
```php
class GestionDiscipline
{
    private string $fichier = __DIR__ . '/../../data/disciplines.json';

    public function findAll(): array
    {
        $contenu = file_get_contents($this->fichier);
        return json_decode($contenu, true) ?? [];
    }
}
```

**Fonctionnalités :** ✓ Liste ✓ Ajout ✓ Validation ✓ Feedback asynchrone ✓ Responsive

---

## Résultats et démonstration

### Captures d'écran
- Liste des disciplines (Nom, Description, Durée) et formulaire d'ajout
- Contenu de `disciplines.json` mis à jour après chaque ajout

### Tests effectués

| Test | Résultat |
|------|----------|
| Ajout d'une discipline valide | ✓ Succès |
| Validation des champs vides | ✓ Erreurs affichées |
| Validation du format JSON | ✓ Fichier valide |
| Responsive design | ✓ Mobile/tablette |

---

## Conclusion et apprentissages

### Résultats et compétences
✓ Application fonctionnelle, interface responsive, CRUD JSON, code POO  
- MVC, JSON, API REST, Tailwind, JS asynchrone (fetch / toasts)

### Difficultés et solutions
- Séparation des responsabilités → rôle unique par classe
- BOM dans le JSON → UTF-8 sans BOM
- Erreurs réseau → `try/catch` sur `fetch`

### Améliorations futures
- Réservation de séances en ligne, espace adhérent, statistiques de fréquentation

**Ce Lab m'a permis de comprendre la POO et de créer une application pour la salle de sport.**

**Merci pour votre attention ! Questions ?**
