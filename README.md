# README pour Projet Talk Chat

## Introduction

Ce document est destiné à vous fournir toutes les informations nécessaires pour comprendre et exécuter le projet Botika avec l'intégration de Inertia js en utilisant Vue js et livewire avec le form builder de filament php . Vous trouverez ici les étapes d'installation, les commandes utiles, ainsi que d'autres informations pertinentes.

## Prérequis

-   PHP >= 8.1
-   Composer
-   Node.js et pnpm
-   Base de données (MySQL)
-   Serveur Web (Apache, Nginx)

## Installation

1. **Cloner le projet depuis le dépôt Git**:

    ```bash
    git@github.com:newhart/botika.git
    ```

2. **Accéder au répertoire du projet**:

    ```bash
    cd botika
    ```

3. **Installer les dépendances PHP avec Composer**:

    ```bash
    composer install
    ```

4. **Installer les dépendances JavaScript avec pnpm**:

    ```bash
    pnpm install
    ```

5. **Configurer le fichier `.env`**:

    - Dupliquez `.env.example` et renommez-le en `.env`.
    - Configurez les paramètres de base de données dans ce fichier.

6. **Générer la clé d'application**:

    ```bash
    php artisan key:generate
    ```

7. **Migrer la base de données**:

    ```bash
    php artisan migrate
    ```

8. **Compiler les ressources Vue.js**:
    ```bash
    pnpm dev
    ```

## Utilisation des Commandes

Voici quelques commandes utiles pour le développement:

-   **Lancer le serveur de développement**:

    ```bash
    php artisan serve
    ```

-   **Compiler les ressources pour la production**:

    ```bash
    pnpm run production
    ```

-   **Exécuter les tests**:
    ```bash
    php artisan test
    ```

## Structure du Projet

La structure du projet suit généralement l'architecture MVC (Modèle-Vue-Contrôleur) de Laravel avec l'intégration des composants Vue.js dans le répertoire `resources/js`.

-   `app/`: Contient les modèles, les contrôleurs, les middlewares, etc.
-   `resources/js/Pages/`: Touts le component vue pour le rendue inertia js
-   `routes/`: Définition des routes de l'application.
-   `public/`: Contient les ressources publiques (CSS, JS, images).
-   `database/`: Migrations et seeders pour la base de données.

## Contribution

Pour contribuer au projet, veuillez suivre les meilleures pratiques de développement et soumettre une pull request avec une description détaillée des modifications apportées.

## Licence

Ce projet est sous licence MIT. Consultez le fichier `LICENSE` pour plus d'informations.
