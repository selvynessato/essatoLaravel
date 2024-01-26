@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6ecb3f0ad6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>   
    <!--<h1 class="text-center p-3" style="background:#f2eff1">Departamentos</h1>-->
    @if(session('mensaje') == 'correcto')
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Registro guardado exitosamente..."
            });
        </script>
        <style>
           body {
              font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
            }       
        </style>
    @else
    <script>
            const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "Error, no se puedo guardar!!"
            });
        </script>
        <style>
           body {
              font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
            }       
        </style>    
    @endif

        <!-- Modal creacion-->
        <div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Creacion de Departamentos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('create')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Codigo del departamento</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="codigo" require>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre del departamento</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="departamento">
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                            </div>
                        </form>                   
                    </div>
                </div>
            </div>
        </div>  
    <div class="p-5 table-responsive">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalCrear" class="btn btn-outline-warning btn-sm">
            <i class="fa-solid fa-circle-plus"></i>
            Agragar nuevo
        </button>
        <br>
        <br>
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-primary text-white">
                <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Departamento</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($datos as $item)
                <tr>
                    <th>{{$item->id_departamento}}</th>
                    <td>{{$item->nombre_departamento}}</td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalEdicion{{$item->id_departamento}}" class="btn btn-outline-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                    </td>  
                        <!-- Modal Edicion-->
                        <div class="modal fade" id="modalEdicion{{$item->id_departamento}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edicion de Departamentos</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('edit') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="codigo" class="form-label">Codigo del departamento</label>
                                                <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $item->id_departamento }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="departamento" class="form-label">Nombre del departamento</label>
                                                <input type="text" class="form-control" id="departamento" name="departamento" value="{{ $item->nombre_departamento }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@5.3.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection