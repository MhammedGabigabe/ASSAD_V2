<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Statistiques ASSAD Zoo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    <aside class="w-64 bg-emerald-900 min-h-screen text-white p-6 shadow-xl">
        <h1 class="text-2xl font-bold mb-10 flex items-center gap-2 italic">
            <i class="fas fa-user-shield"></i> AdminPanel
        </h1>
        <nav class="space-y-4">
            <a href="admin_dashboard.php" class="block p-3 bg-emerald-700 rounded-lg"><i class="fas fa-chart-line mr-2"></i> Statistiques</a>
            <a href="admin_users.php" class="block p-3 hover:bg-emerald-800 rounded-lg transition"><i class="fas fa-users mr-2"></i> Utilisateurs</a>
            <a href="gestion_animal.php" class="block p-3 hover:bg-emerald-800 rounded-lg transition"><i class="fas fa-hippo mr-2"></i> Animaux</a>
            <a href="gestion_habitats.php" class="block p-3 hover:bg-emerald-800 rounded-lg transition"><i class="fas fa-mountain mr-2"></i> Habitats</a>
            <hr class="border-emerald-800 my-4">
            <a href="../controllers/logout.php" class="block p-3 text-amber-400 hover:text-white"><i class="fas fa-sign-out-alt mr-2"></i> Déconnexion</a>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <header class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Tableau de Bord Global</h2>
            <p class="text-gray-500">Aperçu des performances du Zoo Virtuel CAN 2025</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-emerald-500">
                <p class="text-sm text-gray-500 font-bold uppercase">Total Visiteurs</p>
                <h3 class="text-3xl font-black text-emerald-900">1,240</h3>
                <p class="text-xs text-emerald-600 mt-2"><i class="fas fa-globe-africa"></i> +12% ce mois</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-amber-500">
                <p class="text-sm text-gray-500 font-bold uppercase">Animaux</p>
                <h3 class="text-3xl font-black text-amber-600"> 4 </h3>
                <p class="text-xs text-gray-400 mt-2">Répartis sur  3  habitats</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500">
                <p class="text-sm text-gray-500 font-bold uppercase">Tours Réservés</p>
                <h3 class="text-3xl font-black text-blue-600">312</h3>
                <p class="text-xs text-gray-400 mt-2">Visites guidées actives</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-purple-500">
                <p class="text-sm text-gray-500 font-bold uppercase">Top Animal</p>
                <h3 class="text-xl font-black text-purple-600 italic">Lion de l'Atlas</h3>
                <p class="text-xs text-gray-400 mt-2">850 vues uniques</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
                <h4 class="font-bold mb-4 flex items-center gap-2"><i class="fas fa-flag text-emerald-700"></i> Visiteurs par Pays</h4>
                <div class="space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span>🇲🇦 Maroc</span>
                        <span class="font-bold">65%</span>
                    </div>
                    <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-emerald-600 h-full" style="width: 65%"></div>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span>🇸🇳 Sénégal</span>
                        <span class="font-bold">15%</span>
                    </div>
                    <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-amber-500 h-full" style="width: 15%"></div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
                <h4 class="font-bold mb-4 flex items-center gap-2"><i class="fas fa-ticket-alt text-amber-600"></i> Visites les plus réservées</h4>
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="text-gray-400 border-b">
                            <th class="pb-2">Nom du Tour</th>
                            <th class="pb-2 text-right">Réservations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-2">Parcours des Lions</td>
                            <td class="py-2 text-right font-bold text-emerald-800">142</td>
                        </tr>
                        <tr>
                            <td class="py-2">Oiseaux de l'Atlas</td>
                            <td class="py-2 text-right font-bold text-emerald-800">89</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>