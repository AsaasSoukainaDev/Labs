
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des catégories</title>
</head>
<body>
    <h1>Liste des catégories</h1>

    <ul>
        @forelse ($categories as $categorie)
            <li>
                {{ $categorie->nom }}
                -
                {{ $categorie->description ?? 'Aucune description' }}
            </li>
        @empty
            <li>Aucune catégorie disponible.</li>
        @endforelse
    </ul>
</body>
</html>
