{{-- if session flashdata == true --}}
<div class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;" id="flashmodal">
    <div aria-labelledby="swal2-title" aria-describedby="swal2-html-container" class="swal2-popup swal2-modal swal2-icon-error swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: grid;">
        <h2 class="swal2-title">FLASHDATA TYPE</h2>
        {{-- if flashdata_type == success --}}
        {{-- <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
            <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
            <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
            <div class="swal2-success-ring"></div>
            <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
            <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);">
            </div>
        </div> --}}
        {{--else flashdata_type == success --}}
        {{-- <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;">
            <span class="swal2-x-mark">
                <span class="swal2-x-mark-line-left"></span>
                <span class="swal2-x-mark-line-right"></span>
            </span>
        </div> --}}
        {{--endif--}}
        <div class="swal2-html-container">
            {{-- session flashdata message --}}
        </div>
        <button type="button" class="btn btn-primary" onclick="closeflashmodal()">Ok, got it!</button>

    </div>
</div>
{{-- end if --}}

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
<span class="svg-icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
    </svg>
</span>
<!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--end::Main-->
<script src="assets/app/js/script.js"></script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="assets/metronic/plugins/global/plugins.bundle.js"></script>
<script src="assets/metronic/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->

<script src="assets/metronic/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="assets/metronic/js/custom/apps/customers/list/list.js"></script>
</body>

</html>