@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6ecb3f0ad6.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <!--<h1 class="text-center p-3" style="background:#f2eff1">Municipios</h1>-->

    <div class="p-5 table-responsive">

        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Municipio</th>
                <th scope="col">Departamento</th>
                <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($datos as $item)
                <tr>
                    <th>{{$item->id_municipio}}</th>
                    <td>{{$item->nombre_municipio}}</td>
                    <td>{{$item->departamento->nombre_departamento}}</td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalEdiatar" class="btn btn-outline-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                        <!-- Modal -->
                        <div class="modal fade" id="modalEdiatar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edicion de Municipios</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Guardar cambios</button>
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