
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                <h1 class="h1-responsive font-weight-bold text-center my-4">Sent emails:</h1>
                    <?php
                    try {
                        $con= new PDO('mysql:host=dbp.omega:3306;dbname=rendszergazda', 'rendszergazda', 'WpwU7LYE');
                        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = "SELECT * FROM email";
                        print "<table class=\"table\">";
                        $result = $con->query($query);
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        print " <tr>";
                        foreach ($row as $field => $value) {
                            print " <th>$field</th>";
                        }
                        print " </tr>";

                        $data = $con->query($query);
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($data as $row) {
                            print " <tr>";
                            foreach ($row as $name => $value) {
                                print " <td>$value</td>";
                            }
                            print " </tr>";
                        }
                        print "</table>";
                    } catch (PDOException $e) {
                        echo 'ERROR: ' . $e->getMessage();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
