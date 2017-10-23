SELECT DISTINCT E.morada, E.codigo FROM espaco E JOIN posto P ON E.codigo = P.codigo_espaco AND E.morada = P.morada WHERE E.morada NOT IN (SELECT B.morada FROM aluga NATURAL JOIN posto B);

SELECT morada FROM aluga GROUP BY morada HAVING count(morada) > (SELECT (COUNT(*)/COUNT(DISTINCT morada)) FROM aluga);

SELECT nif, nome, telefone FROM user NATURAL JOIN aluga NATURAL JOIN fiscaliza GROUP BY nif, id HAVING count(*) > 1;

SELECT morada, codigo, SUM(DATEDIFF(data_fim, data_inicio)*tarifa) as total FROM aluga NATURAL JOIN oferta  WHERE YEAR(data_inicio)=2016 GROUP BY codigo, morada;

SELECT morada, codigo FROM (SELECT E.morada, E.codigo, count(P.morada) as soma FROM espaco E JOIN posto P ON E.codigo = P.codigo_espaco AND E.morada = P.morada GROUP BY morada, codigo) a NATURAL JOIN (SELECT morada, count(B.morada) as alugados FROM aluga NATURAL JOIN posto B GROUP BY B.morada) c WHERE soma=alugados;