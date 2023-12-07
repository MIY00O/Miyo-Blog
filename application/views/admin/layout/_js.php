<!-- plugins:js -->
<script src="<?= base_url('assets/skydash/') ?>vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= base_url('assets/skydash/') ?>vendors/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/skydash/') ?>vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/skydash/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?= base_url('assets/skydash/') ?>js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url('assets/skydash/') ?>js/off-canvas.js"></script>
<script src="<?= base_url('assets/skydash/') ?>js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets/skydash/') ?>js/template.js"></script>
<script src="<?= base_url('assets/skydash/') ?>js/settings.js"></script>
<script src="<?= base_url('assets/skydash/') ?>js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= base_url('assets/skydash/') ?>js/dashboard.js"></script>
<script src="<?= base_url('assets/skydash/') ?>js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->

<!-- JS Hilang -->
<script>
    $('#hilang').delay('slow').slideDown('slow').delay(2000).slideUp(500);
</script>
<!-- JS Hilang -->
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
<!-- TinyMCE textarea -->
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
</script>
<!-- TinyMCE textarea -->