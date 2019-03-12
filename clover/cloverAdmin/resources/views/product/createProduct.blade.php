@include('includes.header')

<div class="container" style="margin-top: 30px;">
    <form method="post" action="/product/@yield('editId')" enctype="multipart/form-data">
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
            <legend>Product</legend>
            <div class="form-group row">
                <label for="productName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="productName"
                        placeholder="Enter Product Name" value="@yield('editName')" />

                    @if ($errors->has('productName'))
                    <small class="form-text invalid-feedback">
                        {{ $errors->first('productName') }}
                    </small>
                    @endif

                </div>
            </div>
            <div class="form-group row">
                <label for="categoryName" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="category" class="form-control" id="categoryName">
                        <option value="@yield('editCategoryId')"> @yield('editCategoryName') </option>

                        @foreach ($category as $categoryObj)
                        <option value="{{ $categoryObj->id }}">{{ $categoryObj->name }} </option>
                        @endforeach

                    </select>

                    @if ($errors->has('category'))
                    <small class="form-text invalid-feedback">
                        {{ $errors->first('category') }}
                    </small>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" placeholder="Enter Description"
                        rows="5">
                        @yield('editDescription')
                    </textarea>

                    @if ($errors->has('description'))
                    <small class="form-text invalid-feedback">
                        {{ $errors->first('description') }}
                    </small>
                    @endif

                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price"
                        value="@yield('editPrice')" />

                    @if ($errors->has('price'))
                    <small class="form-text invalid-feedback">
                        {{ $errors->first('price') }}
                    </small>
                    @endif

                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp"
                    name="image_url">
                <small id="fileHelp" class="form-text text-muted">Image should not be bigger than
                    <strong>20kb</strong></small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            &nbsp;&nbsp;&nbsp;
            <a href="/product" class="btn btn-warning">Exit</a>
        </fieldset>
    </form>
</div>

@include('includes.footer')