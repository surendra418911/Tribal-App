@extends ('admin/index')
@section('title', 'Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <a href="{{ route('user.list') }}" style="text-decoration: none; color: inherit;">
                            <div class="info-box-content">
                                <span class="info-box-text">Total Users</span>
                                <span class="info-box-number">{{ $TotalUser }}</span>
                            </div>
                        </a>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <a href="{{ route('user.list') }}" style="text-decoration: none; color: inherit;">
                            <div class="info-box-content">
                                <span class="info-box-text">Total Admin</span>
                                <span class="info-box-number">{{ $TotalAdmin }}</span>
                            </div>
                        </a>
                        <!-- /.info-box-content -->
                    </div>  
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
        </div>
        <!-- /.col -->
    </section>
    <!-- /.content -->
@endsection

