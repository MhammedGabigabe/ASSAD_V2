<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - ASSAD Zoo Virtuel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-stone-50 font-sans min-h-screen flex flex-col">

    <nav class="bg-emerald-900 text-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="../../index.php" class="text-2xl font-bold tracking-wider flex items-center gap-2">
                <i class="fas fa-paw"></i> ASSAD ZOO
            </a>
            <a href="../../index.php" class="text-emerald-200 hover:text-amber-400 transition">
                <i class="fas fa-home mr-1"></i> Accueil
            </a>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl overflow-hidden border border-stone-200">
            
            <div class="bg-emerald-800 p-8 text-center text-white relative">
                <div class="absolute inset-0 opacity-20">
                    <img src="https://www.transparenttextures.com/patterns/carbon-fibre.png" alt="pattern">
                </div>
                <div class="relative z-10">
                    <div class="w-20 h-20 bg-amber-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-unlock-alt text-3xl text-emerald-900"></i>
                    </div>
                    <h2 class="text-3xl font-bold">Bon retour !</h2>
                    <p class="text-emerald-100 mt-2">Accédez à votre espace personnel</p>
                </div>
            </div>

            <form action="../controllers/login.php" method="POST" class="p-8 space-y-6">
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Adresse Email</label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-3 top-3 text-emerald-700"></i>
                            <input type="email" name="email" required placeholder="votre@email.com" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-1">
                            <label class="block text-sm font-semibold text-gray-700">Mot de passe</label>
                            <a href="#" class="text-xs text-emerald-700 hover:text-amber-600">Oublié ?</a>
                        </div>
                        <div class="relative">
                            <i class="fas fa-key absolute left-3 top-3 text-emerald-700"></i>
                            <input type="password" name="password" required placeholder="••••••••" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-emerald-600 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-600">Se souvenir de moi</label>
                </div>

                <button type="submit" class="w-full bg-emerald-800 text-white font-bold py-4 rounded-xl hover:bg-emerald-700 transition transform hover:scale-[1.01] shadow-lg flex items-center justify-center gap-2">
                    <span>Se connecter</span>
                    <i class="fas fa-arrow-right text-sm text-amber-400"></i>
                </button>

                <div class="text-center pt-4 border-t border-gray-100">
                    <p class="text-gray-600 text-sm">
                        Pas encore de compte ? 
                        <a href="register.php" class="text-emerald-800 font-bold hover:text-amber-600">Créer un compte</a>
                    </p>
                </div>
            </form>
        </div>
    </main>

    <footer class="py-6 text-center text-gray-400 text-xs">
        <p>Connexion sécurisée SSL &copy; 2025 Zoo ASSAD</p>
    </footer>

</body>
</html>