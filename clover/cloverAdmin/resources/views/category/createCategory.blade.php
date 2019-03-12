@include('includes.header')

<div class="container" style="margin-top: 30px;">
    <form method="post" action="/category/@yield('editId')">
        {{ csrf_field() }}

        @section('editMethod')
        @show

        @if(@session('response'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>
                {{ @session('response') }}
            </strong>
        </div>
        @endif

        @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-dismissible alert-primary">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ $error }}</strong>
        </div>
        @endforeach
        @endif

        <fieldset>
            <legend>Category</legend>
            <div class="form-group row">
                <label for="categoryName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="categoryName"
                        placeholder="Enter Category Name" value="@yield('editName')" />

                    @if ($errors->has('categoryName'))
                    <small class="form-text invalid-feedback">
                        {{ $errors->first('categoryName') }}
                    </small>
                    @endif

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            &nbsp;&nbsp;&nbsp;
            <a href="/category" class="btn btn-warning">Exit</a>
        </fieldset>
    </form>
</div>

@include('includes.footer')