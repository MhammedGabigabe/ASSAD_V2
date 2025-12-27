<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Guide - Tableau de Bord | ASSAD Zoo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-emerald-900 min-h-screen text-white p-6 shadow-xl">
        <h1 class="text-2xl font-bold mb-10 flex items-center gap-2 italic">
            <i class="fas fa-compass"></i> GuidePanel
        </h1>

        <nav class="space-y-4">
            <a href="guide_dashboard.php" class="block p-3 bg-emerald-700 rounded-lg">
                <i class="fas fa-calendar-check mr-2"></i> Mes Visites
            </a>
            <a href="guide_reservations.php" class="block p-3 hover:bg-emerald-800 rounded-lg transition">
                <i class="fas fa-clipboard-list mr-2"></i> Réservations
            </a>
            <hr class="border-emerald-800 my-4">
            <a href="../controllers/logout.php" class="block p-3 text-amber-400 hover:text-white">
                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
            </a>
        </nav>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-8">

        <!-- HEADER -->
        <header class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Mes Visites Guidées</h2>
            <p class="text-gray-500">Organisation et suivi de vos parcours guidés</p>
        </header>

        <!-- STAT CARDS -->


             <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-emerald-500 flex justify-between items-center mb-4">
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase">Visites Créées</p>
                    <h3 class="text-3xl font-black text-emerald-900">12</h3>
                    <p class="text-xs text-emerald-600 mt-2">
                        <i class="fas fa-calendar"></i> Total
                    </p>
                </div>
                <button id="openModal" 
                class="bg-emerald-700 text-white px-4 py-2 rounded-lg shadow hover:bg-emerald-800 transition flex items-center gap-2 text-sm">
                <i class="fas fa-plus"></i> Créer visite
                </button>
            </div>

        <!-- POPUP MODAL ajout -->
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
                <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
                <h3 class="text-xl font-bold mb-4 text-gray-800">Ajouter une nouvelle visite</h3>
                <form method="POST" class="space-y-4">
                    <input type="text" name="titre" placeholder="Titre de la visite" class="w-full border p-2 rounded-lg">
                    <textarea name="description" placeholder="Description" class="w-full border p-2 rounded-lg"></textarea>
                    <input type="datetime-local" name="date_heure" class="w-full border p-2 rounded-lg">
                    <input type="number" name="duree" placeholder="Durée (minutes)" class="w-full border p-2 rounded-lg">
                    <input type="text" name="langue" placeholder="Langue" class="w-full border p-2 rounded-lg">
                    <input type="number" name="capacite_max" placeholder="Capacité maximale" class="w-full border p-2 rounded-lg">
                    <input type="number" name="prix" placeholder="Prix (DH)" class="w-full border p-2 rounded-lg">
                    <button type="submit" name="Ajouter" 
                            class="bg-emerald-700 text-white px-4 py-2 rounded-lg shadow hover:bg-emerald-800 w-full">
                        Ajouter la visite
                    </button>
                </form>
            </div>
        </div>

        <!-- POPUP MODAL modifier -->
        <div id="modal_modifier" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-2xl w-96 p-6 relative shadow-lg">
                <button id="closeModal_modifier" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
                <h3 class="text-xl font-bold mb-4 text-gray-800">Modifier une visite</h3>
                <form method="POST" class="space-y-4">
                    <input type="text" name="titre" value="" class="w-full border p-2 rounded-lg">
                    <textarea name="description" class="w-full border p-2 rounded-lg">  </textarea>
                    <input type="datetime-local" name="date_heure" value=""  class="w-full border p-2 rounded-lg">
                    <input type="number" name="duree" value="" class="w-full border p-2 rounded-lg">
                    <input type="text" name="langue" value="" class="w-full border p-2 rounded-lg">
                    <input type="number" name="capacite_max" value="" class="w-full border p-2 rounded-lg">
                    <input type="number" name="prix" value="" class="w-full border p-2 rounded-lg">
                    <button type="submit" name="appliquerModi"  value=""
                            class="bg-emerald-700 text-white px-4 py-2 rounded-lg shadow hover:bg-emerald-800 w-full">
                        Modifier la visite
                    </button>
                </form>
            </div>
        </div>
        

        <!-- VISITES LIST -->
        <form method="POST">
            <div class="space-y-6">
                <!-- <?php foreach ($liste_visites as $visite){ ?>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-emerald-500 flex justify-between items-center">
                        <div class="flex items-center gap-6">
                        
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 uppercase mb-2">
                                    <?=$visite['titre'] ?>
                                </h3>
                                <p class="text-sm text-gray-500 mb-2">
                                    <?= $visite['description'] ?>
                                </p>
                                <p class="text-sm text-gray-500">
                                    <i class="far fa-calendar-alt mr-2"></i>
                                    <?php
                                        // Formater la date
                                        setlocale(LC_TIME, 'fr_FR.UTF-8');
                                        $date = new DateTime($visite['date_heure']);
                                        $date_formatee = strftime('%d %b %Y à %H:%M', $date->getTimestamp());
                                        // Convertir la durée
                                        $heures = intdiv($visite['duree'], 60);
                                        $minutes = $visite['duree'] % 60;
                                        if ($minutes == 0) {
                                            $duree_formatee = $heures . 'h';
                                        } else {
                                            $duree_formatee = $heures . 'h' . $minutes;
                                        }
                                        echo $date_formatee . " (" . $duree_formatee . ")";
                                    ?>
                                </p>
                                <div class="flex gap-4 mt-2 text-xs">
                                    <span class="bg-gray-100 px-2 py-1 rounded"><?=$visite['langue'] ?></span>
                                    <span class="bg-gray-100 px-2 py-1 rounded">Capacité : <?=$visite['capacite_max'] ?></span>
                                </div>
                            </div>
                            
                        </div>

                        <div class="text-right">
                            <p class="text-2xl font-black text-emerald-900"><?=$visite['prix'] ?> DH</p>
                            <div class="flex justify-end gap-2 mt-2">
                                <button type="submit" class="text-blue-600 hover:bg-blue-50 p-2 rounded-lg" value="<?=$visite['id_visite'] ?> " name="modifier">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="submit" class="text-red-600 hover:bg-red-50 p-2 rounded-lg" value="<?=$visite['id_visite'] ?> " name="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                <?php } ?> -->
            </div>
        </form>
    </main>

    <!-- <script>
        const openModal = document.getElementById('openModal');
        const modal = document.getElementById('modal');
        const closeModal = document.getElementById('closeModal');

        openModal.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        modal.addEventListener('click', (e) => {
            if(e.target === modal) {
                modal.classList.add('hidden');
            }
        });

        const modal_modifier = document.getElementById('modal_modifier');
        const closeModal_modifier = document.getElementById('closeModal_modifier');

        closeModal_modifier.addEventListener('click', () => {
            modal_modifier.classList.add('hidden');
        });

        modal_modifier.addEventListener('click', (e) => {
            if(e.target === modal_modifier) {
                modal_modifier.classList.add('hidden');
            }
        });
    </script>
    <?php //if ($visite_a_modifier){ ?>
        <script>
            document.getElementById('modal_modifier').classList.remove('hidden');
        </script>
    <?php //} ?> -->
</body>
</html>
