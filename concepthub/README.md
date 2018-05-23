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