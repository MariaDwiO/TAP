
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
      <meta name="description" content=""/>
      <meta name="author" content=""/>
      <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
      
      <!-- loader-->
      <link href="{{ URL::asset('template/assets/css/pace.min.css') }}" rel="stylesheet"/>
      <script src="{{ URL::asset('template/assets/js/pace.min.js') }}"></script>
      
      <!--favicon-->
      <link rel="icon" href="{{ URL::asset('template/assets/images/favicon.ico') }}" type="image/x-icon">
      
      <!-- Vector CSS -->
      <link href="{{ URL::asset('template/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
      
      <!-- simplebar CSS-->
      <link href="{{ URL::asset('template/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
      
      <!-- Bootstrap core CSS-->
      <link href="{{ URL::asset('template/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
      
      <!-- animate CSS-->
      <link href="{{ URL::asset('template/assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
      
      <!-- Icons CSS-->
      <link href="{{ URL::asset('template/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
      
      <!-- Sidebar CSS-->
      <link href="{{ URL::asset('template/assets/css/sidebar-menu.css') }}" rel="stylesheet"/>
      
      <!-- Custom Style-->
      <link href="{{ URL::asset('template/assets/css/app-style.css') }}" rel="stylesheet"/>
      
    </head>

  <body class="bg-theme bg-theme1">
  
    <!-- Start wrapper-->
    <div id="wrapper">
    <div class="page-wrapper">
      @include('admin.template.sidebar')
        
          @include('admin.template.header')

          <div class="clearfix"></div>

          <div class="content-wrapper">
            @yield('content')
            <div class="container-fluid"> 
              
              <!--start overlay-->
                <div class="overlay toggle-menu"></div>
              <!--end overlay-->

            </div><!-- End container-fluid-->
          </div><!--End content-wrapper-->
            
          @include('admin.template.footer')
        </div>

        <!--Start Back To Top Button-->
          <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->
	          
    </div><!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('template/assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('template/assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('template/assets/js/bootstrap.min.js') }}"></script>
    
    <!-- simplebar js -->
    <script src="{{ URL::asset('template/assets/plugins/simplebar/js/simplebar.js') }}"></script>
    
    <!-- sidebar-menu js -->
    <script src="{{ URL::asset('template/assets/js/sidebar-menu.js') }}"></script>
    
    <!-- loader scripts -->
    <script src="{{ URL::asset('template/assets/js/jquery.loading-indicator.js') }}"></script>
    
    <!-- Custom scripts -->
    <script src="{{ URL::asset('template/assets/js/app-script.js') }}"></script>
    
    <!-- Chart js -->
    <script src="{{ URL::asset('template/assets/plugins/Chart.js/Chart.min.js') }}"></script>
  
    <!-- Index js -->
    <script src="{{ URL::asset('template/assets/js/index.js') }}"></script>

    {{-- ckeditor --}}
    <script src="{{ URL::asset('template/assets/ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
      CKEDITOR.replace('editor-custom', {
        uiColor: '#FFFFFF',
        language: 'id', // id, es, en, dll
        width: '100%',
        height: 250,
        toolbar: [
          { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
          { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
          { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
          { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
          '/',
          { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
          { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
          { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
          { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
          '/',
          { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
          { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
          { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
          { name: 'others', items: [ '-' ] },
          { name: 'about', items: [ 'About' ] }, 
        ]
        });
    </script>

  </body>
</html>
