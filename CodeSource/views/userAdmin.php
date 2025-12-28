<?php
require_once "../controllers/gestionUtilisateur.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Utilisateurs - ASSAD Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-stone-50 font-sans min-h-screen flex">

    <aside class="w-64 bg-emerald-900 min-h-screen text-white p-6 shadow-xl">
        <h1 class="text-2xl font-bold mb-10 flex items-center gap-2 italic">
            <i class="fas fa-user-shield"></i> AdminPanel
        </h1>
        <nav class="space-y-4">
            <a href="admin_dashboard.php" class="block p-3 hover:bg-emerald-800 rounded-lg"><i class="fas fa-chart-line mr-2"></i> Statistiques</a>
            <a href="admin_users.php" class="block p-3 bg-emerald-700 rounded-lg transition"><i class="fas fa-users mr-2"></i> Utilisateurs</a>
            <a href="gestion_animal.php" class="block p-3 hover:bg-emerald-800 rounded-lg transition"><i class="fas fa-hippo mr-2"></i> Animaux</a>
            <a href="gestion_habitats.php" class="block p-3 hover:bg-emerald-800 rounded-lg transition"><i class="fas fa-mountain mr-2"></i> Habitats</a>
            <hr class="border-emerald-800 my-4">
            <a href="../controllers/logout.php" class="block p-3 text-amber-400 hover:text-white"><i class="fas fa-sign-out-alt mr-2"></i> Déconnexion</a>
        </nav>
    </aside>

    <main class="flex-1 p-10 overflow-y-auto">
        
        <header class="flex justify-between items-end mb-10">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Gestion des Comptes</h1>
                <p class="text-stone-500">Approuvez les guides et gérez les accès visiteurs.</p>
            </div>
            <!-- <div class="flex gap-3">
                <span class="bg-white px-4 py-2 rounded-lg shadow-sm border border-stone-200 text-sm font-medium">
                    <i class="fas fa-circle text-emerald-500 text-[10px] mr-2"></i> Session Admin Active
                </span>
            </div> -->
        </header>

        <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 flex items-center gap-5">
                <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center text-xl">
                    <i class="fas fa-user-clock"></i>
                </div>
                <div>
                    <p class="text-xs text-stone-400 uppercase font-bold">En attente (Guides)</p>
                    <p class="text-2xl font-black text-stone-800">04</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 flex items-center gap-5">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-xl">
                    <i class="fas fa-check-double"></i>
                </div>
                <div>
                    <p class="text-xs text-stone-400 uppercase font-bold">Comptes Actifs</p>
                    <p class="text-2xl font-black text-stone-800">1,128</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 flex items-center gap-5">
                <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-xl">
                    <i class="fas fa-user-slash"></i>
                </div>
                <div>
                    <p class="text-xs text-stone-400 uppercase font-bold">Désactivés</p>
                    <p class="text-2xl font-black text-stone-800">12</p>
                </div>
            </div>
        </div> -->

        <div class="bg-white rounded-3xl shadow-xl border border-stone-200 overflow-hidden">
            <div class="p-6 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
                <h3 class="font-bold text-emerald-900 flex items-center gap-2">
                    <i class="fas fa-list text-amber-500"></i> Liste des utilisateurs inscrits
                </h3>
                <div class="relative w-64">
                    <i class="fas fa-search absolute left-3 top-3 text-stone-400 text-sm"></i>
                    <input type="text" placeholder="Rechercher un nom..." class="w-full pl-10 pr-4 py-2 bg-white border border-stone-200 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
            </div>
            <form method = 'POST'>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-stone-400 text-xs uppercase tracking-widest border-b border-stone-100">
                                <th class="p-6 font-black">Utilisateur</th>
                                <th class="p-6 font-black">Rôle</th>
                                <th class="p-6 font-black text-center">Statut</th>
                                <th class="p-6 font-black text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-50">
                            <?php
                            foreach($utilisateurs as $utilisateur){

                                $parts = explode(" ", $utilisateur['nom']);
                                $prenom_lettre = substr($parts[0], 0, 1);
                                $nom_lettre = isset($parts[1]) ? substr($parts[1], 0, 1) : "";
                                $initiales = strtoupper($prenom_lettre . $nom_lettre);
                                
                                if ($utilisateur['role'] == 'Guide') {
                                    $badge_role = "
                                        <span class='bg-blue-50 text-blue-600 text-[10px] font-black px-2 py-1 rounded-md border border-blue-100 uppercase italic tracking-tighter'>
                                            <i class='fas fa-map-signs mr-1'></i> Guide
                                        </span>";
                                } else {
                                    $badge_role = "
                                        <span class='bg-stone-100 text-stone-600 text-[10px] font-black px-2 py-1 rounded-md border border-stone-200 uppercase tracking-tighter'>
                                            <i class='fas fa-user mr-1'></i> Visiteur
                                        </span>";
                                }

                                if($utilisateur['is_approuve'] == 0 && $utilisateur['role'] == 'Guide'){
                                    $statut = "         
                                        <span class='bg-amber-100 text-amber-700 text-[10px] font-bold px-3 py-1 rounded-full animate-pulse'>
                                            EN ATTENTE
                                        </span>";
                                    $action = "                                        
                                            <button name='approuver' value ='{$utilisateur['email']}' class='bg-emerald-600 w-24 text-white px-4 py-1.5 rounded-lg text-xs font-bold hover:bg-emerald-700 shadow-md'>Approuver</button>
                                            ";
                                }else{
                                    $statut="
                                        <span class='bg-emerald-50 text-emerald-600 text-[10px] font-bold px-7 py-1 rounded-full border border-emerald-100'>
                                            ACTIF
                                        </span>";
                                    $action = "
                                    <button name='desactiver' value ='{$utilisateur['email']}' class='border border-stone-200 text-stone-600 w-24 px-4 py-1.5 rounded-lg text-xs font-bold hover:bg-red-500 hover:text-white hover:border-red-500 transition shadow-sm'>Désactiver</button>
                                    ";
                                }

                                if($utilisateur['is_active'] == 0){
                                    $action = "                                        
                                            <button name='activer' value ='{$utilisateur['email']}' class='border border-stone-200 text-stone-600 w-24 px-4 py-1.5 rounded-lg text-xs font-bold hover:bg-emerald-600 hover:text-white hover:border-green-500 transition shadow-sm'>Activer</button>
                                            ";
                                    $statut="
                                        <span class='bg-red-50 text-red-600 text-[10px] font-bold px-5 py-1 rounded-full border border-red-100'>
                                            INACTIF
                                        </span>";        
                                }

                                echo"
                                    <tr class='hover:bg-amber-50/30 transition'>
                                        <td class='p-6'>
                                            <div class='flex items-center gap-3'>
                                                <div class='w-10 h-10 bg-emerald-800 text-white rounded-full flex items-center justify-center font-bold'>$initiales</div>
                                                <div>
                                                    <p class='font-bold text-stone-800'>{$utilisateur['nom']}</p>
                                                    <p class='text-xs text-stone-400 italic'>{$utilisateur['email']}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class='p-6'>
                                            $badge_role
                                        </td>
                                        <td class='p-6 text-center'>
                                            $statut
                                        </td>
                                        <td class='p-6 text-right space-x-2'>
                                            $action
                                        </td>
                                    </tr>
                                ";
                                }
                            ?>
                            

                        </tbody>
                    </table>
                </div>
            </form>    
            <!-- <div class="p-6 bg-stone-50/50 border-t border-stone-100 flex justify-between items-center text-xs text-stone-500">
                <p>Affichage de 1 à 10 sur 1,144 utilisateurs</p>
                <div class="flex gap-2">
                    <button class="w-8 h-8 rounded bg-white border border-stone-200 flex items-center justify-center hover:bg-emerald-50"><i class="fas fa-chevron-left"></i></button>
                    <button class="w-8 h-8 rounded bg-emerald-800 text-white flex items-center justify-center">1</button>
                    <button class="w-8 h-8 rounded bg-white border border-stone-200 flex items-center justify-center hover:bg-emerald-50">2</button>
                    <button class="w-8 h-8 rounded bg-white border border-stone-200 flex items-center justify-center hover:bg-emerald-50"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div> -->
        </div>
    </main>

</body>
</html>