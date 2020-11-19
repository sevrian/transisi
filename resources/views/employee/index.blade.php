@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('employee.create')}}" type="button" class="btn btn-secondary float-right">Add Employee</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    list Employe
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr class="table-active">
                                
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Company</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($employee as $result)
                           <tr>
                              
                              <td>{{$result->employee_name}}</td>
                              <td>{{$result->email}}</td>
                              <td>{{$result->company->company_name}}</td>
                              
                              <td><form action="{{route('employee.destroy',$result->id)}}" method="POST">
                                 @csrf
                                 @method('delete')

                                 <a href="{{route('employee.edit',$result->id)}}" class="btn btn-warning btn-sm"> Edit</a>
                              <button  type="summit" class="btn btn-danger btn-sm"> Hapus</button></form></td>
                          </tr>
                           @endforeach
                            

                        </tbody>
                    </table>
                    {{ $employee->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
