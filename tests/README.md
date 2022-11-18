Ce jeu de donnée est issu du repository [Cross Site Scripting ( XSS ) Vulnerability Payload List](https://github.com/payloadbox/xss-payload-list).

Après exécution du script php [test.php](test.php), chacune des entrées du fichier [data.txt](data.txt) sont réparties :
 - ou bien dans [data_deleted.txt](data_deleted.txt) si les règles-filtres ne laissent pas passer le contenu ;
 - ou bien dans [data_saved.txt](data_saved.txt) si le filtre laisse ce contenu XSS passer.


Note : certaines lignes de [data_saved.txt](data_saved.txt) n'ont aucun effet sur site-malveillant.com ; tandis que d'autres en ont.