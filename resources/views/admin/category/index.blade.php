@extends ('admin/index')
@section('title', 'Category-List')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category-list</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('category.create') }}" class="btn btn-primary float-right">Add Category</a>
                        </div>
                        <div class="card-body">
                            <table id="subadminlisting" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allUsers as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucwords($category->category_name) }}</td>
                                            <td>
                                                @if ($category->status == 'active')
                                                    <div class="btn btn-success btn-sm">{{ ucwords($category->status) }}
                                                    </div>
                                                @else
                                                    <div class="btn btn-danger btn-sm">{{ ucwords($category->status) }}
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <a href="{{ route('category.delete', $category->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
    <!-- /. Main content -->

    <script>
        $(document).ready(function() {
            var table = $('#subadminlisting').DataTable();
        });
    </script>

@endsection
