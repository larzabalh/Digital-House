-- inserta registros con sub-querys
insert actor_movie (actor_id,movie_id)
values (
(select id from actors where first_name like '%harrison%'),
(select id from movies where title like '%La vida es bella%'))

insert actor_movie (actor_id,movie_id)
select id, (select id from movies where title like '%avatar%')
from actors
order by id desc
limit 2


INSERT INTO movies
values
		(null, now(),null,'peli ejemplo2',9.1,2,'2017-09-26',120,3),
		(null, now(),null,'peli ejemplo3',9.1,2,'2017-09-26',120,3),
		(null, now(),null,'peli ejemplo4',9.1,2,'2017-09-26',120,3),
		(null, now(),null,'peli ejemplo5',9.1,2,'2017-09-26',120,3),
		(null, now(),null,'peli ejemplo6',9.1,2,'2017-09-26',120,3)

select * from movies

insert actors (first_name,last_name,rating,favorite_movie_id) values ('Omar', 'Perez', 6.6,2)

insert actor_movie (actor_id,movie_id)values (50,22) 

update movies set awards = 0

update movies set awards =2 where year(release_date) ='2010'

delete from movies where id = 22

insert genres (name,ranking) values
			('risa', 13)

UPDATE genres set active = 1 where ranking >=5          

delete from genres where active =0

