@extends('admin.app_master')

@section('content')
    <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
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
                <h3 class="card-title">Add Setting</h3>
              </div>
            
              <form action='{{ route('setting.update',$data->id) }}' method='POST' enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="category_name">Text %</label>
                        <input type="text" class="form-control" id="text" name='text'placeholder="0.59 %" value='{{ $data->text }}'>
                        @error('text')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_name">Shipping %</label>
                        <input type="text" class="form-control" id="Shipping" name='Shipping'placeholder="0.7 %" value='{{ $data->shipping }}'>
                        @error('Shipping')
                            <P class='text-danger'>{{ $message }}</P>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_name">Discount %</label>
                        <input type="text" class="form-control" id="Discount" name='Discount'placeholder="0.89 %" value='{{ $data->disscount }}'>
                        @error('Discount')
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