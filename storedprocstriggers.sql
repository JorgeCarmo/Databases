DELIMITER //
DROP TRIGGER IF EXISTS unique_offer_times//
CREATE TRIGGER unique_offer_times
BEFORE INSERT ON oferta
FOR EACH ROW
BEGIN
    IF EXISTS (SELECT data_inicio FROM oferta WHERE ((data_inicio<new.data_inicio AND data_fim>new.data_inicio AND codigo=new.codigo AND morada=new.morada) OR
    (data_inicio<new.data_fim AND data_fim>new.data_fim AND codigo=new.codigo AND morada=new.morada) OR
    (data_inicio<new.data_inicio AND data_fim>new.data_fim AND codigo=new.codigo AND morada=new.morada))) THEN
       CALL oferta_ja_existe_nessa_data;
    END IF;
END; //

DROP TRIGGER IF EXISTS pay_after_state//
CREATE TRIGGER pay_after_state
BEFORE INSERT ON paga
FOR EACH ROW
BEGIN
    IF EXISTS (SELECT time_stamp FROM estado WHERE (DATEDIFF(new.data, time_stamp) <= 0 AND numero=new.numero)) THEN
        CALL ultimo_estado_apos_data_fornecida;
    END IF;
END; //

DELIMITER ;