@include('includes.header')

<div class="container" style="margin-top: 30px;">
    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
        <div class="card-header">Category</div>
        <div class="card-body">
            <div>
                <img src="/{{$item->image_url}}" style="width: 200px; height: auto;margin: 0 auto" />
            </div>
            <br />
            <h4 class="card-title">{{$item->name}}</h4>
            <div>
                <p class="card-text">{{$item->description}}</p>
            </div>
            <div>
                <p class="card-text">Price {{$item->price}}</p>
            </div>
            <br />
            <div>
                <a href="/product" class="btn btn-warning">Exit</a> &nbsp;&nbsp;
                <a href="{{'/product/'.$item->id.'/edit'}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>

@include('includes.footer')