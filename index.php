<?php include 'include/header.php';?>

    <div class="container">
        <h1 class="text-center">Imenik</h1><br>
        <div id="message"></div>
        <div class="row">
            <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <table class="table table-hover">
                        <thead>
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input type="text" id="pretraga" class="form-control text-center" placeholder="Pretrazi tabelu">
                                    </div>
                                </div>
                                <div class="col-sm-5 float-right">
                                    <button id="dodaj" class="btn btn-success" data-toggle="modal" data-target="#myModal">Dodaj coveka</button>
                                </div>
                            </div>
                            <tr>
                                <th>Ime i prezime</th>
                                <th>Vreme upisa</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            <div class="col-sm-2"></div>
        </div>
        <div id="mess"></div>
    </div> 
    <?php include 'include/modali.php';?>
<?php include 'include/footer.php';?>