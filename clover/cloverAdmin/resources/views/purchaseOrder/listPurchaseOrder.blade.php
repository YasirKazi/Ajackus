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

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Sr.</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Mobile No.</th>
                <th scope="col">Address Type</th>
                <th scope="col">City</th>
                <th scope="col">Order Total</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order as $orderObj)
            <tr>
                <th scope="row">
                    {{ $orderObj->id }}
                </th>
                <td>
                    <strong>{{ $orderObj->name }}</strong>
                </td>
                <td>
                    <strong>{{ $orderObj->mobile }}</strong>
                </td>
                <td>
                    <strong>{{ $orderObj->address_type }}</strong>
                </td>
                <td>
                    <strong>{{ $orderObj->city }}</strong>
                </td>
                <td>
                    <strong>&#x20b9; {{ $orderObj->order_total }}</strong>
                </td>
                <td>
                    <a href="{{'/orders/'.$orderObj->id}}" class="btn btn-sm btn-primary">Show Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('includes.footer')