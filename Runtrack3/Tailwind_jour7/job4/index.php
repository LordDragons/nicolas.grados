<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Formule de compte</title>
</head>

<body class="bg-gray-200">
    <div>
        <header class="bg-blue-500 text-white p-4 text-center">
            <h1 class="text-3xl font-bold underline">Mon Site Web</h1>
            <nav class="mt-4">
                <ul class="flex justify-center space-x-4">
                    <li><a href="index.php" class="hover:underline">Accueil</a></li>
                    <li><a href="index.php" class="hover:underline">Inscription</a></li>
                    <li><a href="index.php" class="hover:underline">Connexion</a></li>
                    <li><a href="index.php" class="hover:underline">Rechercher</a></li>
                </ul>
            </nav>
        </header>

        <section class="container mx-auto mt-8 p-4 bg-gray-100 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 underline">Création de Compte</h2>
            <form action="traitement.php" method="post" class="max-w-md mx-auto">

                <!-- Civilité -->
                <div class="mb-4">
                    <label for="civilite" class="block text-sm font-medium text-gray-600">Civilité :</label>
                    <div class="mt-1 space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="civilite" value="Monsieur" id="civilite_monsieur"
                                class="text-blue-500 form-radio focus:ring-0">
                            <span class="ml-2">Monsieur</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="civilite" value="Madame" id="civilite_madame"
                                class="text-blue-500 form-radio focus:ring-0">
                            <span class="ml-2">Madame</span>
                        </label>
                    </div>
                </div>

                <!-- Prénom -->
                <div class="mb-4">
                    <label for="prenom" class="block text-sm font-medium text-gray-600">Prénom :</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="prenom" id="prenom"
                            class="focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Nom -->
                <div class="mb-4">
                    <label for="nom" class="block text-sm font-medium text-gray-600">Nom :</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="nom" id="nom"
                            class="focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Adresse -->
                <div class="mb-4">
                    <label for="adresse" class="block text-sm font-medium text-gray-600">Adresse :</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" name="adresse" id="adresse"
                            class="focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Adresse Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Adresse Email :</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="email" name="email" id="email"
                            class="focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Mot de passe -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Mot de passe :</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="password" name="password" id="password"
                            class="focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Validation du mot de passe -->
                <div class="mb-4">
                    <label for="password_confirm"
                        class="block text-sm font-medium text-gray-600">Confirmer le mot de passe :</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="password" name="password_confirm" id="password_confirm"
                            class="focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Passions -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600">Passions :</label>
                    <div class="space-x-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="passion[]" value="informatique" id="passion_informatique"
                                class="text-blue-500 form-checkbox focus:ring-0">
                            <span class="ml-2">Informatique</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="passion[]" value="voyages" id="passion_voyages"
                                class="text-blue-500 form-checkbox focus:ring-0">
                            <span class="ml-2">Voyages</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="passion[]" value="sport" id="passion_sport"
                                class="text-blue-500 form-checkbox focus:ring-0">
                            <span class="ml-2">Sport</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="passion[]" value="lecture" id="passion_lecture"
                                class="text-blue-500 form-checkbox focus:ring-0">
                            <span class="ml-2">Lecture</span>
                        </label>
                    </div>
                </div>

                <!-- Bouton de validation -->
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                    Valider
                </button>

            </form>
        </section>

        <footer class="bg-red-300 text-white p-3 text-center">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php">Inscription</a></li>
                <li><a href="index.php">Connexion</a></li>
                <li><a href="index.php">Rechercher</a></li>
            </ul>
        </footer>
    </div>
</body>

</html>
