<!DOCTYPE html>
<html lang="fr">
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Smart Vote System</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  	<link rel="stylesheet" href="{{asset('../bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('../plugins/iCheck/all.css')}}">
  	<link rel="stylesheet" href="{{asset('../bower_components/font-awesome/css/font-awesome.min.css')}}">
  	<link rel="stylesheet" href="{{asset('../assets1/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('../bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('../plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets1/css/skins/_all-skins.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  	<style type="text/css">
      .bold{
        font-weight:bold;
      }
      
      #candidate_list{
        margin-top:20px;
      }

      #candidate_list ul{
        list-style-type:none;
      }

      #candidate_list ul li{ 
        margin:0 30px 30px 0; 
        vertical-align:top
      }

      .clist{
        margin-left: 20px;
      }

      .cname{
        font-size: 25px;
      }
  	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

     <header class="main-header">
      @include('layouts.topbar')
     </header>
     
     @include('admin.profil.update_profil')

    </div>
    @include('layouts.sidebar')
    @include('admin.titre_vote.update_titre')
<div class="content-wrapper">
      @yield ('content')
     </div>

  </div>

  <script src="{{asset('../bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('../bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('../bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('../bower_components/moment/moment.js')}}"></script>
<script src="{{asset('../bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('../bower_components/chart.js/Chart.js')}}"></script>
<script src="{{asset('../bower_components/chart.js/Chart.HorizontalBar.js')}}"></script>
<script src="{{asset('../bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('../bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('../bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('../bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- Inclure jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="{{asset('../plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('../plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

<script src="{{asset('../assets1/js/adminlte.min.js')}}"></script>

<!-- Incluez DataTables -->
<script src="{{asset('../bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>


<script>
  $(function(){
    var url = window.location;

    $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');

    $('ul.treeview-menu a').filter(function() {
        return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

  });
</script>

<script>
  $(function () {
    $('#example1').DataTable({
            "language": {
                "search": "Rechercher :",
                "lengthMenu": "Afficher _MENU_ éléments",
                "info": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "infoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
                "infoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                "loadingRecords": "Chargement...",
                "zeroRecords": "Aucun élément correspondant trouvé",
                "paginate": {
                    "first": "Premier",
                    "last": "Dernier",
                    "next": "Suivant",
                    "previous": "Précédent"
                }
            }
        });
    /*$('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    });*/
  });
</script>

<script>
  $(function(){
    $('#datepicker_add').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker_edit').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    }); 
  });
</script>


<script>
$(function(){
  $(document).on('click', '.Modifier', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.Supprimer', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.programme', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'candidates_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.canid);
      $('#edit_prenom_candidat').val(response.prenom_candidat);
      $('#edit_nom_candidat').val(response.nom_candidat);
      $('#posselect').val(response.id_election).html(response.type_election);      
      $('#edit_platform').val(response.programme_detude);
      $('.fullname').html(response.prenom_candidat+' '+response.nom_candidat);
      $('#desc').html(response.programme_detude);
    }
  });
}
</script>

<script>
  function validateForm() {
      var fileInput = document.getElementById('excelFile');
      if (fileInput && fileInput.files && fileInput.files.length > 0) {
          var fileName = fileInput.files[0].name;
          // Vérifiez si le nom de fichier se termine par .xls, .xlsx ou .csv
          if (/\.(xls|xlsx|csv)$/.test(fileName.toLowerCase())) {
              return true; // Fichier au format Excel ou CSV, permettre la soumission du formulaire
          } else {
              alert("Veuillez sélectionner un fichier Excel ou CSV.");
              return false; // Fichier non au format Excel ou CSV, empêcher la soumission du formulaire
          }
      } else {
          alert("Veuillez sélectionner un fichier avant de soumettre le formulaire.");
          return false; // Aucun fichier sélectionné, empêcher la soumission du formulaire
      }
  }
</script>

      </body>
</html>