$(document).ready(function(){
    var covekID = 0;
    var ime = 0;
    //izlistavanje 
    function osveziTabelu(){
        $("tbody").empty()
        $.ajax({
            url: 'object/izlistavanjeKorisnika.php',
            type: 'POST',
            dataType: 'JSON',
            success: function(result){
                //console.log(result);
                for(var i=0;i<result.length;i++){
                $("tbody").append("<tr><td>"+result[i].ime+" "+result[i].prezime+"</td>"+
                                "<td>"+result[i].time+"</td>"+
                                "<td><button data-toggle='modal' id='dod"+result[i].id+"' data-target='#modalDodaj' class='btn   dodaj''>Dodaj broj</button></td>"+
                                "<td><button data-toggle='modal' id='inf"+result[i].id+"' data-target='#modalInfo' class='btn btn-warning info''>Info</button></td>"+
                                "<td><button data-toggle='modal' id='izm"+result[i].id+"' data-target='#modalIzmeniImeIPrezime' class='btn btn-primary izmeniImeIPrezime''>Izmeni ime i prezime</button></td>"+
                                "<td><button data-toggle='modal' id='izb"+result[i].id+"'  data-target='#modalObrisi' class='btn btn-danger dugmeIzbrisi''>Izbrisi</button></td></tr>")
                }
                $('button.info').click(function() {
                  covekID = $(this).attr('id').substring(3,$(this).attr('id').length);
                  $(".brojeviTelefona").empty()
                  //console.log(covekID);
                });
                $('button.izmeniImeIPrezime').click(function() {
                covekID = $(this).attr('id').substring(3,$(this).attr('id').length);
                    //console.log(covekID);
                  });
                $('button.dugmeIzbrisi').click(function() {
                  covekID = $(this).attr('id').substring(3,$(this).attr('id').length);
                  //console.log(covekID);
                });
                $('button.dodaj').click(function() {
                  covekID = $(this).attr('id').substring(3,$(this).attr('id').length);
                  //console.log(covekID);
                });
            }
        })
    }
    osveziTabelu()

    //dodavanje novog coveka u imenik
    $("#formInsert").submit(function(e){
      $("#messageInsert").empty();
      e.preventDefault();

      $.ajax({
        url: 'object/dodajKorisnika.php',
        type: 'POST',
        data: $("#formInsert").serialize(),
        dataType: 'JSON',
        success: function(data){
          //console.log(data);
          for(var i=0;i<data.length;i++){
            if(data[i].status==true){
                $("#myModal").modal("hide")
                osveziTabelu()
            }else{
                $("#messageInsert").append("<div class='alert alert-danger'>"+data[i].message+"</div>")
                $("#dodajIme").val('').empty()
                $("#dodajPrezime").val('').empty()
            }
          }
        }
      })
    })

    //brisanje 
    $('#izbrisiSvePodatke').click(function() {
      //console.log(covekID);
      $.ajax({
        url: 'object/brisanjeKorisnika.php',
        type: 'POST',
        data: {id: covekID},
        dataType: 'JSON',
        success: function(data){
          //console.log(data)
         $("#modalObrisi").modal("hide")
          osveziTabelu()
        }
      })
    });

    //izmena Imena i prezimena
    $("#promeniPodatke").click(function(e){
        $("#porukaPromenaPodataka").empty()
        var novoIme = $("#promeniIme").val()
        var novoPrezime = $("#promeniPrezime").val()
        $.ajax({
            url: 'object/izmenaPodataka.php',
            type: 'POST',
            data: {ime:novoIme,prezime:novoPrezime,id:covekID},
            dataType: 'JSON',
            success: function(data){
                //console.log(data)
                for(var i=0;i<data.length;i++){
                    if(data[i].status==true){
                        $("#porukaPromenaPodataka").append("<div class='alert alert-success'>Uspesno ste promenili podatke</div>")
                        osveziTabelu()
                        $("#promeniIme").val('')
                        $("#promeniPrezime").val('')
                    }else{
                        $("#porukaPromenaPodataka").append("<div class='alert alert-danger'>Podaci nisu validni</div>")
                        $("#promeniIme").val('')
                        $("#promeniPrezime").val('')
                    }
                }
            }
        })
    })
    
    
    //info 
    $("#prikaziBrojeve").click(function(event){
      $("#sacuvaj").empty()
      $(".brojeviTelefona").empty()
      $.ajax({
        url: 'object/izlistavanjeBrojeva.php',
        type: 'POST',
        data: {id: covekID},
        dataType: 'JSON',
        success: function(data){
          //console.log(data)
          for(var i=0;i<data.length;i++){
           $(".brojeviTelefona").append("Telefon:<p>"+data[i].broj+"</p><hr>")
          }
          $(".inputIzmeni").focus(function(){
          var idBroj = $(this).attr('id');
          //console.log(idBroj)
        })
        }
      })
    })

    //dodaj 
    $("#dodajTel").click(function(event){
      $("#messagePhone").empty()
      var tel = $("#dodajBrojTel").val()
      $.ajax({
        url: 'object/dodajTelefon.php',
        type: 'POST',
        data: {broj: tel,id: covekID},
        dataType: 'JSON',
        success: function(data){
          console.log(data)
          for(var i=0;i<data.length;i++){
            if(data[i].status==true){
              $("#messagePhone").append("<div class='alert alert-success'>"+data[i].message+"<div>")
              $("#dodajBrojTel").val('')
            }else{
              $("#messagePhone").append("<div class='alert alert-danger'>"+data[i].message+"<div>")
            }
          }
        }
      })
    })

    //pretraga tabele
    $("#pretraga").on("keyup", function() {
        var value = $(this).val().toLowerCase();
          $("tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
})