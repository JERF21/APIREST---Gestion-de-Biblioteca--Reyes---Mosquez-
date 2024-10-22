<?php

require_once "../../controladorV/clienteControlador.php";
require_once "../../modeloV/clienteModelo.php";

$id = $_GET["id"];
$cliente = ControladorClienteV::ctrInfoCliente($id);

?>


<form action="" id="FEditCliente" enctype="multipart/form-data">
  <div class="modal-header bg-secondary">
    <h4 class="modal-title">Editar Cliente</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
  
    <div class="form-group">
      <label for="exampleInputBorder">Nombre</label>
      <input type="text" class="form-control" placeholder="" name="nombreCliente" id="nombreCliente" value="<?php echo $cliente["nombre"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Apellido</label>
      <input type="text" class="form-control" placeholder="" name="apellidoCliente" id="apellidoCliente" value="<?php echo $cliente["apellido"];?>">
      <input type="hidden" name="idCliente" value="<?php echo $cliente["id_cliente"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Email</label>
      <input type="text" class="form-control" placeholder="" name="emailCliente" id="emailCliente" value="<?php echo $cliente["email"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Teléfono</label>
      <input type="text" class="form-control" placeholder="" name="telefonoCliente" id="telefonoCliente" value="<?php echo $cliente["telefono"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Dirección</label>
      <input type="text" class="form-control" placeholder="" name="direccionCliente" id="direccionCliente" value="<?php echo $cliente["direccion"];?>">
    </div>

    <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <label>Imagen <span class="text-muted">(Peso máximo 10MB - JPG,PNG)</span></label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="imgCliente" name="imgCliente" onchange="previsualizar()">
            <input type="hidden" name="imgActual" value="<?php echo $cliente["imagen_cliente"];?>">
            <label class="custom-file-label" for="imgCliente">Elegir archivo</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Subir</span>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group" style="text-align:center">
        <?php
        if($cliente["imagen_cliente"]==""){
          ?>
          <img src="recursos/img/clientes/user-default.jpg" alt="" width="150" class="img-thumbnail previsualizar">
          <?php
        }else{
          ?>
          <img src="recursos/img/clientes/<?php echo $cliente["imagen_cliente"];?>" alt="" width="150" class="img-thumbnail previsualizar">
          <?php
        }
        ?>
          
        </div>
      </div>
    </div>
    </div>



  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>

<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        editCliente()
      }
    });
    $('#FEditCliente').validate({
      rules: {
        codCliente: {
          required: true,
          minlength: 3,
        },
        codClienteSIN: {
          required: true,
          minlength: 3,
        },
        desCliente: {
          required: true,
          minlength: 3,
        },
        preCliente: {
          required: true,
          minlength: 1,
        },
        unidadMedidad: {
          required: true,
          minlength: 1,
        },
        unidadMedidadSIN: {
          required: true,
          minlength: 1,
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>