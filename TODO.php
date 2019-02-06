
SELECT id,timestamp, FROM_UNIXTIME(ROUND(timestamp/1000)) AS 'date_formatted' FROM `carnavals`
ORDER BY `carnavals`.`id`  DESC

1549654200
Is equivalent to:
02/08/2019 @ 7:30pm (UTC)

 59400 segundos

1549713600
Is equivalent to:
02/09/2019 @ 12:00pm (UTC)


SELECT id,timestamp, FROM_UNIXTIME(ROUND(timestamp/1000)) AS date
FROM `carnavals`
HAVING (date BETWEEN '2019-02-01 08:00:00' AND '2019-02-05 08:00:00')


Viernes 8 '2019-02-08 19:00:00' AND '2019-02-09 08:00:00')
Sabado 9
Viernes 15
Sábado 16
Vieres 22
Sábado 23
Viernes 1
Sábado 2
Domingo 3
Lunes 4


<!-- SOLO ENCUESTAS DE ENCUESTADORES -->
SELECT * from encuestadores_carnaval e
INNER JOIN carnavals c
on c.userid like CONCAT("%",e.codigo)


<!-- SOLO ENCUESTADOS + FILTRO FECHA -->
SELECT *, FROM_UNIXTIME(ROUND(timestamp/1000)) AS date from encuestadores_carnaval e
INNER JOIN carnavals c
on c.userid like CONCAT("%",e.codigo)
HAVING (date BETWEEN $desde AND $hasta)

cantidad de encuestas en esa fecha para los porcentajes

SELECT COUNT(*) from (SELECT c.id as carnaval_id, FROM_UNIXTIME(ROUND(timestamp/1000)) AS date from encuestadores_carnaval e
INNER JOIN carnavals c
on c.userid like CONCAT("%",e.codigo)
HAVING (date BETWEEN '2019-02-01 08:00:00' AND '2019-02-05 08:00:00')) as Cantidad

<!-- CLAUSULA -->
SELECT transporte as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*)
from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) WHERE transporte IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN '2019-02-01 08:00:00' AND '2019-02-05 08:00:00' ) )),"%") as indexLabel
from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) where transporte IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN '2019-02-01 08:00:00' AND '2019-02-05 08:00:00' ) GROUP BY transporte ORDER BY y desc




SELECT transporte as label, COUNT(*) as y, CONCAT(ROUND(COUNT(*) * 100 / (SELECT COUNT(*)
$clausula) )),"%") as indexLabel
$clausula GROUP BY transporte ORDER BY y desc

$clausula = "from carnavals c INNER JOIN encuestadores_carnaval e on c.userid LIKE CONCAT("%",e.codigo) WHERE transporte IS NOT NULL and (FROM_UNIXTIME(ROUND(timestamp/1000)) BETWEEN '2019-02-01 08:00:00' AND '2019-02-05 08:00:00' )"
