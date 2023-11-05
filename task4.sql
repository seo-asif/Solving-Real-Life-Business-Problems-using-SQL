SELECT  c.name AS customer_name, 
        SUM(o.total_amount) AS total_purchase_amount
FROM customers AS c
LEFT JOIN orders AS o ON c.customer_id = o.customer_id
GROUP BY customer_name
ORDER BY total_purchase_amount DESC
LIMIT 5;
