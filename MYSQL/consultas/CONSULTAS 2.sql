-- select * from movies where release_date BETWEEN '1999-10-01' AND '2004-12-01' ORDER BY release_date desc

-- select * from movies where length between 45 and 150 order by length asc

-- select * from actors where first_name between 'HE%' and 'TO%' order by first_name

-- select * from movies where title like 'T%'

-- select * from movies where release_date like '2000%' order by title

-- select * from movies where title like '%-%' order by asc

-- select * from movies where release_date like '%-10-%' or release_date like '1999-%'

-- select * from actors where first_name like 'j___%y'

-- select movies.title, actors.* from movies, actors 

-- select * from movies t1, actor_movie t2, actors t3  where t1.id=t2,movie_id and t2.actor.id = t3.id

-- esto es un INNER JOIN, t1 = movies, t2 = genres. 
-- SELECT t1.*, t2.name
-- FROM movies AS t1, genres AS t2
-- WHERE t1.genre_id = t2.id;


-- select t1.title, t2.name ,t4.first_name
-- from movies t1
-- 	JOIN genres t2 on t1.genre_id = t2.id
--     JOIN actor_movie t3 ON t1.id = t3.movie_id
--     JOIN actors t4 ON t3.actor_id = t4.id
--     order by 1

-- select t1.title,t2.name
-- from movies t1
-- JOIN genres t2 on t1.genre_id =t2.id 

select t1.title, t3.first_name
FROM movies t1
JOIN actor_movie t2 ON t1.id = t2.movie_id
JOIN actors t3 ON t2.actor_id =t3.id


