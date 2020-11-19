                       
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Form Add Company
                </div>
                <div class="card-body">
                  <form action="{{ route('company.update',$company->id)}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Comapany Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="company_name" value="{{$company->company_name}}">
                        </div>
                      </div>
                     <div class="form-group row">
                       <label class="col-sm-2 col-form-label">Email</label>
                       <div class="col-sm-10">
                         <input type="email" class="form-control" name="email" value="{{$company->email}}">
                       </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Website</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="website" value="{{$company->website}}">
                        </div>
                      
                      </div>
                     <div class="form-group row">
                       
                        <label class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                        <input type="file" class="form-control-file"  name="logo">
                        <label>*Max 2MB,100x100 px, png</label>
                        </div>
                      </div>
                     <div class="form-group row">
                       <div class="col-sm-10">
                         <button type="submit" class="btn btn-primary">Update</button>
                       </div>
                     </div>
                   </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
