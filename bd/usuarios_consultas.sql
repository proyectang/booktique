CREATE USER booktique_admin PASSWORD 'b00ktique';
ALTER ROLE booktique_admin WITH SUPERUSER  ;

	--//Comando para ingresar a la base de datos desde la terminal
psql -U booktique_admin -d booktique_db -h localhost -W