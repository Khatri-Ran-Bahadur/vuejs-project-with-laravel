<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <title>Postal Service Saylan</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
  
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/skin-blue.min.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/nepali.datepicker.v2.2.min.css') }}" />
  <link rel="stylesheet" href="{{asset('assets/pretty-checkbox.min.css')}}">
<style>
        .ck-editor__editable {
          min-height: 300px;
         }
         .invalid-feedback{
          color:red;
         }
         .thumbnail-table{
            height:80px;
            width:80px;
         }

    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper" id="app">

    @include('admin.common.header')
    @include('admin.common.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
     
      <section class="content container-fluid">

        <admin-content></admin-content>
        <vue-progress-bar></vue-progress-bar>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.common.footer')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/dist/js/adminlte.min.js') }}"></script>
    
    <script src="{{asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{asset('assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/dist/mainrn.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/dist/nepali.datepicker.v2.2.min.js')}}"></script>
    
  
    
@auth
<script>
  window.user=@json(auth()->user())
  
</script>

@endauth

</body>

</html>




