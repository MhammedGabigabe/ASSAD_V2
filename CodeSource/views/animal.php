<?php
require_once "../controllers/animal.php";
require_once "../controllers/habitat.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Animaux - Admin</title>
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
            <a href="admin_users.php" class="block p-3 hover:bg-emerald-800 rounded-lg"><i class="fas fa-users mr-2"></i> Utilisateurs</a>
            <a href="gestion_animals.php" class="block p-3 bg-emerald-700 rounded-lg transition"><i class="fas fa-hippo mr-2"></i> Animaux</a>
            <a href="gestion_habitats.php" class="block p-3 hover:bg-emerald-800 rounded-lg transition"><i class="fas fa-mountain mr-2"></i> Habitats</a>
            <hr class="border-emerald-800 my-4">
            <a href="../controllers/logout.php" class="block p-3 text-amber-400 hover:text-white"><i class="fas fa-sign-out-alt mr-2"></i> Déconnexion</a>
        </nav>
    </aside>

    <main class="flex-1 p-10">
        <header class="flex justify-between items-end mb-10">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Nos Animaux</h1>
                <p class="text-stone-500">Gérez le cheptel du Zoo Virtuel.</p>
            </div>
            <button onclick="openModal_ajouterAnimal()" class="bg-emerald-600 text-white px-6 py-3 rounded-xl font-bold shadow-lg hover:bg-emerald-700 transition flex items-center gap-2">
                <i class="fas fa-plus"></i> Ajouter un animal
            </button>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($liste_animaux as $animal){ ?>   
            <div class="bg-white rounded-3xl shadow-sm border border-stone-200 overflow-hidden hover:shadow-md transition">
                <div class="h-48 overflow-hidden relative">
                    <img src="<?= $animal['image'] ?>" alt="<?= $animal['nom'] ?>" class="w-full h-full object-cover">
                    <span class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-[10px] font-black uppercase text-emerald-800 shadow-sm">
                        <i class="fas fa-leaf mr-1"></i> <?= $animal['habitat'] ?>
                    </span>
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-stone-800"><?= $animal['nom'] ?></h3>
                            <p class="text-sm text-stone-400 italic"><?= $animal['espece'] ?></p>
                        </div>
                    </div>
                <form method="POST">
                    <div class="flex gap-2 mt-6">
                        <button type="submit" name="open_modalModifier" value="<?= $animal['id_animal'] ?>" class="flex-1 bg-stone-100 text-stone-600 text-center py-2 rounded-lg text-sm font-bold hover:bg-amber-100 hover:text-amber-700 transition">
                            <i class="fas fa-edit mr-1"></i> Modifier
                        </button>   

                        <button type="submit" name="supprimer" value="<?= $animal['id_animal'] ?>" class="px-4 py-2 bg-red-50 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </form> 
                </div>
            </div>
            <?php } ?>
        </div>
    </main>
    <!-- MODAL AJOUT ANIMAL -->
    <div id="animalModal_ajouter" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
        
        <div class="bg-white rounded-3xl shadow-xl w-full max-w-lg p-6 relative animate-fadeIn">
            
            <button onclick="closeModal_ajouterAnimal()" class="absolute top-4 right-4 text-stone-400 hover:text-red-500">
                <i class="fas fa-times text-xl"></i>
            </button>

            <h2 class="text-2xl font-bold text-stone-800 mb-6 flex items-center gap-2">
                <i class="fas fa-hippo text-emerald-600"></i> Ajouter un animal
            </h2>

            <form method="POST" enctype="multipart/form-data" class="space-y-4">

                <input type="text" name="nom" placeholder="Nom de l'animal"
                    class="w-full p-2 rounded-xl border border-stone-300 focus:ring-2 focus:ring-emerald-500 outline-none" required>

                <input type="text" name="espece" placeholder="Espèce"
                    class="w-full p-2 rounded-xl border border-stone-300 focus:ring-2 focus:ring-emerald-500 outline-none" required>

                <select name="id_habitat"
                    class="w-full p-2 rounded-xl border border-stone-300 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                    <option value="">-- Sélectionner un habitat --</option>
                    <?php foreach ($liste_habitat as $habitat) { ?>
                        <option value="<?= $habitat['id_habitat'] ?>">
                            <?= $habitat['nom'] ?>
                        </option>
                    <?php } ?>
                </select>

                <select name="alimentation"
                    class="w-full p-2 rounded-xl border border-stone-300 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                    <option value="">-- Sélectionner un type d'alimentation --</option>
                    <option value="Herbivore">Herbivore</option>
                    <option value="Omnivore">Omnivore</option>
                    <option value="Carnivore">Carnivore</option>
                </select>

                <input type="text" name="image" placeholder="Image (URL)"
                    class="w-full p-2 rounded-xl border border-stone-300 bg-white" required>

                <input type="text" name="pays" placeholder="Pays origine"
                    class="w-full p-2 rounded-xl border border-stone-300 bg-white" required>
                    
                <input type="text" name="description" placeholder="Description courte"
                    class="w-full p-2 rounded-xl border border-stone-300 bg-white" required>    

                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="closeModal_ajouterAnimal()"
                        class="px-5 py-2 rounded-xl bg-stone-100 hover:bg-stone-200 font-bold">
                        Annuler
                    </button>

                    <button type="submit" name="ajouter"
                        class="px-6 py-2 rounded-xl bg-emerald-600 text-white font-bold hover:bg-emerald-700 transition">
                        Ajouter
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- MODAL MODIFIER ANIMAL -->
    <div id="animalModal_modifier" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
        
        <div class="bg-white rounded-3xl shadow-xl w-full max-w-lg p-6 relative animate-fadeIn">
            
            <button onclick="closeModal_modifierAnimal()" class="absolute top-4 right-4 text-stone-400 hover:text-red-500">
                <i class="fas fa-times text-xl"></i>
            </button>

            <h2 class="text-2xl font-bold text-stone-800 mb-6 flex items-center gap-2">
                <i class="fas fa-hippo text-emerald-600"></i> Modifier un animal
            </h2>

            <form method="POST" enctype="multipart/form-data" class="space-y-4">

                <input type="text" name="nom" value ="<?= $animal_a_modifier['nom'] ?? '' ?>"
                    class="w-full p-2 rounded-xl border border-stone-300 focus:ring-2 focus:ring-emerald-500 outline-none" required>

                <input type="text" name="espece" value ="<?= $animal_a_modifier['espece'] ?? '' ?>"
                    class="w-full p-2 rounded-xl border border-stone-300 focus:ring-2 focus:ring-emerald-500 outline-none" required>

                <select name="id_habitat"
                    class="w-full p-2 rounded-xl border border-stone-300 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                    <option value="">-- Sélectionner un habitat --</option>
                    <?php foreach ($liste_habitat as $habitat) { ?>
                        <option value="<?= $habitat['id_habitat'] ?>"
                            <?= (isset($animal_a_modifier) && $animal_a_modifier['id_habitat'] == $habitat['id_habitat']) ? 'selected' : '' ?>>
                            <?= $habitat['nom'] ?>
                        </option>
                    <?php } ?>
                </select>

                <select name="alimentation"
                    class="w-full p-2 rounded-xl border border-stone-300 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                    <option value="">-- Sélectionner un type d'alimentation --</option>
                    <option value="Herbivore"
                        <?= (isset($animal_a_modifier) && $animal_a_modifier['alimentation'] === 'Herbivore') ? 'selected' : '' ?>>
                        Herbivore
                    </option>
                    <option value="Omnivore"
                        <?= (isset($animal_a_modifier) && $animal_a_modifier['alimentation'] === 'Omnivore') ? 'selected' : '' ?>>
                        Omnivore
                    </option>

                    <option value="Carnivore"
                        <?= (isset($animal_a_modifier) && $animal_a_modifier['alimentation'] === 'Carnivore') ? 'selected' : '' ?>>
                        Carnivore
                    </option>
                </select>

                <input type="text" name="image" value ="<?= $animal_a_modifier['image'] ?? '' ?>"
                    class="w-full p-2 rounded-xl border border-stone-300 bg-white" required>

                <input type="text" name="pays" value ="<?= $animal_a_modifier['pays_origine'] ?? '' ?>"
                    class="w-full p-2 rounded-xl border border-stone-300 bg-white" required>
                    
                <input type="text" name="description" value ="<?= $animal_a_modifier['description_courte'] ?? '' ?>"
                    class="w-full p-2 rounded-xl border border-stone-300 bg-white" required>    

                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="closeModal_modifierAnimal()"
                        class="px-5 py-2 rounded-xl bg-stone-100 hover:bg-stone-200 font-bold">
                        Annuler
                    </button>

                    <button type="submit" name="btn_modifier" value ="<?= $animal_a_modifier['id_animal'] ?>"
                        class="px-6 py-2 rounded-xl bg-emerald-600 text-white font-bold hover:bg-emerald-700 transition">
                        Metre à jour
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        function openModal_ajouterAnimal() {
            document.getElementById('animalModal_ajouter').classList.remove('hidden');
            document.getElementById('animalModal_ajouter').classList.add('flex');
        }

        function closeModal_ajouterAnimal() {
            document.getElementById('animalModal_ajouter').classList.add('hidden');
        }

        function closeModal_modifierAnimal() {
            document.getElementById('animalModal_modifier').classList.add('hidden');
        }
    </script>
    <?php if ($animal_a_modifier){ ?>
        <script>
            document.getElementById('animalModal_modifier').classList.remove('hidden');
            document.getElementById('animalModal_modifier').classList.add('flex');
        </script>
    <?php } ?>

</body>
</html>