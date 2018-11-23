<?

//zona| municipio| hotel| categoria| dia| ocupadas| plazas| porcentaje
SELECT zona, indec_nombre as 'municipio', denominacion as 'hotel', categoria,fecha as 'dia',ocupadas,plazas,((ocupadas/plazas)) * 100 as porcentaje FROM `eoh_values` v LEFT JOIN eohs e on e.id = v.eoh_id left JOIN hotels h on h.id = e.hotel_id LEFT JOIN municipios m on h.municipio_id = m.id where v.fecha BETWEEN '2018-11-16' and '2018-11-19' and h.muestra = 1 or h.municipio_id = 15 and e.user_id = 2
///agrupamiento
SELECT zona, municipio, hotel,categoria, avg(porcentaje) as porcentaje FROM (SELECT zona, indec_nombre as 'municipio', denominacion as 'hotel', categoria,fecha as 'dia',ocupadas,plazas,((ocupadas/plazas)) * 100 as porcentaje FROM `eoh_values` v LEFT JOIN eohs e on e.id = v.eoh_id left JOIN hotels h on h.id = e.hotel_id LEFT JOIN municipios m on h.municipio_id = m.id where v.fecha BETWEEN '2018-11-16' and '2018-11-19' and h.muestra = 1 or h.municipio_id = 15 and e.user_id = 2 order by hotel) as subquery group by zona, municipio, hotel,categoria
//muestra sin ponderar
SELECT h.zona, h.categoria,m.indec_nombre,  h.denominacion,s.porcentaje from hotels h
LEFT JOIN (SELECT hotel_id, zona, municipio, hotel,categoria, avg(porcentaje) as porcentaje
        FROM  (SELECT h.id as hotel_id , zona, indec_nombre as "municipio", denominacion as "hotel", categoria,fecha as "dia",ocupadas,plazas,((ocupadas/plazas)) * 100 as porcentaje
        FROM `eoh_values` v
        LEFT JOIN eohs e
        on e.id = v.eoh_id
        left JOIN hotels h
        on h.id = e.hotel_id
        LEFT JOIN municipios m
        on h.municipio_id = m.id
        where v.fecha BETWEEN '2018-11-16' and '2018-11-19'
        and h.muestra = 1 or h.municipio_id = 15
        and e.user_id = 2 order by hotel) as subquery
        group by zona, municipio, hotel,categoria
        order by hotel) AS s
ON h.id = s.hotel_id
LEFT JOIN municipios m
on h.municipio_id = m.id
where h.muestra = 1 or h.municipio_id = 15


///muestra pondera por categoria
SELECT  municipio,categoria, avg(porcentaje) as porcentaje FROM (SELECT zona, indec_nombre as 'municipio', denominacion as 'hotel', categoria,fecha as 'dia',ocupadas,plazas,((ocupadas/plazas)) * 100 as porcentaje FROM `eoh_values` v LEFT JOIN eohs e on e.id = v.eoh_id left JOIN hotels h on h.id = e.hotel_id LEFT JOIN municipios m on h.municipio_id = m.id where v.fecha BETWEEN '2018-11-16' and '2018-11-19' and h.muestra = 1 or h.municipio_id = 15 and e.user_id = 2 order by hotel) as subquery group by municipio,categoria order by municipio, categoria


////
select A.zona, A.categoria,A.indec_nombre,  A.denominacion,A.porcentaje , B.porcentaje as ponderacion,ifnull(A.porcentaje,B.porcentaje) as porcentaje_final,if(ifnull( ifnull(A.porcentaje,B.porcentaje),0)=0,'No se pudo ponderar', if(ifnull(A.porcentaje,0) = 0,'Si','No') ) as ponderado
from (SELECT h.zona, h.categoria,m.indec_nombre,  h.denominacion,s.porcentaje from hotels h
LEFT JOIN (SELECT hotel_id, zona, municipio, hotel,categoria, avg(porcentaje) as porcentaje
        FROM  (SELECT h.id as hotel_id , zona, indec_nombre as "municipio", denominacion as "hotel", categoria,fecha as "dia",ocupadas,plazas,((ocupadas/plazas)) * 100 as porcentaje
        FROM `eoh_values` v
        LEFT JOIN eohs e
        on e.id = v.eoh_id
        left JOIN hotels h
        on h.id = e.hotel_id
        LEFT JOIN municipios m
        on h.municipio_id = m.id
        where v.fecha BETWEEN '2018-11-16' and '2018-11-19'
        and h.muestra = 1 or h.municipio_id = 15
        and e.user_id = 2 order by hotel) as subquery
        group by zona, municipio, hotel,categoria
        order by hotel) AS s
ON h.id = s.hotel_id
LEFT JOIN municipios m
on h.municipio_id = m.id
where h.muestra = 1 or h.municipio_id = 15) as A
left Join (SELECT  municipio,categoria, avg(porcentaje) as porcentaje FROM (SELECT zona, indec_nombre as 'municipio', denominacion as 'hotel', categoria,fecha as 'dia',ocupadas,plazas,((ocupadas/plazas)) * 100 as porcentaje FROM `eoh_values` v LEFT JOIN eohs e on e.id = v.eoh_id left JOIN hotels h on h.id = e.hotel_id LEFT JOIN municipios m on h.municipio_id = m.id where v.fecha BETWEEN '2018-11-16' and '2018-11-19' and h.muestra = 1 or h.municipio_id = 15 and e.user_id = 2 order by hotel) as subquery group by municipio,categoria order by municipio, categoria) as B
on A.indec_nombre = B.municipio and A.categoria = B.categoria


