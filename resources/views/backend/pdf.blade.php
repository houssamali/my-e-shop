<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    



    <div class="row mt-5 mb-5">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col-md-2">Name :{{$orders->name}}</div>
                <div class="col-md-2">Total Price Rs:{{$orders->total}}</div>
                <div class="col-md-2">Track_No:{{$orders->track_no}}</div>
                <div class="col-md-3">Order Status :@if($orders->status==0)
                    {{'cash on delivery'}}
                    @else
                    {{'complete'}}
                    @endif
                </div>
                <div class="col-md-3">Date:{{$orders->created_at}}</div>
           </div>
            </div>

            <div class="card-body">
                <div class="row">
                
                    @foreach($items as $item)
                    
                    <div class="col-md-6">
                        <div class="row">
                            
                            <div class="col-md-3">
                                <p >one</p>
                                
                            </div>

                            <div class="col-md-3">
                                <span class="text-warning">${{$item->price}}</span>
                            </div>

                            <div class="col-md-3">
                            <span>No :</span> <span class="text-success fw-5 fs-5">{{$item->qty}}</span>
                            </div>
                        </div>
                        
        
                </div>

                      @endforeach
                </div>
            </div>
        </div>

</di>
    </div>
</div></div>

</body>
</html>