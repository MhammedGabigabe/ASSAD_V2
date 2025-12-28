<?php
require_once "CodeSource/controllers/animal.php";
require_once "CodeSource/controllers/habitat.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASSAD - Zoo Virtuel CAN 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">

    <nav class="bg-emerald-800 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold tracking-wider flex items-center gap-2">
                <i class="fas fa-paw"></i> ASSAD ZOO
            </a>
            
            <div class="hidden md:flex space-x-6">
                <a href="#animals" class="hover:text-amber-400 transition">Animaux</a>
                <a href="#tours" class="hover:text-amber-400 transition">Visites Guidées</a>
                <a href="CodeSource/views/login.php" class="bg-amber-500 px-4 py-2 rounded-lg font-semibold hover:bg-amber-600 transition">Connexion</a>
                <a href="CodeSource/views/register.php" class="border border-white px-4 py-2 rounded-lg hover:bg-white hover:text-emerald-800 transition">S'inscrire</a>
            </div>
        </div>
    </nav>

    <header class="relative bg-emerald-900 h-[500px] flex items-center text-white overflow-hidden">
        <div class="absolute inset-0 opacity-40">
            <img src="https://images.unsplash.com/photo-1546182990-dffeafbe841d?auto=format&fit=crop&w=1350&q=80" alt="Lion de l'Atlas" class="w-full h-full object-cover">
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-2xl bg-black/30 p-8 rounded-2xl backdrop-blur-sm border border-white/20">
                <span class="bg-amber-500 text-black px-3 py-1 rounded-full text-sm font-bold mb-4 inline-block">SPÉCIAL CAN 2025 🇲🇦</span>
                <h1 class="text-5xl font-extrabold mb-4">Rencontrez Asaad, le Roi de l'Atlas</h1>
                <p class="text-lg mb-6 text-gray-200">Symbole de force et de noblesse, découvrez l'histoire fascinante du Lion de l'Atlas dans notre parcours interactif dédié aux supporters de la Coupe d'Afrique.</p>
                <a href="CodeSource/views/fiche.php" class="bg-amber-500 text-black px-8 py-3 rounded-full font-bold hover:scale-105 transition transform inline-block">Découvrir la Fiche</a>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">

        <section id="tours" class="mb-16">
            <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
                <div>
                    <h2 class="text-3xl font-bold text-emerald-900 italic">Explorez le Zoo avec nos Guides</h2>
                    <p class="text-gray-600">Recherchez une visite virtuelle adaptée à votre emploi du temps de supporter.</p>
                </div>
                <form method="POST" class="flex w-full md:w-96 shadow-sm">
                    <input type="text" name="search_tour" placeholder="Rechercher une visite" class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <button class="bg-emerald-700 text-white px-6 py-2 rounded-r-lg hover:bg-emerald-800 transition">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-xl transition">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <span class="bg-emerald-100 text-emerald-700 text-xs font-bold px-2 py-1 rounded">FRANÇAIS</span>
                            <span class="text-amber-600 font-bold">15.00 €</span>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Parcours des Lions de l'Atlas</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">Une immersion totale dans l'habitat naturel des lions marocains avec un guide expert.</p>
                        <div class="flex items-center gap-4 text-sm text-gray-600 mb-6">
                            <span><i class="far fa-calendar-alt mr-1"></i> 20/12/2025</span>
                            <span><i class="far fa-clock mr-1"></i> 1h30</span>
                        </div>
                        <a href="login.php" class="block text-center bg-gray-100 text-gray-700 py-2 rounded-lg hover:bg-gray-200 transition">Connectez-vous pour réserver</a>
                    </div>
                </div>
                </div>
        </section>

        <section id="animals">
            <div class="bg-emerald-50 p-6 rounded-2xl mb-10 border border-emerald-100">
                <h2 class="text-2xl font-bold text-emerald-900 mb-6">Nos Animaux d'Afrique et d'ailleurs</h2>
                
                <form method="POST" action="#animals" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-emerald-800 mb-1">Habitat</label>
                        <select name="habitat" class="w-full p-2 rounded-lg border focus:ring-2 focus:ring-emerald-500">
                            <option value="">Tous les habitats</option>
                            <?php

                                foreach($liste_habitat as $habitat){
                                    $selected = (isset($_POST['habitat']) && $_POST['habitat'] == $habitat['id_habitat']) ? 'selected' : '';
                                    echo "<option value='{$habitat['id_habitat']}' $selected> {$habitat['nom']}</option>";
                                }
                            
                            ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-emerald-800 mb-1">Pays Africain</label>
                        <select name="pays" class="w-full p-2 rounded-lg border focus:ring-2 focus:ring-emerald-500">
                            <option value="">Tous les pays</option>
                            <?php
                                foreach($liste_pays as $pays){
                                    $selected = (isset($_POST['pays']) && $_POST['pays'] == $pays['pays_origine']) ? 'selected' : '';
                                    echo "<option value='{$pays['pays_origine']}' $selected> {$pays['pays_origine']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" name="btn_filtrer" class="w-full bg-emerald-600 text-white py-2 rounded-lg font-bold hover:bg-emerald-700 transition">Filtrer</button>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

                <?php

                     foreach($liste_animaux as $animal) {
                       
                       echo "
                            <div class='group cursor-pointer'>
                                <div class='relative overflow-hidden rounded-2xl mb-3'>
                                    <img src='{$animal['image']}' alt='{$animal['nom']}' class='w-full h-64 object-cover group-hover:scale-110 transition duration-500'>
                                    <div class='absolute bottom-2 left-2 bg-white/90 px-2 py-1 rounded text-xs font-bold text-emerald-800'>{$animal['pays_origine']}</div>
                                </div>
                                <h3 class='font-bold text-lg text-gray-800'>{$animal['nom']}</h3>
                                <p class='text-sm text-gray-500 italic text-emerald-600'>{$animal['espece']}</p>
                            </div>
                        "; 
                     }          
                        
                ?>

            </div>
        </section>

    </main>

    <footer class="bg-emerald-950 text-emerald-100 py-12 mt-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold mb-4">ASSAD VIRTUAL ZOO</h2>
            <p class="text-emerald-400 mb-6 italic">Célébrons la faune africaine pendant la CAN 2025.</p>
            <div class="flex justify-center space-x-6 mb-8">
                <a href="#" class="text-2xl hover:text-amber-400"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-2xl hover:text-amber-400"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-2xl hover:text-amber-400"><i class="fab fa-twitter"></i></a>
            </div>
            <p class="text-sm text-emerald-700">&copy; 2025 Zoo ASSAD - Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>