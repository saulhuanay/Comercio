<script type="text/javascript">
  var empleados = [];
</script>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Listado de Empleados</h3>
      </div><!-- /.box-header -->
      <br>
      <div class="row">
        <div class="col-md-8">
            <div class="col-md-10 pull-right">
              <input type="text" class="form-control" id="name" placeholder="Buscar....">
            </div>
        </div>
      </div>
      <br>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>name</th>
            <th>email</th>
            <th>position</th>
            <th>salary</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody id="response" class="buscar">
          <tr ng-repeat="user in users">
            <td>{{user.name}}</td>
            <td>{{user.email}}</td>
            <td>{{user.position}}</td>
            <td>{{user.salary}}</td>
            <td><button class="btn btn-info"onclick="ModalView('{{user.id}}')">Ver</button></td>
          </tr>
        </tbody>
      </table>
      <!-- Resumen de Empleados -->
      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2 style="margin-left:10px;">Resumen de Empleado</h2>
          <div class="row" style="text-align:center;padding-top:30px;">
            <div>
              <label class="form-control">name</label>
              <input type="text" class="form-control" id="namejson" readonly />
            </div>
            <div> 
              <label>email</label>
              <input type="text" id="email" readonly />
            </div>
            <div> 
              <label>phone</label>
              <input type="text" id="phone" readonly />
            </div>
            <div>
              <label>address</label>
              <input type="text" id="address" readonly />
            </div>
            <div>
              <label>position</label>
              <input type="text" id="position" readonly />
            </div>
            <div>
              <label>salary</label>
              <input type="text" id="salary" readonly />
            </div>
          </div>
          <table width="100%" style="border:1px solid black;" cellspacing="0" cellpadding="2">
            <thead>
              <tr>
                <th>Nº</th>
                <th>Skills</th>
              </tr>
            </thead>
            <tbody id="skills" style="text-align:center"></tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">

  var modal = document.getElementById('myModal');
  var span = document.getElementsByClassName("close")[0];
  var html = '';
  modal.style.display = "none";

  span.onclick = function() {
    modal.style.display = "none";
  }

  $(document).ready(function () {

       (function ($) {
      
        $('#name').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.buscar tr').hide();
            $('.buscar tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

      }(jQuery));
  });

  function ModalView(id){
    
    var id = id;
    var data = empleados[0];
    html = '';
    for (var i in data) {
       if(id == data[i].id){
          $("#namejson").val(data[i].name);
          $("#email").val(data[i].email);
          $("#phone").val(data[i].phone);
          $("#address").val(data[i].address);
          $("#position").val(data[i].position);
          $("#salary").val(data[i].salary);
          if(data[i].skills.length > 0){
            $.each( data[i].skills, function( key, value ) {
               html+= '<tr>'+
                    '<td>'+key+'</td>'+
                    '<td>'+value.skill+'</td>'+
               '</tr>';
            });

            $('#skills').html(html);
          }
       }
    }

    modal.style.display = "block";
  }

</script>
