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
        <a href="category/create" class="btn btn-primary">Add New Category</a>
        <br />
        <br />
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Sr.</th>
                <th scope="col">Category Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $categoryObj)
            <tr>
                <th scope="row">
                    {{ $categoryObj->id }}
                </th>
                <td>
                    <strong>{{ $categoryObj->name }}</strong>
                </td>
                <td>
                    <a href="{{'/category/'.$categoryObj->id}}" class="btn btn-sm btn-secondary">Show Details</a>
                    &nbsp;&nbsp;
                    <a href="{{'/category/'.$categoryObj->id.'/edit'}}" class="btn btn-sm btn-primary">Edit</a>
                    &nbsp;&nbsp;
                    <form class="form-group" style="display: inline;" action="{{'/category/'.$categoryObj->id}}"
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