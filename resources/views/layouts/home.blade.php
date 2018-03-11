<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>
    </head>
    <body>
        <div id="app">
            <el-container>        
                <el-header height='60px'>header</el-header>
                <el-container>
                    <el-aside width="200px">Aside</el-aside>
                    <el-container>
                        <el-main>
                            @yield('content')
                        </el-main>
                        <el-footer><el-button>Hello</el-button></el-footer>
                    </el-container>
                </el-container>
            </el-container>
            
            @if (session('status'))
            <div class="alert alert-danger">
                <p><strong>Whoops!</strong> There were some problems with your input.</p>
                <p>{{ session('status') }}</p>
            </div>
            @endif

        </div>

        <!-- Scripts -->
        <script src="/js/app.js"></script>
    </body>
</html>
