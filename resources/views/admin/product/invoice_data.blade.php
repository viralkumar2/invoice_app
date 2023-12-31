@extends('admin.app_master')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
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
                <h3 class="card-title">Invoice</h3>
            </div>
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SR NO.</th>
                    <th>Invoice No.</th>
                   
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($invoiceData as $data)
                        <tr>
                            <td>{{  $data->id }}</td>
                            <td>{{  $data->invoice_number }}</td>
                            <td>{{  $data->first_name }}-{{  $data->last_name }}</td>
                            <td>{{  $data->email }}</td>
                            <td>{{  $data->created_at }}</td>
                            <td><a href="{{ route('invoice_show',$data->id) }}" target="_blank"  class='btn btn-success'>View</a>
                                <a href="{{ route('invoice_delete',$data->id) }}" class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>

                    @endforeach
                    
                  </tbody>

                  <tfoot>
                  <tr>
                    <th>SR NO.</th>
                    <th>Invoice No.</th>
                    
                    <th>Name</th>
                    <th>Email</th>
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

