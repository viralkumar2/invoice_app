@extends('admin.app_master')

@section('content')
    <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <h3 class="card-title">Add Product</h3>
              </div>
            
              <form action='{{ route('product.store') }}' method='POST' enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="sr_no">Serial No.</label>
                        <input type="text" class="form-control" id="sr_no" name='sr_no'placeholder="Enter Product Serial No">
                        @error('sr_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name='name' placeholder="Enter Product Name">
                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea type="text" class="form-control" id="Description" name='description'placeholder="Enter Product Description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Quantity">Quantity</label>
                        <input type="number" class="form-control" id="Quantity" name='quantity' placeholder="Enter Product quantity">
                    </div>

                    <div class="form-group">
                        <label for="Amount">Amount</label>
                        <input type="number" class="form-control" id="Amount" name='amount' placeholder="Enter Product amount">
                    </div>

                    <div class="form-group">
                        <label for="Tax">Tax</label>
                        <input type="number" class="form-control" id="Tax" name='tax' placeholder="Enter Product tax">
                    </div>

                  

                  
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name='image' id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
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