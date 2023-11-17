@extends('admin.app_master')

@section('content')
 <style>
.invoice-box {
  max-width: 800px;
  margin: auto;
  padding: 30px;
  border: 1px solid #eee;
  box-shadow: 0 0 10px rgba(0, 0, 0, .15);
  font-size: 16px;
  line-height: 24px;
  font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
  color: #555;
}

.invoice-box table {
  width: 100%;
  line-height: inherit;
  text-align: left;
}

.invoice-box table td {
  padding: 5px;
  vertical-align: top;
}

.invoice-box table tr td:nth-child(n+2) {
  text-align: right;
}

.invoice-box table tr.top table td {
  padding-bottom: 20px;
}

.invoice-box table tr.top table td.title {
  font-size: 45px;
  line-height: 45px;
  color: #333;
}

.invoice-box table tr.information table td {
  padding-bottom: 40px;
}

.invoice-box table tr.heading td {
  background: #eee;
  border-bottom: 1px solid #ddd;
  font-weight: bold;
}

.invoice-box table tr.details td {
  padding-bottom: 20px;
}

.invoice-box table tr.item td{
  border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
  border-bottom: none;
}

.invoice-box table tr.item input {
  padding-left: 5px;
}

.invoice-box table tr.item td:first-child input {
  margin-left: -5px;
  width: 100%;
}

.invoice-box table tr.total td:nth-child(2) {
  border-top: 2px solid #eee;
  font-weight: bold;
}

.invoice-box input[type=number] {
  width: 60px;
}

@media only screen and (max-width: 600px) {
  .invoice-box table tr.top table td {
      width: 100%;
      display: block;
      text-align: center;
  }
  
  .invoice-box table tr.information table td {
      width: 100%;
      display: block;
      text-align: center;
  }
}

/** RTL **/
.rtl {
  direction: rtl;
  font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
}

.rtl table {
  text-align: right;
}

.rtl table tr td:nth-child(2) {
  text-align: left;
}

 </style>
 <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
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

    {{-- <section class="content"> --}}
      {{-- <div class="container-fluid"> --}}
        {{-- <div class="row">
          <div class="col-12"> --}}
            {{-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> --}}
            {{-- <div class="invoice p-3 mb-3">
            <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
            </div>
              
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ $client->first_name }}-{{ $client->last_name }} </strong><br>
                    Phone: {{ $client->phone }}<br>
                    Email: {{ $client->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                
              </div>
              

              
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Call of Duty</td>
                      <td>455-981-221</td>
                      <td>El snort testosterone trophy driving gloves handsome</td>
                      <td>$64.50</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Need for Speed IV</td>
                      <td>247-925-726</td>
                      <td>Wes Anderson umami biodiesel</td>
                      <td>$50.00</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Monsters DVD</td>
                      <td>735-845-642</td>
                      <td>Terry Richardson helvetica tousled street art master</td>
                      <td>$10.70</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Grown Ups Blue Ray</td>
                      <td>422-568-642</td>
                      <td>Tousled lomo letterpress</td>
                      <td>$25.99</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                
              </div>
              

              <div class="row">
                
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="{{ asset('admin/dist/img/credit/visa.png') }}" alt="Visa">
                  <img src="{{ asset('admin/dist/img/credit/mastercard.png') }}" alt="Mastercard">
                  <img src="{{ asset('admin/dist/img/credit/american-express.png') }}" alt="American Express">
                  <img src="{{ asset('admin/dist/img/credit/paypal2.png') }}" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              
            <div class="row no-print">
                <div class="col-12">
                  {{-- <a href="{{ route('pdfview_download') }}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
                  {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i>  Download
                  </button> --}}
                  {{-- <a href='{{ route('pdfview_download') }}' type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </a> --}}
                {{-- </div>
              </div> --}}
            {{-- </div> --}} 

            <div class="invoice-box col-12">
              <table cellpadding="0" cellspacing="0">
                <tr class="top">
                  <td colspan="">
                    <table>
                      <tr>
                        <td class="title">
                          <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" style="width:20%; max-width:300px;">
                        </td>
            
                        <td>
                          Invoice #: 123<br> Created: January 1, 2015<br> Due: February 1, 2015
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
            
                <tr class="information">
                  <td colspan="4">
                    <table>
                      <tr>
                        <td>
                          Sparksuite, Inc.<br> 12345 Sunny Road<br> Sunnyville, CA 12345
                        </td>
            
                        <td>
                          Acme Corp.<br> John Doe<br> john@example.com
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
            
                <tr class="heading">
                  <td colspan="3">
                    Payment Method
                  </td>
            
                  <td>
                    Check #
                  </td>
                </tr>
            
                <tr class="details">
                  <td colspan="3">
                    Check
                  </td>
            
                  <td>
                    1000
                  </td>
                </tr>
            
                <tr class="heading">
                  <td>
                    Item
                  </td>
            
                  <td>
                    Unit Cost
                  </td>
            
                  <td>
                    Quantity
                  </td>
            
                  <td>
                    Price
                  </td>
                </tr>
            
                <tr class="item">
                  <td>
                    <input value="Website design" />
                  </td>
            
                  <td>
                    $<input type="number" value="300" />
                  </td>
            
                  <td>
                    <input type="number" value="1" />
                  </td>
            
                  <td>
                    $300.00
                  </td>
                </tr>
            
                <tr class="item">
                  <td>
                    <input value="Hosting (3 months)" />
                  </td>
            
                  <td>
                    $<input type="number" value="75" />
                  </td>
            
                  <td>
                    <input type="number" value="1" />
                  </td>
            
                  <td>
                    $75.00
                  </td>
                </tr>
            
                <tr class="item">
                  <td>
                    <input value="Domain name (1 year)" />
                  </td>
            
                  <td>
                    $<input type="number" value="10" />
                  </td>
            
                  <td>
                    <input type="number" value="1" />
                  </td>
            
                  <td>
                    $10.00
                  </td>
                </tr>
            
                <tr>
                  <td colspan="4">
                    <button class="btn-add-row">Add row</button>
                  </td>
                </tr>
            
                <tr class="total">
                  <td colspan="3"></td>
            
                  <td>
                    Total: $385.00
                  </td>
                </tr>
              </table>
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <script>

    // A $( document ).ready() block.
$( document ).ready(function() {
    
});



  </script>
  @endsection