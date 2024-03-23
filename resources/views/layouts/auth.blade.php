<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('app/images/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('metronic/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <title>FARSEN @yield('title', '')</title>
</head>

<body id="kt_body" class="bg-dark">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url({{ asset('metronic/media/illustrations/sketchy-1/14-dark.png') }})">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20" id="kt_content">
                <img alt="Logo" src="{{ asset('app/images/logos/rsaugmwhite.svg') }}" class="h-70px mb-12" />
                @yield('content')
            </div>
        </div>
    </div>

    <script src="app/js/script.js"></script>
    <script src="{{ asset('metronic/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('metronic/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('metronic/js/custom/authentication/sign-in/general.js') }}"></script>

    @if ($errors->any())
        <script>
            Swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary",
                },
            })
        </script>
    @endif
    @if (session('success'))
        <div id="sess_message" hidden>{{ session('success') }}</div>
        <script>
            var message = document.getElementById('sess_message').textContent;
            Swal.fire({
                text: message,
                icon: "success",
                buttonsStyling: !1,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                },
            })
        </script>
    @endif
</body>

</html>
