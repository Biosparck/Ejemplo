<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>


      <?php
        echo "
        <table>
          <tr>
            <th>Numero departamento</th>
            <th>Nombre departamento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Titulo</th>
          </tr>";

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "employees";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            $sql = "SELECT d.dept_no, d.dept_name, e.first_name, e.last_name, t.title
            FROM departments d
            INNER JOIN dept_manager m ON d.dept_no=m.dept_no
            INNER JOIN employees e ON m.emp_no=e.emp_no
            INNER JOIN titles t ON m.emp_no=t.emp_no
            where t.to_date = '9999-01-01';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>".$row["dept_no"]."</td>
                    <td>".$row["dept_name"]."</td>
                    <td>".$row["first_name"]."</td>
                    <td>".$row["last_name"]."</td>
                    <td>".$row["title"]."</td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
          ?>

