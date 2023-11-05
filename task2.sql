SELECT  o.order_item_id,
        p.name AS product_name,
        o.quantity,
        o.quantity * o.unit_price AS total_amount
FROM Order_items o
JOIN Products p ON o.product_id = p.product_id
ORDER BY o.order_id ASC;