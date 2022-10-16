<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        section{
            display: flex;
            justify-content: space-between;
            background:blue;
        }
    </style>
    
    
</head>
<body>
    
   <div>
    <h4>Name : Houssam_shop</h4>
    <h4>Country: Yemen</h4>
    <h4>City : Taiz</h4>
   </div>
   <div>
    <h4>Contact No :7676973863</h4>
    <h4>Email :houssam71134@gmail.com</h4>
    <h4>Website :H_Shop</h4>
   </div>
    

    <table border="1" style="width:90%;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Item</th>
                <th>Price</th>
                <th>Offer</th>
                <th>Quantity</th>
                <th>Tax</th>
            </tr>
        </thead>



        <tbody>
            @foreach($items as $item)
             <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->product->name}}</td>
                <td>Rs {{$item->price}}</td>
                <td>Rs {{$item->product->over_price}}</td>
                <td>{{$item->qty}}</td>
                <td>00.00</td>
             </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total Price Rs: {{$orders->total}}</h4>
    <h4>Date :{{$orders->created_at}}</h4>
</body>
</html>