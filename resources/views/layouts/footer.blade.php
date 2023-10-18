    <?php if ($this->session->flashdata('flashdata') == true) : ?>
        <div class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;" id="flashmodal">
            <div aria-labelledby="swal2-title" aria-describedby="swal2-html-container" class="swal2-popup swal2-modal swal2-icon-error swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: grid;">
                <h2 class="swal2-title"><?= strtoupper($this->session->flashdata('flash_type')); ?></h2>
                <?php if ($this->session->flashdata('flash_type') == 'success') : ?>
                    <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                        <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                        <div class="swal2-success-ring"></div>
                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);">
                        </div>
                    </div>
                <?php else : ?>
                    <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;">
                        <span class="swal2-x-mark">
                            <span class="swal2-x-mark-line-left"></span>
                            <span class="swal2-x-mark-line-right"></span>
                        </span>
                    </div>
                <?php endif; ?>
                <div class="swal2-html-container"><?= $this->session->flashdata('flash_message'); ?></div>
                <button type="button" class="btn btn-primary" onclick="closeflashmodal()">Ok, got it!</button>

            </div>
        </div>

    <?php endif ?>

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