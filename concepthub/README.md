technische umsetzung.

Das soziale Netzwerk concepthub. stellt ein Konzept-Portal dar, das Studierenden der Fachhochschule Salzburg dazu nutzen können, sich gegenseitig über ihre Idee auszutauschen und bestenfall‘s ihre Ideen umsetzen können.
Die Website wurde mittels rängigen Web-Technologien umgesetzt, um eine hohe Browser-Kompatibilität zu erzielen und für mich persönlich die Basics zu lernen.

Insbesondere wurde mit CSS3, HTML5, JavaScript, pSQL und JQuery3.3.1 gearbeitet. 
CSS3 um den Style des Dokuments in nur 942 Zeilen möglichst ansprechend für den Nutzer zu gestalten und ihn mittels ausgiebigen Animationen und Transitions durch die Oberfläche zu führen.
Hier habe ich mich auf die normalize.css von Nicolas Gallagher verlassen um ein einheitliches Erscheinungsbild zwischen Browsers zu erzielen.
HTML5 wurde eigesetzt um die Datei zu strukturieren und vor Allem bei Formularen neue Technologien im Front-End zum Einsatz zu bringen.
Durch PHP wurde größtenteils eine übersichtliche  Dateistruktur erzielt und eine Schnittstelle zur Datenbank erstellt, sowie Cookies und AJAX-Requests gehandled.

Alle Queries zur Datenbank wurden mittels PDO-Prepared Statements gemacht und teilweiße escaped um Injections vorzubeugen und die Seite möglichst sicher zu gestalten. Hierzu wurden weiters die Passwörter mittels BCRYPT gehashed und gesalzen um alle in einen variablen String umzuwandeln.
Die Datenbank besteht aus acht Tabellen und ist somit relativ komplex aufgebaut. Sie wurde mit PostgreSQL-Queries aufgebaut und wird größtenteils mit User-Input gefüllt. Hier wurde mit verschiedenen JOINs und UNIONs gearbeitet um nur möglichst wenig Anfrage an den Datenbank-Server zu schicken.

JQuery wurde genutzt um den Workflow in JavaScript zu vereinfachen und zu beschleunigen, was kein Problem war, dar ich zuvor weder mit JavaScript noch JQuery gearbeitet habe.
Gerade bei AJAX-Requests war dies eine enorme Hilfe um die einzelnen Datenpakete klein zu halten und ein flüssiges Browsing-Erlebnis zu erzielen.
Generell wurden mit JavaScript einige Features in die Seite eigebaut, beispielsweiße eine Live-Verifizierung von Usernames oder Applaus-Buttons.

Am aufwändigsten umgesetzt ist die Stöber-Seite, hier werden auf Klick oder Tastendruck, alte Daten versteckt, Neue via ein PHP-Skript geladen und dann angezeigt. Dabei muss weiters darauf geachtet werden, dass Konzepte auf beim zurückklicken nicht doppelt geladen werden.

Bei dem Projekt war sehr viel Neues für mich und vor allem den Umfang habe ich etwas geringer eingeschätzt.
Grundsätzlich habe ich keine herausragenden APIs oder Plug-Ins hergenommen, dennoch denke ich, dass ich sehr Vieles über die bisher schon bekannten Techniken gelernt habe. 
Ich weiß nun was alles in CSS möglich ist, kenne mich vor allem mit Animations, Transitions, Variablen, Flex-Box, allen möglichen Properties und Pseudo-Elementen sehr gut aus. 
Auch in JavaScript, in dem ich zuvor nur in der Übung Web-Programmieren zu tun hatte (und natürlich ausgiebig bei der FH-Bewerbung), komme ich sehr gut zurecht und kenne grundlegende Befehle und bin in der Lage einfache Programme zu schreiben. 
Ich habe mich zwar nicht sehr für das Back-End interessiert, und auch keine großen Welt-Neuheiten ausprogrammiert, dennoch denke ich, dass ich sehr viel dazugelernt habe (Datenverarbeitung am Server,  Filehandling, einige Funktionen, et cetera) und jetzt weiß wie viel Spaß es macht mit PHP zu arbeiten. 

Mein Zeitmanagement war nicht das Allerbeste, da es für mich sehr schwer war den relativen Arbeitsaufwand abzuschätzen, somit wurden es einige Stunden mehr als geplant. Ich bin aber inzwischen auch schon so weit, dass ich halbwegs abschätzen kann, welchen Aufwand etwas darstellt.