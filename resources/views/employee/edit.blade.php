                       
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Form Edit Employee
            </div>
            <div class="card-body">
                <form action="{{ route('employee.update',$employee->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Employee Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="employee_name" value="{{$employee->employee_name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="{{$employee->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="company_id" value="">
                                
                                @foreach ($company as $result)
                                <option value="{{$result->id}}" 
                                  @if ($result->id==$employee->campany_id )
                                    selected
                                @endif>
                                  {{$result->company_name}}
                                </option>

                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection
