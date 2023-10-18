<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="app/images/logos/favicon.ico" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="metronic/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="metronic/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->

        <title>FARSEN @yield('title','')</title>
    </head>
    <!--end::Head-->
    <!--begin::Body-->

    <body id="kt_body" class="bg-dark">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Authentication -->
            <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(metronic/media/illustrations/sketchy-1/14-dark.png)">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                    <!--begin::Logo-->
                    <img alt="Logo" src="app/images/logos/rsaugmwhite.svg" class="h-70px mb-12" />
                    <!--end::Logo-->
                    
                    @yield('content')
                
                </div>
            <!--end::Content-->
            </div>
        <!--end::Authentication-->
        </div>
        <!--end::Main-->
        <!--begin::Javascript-->
        <script src="app/js/script.js"></script>
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="metronic/plugins/global/plugins.bundle.js"></script>
        <script src="metronic/js/scripts.bundle.js"></script>
        <!--end::Global Javascript Bundle-->
        <!--end::Javascript-->
    </body>
    <!--end::Body-->
</html>