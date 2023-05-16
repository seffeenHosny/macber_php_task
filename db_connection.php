<?php 
// Create a new PDO object with the database credentials
$host = "localhost"; // Replace with your host name
$user = "root"; // Replace with your MySQL username
$password = "P@ssw0rd"; // Replace with your MySQL password
$database = "MacberPhpTest"; // Replace with your MySQL database name

$dsn = "mysql:host=$host;dbname=$database";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    die("Failed to connect to MySQL: " . $e->getMessage());
}

// Perform a query
$sql = "
        SELECT d.name AS department_name, e.departmentId, e.name, e.salary
        FROM Employee e
        JOIN Department d ON e.departmentId = d.id
        WHERE (
        SELECT COUNT(DISTINCT salary)
        FROM Employee
        WHERE departmentId = e.departmentId AND salary > e.salary
        ) < 3
        ORDER BY e.departmentId, e.salary DESC;
";

// execute the query and fetch the results
try {
    $query = $pdo->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

// display the results
echo "<table>
        <thead>
        <tr>
            <th>Department</th>
            <th>Name</th>
            <th>Salary</th>
        </tr>
        </thead>
        <tbody>";
foreach ($results as $row) {
    echo "<tr>
            <td>".$row['department_name']."</td>
            <td>".$row['name']."</td>
            <td>".$row['salary']."</td>
        </tr>";
}

echo "</tbody>
    <table>";

// close the database connection
$pdo = null;