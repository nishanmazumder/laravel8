<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice</title>
  <link rel="stylesheet" href="{{asset('css/invoice.css')}}" media="all" />

</head>

<body>
  <header class="clearfix">
    <div id="logo">
      <img src="{{asset('img/invoice.png')}}">
    </div>
    <div class="company">
      <h2 class="name">Company Name</h2>
      <div>455 Foggy Heights, AZ 85004, US</div>
      <div>(602) 519-0450</div>
      <div><a href="mailto:company@example.com">company@example.com</a></div>
    </div>
    </div>
  </header>
  <main>
    <div id="details" class="clearfix">
      <div id="client">
        <div class="to">INVOICE TO:</div>
        <h2 class="name">{{$shipping->name}}</h2>
        <div class="address">{{$shipping->address}}</div>
        <div class="email"><a href="mailto:{{$shipping->email}}">{{$shipping->email}}</a></div>
      </div>
      <div id="invoice">
        <h1>INVOICE 3-2-1</h1>
        <div class="date">Date of Invoice: 01/06/2014</div>
        <div class="date">Due Date: 30/06/2014</div>
      </div>
    </div>
    <table class="nm-tbl-data" border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="no">#</th>
          <th class="desc"><b>Product</b></th>
          <th class="unit"><b>Price</b></th>
          <th class="qty"><b>Quantity</b></th>
          <th class="total"><b>Total</b></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orderDetails as $orderDetail)
        <tr>
          <td class="no">01</td>
          <td class="desc">
            {{$orderDetail->productName}}
          </td>
          <td class="unit">{{$orderDetail->productprice}}</td>
          <td class="qty">{{$orderDetail->productQty}}</td>
          <td class="total">{{$orderDetail->productprice * $orderDetail->productQty}}</td>
        </tr>
        @endforeach
       
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">SUBTOTAL</td>
          <td>{{$order->orderTotal}}</td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">TAX 25%</td>
          <td>$1,300.00</td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">GRAND TOTAL</td>
          <td>$6,500.00</td>
        </tr>
      </tfoot>
    </table>
    <div id="thanks">Thank you!</div>
    <div id="notices">
      <h3>NOTICE:</h3>
      <div class="notice">1. A finance charge of 1.5% will be.</div>
      <div class="notice">1. A finance charge of 1.5% will be.</div>
      <div class="notice">1. A finance charge of 1.5% will be.</div>
      <div class="notice">1. A finance charge of 1.5% will be.</div>
      <div class="notice">1. A finance charge of 1.5% will be.</div>
    </div>
  </main>
  <footer>
    Invoice was created on a computer and is valid without the signature and seal.
  </footer>
</body>

</html>