<?php
//Reanudamos la sesión
session_start();

//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['mail'])) {
	header('Location: index.php');
}
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/invoice.css">
  </head>
  <body>   
      <header id="head">
        <h1>INVOICE.EXE</h1>
        <address contenteditable>
          <p>Fulano Mengano</p>
          <p>Avenida siempre viva<br>alguna calle</p>
          <p>(800) 555-1234</p>
        </address>
        
      </header>
      <article id= "content">
        <h1>INVOICE.EXE</h1>
        <address contenteditable>
          <p>Nombre Compañia aqui<br>o asociacion</p>
        </address>
        <table class="meta">
          <tr>
            <th><span contenteditable>Factura #</span></th>
            <td><span contenteditable>101138</span></td>
          </tr>
          <tr>
            <th><span contenteditable>Fecha</span></th>
            <td><span contenteditable>Enero 5, 2021</span></td>
          </tr>
          <tr>
            <th><span contenteditable>Adeudo</span></th>
            <td><span id="prefix" contenteditable>$</span><span>600.00</span></td>
          </tr>
        </table>
        <table class="inventory">
          <thead>
            <tr>
              <th><span contenteditable>Objeto o Servicio</span></th>
              <th><span contenteditable>Descripcion</span></th>
              <th><span contenteditable>Cargo</span></th>
              <th><span contenteditable>Cantidad</span></th>
              <th><span contenteditable>Precio final</span></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a class="cut">-</a><span contenteditable>Consulta de Seguridad</span></td>
              <td><span contenteditable>Revisión de vulnerabilidades</span></td>
              <td><span data-prefix>$</span><span contenteditable>150.00</span></td>
              <td><span contenteditable>4</span></td>
              <td><span data-prefix>$</span><span>600.00</span></td>
            </tr>
          </tbody>
        </table>
        <a class="add">+</a>
        <table class="balance">
          <tr>
            <th><span contenteditable>Total</span></th>
            <td><span data-prefix>$</span><span>600.00</span></td>
          </tr>
          <tr>
            <th><span contenteditable>Monto pagado</span></th>
            <td><span data-prefix>$</span><span contenteditable>0.00</span></td>
          </tr>
          <tr>
            <th><span contenteditable>Balance del adeudo</span></th>
            <td><span data-prefix>$</span><span>600.00</span></td>
          </tr>
        </table>
      </article>
      <aside>
        <h1><span contenteditable>Notas adicionales</span></h1>
        <div contenteditable>
          <p>Algo aqui.</p>
        </div>
      </aside>
	  <button type="button" name="" id="" class="btn btn-primary btn-lg btn-block" >Descargar factura</button>
      <script 
      src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js" 
      integrity="sha256-vIL0pZJsOKSz76KKVCyLxzkOT00vXs+Qz4fYRVMoDhw="
      crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="js/invoice.js"></script>
  </body>
</html>