<?php
session_start();
if(isset($_SESSION['erreur'])){
?>
<script>
    alert("<?=$_SESSION['erreur'];?>");
</script>
<?php
unset($_SESSION['erreur']);   
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - ASSAD Zoo Virtuel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-stone-50 font-sans min-h-screen flex flex-col">

    <nav class="bg-emerald-900 text-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold tracking-wider flex items-center gap-2">
                <i class="fas fa-paw"></i> ASSAD ZOO
            </a>
            <a href="login.php" class="text-amber-400 hover:underline">Déjà inscrit ? Se connecter</a>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center py-12 px-4">
        <div class="max-w-xl w-full bg-white rounded-3xl shadow-xl overflow-hidden border border-stone-200">
            <div class="bg-emerald-800 p-6 text-center text-white">
                <h2 class="text-3xl font-bold">Créer un compte</h2>
                <p class="text-emerald-200 mt-2">Rejoignez l'aventure du Zoo Virtuel CAN 2025</p>
            </div>

            <form action="../controllers/register.php" method="POST" class="p-8 space-y-5">
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <label class="cursor-pointer">
                        <input type="radio" name="role" value="visiteur" class="peer hidden" checked>
                        <div class="text-center p-4 border-2 rounded-xl peer-checked:border-amber-500 peer-checked:bg-amber-50 hover:bg-gray-50 transition">
                            <i class="fas fa-user text-2xl mb-2 text-emerald-800"></i>
                            <span class="block font-bold">Visiteur</span>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="role" value="guide" class="peer hidden">
                        <div class="text-center p-4 border-2 rounded-xl peer-checked:border-amber-500 peer-checked:bg-amber-50 hover:bg-gray-50 transition">
                            <i class="fas fa-map-signs text-2xl mb-2 text-emerald-800"></i>
                            <span class="block font-bold">Guide</span>
                        </div>
                    </label>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nom Complet</label>
                        <input type="text" name="fullname" required placeholder="Ex: Jean Dupont" 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" required placeholder="exemple@mail.com" 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Mot de passe</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                        <input type="password" name="password" required placeholder="••••••••" 
                               class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Utilisez au moins 8 caractères avec des chiffres.</p>
                </div>

                <!-- <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Confirmer le mot de passe</label>
                    <div class="relative">
                        <i class="fas fa-check-circle absolute left-3 top-3 text-gray-400"></i>
                        <input type="password" name="confirm_password" required placeholder="••••••••" 
                               class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>
                </div> -->

                <button type="submit" name="register" class="w-full bg-amber-500 text-emerald-950 font-bold py-3 rounded-xl hover:bg-amber-400 transition transform hover:scale-[1.02] shadow-md">
                    S'inscrire maintenant
                </button>
            </form>
        </div>
    </main>

    <footer class="bg-emerald-950 text-emerald-700 py-6 text-center text-sm">
        <p>&copy; 2025 Zoo ASSAD - Inscription sécurisée</p>
    </footer>

</body>
</html>