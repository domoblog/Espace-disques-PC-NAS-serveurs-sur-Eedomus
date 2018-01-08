<?php

/*************************************************************************************/
/*                          ### Monitor espace disque ###                            */
/*                                                                                   */
/*                            Par Aurel@www.domo-blog.fr                             */
/*                                                                                   */
/*************************************************************************************/

$api_user = 'xxxxxx'; // ici votre API user eedomus
$api_secret = 'xxxxxxxxxx'; // ici votre API secret eedomus
$periph_id = 11111; // ici le code API de l'etat à mettre à jour

$value = round(disk_free_space("/volume2/web") / 1024 / 1024 / 1024); // ici chemin repertoire web sur le serveur

$url = "http://api.eedomus.com/set?action=periph.value";
$url .= "&api_user=$api_user";
$url .= "&api_secret=$api_secret";
$url .= "&periph_id=$periph_id";
$url .= "&value=$value";

$result = file_get_contents($url);

if (strpos($result, '"success": 1') == false)
	{
	echo "Une erreur est survenue: [".$result."]";
	}
else
	{
	echo "MAJ espace disque OK";
	}
?>