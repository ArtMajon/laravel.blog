<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" data-enable-remember="true" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" target="_blank" class="brand-link">
            <img src="{{ asset('assets/admin/img/AdminLTELogo.png') }}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">На сайт</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Главная</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                Категории
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список категорий</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('categories.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Новая категория</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Теги
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('tags.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список тегов</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tags.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Новый тег</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Статьи
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('posts.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список статей</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('posts.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Новая статья</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="container mt-2">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
<script>
    $('.nav-sidebar a').each(function () {
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if (link == location) {
            $(this).addClass('active');
            $(this).closest('.has-treeview').addClass('menu-open');
        }
    });
</script>

<script src="{{ asset('assets/admin/build/ckeditor.js') }}"></script>
<script src="{{ asset('assets/admin/ckfinder.js') }}"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'],
                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',
                    // This represents an image aligned to the left.
                    'alignLeft',
                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'CKfinder',
                    'mediaEmbed'
                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
        .catch(function (error) {
            console.error(error);
        });

    ClassicEditor
        .create( document.querySelector( '#description' ), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
        } )
        .catch( function( error ) {
            console.error( error );
        } );
</script>

</body>
</html>