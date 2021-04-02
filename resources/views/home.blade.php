@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>
            <i class="fas fa-info-circle fa-2x text-info"></i>
            ¡Hola mucho gusto!
        </strong>
        Aquí veran todos los Output de los problemas solicitados. Cualquier duda estoy a su disposión, de igual forma si algo falta me dicen porfa.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-white font-weight-bold text-center">
                    {{ __('Employees') }}
                </div>

                @if($users->count())
                <table class="table table-hover table-resposive">
                    <thead>
                      <tr>
                        <th scope="col">
                            key Employe
                        </th>
                        <th scope="col">
                            Name
                        </th>
                        <th scope="col">
                            Email
                        </th>
                        <th scope="col">
                            Salary
                        </th>
                        <th scope="col">
                            Annual Salary
                        </th>
                        <th scope="col">
                            Estatus
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">
                                {{$user->id}}
                            </th>
                            <th scope="row">
                                {{$user->name}}
                            </th>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                ${{number_format($user->salary, 2)}}
                            </td>
                            <td>
                                ${{number_format(($user->salary * 12), 2)}}
                            </td>
                            <td class="text-center">
                                @if($user->status == 1)
                                    <i class="fas fa-check-circle fa-2x text-success"></i>
                                @else
                                    <i class="fas fa-times-circle fa-2x text-dange"></i>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{$users->links()}}
                </div>
                @else
                <div class="bg-white px-4 py-3 border-t border-gray-200 text-gray-500 sm:px-6">
                    No hay resultados de empleados
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card bg-dark text-white">
                <div class="font-weight-bold card-header">
                    Problem 1
                </div>
                <code class="p-4 bg-white">
                    {{json_encode($output_problem1)}}
                </code>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white">
                <div class="font-weight-bold card-header">
                    Problem 2
                </div>
                <code class="p-4 bg-white">
                    {{json_encode($output_problem2, TRUE)}}
                </code>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white">
                <div class="font-weight-bold card-header">
                    Problem 3
                </div>
                <code class="p-4 bg-white">
                    {{$output_problem3->format('Y-m-d')}}
                </code>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card bg-dark">
                <div class="card-header text-white">
                    Tercer empleado con mayor salario
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="font-weight-bold">
                            Key Employe: 
                        </span>
                        {{$three_employe[2]->id}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">
                            Name: 
                        </span>
                        {{$three_employe[2]->name}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">
                            Email: 
                        </span>
                        {{$three_employe[2]->email}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">
                            Salary: 
                        </span>
                        ${{number_format($three_employe[2]->salary, 2)}}
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark">
                <div class="card-header text-white">
                    <span class="font-weight-bold">{{$count_par}}</span> Empleados con clave de empleado PAR
                </div>
                @foreach($key_par as $par)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="font-weight-bold">
                            Key Employe: 
                        </span>
                        {{$par->id}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">
                            Name: 
                        </span>
                        {{$par->name}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">
                            Email: 
                        </span>
                        {{$par->email}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">
                            Salary: 
                        </span>
                        ${{number_format($par->salary, 2)}}
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark">
                <div class="card-header text-white">
                    Promedio de salario
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        ${{number_format($average, 2)}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
