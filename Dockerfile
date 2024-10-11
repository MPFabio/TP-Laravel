# Utilise la dernière version de l'image Ubuntu comme base du conteneur
FROM ubuntu:latest

# Définit /app comme workdir, tous les fichiers et commandes seront exécutés dans ce répertoire
WORKDIR /app

# Mise à jour la liste des paquets et installation des extensions PHP 8.2 nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    software-properties-common \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update && apt-get install -y \
    curl \
    php8.2-cli \
    php8.2-mbstring \
    php8.2-xml \
    php8.2-zip \
    php8.2-curl \
    php8.2-mysql \
    php8.2-gd \
    unzip \
    git \
    && apt-get clean

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copie tous les fichiers du projet local dans le conteneur, dans le répertoire /app
COPY . .

# Exécute Composer pour installer toutes les dépendances définies dans composer.json
RUN composer install

# Suppression du storage et création du lien symbolique
RUN rm -f public/storage && php artisan storage:link

# Expose le port 3030 pour l'application Laravel
EXPOSE 3030