<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "assignment";

// Establish a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

//query
$sql = "SELECT a.customer_id, a.name AS customer_name, a.email, a.location, COUNT(b.order_id) AS total_orders
        FROM Customers a
        LEFT JOIN Orders b ON a.customer_id = b.customer_id
        GROUP BY a.customer_id, a.name, a.email, a.location
        ORDER BY total_orders DESC";
$result = mysqli_query($connection, $sql);

// Display result
echo "<table border='1'>
<tr>
<th>Customer ID</th>
<th>Customer Name</th>
<th>Email</th>
<th>Location</th>
<th>Total Orders</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['customer_id'] . "</td>";
    echo "<td>" . $row['customer_name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td>" . $row['total_orders'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Close database connection
mysqli_close($connection);
?>
