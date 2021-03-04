    <!--Modal za dodavanje korisnika-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dodaj coveka</h4>
        <div id="messageInsert"></div>
      </div>
      <div class="modal-body">
        <form id="formInsert" action="api/insert.php" method="POST">
            <div class="form-group">
                <input id="dodajIme" type="text" name="ime" placeholder="Upisi ime" class="form-control">
            </div>
            <div class="form-group">
                <input id="dodajPrezime" type="text" name="prezime" placeholder="Upisi prezime" class="form-control"><br>
                <button id="dodajCoveka" class="btn btn-success">Dodaj</button>
            </div>
        </form>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
      </div>
    </div>
  </div>
</div>

<!--Modal za brisanje korisnika-->
<div id="modalObrisi" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong class="alert alert-danger">Da li ste sigurni da zelite da obrisete?</strong></h4>
      </div>
      <div class="modal-body">
        <div id="porukaObrisi"></div>
          <button id="izbrisiSvePodatke" class="btn btn-success">Izbrisi</button>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
      </div>
      </div>
    </div>
  </div>
</div>

<!--Modal za izmenu imena i prezimena-->
<div id="modalIzmeniImeIPrezime" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content text-center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Izmeni podatke</h4>
      </div>
      <div class="modal-body">
          <div id="porukaPromenaPodataka"></div>
          <div class="form-group">
              <input id="promeniIme" type="text" placeholder="Upisi ime" class="form-control">
          </div>
          <div class="form-group">
              <input id="promeniPrezime" type="text" placeholder="Upisi prezime" class="form-control"><br>
              <button id="promeniPodatke" class="btn btn-success">Izmeni</button>
          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Odustani</button>
      </div>
      </div>
    </div>
  </div>
</div>

<!--Modal za dodavanje telefona-->
<div id="modalDodaj" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content text-center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dodaj telefon</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div id="messagePhone"></div>
        <div class="row text-center">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <input placeholder="Upisi broj" type="text" class="form-control text-center" id="dodajBrojTel">
                <button id="dodajTel" class="btn btn-success">Dodaj</button>
            </div> 
            <div class="col-sm-3"></div>
        </div>
        </div>  
      </div>
      <div class="modal-footer">
        <button id="izadji" type="button" class="btn btn-danger" data-dismiss="modal">Izadji</button>
      </div>
    </div>

  </div>
</div>

  <!--Modal za brojeve telefona-->
<div id="modalInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content text-center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Brojevi</h4>
      </div>
      <div class="modal-body text-center">
        <div class="row">
            <div class="col-sm-12">
                <div class="brojeviTelefona">
                
                </div>
                <div>
                  <button id="prikaziBrojeve" class="btn btn-info">Prikazi brojeve</button>
                </div>
                <div id="sacuvaj">
                    
                </div>
            </div> 
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Izadji</button>
      </div>
    </div>

  </div>
</div>