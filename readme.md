Mini MVC
========

À Propos
--------

Petit framework "MVC" (n'ayant pas encore implémenté la partie modèle)
réalisé dans le cadre d'un exercice de candidature chez Oblady.
Le site embarque un routeur PHP pour lancement en mode console.

Lancement
---------

* Se positionner dans le dossier Webroot
* Lancer le framework via la commande `php -S 0.0.0.0:8080 index.php`
* Accéder à l'URL http://127.0.0.1:8000 dans le navigateur.

Utilisation
-----------

### Création d'un Controller

Les controlleurs créés doivent se situés dans le dossier **Controller**.
Le squelette basic d'un controlleur a cette forme :

```
<?php

namespace Controllers;

use Core\Controller;

class MonController extends Controller
{

    // $params contient les paramètres $_GET ainsi que les paramètres injectés par le routeur
    public function action_monAction(array $params)
    {
        // Nos actions se font ici
    }

}
```

### Vues

Par défaut, le controlleur utilisera la vue **moncontrolleur/monaction** située dans le dossier **Views**.
Pour transmettre une variable à une vue, on utilisera la directive suivante :

```
<?php// action du Controller
$this->view->assign("foo", "bar");
```

Une variable foo contenant bar est ainsi transmise à la vue.
Pour utiliser cette variable, nous n'avons qu'à éffectuer `<?= $foo; ?>` dans notre vue.

Pour modifier la vue par défaut d'un controlleur, nous pouvons utiliser la directive suivante :

```
<?php
// action du Controller
$this->view->setTemplate("autrevue");
```

La directive ci-dessus fera appel à la vue autrevue.php située dans le dossier **Views**.
Si la vue est située dans un sous-dossier, on peut y accèder par le biais dans la constante **DS**

```
<?php
// action du Controller
$this->view->setTemplate("sous-repertoire" . DS . "mavue");
```

### Liens

Il est possible de générer des liens à la volée grâce au routeur.
Les routes se situent pas défaut dans le fichier Config/routes.xml.

La structure d'une route par défaut est de la forme :

`<route name="maroute" path="/maroute" controller="MonControlleur" action="action" />`

La route ci-dessus fera appel au Controller MonControlleurController et à la méthode action_action de ce dernier.

Une route peut prendre des paramètres. Par exemple :

`<route name="article" path="/article-(.+)-(\d+).html" controller="Articles" action="index" vars="slug,id" />`

La route ci-dessus possède un paramètre *slug* (première parenthèse) et un paramètre de type entier id (la seconde).
Ces paramètres sont injectés dans la variable $_GET, ou sont accessible en ajoutant un paramètre à l'action de notre controlleur.
