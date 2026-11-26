---
marp: true
theme: default
size: 16:9
paginate: true
style: |
  section { font-size: 23px; }
  h3 { margin: 0.4em 0 0.2em; }
  pre { font-size: 17px; }
  table { font-size: 20px; }
  section.prompt pre { font-size: 15px; }
---

# Débogage PHP avec Xdebug et VS Code

## Installation par un agent et utilisation sous Windows

**Présenté par** : Asaas soukayna
**Encadré par** : ES-Sarraj Fouad

---

## Plan

1. Introduction
2. Étapes d'installation
3. Prompt donné à l'agent
4. Utilisation
5. Problèmes fréquents
6. Conclusion

---

## 1. Introduction

> Un débogueur arrête le programme à un endroit précis pour observer son état, au lieu de multiplier les `var_dump`.

**PHP + Xdebug** → port **9003** → **VS Code (PHP Debug)**

- **Xdebug** : extension PHP qui expose l'exécution.
- **PHP Debug** : extension VS Code qui écoute le port 9003 et pilote le pas à pas.
- L'installation est confiée à un **agent**, grâce à un prompt précis.

---

## 2. Étapes d'installation

1. **Inspecter** l'environnement et les fichiers du projet.
2. **Identifier** les dépendances nécessaires.
3. **Installer** les dépendances.
4. **Configurer** PHP et VS Code.
5. **Démarrer** et **vérifier** que tout fonctionne.

Commandes de chaque étape sur les diapositives suivantes (PowerShell).

---

## Étapes 1 et 2 : inspecter et identifier

```powershell
php -v                      # version, NTS ou TS, x64 ou x86
where.exe php               # chemin de php.exe (XAMPP, Laragon, autre)
php --ini                   # php.ini actif
php -m                      # Xdebug est-il déjà chargé ?
code --version              # VS Code est-il disponible ?
code --list-extensions | findstr php-debug
php -i | clip               # copie la config, à coller dans xdebug.org/wizard
```

**Dépendances :** PHP, DLL Xdebug compatible (version, TS/NTS, architecture), VS Code, extension **PHP Debug**.

---

## Étape 3 : installer

```powershell
cd $HOME\Downloads                          # DLL téléchargée via xdebug.org/wizard
$ext = php -r "echo ini_get('extension_dir');"
Copy-Item .\php_xdebug-*.dll "$ext\php_xdebug.dll"
code --install-extension xdebug.php-debug
```

- Le chemin `ext` est lu depuis PHP, jamais supposé.
- Un dossier système peut demander les droits administrateur : l'agent doit **demander la permission**.

---

## Étape 4 : configurer `php.ini`

```powershell
$ini = ((php --ini | Select-String "Loaded Configuration File") -split ":",2)[1].Trim()
Copy-Item $ini "$ini.bak"          # sauvegarde avant toute modification
notepad $ini                       # ajouter les lignes ci-dessous
```

```ini
zend_extension=xdebug
xdebug.mode=debug
xdebug.start_with_request=yes
xdebug.client_port=9003
xdebug.client_host=127.0.0.1
```

---

## Étape 4 : configurer VS Code

`.vscode/launch.json` :

```json
{ "version": "0.2.0", "configurations": [
  { "name": "Listen for Xdebug", "type": "php", "request": "launch", "port": 9003 },
  { "name": "Debug current PHP script", "type": "php", "request": "launch",
    "program": "${file}", "cwd": "${fileDirname}", "port": 0,
    "runtimeArgs": ["-dxdebug.start_with_request=yes"],
    "env": { "XDEBUG_MODE": "debug,develop", "XDEBUG_CONFIG": "client_port=${port}" } }
] }
```

Path mappings : inutiles en local, utiles seulement avec Docker ou une machine distante.

---

## Étape 5 : démarrer et vérifier

```powershell
php -v                         # doit afficher : with Xdebug v3.x.x
php --ri xdebug                # mode debug, port 9003, hôte 127.0.0.1
php -m | findstr /i xdebug     # xdebug présent dans les modules
```

- Redémarrer **Apache** (XAMPP ou Laragon) si le site web est utilisé.
- Puis tester avec le fichier de test (partie Utilisation).

---

<!-- _class: prompt -->

## 3. Prompt donné à l'agent (1/3)

