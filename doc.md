#Stratégie Internet

Daniele Pitrolo

##Remarques concernant le projet de site de génération de cartes

###Formulaire

La grande variablité des formats des adresses mél et numéros de téléphone rend difficile de faire un contrôle efficace des données par le biais d'une simple regex dans le fichier HTML. Afin de ne pas bloquer des données valides, l'expression choisie est volontairement laxiste, permettant la saisie de valeurs incomplètes.


###Envoi par courriel

Considérant les problématiques liées à l'envoi de courriels, la fonction, bien que correcte (voir le log présent dans le dossier), a une très grande probabilité de ne pas être efficace (et ce malgré le recours à l'encodage de l'image en base64).
Il serait préférable de simplement faire télécharger l'image à l'utilisateur.

Référence: [http://blog.codinghorror.com/so-youd-like-to-send-some-email-through-code/](http://blog.codinghorror.com/so-youd-like-to-send-some-email-through-code/)
