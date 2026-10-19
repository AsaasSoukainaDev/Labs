
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des catégories</title>
</head>
<body>
    <h1>Liste des catégories</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->nom }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Aucune catégorie disponible.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
