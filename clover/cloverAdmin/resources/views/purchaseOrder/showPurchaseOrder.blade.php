@include('includes.header')

<div class="container" style="margin-top: 30px;">
    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
        <div class="card-header">Order Details</div>
        <div class="card-body">
            <h4 class="card-title">{{$item->name}}</h4>
            <p>
                Order Total - &#x20b9; {{$item->order_total}}
            </p>
            <p>
                Mobile - {{$item->mobile}}
            </p>
            <p>
                Landmark - {{$item->landmark}}
            </p>
            <p>
                City - {{$item->city}}
            </p>
            <p>
                Address Type - {{$item->address_type}}
            </p>
            <div>
                <a href="/orders" class="btn btn-warning">Exit</a> &nbsp;&nbsp;
            </div>
        </div>
    </div>
</div>

@include('includes.footer')