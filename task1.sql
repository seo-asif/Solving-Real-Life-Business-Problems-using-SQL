SELECT  a.customer_id,
        a.name AS customer_name,
        a.email, a.location,
        COUNT(b.order_id) AS total_orders
FROM Customers a
LEFT JOIN Orders b ON a.customer_id = b.customer_id
GROUP BY a.customer_id, a.name, a.email, a.location
ORDER BY total_orders DESC;






