-- UNO CUENTAS BANCARIAS CON BANCO
SELECT banco_nombre AS BANCO,num_cuenta AS CUENTA_BANCARIA
FROM cuentas_bancaria
JOIN bancos ON banco_id = bancos.idbancos

-- UNO CHEQUERA CON CUENTA Y CON BANCO
SELECT banco_nombre AS BANCO,num_cuenta AS CUENTA_BANCARIA, numero_chequera AS CHEQUERA_NUMERO, cantidad_cheques AS CANT_CH, desde AS DESDE, hasta AS HASTA
FROM chequera
JOIN cuentas_bancaria ON cuenta_bancaria_id = idcuentas_bancaria
JOIN bancos ON banco_id = bancos.idbancos

-- MUESTRO LOS CHEQUES
SELECT CONCAT (banco_nombre," ",num_cuenta) AS BANCO, numero_cheque AS NUM_CH, importe_cheque AS IMPORTE, fecha_emision AS FECHA_EMISION, fecha_cobro AS FECHA_COBRO, destinatario AS DESTINATARIO, condicion_cheque as CONDICION
FROM cheque
JOIN chequera on chequera_id = idchequera
JOIN cuentas_bancaria ON cuenta_bancaria_id = idcuentas_bancaria
JOIN bancos ON banco_id = bancos.idbancos
JOIN condicion_cheque ON condicion_id = idcondicion_cheque

-- MUESTRO LOS REGISTROS DE GASTOS
SELECT rg.fecha,rg.importe,gasto.nombre,tipo_gasto.tipo_gasto,mp.forma_de_pago,cuotas.numero_cuotas AS cuotas, REPLACE (pagado,1,'SI') AS pagado, concat(year(rg.fecha),'-',month(rg.fecha)) AS periodo
          FROM registro_gasto rg
          JOIN gasto ON rg.nombre_gasto_id = gasto.idgasto
          JOIN tipo_gasto ON rg.tipo_gasto_id = tipo_gasto.idtipo_gasto
          JOIN medio_de_pago mp ON rg.medio_pago_id = mp.idmedio_de_pago
          JOIN cuotas ON rg.cuotas_id = cuotas.idcuotas