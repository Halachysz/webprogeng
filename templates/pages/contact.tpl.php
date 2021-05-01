
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

  

                    <!--Section: Contact v.2-->
                    <section class="mb-4">

                        <!--Section heading-->
                        <h1 class="h1-responsive font-weight-bold text-center my-4">Concat</h1>
                        <!--Section description-->
                        <p class="text-center w-responsive mx-auto mb-5">If you have any question please feel free to contact us! Our team will respond in a few hours!</p>
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-9 mb-md-0 mb-5">
                                <form id="contact-form" name="contact-form" method="POST">

                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->

                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="email" id="adress" name="adress" required class="form-control">
                                                <label for="adress" class="">Email adress</label>
                                            </div>
                                        </div>
                                        <!--Grid column-->

                                    </div>
                                    <!--Grid row-->

                                    <!--Grid row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <input type="text" id="subject" name="subject" required class="form-control">
                                                <label for="subject" class="">Subject</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Grid row-->

                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-12">

                                            <div class="md-form">
                                                <textarea type="text" id="content" name="content" rows="2" required  class="form-control md-textarea"></textarea>
                                                <label for="content">Meassage</label>
                                            </div>

                                        </div>
                                    </div>
                                    <!--Grid row-->
                                    
                                <div class="form-group">
                            <button type="submit" class="btn btn-success">Send</button> 

                                </form>

                        </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-3 text-center">
                                <ul class="list-unstyled mb-0">
                                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                        <p>Pistály dülő 097/099 Törökbálint Pest megye 2045</p>
                                    </li>

                                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                        <p>+361111111</p>
                                    </li>

                                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                        <p>zoldszigetinfo@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                            <!--Grid column-->

                        </div>

                    </section>
                    <!--Section: Contact v.2-->
                    <?php
    if(isset($_POST['adress']) && isset($_POST['subject']) && isset($_POST['content'])) {
        try {
            // Kapcsolódás
            $dbh = new PDO('mysql:host=dbp.omega:3306;dbname=rendszergazda', 'rendszergazda', 'WpwU7LYE',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

                $sqlInsert = "insert into email(adress,subject,content)
                              values( :adress, :subject, :content)";
                $stmt = $dbh->prepare($sqlInsert); 
                $stmt->execute(array(':adress' => $_POST['adress'], ':subject' => $_POST['subject'],
                                     ':content' => $_POST['content'], )); 
                if($count = $stmt->rowCount()) {
                    $newid = $dbh->lastInsertId();
                    $uzenet = "A küldés sikeres.<br>Azonosítója: {$newid}";                     
                    $ujra = false;
                }
                else {
                    $uzenet = "A küldés nem sikerült.";
                    $ujra = true;
                }
            
        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      
    }

?>

                </div>
            </div>
        </div>