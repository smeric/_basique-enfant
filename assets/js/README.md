# README #

### Génération du fichier json de traduction languages/editor.js.pot ###

J'ai utilisé [wp-cli](https://wp-cli.org/) pour générer le fichier `languages/_basique-enfant.js.pot` qui contient les chaines à traduire présentes dans `editor.js` :
```dos
> [wp i18n](https://github.com/wp-cli/i18n-command) make-pot . languages/_basique-enfant.js.pot --slug=_basique-enfant --domain=_basique-enfant
```
Puis je duplique `_basique-enfant.js.pot` vers `_basique-enfant.js-fr_FR.po` pour faire la traduction en français :
```dos
> copy languages/_basique-enfant.js.pot languages/_basique-enfant.js-fr_FR.po
```
J'édite le fichier avec notepad++ et j'ajoute les traductions françaises. Puis je lance la génération du fichier de traduction au format json :
```dos
>wp i18n make-json languages\_basique-enfant.js-fr_FR.po --no-purge --pretty-print
```
le fichier généré à un nom (`_basique-enfant.js-fr_FR-7ea2683d6f213926d1bc30eb2fbf4503.json`) qui ne permet pas son inclusion. Je n'ai pas vraiment essayé de savoir pourquoi et je l'ai renomé d'après [ce tuto](https://pascalbirchler.com/internationalization-in-wordpress-5-0/) en `_basique-enfant-fr_FR-_basique-enfant-gutenberg-editor.json` et ça fonctionne :)

* Block Editor Handbook / Developer Documentation / [Internationalization](https://developer.wordpress.org/block-editor/developers/internationalization/)
* [`wp i18n <command>`](https://developer.wordpress.org/cli/commands/i18n/)

