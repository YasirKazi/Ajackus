@include('includes.header')

@if(@session('message'))
<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>
        {{ @session('message') }}
    </strong>
</div>
@endif
<div class="container" style="margin-top: 30px;">
    <div class="text-right">
        <a href="product/create" class="btn btn-primary">Add New Product</a>
        <br />
        <br />
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Sr.</th>
                <th scope="col">Product Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $productObj)
            <tr>
                <th scope="row">
                    {{ $productObj->id }}
                </th>
                <td>
                    <strong>{{ $productObj->name }}</strong>
                </td>
                <td>
                    <strong>{{ $productObj->category }}</strong>
                </td>
                <td>
                    <strong>{{ $productObj->price }}</strong>
                </td>
                <td>
                    <a href="{{'/product/'.$productObj->id}}" class="btn btn-sm btn-secondary">Show Details</a>
                    &nbsp;&nbsp;
                    <a href="{{'/product/'.$productObj->id.'/edit'}}" class="btn btn-sm btn-primary">Edit</a>
                    &nbsp;&nbsp;
                    <form class="form-group" style="display: inline;" action="{{'/product/'.$productObj->id}}"
                        method="post">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('includes.footer')