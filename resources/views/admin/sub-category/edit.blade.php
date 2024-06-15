@extends ('admin/index')
@section('title', 'Edit-Sub-Category')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0">Add Subadmin</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sub-Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Sub Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('sub.category.update', $subCategory->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Inputusername">Category</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($allCategory as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subCategory->category_id ? 'selected' : '' }}> {{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="form-valid-error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Inputusername">Name</label>
                                    <input type="text" name="sub_category_name" class="form-control"
                                        value="{{ $subCategory->sub_category_name }}" placeholder="Enter category name">
                                    @error('sub_category_name')
                                        <div class="form-valid-error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Inputusername">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="active" {{ $subCategory->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $subCategory->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="form-valid-error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- ---------------image------------ -->
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
