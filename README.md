# ruby
mineral collecting database


## Download

Downloade dir das Verzeichnis rechts oben unter Code oder über https://github.com/Gwennyphar/ruby.git

## How to run
* ruby-main.zip in das gewünschte Web Server Verzeichnis ablegen. ruby-main.zip entpacken und in ruby umbenennen.
* Im Verzeichnis einen Ordner docs erstellen.
* Mit chmod -R 775 ruby gewünschte Schreibrechte setzen.
* Datenbank *ruby_db.sql aus dem Verzeichnis bspw. über phpmyadmin oder Maria DB importieren
* Datenbankzugang unter ruby/inc/db.php in Zeile 10 einrichten
  if(db_switch() == 0) {
    new mysqli('host', 'benutzer', 'passwort', 'datenbank'); 
  }

  Zeile 26: $server = 1 ändern zu $server = 0;
  
## How to use
* Im Browser </htttp://deinhostname/>/ruby eingeben. (</deinhostname/> = localhost oder www)
* Mit *demo *demo anmelden.
* Zugangsdaten können unter Konto verwalten geändert werden.
 
  Bevor Fundstücke erfasst werden können, ist es ratsam zuerst Fundort und Mineralart anzulegen.
  Diese brauchen nach dem Erstellen für das Mineral dann nur noch ausgewählt werden.

### Fundstelle anlegen:
* Fundorte verwalten > Fundort anlegen > Fundort, Region eintragen > Speichern
  
  ![Bildschirmfoto_2022-12-27_00-13-45](https://user-images.githubusercontent.com/34284968/209588866-41b70349-9810-446e-981a-623a86552651.png)

### Mineralien anlegen:
* Mineralien verwalten > Mineral anlegen > Name, Formel eintragen > Speichern
  
  ![Bildschirmfoto_2022-12-27_00-30-06](https://user-images.githubusercontent.com/34284968/209588880-649f4239-2b93-42cd-9ef4-d345bce8d76f.png)

### Sammlung hinzufügen
* Neues Exemplar anlegen > Infos eintragen und Foto auswählen > Speichern > Zur Übersicht klicken
  
![Bildschirmfoto_2022-12-27_00-33-58](https://user-images.githubusercontent.com/34284968/209588893-a35ef877-9c15-4e47-be21-e96ff76a3d71.png)

![Bildschirmfoto_2022-12-27_00-34-31](https://user-images.githubusercontent.com/34284968/209588896-a310794d-be30-4b0a-a653-b673168c883d.png)



