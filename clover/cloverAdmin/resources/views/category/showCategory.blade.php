@include('includes.header')

<div class="container" style="margin-top: 30px;">
    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
        <div class="card-header">Category</div>
        <div class="card-body">
            <h4 class="card-title">{{$item->name}}</h4>
            <div>
                <a href="/category" class="btn btn-warning">Exit</a> &nbsp;&nbsp;
                <a href="{{'/category/'.$item->id.'/edit'}}" class="btn btn-primary">Edit</a>

            </div>
        </div>
    </div>
</div>

@include('includes.footer')