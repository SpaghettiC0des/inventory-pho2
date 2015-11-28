SELECT iss.purchase_id,p.supplier_id,p.reference_no,p.datetime,p.status, i.code, i.name as item_name, s.name as supplier_name, i.unit, i.cost, iss.expiration_date, iss.quantity,iss.sub_total,p.grand_total 
FROM items i, item_stocks iss, purchases p, suppliers s

WHERE iss.item_id = i.id
AND iss.purchase_id = p.id
AND p.supplier_id = s.id
ORDER BY `iss`.`purchase_id`  ASC