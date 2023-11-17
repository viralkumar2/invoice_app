@extends('admin.app_master')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category </li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category </h3>
               <a href="{{ route('category.create') }}" class='float-right btn btn-primary' >Add category</a>
            </div>
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>First name</th>
                   
                   
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($data as $row)
                      
                  @endforeach
                   <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->cat_name }}</td>
                        <td>{{ $row->created_at }}</td>
                        
                    <td>
                        <a href="" class='btn btn-success'>Edit</a>
                        <a href="" class='btn btn-danger'>Delete</a>
                    </td>
                </tr>
                  
                        
                    
                   
                    
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created Date</th>
                  
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              
            </div>
            
          </div>
          
        </div>
        
      </div>
      
    </section>
    
  </div>
@endsection