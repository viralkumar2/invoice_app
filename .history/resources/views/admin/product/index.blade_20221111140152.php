@extends('admin.app_master')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
                <h3 class="card-title">Products</h3>
               <a href="{{ route('product.create') }}" class='float-right btn btn-primary' >Add Product</a>

              </div>
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>SR NO.</th>
                    <th>name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Tax</th>
                    <th>Created Date</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->sr_no }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->quantity }}</td>
                            <td>{{ $row->amount }}</td>
                            <td>{{ $row->tax }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td> <img src="{{ asset('all_image/'.$row->image) }}" width="500" height="600" alt="product"></td>
                            <td>
                                <a href="" class='btn btn-success'>Edit</a>
                                <a href="" class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>
                    
                    @endforeach
                    
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>SR NO.</th>
                    <th>name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Tax</th>
                    <th>Created Date</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      
    </section>
    <!-- /.content -->
  </div>
@endsection