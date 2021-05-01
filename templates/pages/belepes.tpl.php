<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h1 class="h1-responsive font-weight-bold text-center my-4">Login</h1>

                    <form action="?oldal=belep" method="post">

                        <div class="form-group">
                            <input type="text" name="bejelentkezes" class="form-control" placeholder="Felhasználó">
                        </div>

                        <div class="form-group">
                            <input type="password" name="jelszo" class="form-control" placeholder="Jelszó">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="belepes">Login</button>
                        </div>

                        <br>&nbsp;
                    </form>


                    <form action="?oldal=regisztral" method="post">

                        <h1 class="h1-responsive font-weight-bold text-center my-4">Register</h1>
                        <br>

                        <div class="form-group">
                            <input type="text" name="bejelentkezes" class="form-control" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <input type="password" name="jelszo" class="form-control" placeholder="Psssword">
                        </div>

                        <div class="form-group">
                            <input type="text" name="csaladi_nev" class="form-control" placeholder="First name">
                        </div>

                        <div class="form-group">
                            <input type="text" name="uto_nev" class="form-control" placeholder="Last name">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="regisztracio">Register</button>
                        </div>

                        <br>&nbsp;
                    </form>