<!DOCTYPE html>
                   <html lang="en">
                   <head>
                       <meta charset="UTF-8">
                       <meta name="viewport" content="width=device-width, initial-scale=1.0">
                       <meta http-equiv="X-UA-Compatible" content="ie=edge">
                       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
                       integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                       <title>Tareas</title>
                   </head>
                   <body>
                       <header class="text-center">
                           <div>
                           <h1>Adminsitrador de tareas</h1>
                           </div>
                       </header>
                       <div class="row mt-5 ml-5 container">
                           <div class="col-md-6">
                               <h2 class="text-center">Ingreso de Tareas
                               <form method="POST" id="addTask" name="addTask">
                                   <div class="form-group">
                                       <input type="text" placeholder="Ingrese su tarea" name="task" class="form-control" required>
                                   </div>
                                   <div class="form-group">
                                       <input type="date" name="date" class="form-control" required>
                                   </div>
                                       <input type="submit" value="Registrar" class="btn btn-primary">
                                   </form>
                               </div>
                               <div class="col-md-6">
                                   <table class="table table-bordered table-sm">
                                       <thead>
                                           <tr>
                                           <th>Id
                                           <th>Tarea
                                           <th>Fecha Realizada
                                           <th>Opciones
                                           </tr>
                                       </thead>
                                       <tbody id="tareas">
                                           </tbody>
                                   <table>
                           </div>
                       </div>

                       <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                       aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLable">Actualizar
                                       <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                       ×
                                       </button>
                                   </div>
                               <form method="post" id="updateTask" name="updateTask">
                                       <div class="modal-body">
                                           <input type="hidden" name="idU" id="idU">
                                       <div class="form-group">
                                           <input type="text" placeholder="Ingrese su tarea" id="taskU" name="taskU" class="form-control" required>
                                       </div>
                                       <div class="form-group">
                                           <input type="date" id="dateU" name="dateU" class="form-control" required>
                                       </div>
                                   </div>
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                   <button type="submit" class="btn btn-primary">Actualizar
                               </div>
                           </form>
                               </div>
                           </div>
                       </div>
                           <script src="public/test.js"> </script>
                           <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                           integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
                           </script>
                           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                           integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
                           </script>
                           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
                           integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
                           </script>
                   </body>
                   </html>
