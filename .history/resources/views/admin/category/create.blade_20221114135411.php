@extends('admin.app_master')

@section('content')
    <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
            
              <form action='{{ route('client.store') }}' method='POST' enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="first_name">Category name</label>
                        <input type="text" class="form-control" id="first_name" name='first_name'placeholder="Enter first name">
                        @error('first_name')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                    </div>

                    
                </div>
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              
            </form>
            </div>
           

        
           

          </div>
          
        </div>
       
      </div>
    </section>
    
  </div>
@endsection