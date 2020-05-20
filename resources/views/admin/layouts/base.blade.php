<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>OneUI - Bootstrap 4 Admin Template &amp; UI Framework</title>

        <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="OneUI">
        <meta property="og:description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{asset('media/favicons/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('media/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('media/favicons/apple-touch-icon-180x180.png')}}">
        <!-- END Icons -->

        {{-- extends --}}
        <link rel="stylesheet" href="{{asset('js/admin/adminjs/plugins/datatables/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('js/admin/adminjs/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{asset('js/admin/adminjs/plugins/summernote/summernote-bs4.css')}}">
        <link rel="stylesheet" href="{{asset('js/admin/adminjs/plugins/simplemde/simplemde.min.css')}}">

        {{-- dropify --}}
        <link rel="stylesheet" href="{{asset('plug/dropify/css/dropify.min.css')}}">
        {{-- /extends --}}

        {{-- fileinput --}}
        <link rel="stylesheet" href="{{asset('plug/upload/css/fileinput.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin/bootstrap-datetimepicker.css')}}">
        {{-- fileinput --}}

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="{{asset('css/admin/main.css')}}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="css/themes/amethyst.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Light themed Header
            'page-header-dark'                          Dark themed Header

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">

            <!-- Sidebar -->
            <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
            {{-- sidebar --}}
                @include('admin.layouts.sidebar')
            {{-- sidebar --}}

            {{-- header --}}
                @include('admin.layouts.header')
            {{-- end header --}}

            <!-- Main Container -->
            <main id="main-container">

                @yield('content')

            </main>
            <!-- END Main Container -->

            {{-- footer --}}
                @include('admin.layouts.footer')
            {{-- /footer --}}

        </div>
        <!-- END Page Container -->

        <!--
            OneUI JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out _es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            js/core/jquery.min.js
            js/core/bootstrap.bundle.min.js
            js/core/simplebar.min.js
            js/core/jquery-scrollLock.min.js
            js/core/jquery.appear.min.js
            js/core/js.cookie.min.js
        -->
        <script src="{{asset('js/admin/adminjs/oneui.core.min.js')}}"></script>

        <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at _es6/main/app.js
        -->
        <script src="{{asset('js/admin/adminjs/oneui.app.min.js')}}"></script>

        {{-- js extend --}}

        {{-- file input --}}
        <script src="{{asset('plug/upload/js/plugins/sortable.min.js')}}"></script>
        <script src="{{asset('plug/upload/js/plugins/purify.min.js')}}"></script>
        <script src="{{asset('plug/upload/js/fileinput.min.js')}}"></script>

            <!-- Page JS Plugins -->
        <script src="{{asset('js/admin/adminjs/plugins/summernote/summernote-bs4.min.js')}}"></script>


        <script src="{{asset('js/admin/adminjs/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/admin/adminjs/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('js/admin/adminjs/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('js/admin/adminjs/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
        <script src="{{asset('js/admin/adminjs/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
        <script src="{{asset('js/admin/adminjs/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
        <script src="{{asset('js/admin/adminjs/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{asset('js/admin/adminjs/pages/be_tables_datatables.min.js')}}"></script>
        {{-- /js extends --}}

        {{-- datepick --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

        {{-- dropify --}}
        <SCript src="{{asset('plug/dropify/js/dropify.min.js')}}"></SCript>
        <SCript src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></SCript>

        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>

        <script>
            $('.dropify').dropify();
        </script>

        <script>
            $("#input-24").fileinput({
                theme: 'fas',
                allowedFileExtensions: ["jpg", "png"],
                previewFileType: "image",
                browseClass: "btn btn-success",
                browseLabel: "Pilih Gambar",
                browseIcon: "<i class=\"fa fa-upload\"></i> ",
                removeClass: "btn btn-danger",
                removeLabel: "Remove",
                removeIcon: "<i class=\"fa fa-trash\"></i> ",
                showCancel: false,
                showUpload: false,
            });
        </script>

        <script>
            $("#datepicker").datepicker({
                format: "yyyy",
                viewMode: "years", 
                minViewMode: "years"
            });
        </script>
        @stack('js_after')
    </body>
</html>
