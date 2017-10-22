select *from movies where title like 'Toy %'


SELECT idregistro_gasto,rg.fecha,rg.importe,gasto.nombre,tipo_gasto.tipo_gasto,mp.forma_de_pago,rg.condicion,concat(year(rg.fecha),'-',month(rg.fecha)) AS periodo
          FROM registro_gasto rg
          JOIN gasto ON rg.nombre_gasto_id = gasto.idgasto
          JOIN tipo_gasto ON rg.tipo_gasto_id = tipo_gasto.idtipo_gasto
          JOIN medio_de_pago mp ON rg.medio_pago_id = mp.idmedio_de_pago
          WHERE fecha like '%'