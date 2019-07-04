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
            <th>Cantidad de empleados</th>
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

            $sql = "SELECT d.dept_no, d.dept_name, Count(em.emp_no) as empleados
            FROM departments d
            INNER JOIN dept_emp em ON d.dept_no=em.dept_no
            where em.to_date='9999-01-01'
            group by d.dept_no;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>".$row["dept_no"]."</td>
                    <td>".$row["dept_name"]."</td>
                    <td>".$row["empleados"]."</td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
          ?>
