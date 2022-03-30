<?php
require_once('Models/Person.php');
require_once('Bussines/PersonService.php');

if(isset($_POST['pNombre']) && !isset($_POST['id'])){
    $pNombre = $_POST['pNombre'];
    $sNombre = $_POST['sNombre'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    PersonService::insert($pNombre,$sNombre,$dob,$city);

}

if(isset($_POST['id']) && isset($_POST['pNombre'])){
    $id = $_POST['id'];
    $pNombre = $_POST['pNombre'];
    $sNombre = $_POST['sNombre'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    PersonService::update($id,$pNombre,$sNombre,$dob,$city);

}

if(isset($_GET['Del'])){
    $id = $_GET['id'];
    PersonService::delete($id);

}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Proyecto - Persona</title>
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/d72eeb8bfb.js" crossorigin="anonymous"></script>

    <!-- SWEETALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="bg-gray-100 h-screen">
    <div class="container mx-auto mt-20">
        

    <h1 class="font-black text-5xl text-center md:w-2/3 mx-auto">
        Seguimiento Listado <span className="text-indigo-600">Personas</span>
    </h1>
        <div class="mt-12 md:flex">
            <?php
                if(isset($_GET['editar'])){
                    $id =  $_GET['id'];
                    $person = PersonService::getPerson($id);
                
            ?>
            <div class="md:w-1/2 lg:w-2/5 mx-5">
                <h4 class="font-black text-3xl text-center">Formulario de Personas</h4>
    
                <p class="text-lg mt-5 text-center mb-10">
                    Añade Personas y
                    <span class="text-indigo-600 font-bold">Administralas</span>
                </p>
    
                <form class="bg-white shadow-md rounded-lg py-10 px-5 mb-10" name="persona" method="POST" action="index.php" >
                <div hidden id="errorMsg" class="bg-red-700 text-white text-center p-3 uppercase font-bold mb-3 rounded-md">
                    <p>Todos Los Campos Son Requeridos</p>
                </div>
    
                    <div class="mb-5">
                        <input id="id" type="hidden" name="id" placeholder="Primer Nombre de la Persona" class="border-2 w-full p-2 mt-2 placeholder-gray-400 rounded-md" value="<?= $person['idpersona'] ?>"/>

                        <label for="pNombre" class="block text-gray-700 uppercase font-bold">Primer Nombre 
                        </label>
                        <input id="pNombre" type="text" name="pNombre" placeholder="Primer Nombre de la Persona" class="border-2 w-full p-2 mt-2 placeholder-gray-400 rounded-md" value="<?= $person['firstName'] ?>"/>
                    </div>
                    <div class="mb-5">
                        <label for="sNombre" class="block text-gray-700 uppercase font-bold">Segundo Nombre
                        </label>
                        <input id="sNombre" type="text" name="sNombre" placeholder="Segundo Nombre de la Persona" class="border-2 w-full p-2 mt-2 placeholder-gray-400 rounded-md" value="<?= $person['lastName'] ?>"/>
                    </div>
                    <div class="mb-5">
                        <label for="Dob" class="block text-gray-700 uppercase font-bold">Fecha
                        </label>
                        <input id="Dob" type="date" name="dob" class="border-2 w-full p-2 mt-2 placeholder-gray-400 rounded-md" value="<?= $person['dob'] ?>"/>
                    </div>
                    <div class="mb-5">
                        <label for="ciudad" class="block text-gray-700 uppercase font-bold">Ciudad
                        </label>
                        <input id="ciudad" type="text" name="city" placeholder="Ciudad de Residencia" class="border-2 w-full p-2 mt-2 placeholder-gray-400 rounded-md" value="<?= $person['city'] ?>"/>
                    </div>
                    <input type="submit" class="bg-indigo-600 w-full p-3 text-white uppercase font-bold hover:bg-indigo-700 cursor-pointer transition-colors" value="actualizar"/>
                </form>
            </div>

            <?php }else{ ?>
                
                <div class="md:w-1/2 lg:w-2/5 mx-5">
                <h4 class="font-black text-3xl text-center">Formulario de Personas</h4>
    
                <p class="text-lg mt-5 text-center mb-10">
                    Añade Personas y
                    <span class="text-indigo-600 font-bold">Administralas</span>
                </p>
    
                <form class="bg-white shadow-md rounded-lg py-10 px-5 mb-10" name="persona" method="POST">
                <div hidden id="errorMsg" class="bg-red-700 text-white text-center p-3 uppercase font-bold mb-3 rounded-md">
                    <p>Todos Los Campos Son Requeridos</p>
                </div>
    
                    <div class="mb-5">
                        <label for="pNombre" class="block text-gray-700 uppercase font-bold">Primer Nombre 
                        </label>
                        <input id="pNombre" name="pNombre" type="text" placeholder="Primer Nombre de la Persona" class="border-2 w-full p-2 mt-2 placeholder-gray-400 rounded-md"/>
                    </div>
                    <div class="mb-5">
                        <label for="sNombre"  class="block text-gray-700 uppercase font-bold">Segundo Nombre
                        </label>
                        <input id="sNombre" name="sNombre" type="text" placeholder="Segundo Nombre de la Persona" class="border-2 w-full p-2 mt-2 placeholder-gray-400 rounded-md" />
                    </div>
                    <div class="mb-5">
                        <label for="dob" class="block text-gray-700 uppercase font-bold">Fecha
                        </label>
                        <input id="dob" name="dob" type="date" class="border-2 w-full p-2 mt-2 placeholder-gray-400 rounded-md"/>
                    </div>
                    <div class="mb-5">
                        <label for="city" class="block text-gray-700 uppercase font-bold">Ciudad
                        </label>
                        <input id="city" name="city" type="text" placeholder="Ciudad de Residencia" class="border-2 w-full p-2 mt-2 placeholder-gray-400 rounded-md"/>
                    </div>
                    <input type="submit" class="bg-indigo-600 w-full p-3 text-white uppercase font-bold hover:bg-indigo-700 cursor-pointer transition-colors" />
                </form>
            </div>
            <?php } ?>

            <div class="md:w-1/2 lg:w-3/5 md:h-screen">
                <h2 class="font-black text-3xl text-center">Listado Personas</h2>
                        <p class="text-xl mt-5 mb-10 text-center">
                            Administra tu Listado
                            <span class="text-indigo-600 font-bold">De Personas</span>
                        </p>
                <div class="mx-5 my-10 bg-white shadow-md px-5 py-10 rounded-xl overflow-x-scroll">
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr class="bg-indigo-500 bg-opacity-100 text-white">
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Fecha</th>
                            <th>Ciudad</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                                $personas = PersonService::getPersons();
                                foreach ($personas as $person) {
                             ?>
                                <tr>
                                    <td><?= $person['firstName'] ?></td>
                                    <td><?= $person['lastName'] ?></td>
                                    <td><?= $person['dob'] ?></td>
                                    <td><?= $person['city'] ?></td>
                                    <td>
                                        <a href="?editar&id=<?= $person['idpersona'] ?>" class="p-2 bg-amber-500 text-white rounded"><i class="fa fa-pen"></i></a> | <a onclick="eliminar(<?= $person['idpersona'] ?>)" class="p-2 bg-red-600 text-white rounded cursor-pointer"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                                        }
                                        
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
    
        </div>

        </div>

</body>

<script>
const $form = document.persona

const $inputs = $form.querySelectorAll('input')

$inputs.forEach(input => addEventListener('change', () => obj[input.name] = input.value))

const obj = {
    pNombre: $form.pNombre.value,
    sNombre: $form.sNombre.value,
    dob: $form.dob.value,
    city: $form.city.value,
}

$form.addEventListener('submit', (e)=>{
    e.preventDefault();

    if(Object.values(obj).includes('')) {
        $('#errorMsg').removeAttr('hidden');
        setTimeout(()=>{
            $('#errorMsg').attr('hidden','true')
        },4000)
            
    }else{
        $form.submit()
    }


}) 

const eliminar = (id) => {
    swal({
        title: "Seguro que desea Continuar?",
        text: "Al Hacer clik en ok Se Borrara el registro permanentemente!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal("Registro Borrado de Forma Satisfactoria!", {
            icon: "success",
            }).then(() => {
                location.search = `Del&id=${id}` 
            });
        } else {
            swal("La Eliminacion fue Cancelada!");
        }
    });
}

  
$(document).ready( function () {
    $('#example').DataTable({
        language: {

        "lengthMenu": "Mostrar _MENU_ registros",

        "zeroRecords": "No se encontraron resultados",

        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",

        "infoFiltered": "(filtrado de un total de _MAX_ registros)",

        "sSearch": "Buscar:",

        "oPaginate": {

            "sFirst": "Primero",

            "sLast":"Último",

            "sNext":"Siguiente",

            "sPrevious": "Anterior"

        }

        },

    });
} );



</script>

</html>