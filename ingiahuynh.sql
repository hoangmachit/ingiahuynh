SELECT * 
FROM table_product_kich_thuoc_chat_lieus as s1, table_product_chat_lieus as s2 
WHERE s1.cl_id = s2.id and kt_id=23 order BY s2.id desc