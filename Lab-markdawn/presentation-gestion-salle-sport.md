## Slide 1 — Sujet du Projet

Mon projet est une **plateforme de gestion des salles de sport** où les responsables peuvent gérer les disciplines, les coachs et les séances. C'est *personnel* — pas ~~juste une copie~~ des solutions existantes.

### Fonctionnalités principales :
- Gestion des disciplines sportives
- Planification des séances et des coachs
- Suivi des adhérents et des inscriptions
- Interface de gestion

![Interface de gestion de salle de sport](./image.png)

> "La gestion de salle de sport devrait être simple et digitale."

---

## Slide 2 — Objectif du Projet

L'objectif est de simplifier la gestion quotidienne des salles de sport, tout en apprenant Markdown avec cette présentation. Voir le [Guide Markdown](https://www.markdownguide.org/).

### Étapes du projet :
1. Développer le module de gestion des disciplines
2. Créer le système de planification des séances
3. Implémenter l'inscription des adhérents

### Progression actuelle :
- [x] Module de gestion des disciplines
- [x] Gestion des coachs
- [ ] API REST des séances
- [ ] Interface de réservation des séances
- [ ] Tableau de suivi des adhérents
- [ ] Espace coach

| Fonctionnalité | Technologies |
|:---------------|:-------------|
| Backend | Laravel + MySQL |
| Frontend | Alpine.js + Tailwind |

### Configuration Laravel :
`composer.json`

```json
{
  "require": {
    "laravel/framework": "^10.0",
    "laravel/sanctum": "^3.0"
  }
}
```
