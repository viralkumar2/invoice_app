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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                  <a href='{{ route('pdfview_download') }}' type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </a>
                </div>
              </div>
            {{-- </div> --}} 

            <head>
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">  
  <link rel='stylesheet' href='https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css'>
</head>
<body ng-app="invoicing" ng-controller="InvoiceCtrl" >
  <div class="container" width="800px" id="invoice" >
    <div class="row">
      <div class="col-xs-12 heading">
        INVOICE
      </div>
    </div>
    <div class="row branding">
      <div class="col-xs-6">
        <div class="invoice-number-container">
          <label for="invoice-number">Invoice #</label><input type="text" id="invoice-number" ng-model="invoice.invoice_number" /><br>
          <label for="invoice-number">Date </label> <input type="text" id="datepicker" />
        </div>
      </div>
      <div class="col-xs-6 logo-container">
        <input type="file" id="imgInp" />
        <img ng-hide="logoRemoved" id="company_logo" ng-src="{{ logo }}" alt="your image" width="300" />
        <div>
          <div class="noPrint" ng-hide="printMode">
            <a ng-click="editLogo()" href >Edit Logo</a>
            <a ng-click="toggleLogo()" id="remove_logo" href >{{ logoRemoved ? 'Show' : 'Hide' }} logo</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row infos">
      <div class="col-xs-6">
        <div class="input-container"><input type="text" ng-model="invoice.customer_info.name"/></div>
        <div class="input-container"><input type="text" ng-model="invoice.customer_info.web_link"/></div>
        <div class="input-container"><input type="text" ng-model="invoice.customer_info.address1"/></div>
        <div class="input-container"><input type="text" ng-model="invoice.customer_info.address2"/></div>
        <div class="input-container"><input type="text" ng-model="invoice.customer_info.postal"/></div>
        <div class="input-container" data-ng-hide='printMode' style="visibility:hidden">
          <select ng-model='currencySymbol' ng-options='currency.symbol as currency.name for currency in availableCurrencies'></select>
        </div>
      </div>
      <div class="col-xs-6 right">
        <div class="input-container"><input type="text" ng-model="invoice.company_info.name" title="Customer Name" class="bor-bor"></div>
        <div class="input-container"><input type="text" ng-model="invoice.company_info.web_link" title="Customer Address line 1"></div>
        <div class="input-container"><input type="text" ng-model="invoice.company_info.address1" title="Customer Address line 2"></div>
        <div class="input-container"><input type="text" ng-model="invoice.company_info.address2" title="Customer Contact Number"></div>
        <div class="input-container"><input type="text" ng-model="invoice.company_info.postal" title="Customer Email Id"></div>
      </div>
    </div>
    <div class="items-table">
      <div class="row header">
        <div class="col-xs-1">&nbsp;</div>
        <div class="col-xs-5">Description</div>
        <div class="col-xs-2">Quantity</div>
        <div class="col-xs-2">Cost {{currencySymbol}}</div>
        <div class="col-xs-2 text-right">Total</div>
      </div>
      <div class="row invoice-item" ng-repeat="item in invoice.items" ng-animate="'slide-down'">
        <div class="col-xs-1 remove-item-container">
          <a href ng-hide="printMode" ng-click="removeItem(item)" class="btn btn-danger">[X]</a>
        </div>
        <div class="col-xs-5 input-container">
          <input ng-model="item.description" placeholder="Description" >
        </div>
        <div class="col-xs-2 input-container">
          <input ng-model="item.qty" value="1" size="4" ng-required ng-validate="integer" placeholder="Quantity" />
        </div>
        <div class="col-xs-2 input-container">
          <input ng-model="item.cost" value="0.00" ng-required ng-validate="number" size="6" placeholder="Cost" />
        </div>
        <div class="col-xs-2 text-right input-container">
          {{item.cost * item.qty | currency: currencySymbol}}
        </div>
      </div>
      <div class="row invoice-item">
        <div class="col-xs-12 add-item-container" ng-hide="printMode">
          <a class="btn btn-primary" href ng-click="addItem()" >[+]</a>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-10 text-right">Sub Total</div>
        <div class="col-xs-2 text-right">{{invoiceSubTotal() | currency: currencySymbol}}</div>
      </div>
      <div class="row">
        <div class="col-xs-10 text-right">GST(%): <input ng-model="invoice.tax" ng-validate="number" style="width:25px"></div>
        <div class="col-xs-2 text-right">{{calculateTax() | currency: currencySymbol}}</div>
      </div>
      <div class="row">
        <div class="col-xs-10 text-right">Grand Total:</div>
        <div class="col-xs-2 text-right">{{calculateGrandTotal() | currency: currencySymbol}}</div>
      </div>
    </div>
    <div class="row noPrint actions">
      <a href="#" class="btn btn-primary" ng-show="printMode" ng-click="printInfo()">Print</a>
      <a href="#" class="btn btn-primary" ng-click="clearLocalStorage()">Reset</a>
      <a href="#" class="btn btn-primary" onclick="myFunction()" >Print</a>
    </div>
    <div class="row">
    	<section class="signature">
		  <div>
		    <p>For Mahindrakar Agencies</p>
		    <p><p>
		  </div>
		</section>
    </div>
  </div>
  
<script>
function myFunction() {
    window.print();
}
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {
    $("#datepicker" ).datepicker({
        dateFormat: 'dd / mm / yy'	});

  } );

var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = day + " / " + month + " / " + year;


document.getElementById('datepicker').value = today;
</script>

            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  @endsection