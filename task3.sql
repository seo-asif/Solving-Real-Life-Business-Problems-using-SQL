SELECT  c.name AS category_name,
        SUM(o.quantity * o.unit_price) AS total_revenue
FROM categories AS c
LEFT JOIN products AS p ON c.category_id = p.category_id
LEFT JOIN order_items AS o ON p.product_id = o.product_id
GROUP BY category_name
ORDER BY total_revenue DESC;