```text
Act as a Senior PHP Developer and VS Code Configuration Expert.

I want you to install, configure, and verify a complete PHP debugging
environment in my Windows machine using VS Code and Xdebug.

### Objectives
1. Environment Detection
   - Detect whether PHP is installed.
   - Identify the PHP executable path.
   - Detect whether I use XAMPP, Laragon, or standalone PHP.
   - Identify the active php.ini configuration.
   - Check the installed PHP version and architecture.
2. Install Xdebug
   - Check whether Xdebug is already installed.
   - Install the correct Xdebug version compatible with my PHP version
     and architecture.
   - For XAMPP, use the correct PHP installation.
   - Configure php.ini properly.
   - Enable Xdebug with: xdebug.mode=debug, xdebug.start_with_request=yes,
     xdebug.client_port=9003, xdebug.client_host=127.0.0.1
```

---

<!-- _class: prompt -->

## 3. Prompt donné à l'agent (2/3)

```text
3. Configure VS Code
   - Install the PHP Debug extension by Xdebug.
   - Create .vscode/launch.json.
   - Configure the following debugging profiles:
     Listen for Xdebug / Debug current PHP script
   - Configure port 9003.
   - Set appropriate path mappings if necessary.
4. Verification
   - Verify Xdebug using php -v.
   - Verify Xdebug configuration using php --ri xdebug.
   - Create a simple PHP test file.
   - Test breakpoints, step over, step into, variables inspection,
     and call stack.
```

---

<!-- _class: prompt -->

## 3. Prompt donné à l'agent (3/3)

```text
### Important Rules
- First inspect my environment before making changes.
- Do not assume PHP or XAMPP installation paths.
- Do not overwrite existing configurations without creating backups.
- Do not install incompatible Xdebug versions.
- Do not modify unrelated PHP settings.
- Ask for permission before making system-level changes.
- If automatic installation is impossible, provide exact manual steps.
- Explain every important change.

### Final Deliverables
- Working PHP + Xdebug configuration.
- Correct .vscode/launch.json.
- PHP debugging test file.
- Confirmation that breakpoints work.
- A short report explaining what was installed and configured.

Start by inspecting my current environment, then proceed step by step.
```

---

## 4. Utilisation : lancer une session

### Méthode A : Listen for Xdebug
1. Ouvrir le dossier du projet dans VS Code.
2. Cliquer à gauche d'un numéro de ligne : **point d'arrêt**.
3. Ouvrir *Run and Debug* (Ctrl + Maj + D), choisir **Listen for Xdebug**, puis **F5**.
4. Exécuter le script : `php test_xdebug.php` (ou ouvrir la page dans le navigateur).

### Méthode B : Debug current PHP script
Ouvrir le fichier, choisir ce profil, puis **F5** : le script démarre directement.

---

## 4. Utilisation : fichier de test

```php
<?php
function carre(int $n): int { return $n * $n; }

function somme(array $nombres): int {
    $total = 0;
    foreach ($nombres as $n) {
        $total += carre($n);
    }
    return $total;
}

echo "Somme des carrés : " . somme([1, 2, 3]) . "\n";   // attendu : 14
```

Point d'arrêt conseillé : `$total += carre($n);`

---

## 4. Utilisation : commandes et observation

| Action | Raccourci |
|---|---|
| Continuer | F5 |
| Step over | F10 |
| Step into | F11 |
| Step out | Maj + F11 |
| Arrêter | Maj + F5 |

- **Variables** : `$n` et `$total` évoluent à chaque tour.
- **Pile d'appels** : après *step into*, `carre()` appelée depuis `somme()`.
- **Espion** : suivre une expression, par exemple `$total + $n`.

---

## 5. Problèmes fréquents

| Symptôme | Piste |
|---|---|
| Avertissement au lancement de PHP | DLL incompatible (version, TS/NTS, x64/x86) |
| Xdebug absent de `php -m` | Mauvais `php.ini` modifié |
| Point d'arrêt ignoré | VS Code n'écoute pas, ou port 9003 bloqué |
| OK en terminal, pas sur le site | Apache non redémarré, autre `php.ini` |

Diagnostic : activer `xdebug.log` avec un chemin de fichier.

---

## 6. Conclusion

- Un **prompt précis** permet à l'agent d'inspecter, installer, configurer et vérifier.
- Les règles imposent **sauvegarde**, **permission** et **aucun chemin supposé**.
- L'utilisation se résume à : point d'arrêt → **F5** → exécuter → **F10 / F11**.

> Xdebug ralentit PHP : `xdebug.mode=off` hors développement.