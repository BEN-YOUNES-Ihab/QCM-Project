# HackathonJuin

## Comment installer le projet sur mon ordinateur?
### Installer le projet git
1. Téléchargez et installez git (installation par défaut): https://git-scm.com/
2. Allez sur votre disque dur à l'endroit où vous souhaitez ajouter le projet.
3. En parallèle, ouvrez votre navigateur web, à la page suivante: https://github.com/ThomasFlandin/PIM
4. Puis cliquez sur "Code" (bouton vert au centre de l'écran)
5. Cliquez sur HTTPS (il est déjà sélectionné par défaut)
6. Copiez le lien qui est affiché
7. Retournez dans l'explorateur de fichier
8. Faites un clique droit n'importe où sur l'écran et cliquez sur `git bash here`
9. Ecrivez: `git clone XXXXX` (Remplacez `XXXX` par l'url que vous avez copié précédemment), puis appuyez sur la touche "Entrer" de votre clavier
10. Voilà, le projet est maintenant installé sur votre ordinateur. Il ne vous reste plus qu'à double-cliquer sur `index.html` et de vous laisser guider par les pages web!

### Installer le sous projet symfony
Attention, pour que le projet fonctionne, il faut qu'il se trouve dans le dossier www de wamp

Ensuite, faites les étapes suivantes:

1. `git pull`

2. Executez Wamp

3. Créez un vhost avec les infos suivantes:<br />
Nom du virtual host: `QCM`<br />
Chemin du vHost: `C:\wamp64\www\PIM\API\QCM\public`<br />


4. Redémarrer le serveur DNS. Pour celà, faites un clic droit sur le logo wamp, à coté de l'horloge windows.<br />
Allez dans outils -> Redémarrer les DNS.

5. Installez les dépendances Symfony. Pour celà, faites un clic droit dans le dossier PIM\API\QCM et lancer un cmd.exe<br />
Executez la commande suivante:<br />
`composer install`


6. Vérifiez le bon fonctionnement de symfony en écrivant dans le navigateur:<br />
http://QCM/

Vous devriez optenir la page d'accueil symfony.


## Rappels pour la gestion du git:
<br />
git pull = copie le contenu du git vers le PC<br />
<br />

git status = permet de connaitre l'états des fichiers <br />
git add -A = appliquer les modifications<br />
git status = pour vérifier que les fichiers modifiés soient en vert<br />
git commit -m "Description de la modification"  = permet de créer un colis avec les fichiers modifier<br />
git push = permet d'envoyer le 'colis' vers les serveurs web de github<br />

<br />

### Pour créer une nouvelle branche:<br/><br/>

git checkout -b nom_nouvelle_branche<br/>

<br />

### Pour changer de branche:<br/><br/>
git checkout nom_branche<br/>
