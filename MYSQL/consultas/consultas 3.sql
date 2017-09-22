-- SELECT g.name, count(m.title)
-- from genres g
-- left join movies m ON g.id =m.genre_id
-- group by g.name

-- select g.name, min(m.rating)
-- from movies m
-- join genres g on m.genre_id= g.id
-- group by g.name


-- esta consulta tiene un condicion que es el HAVING!!!
-- select g.name, min(m.rating) RATING_MINIMO,count(m.title) CANT_PELIS,max(m.rating), avg(m.rating)
-- from movies m
-- join genres g on m.genre_id= g.id
-- group by g.name
-- having (count(m.title) >=2 AND AVG(m.rating)>=7)

-- select t1.title , count(t2.number)
-- from series t1
-- left join seasons t2 on t1.id = t2.serie_id
-- group by t1.title
-- 
-- 
-- select series.title, seasons.title, seasons.number
-- from series 
-- join seasons on series.id = seasons.serie_id  
-- group by series.title, seasons.title, seasons.number

-- select title, a.first_name
-- from episodes e
-- join actor_episode ae on e.id=ae.episode_id
-- join actors a on ae.actor_id= a.id

select e.title, s.number
from episodes e
join seasons s on e.id= s.id

/*Obtener​ ​ por​ ​ cada​ ​ capítulo​ ​ (episodes)​ , ​ ​ el​ ​ número​ ​ de​ ​ temporada​ ​ (seasons)​ ,
el​ ​ nombre​ ​ de​ ​ la​ ​ serie​ ​ (series)​ , ​ ​ el​ ​ género​ ​ (genres)​​ ​ y ​ ​ la​ ​ cantidad​ ​ de​ ​ actores
(actors)​​ ​ que​ ​ tiene.*/
select e.title, s.number, series.title
from episodes e
join seasons s on e.id = s.id
join series on s.serie_id = series.id


select * from episodes
select * from seasons
select * from series
select * from genres
select * from actors
select * from actor_episode




select * from seasons