//////solo la muestra de corrientes
select A.zona, A.categoria,A.indec_nombre,  A.denominacion,A.porcentaje , B.porcentaje as ponderacion,ifnull(A.porcentaje,B.porcentaje) as porcentaje_final,if(ifnull( ifnull(A.porcentaje,B.porcentaje),0)=0,'No se pudo ponderar', if(ifnull(A.porcentaje,0) = 0,'Si','No') ) as ponderado
from (SELECT h.zona, h.categoria,m.indec_nombre,  h.denominacion,s.porcentaje from hotels h
LEFT JOIN (SELECT hotel_id, zona, municipio, hotel,categoria, avg(porcentaje) as porcentaje
        FROM  (SELECT h.id as hotel_id , zona, indec_nombre as "municipio", denominacion as "hotel", categoria,fecha as "dia",ocupadas,plazas,((ocupadas/plazas)) * 100 as porcentaje
        FROM `eoh_values` v
        LEFT JOIN eohs e
        on e.id = v.eoh_id
        left JOIN hotels h
        on h.id = e.hotel_id
        LEFT JOIN municipios m
        on h.municipio_id = m.id
        where v.fecha BETWEEN '2018-11-16' and '2018-11-19'
        and h.muestra = 1
        and e.user_id = 2 order by hotel) as subquery
        group by zona, municipio, hotel,categoria
        order by hotel) AS s
ON h.id = s.hotel_id
LEFT JOIN municipios m
on h.municipio_id = m.id
where h.muestra = 1) as A
left Join (SELECT  municipio,categoria, avg(porcentaje) as porcentaje FROM (SELECT zona, indec_nombre as 'municipio', denominacion as 'hotel', categoria,fecha as 'dia',ocupadas,plazas,((ocupadas/plazas)) * 100 as porcentaje FROM `eoh_values` v LEFT JOIN eohs e on e.id = v.eoh_id left JOIN hotels h on h.id = e.hotel_id LEFT JOIN municipios m on h.municipio_id = m.id where v.fecha BETWEEN '2018-11-16' and '2018-11-19' and h.muestra = 1 or h.municipio_id = 15 and e.user_id = 2 order by hotel) as subquery group by municipio,categoria order by municipio, categoria) as B
on A.indec_nombre = B.municipio and A.categoria = B.categoria





///on fail ponderacion categoria, ponderacion municipio
//muestra sin ponderar

SELECT zona, categoria, indec_nombre, denominacion, ifnull(porcentaje_final,M.porcentaje) as porcentaje , ifnull(ponderado,'por Municipio') as ponderado FROM
(select A.zona, A.categoria,A.indec_nombre,  A.denominacion,A.porcentaje , B.porcentaje as ponderacion,ifnull(A.porcentaje,B.porcentaje) as porcentaje_final,if(ifnull( ifnull(A.porcentaje,B.porcentaje),0)=0,null, if(ifnull(A.porcentaje,0) = 0,'Por Categoria','No') ) as ponderado
from (SELECT h.zona, h.categoria,m.indec_nombre,  h.denominacion,s.porcentaje from hotels h
LEFT JOIN (SELECT hotel_id, zona, municipio, hotel,categoria, avg(porcentaje) as porcentaje
        FROM  (SELECT h.id as hotel_id , zona, indec_nombre as "municipio", denominacion as "hotel", categoria,fecha as "dia",ocupadas,plazas,((ocupadas/plazas)) * 100 as porcentaje
        FROM `eoh_values` v
        LEFT JOIN eohs e
        on e.id = v.eoh_id
        left JOIN hotels h
        on h.id = e.hotel_id
        LEFT JOIN municipios m
        on h.municipio_id = m.id
        where v.fecha BETWEEN '2018-11-16' and '2018-11-19'
        and h.muestra = 1 or h.municipio_id = 15
        and e.user_id = 2 order by hotel) as subquery
        group by zona, municipio, hotel,categoria
        order by hotel) AS s
ON h.id = s.hotel_id
LEFT JOIN municipios m
on h.municipio_id = m.id
where h.muestra = 1 or h.municipio_id = 15) as A
left Join (SELECT  municipio,categoria, avg(porcentaje) as porcentaje FROM (SELECT zona, indec_nombre as 'municipio', denominacion as 'hotel', categoria,fecha as 'dia',ocupadas,plazas,((ocupadas/plazas)) * 100 as porcentaje FROM `eoh_values` v LEFT JOIN eohs e on e.id = v.eoh_id left JOIN hotels h on h.id = e.hotel_id LEFT JOIN municipios m on h.municipio_id = m.id where v.fecha BETWEEN '2018-11-16' and '2018-11-19' and h.muestra = 1 or h.municipio_id = 15 and e.user_id = 2 order by hotel) as subquery group by municipio,categoria order by municipio, categoria) as B
on A.indec_nombre = B.municipio and A.categoria = B.categoria
) as T

left join (SELECT  municipio, avg(porcentaje) as porcentaje FROM (SELECT zona, indec_nombre as 'municipio', denominacion as 'hotel', categoria,fecha as 'dia',ocupadas,plazas,((ocupadas/plazas)) * 100 as porcentaje FROM `eoh_values` v LEFT JOIN eohs e on e.id = v.eoh_id left JOIN hotels h on h.id = e.hotel_id LEFT JOIN municipios m on h.municipio_id = m.id where v.fecha BETWEEN '2018-11-16' and '2018-11-19' and h.muestra = 1 or h.municipio_id = 15 and e.user_id = 2 order by hotel) as subquery group by municipio order by municipio) as M
on T.indec_nombre = M.municipio

?>
