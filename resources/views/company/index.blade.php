@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('company.create')}}" type="button" class="btn btn-secondary float-right">Add Company</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    list Company
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr class="table-active">
                                
                                <th scope="col">Company Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Website</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($company as $item)
                           <tr>
                              
                              <td>{{$item->company_name}}</td>
                              <td>{{$item->email}}</td>
                              <td>{{$item->website}}</td>
                              
                              <td><form action="{{route('company.destroy',$item->id)}}" method="POST">
                                 @csrf
                                 @method('delete')

                                 <a href="{{route('company.edit',$item->id)}}" class="btn btn-warning btn-sm"> Edit</a>
                              <button  type="summit" class="btn btn-danger btn-sm"> Hapus</button></form></td>
                          </tr>
                           @endforeach
                            

                        </tbody>
                    </table>
                    {{ $company->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
