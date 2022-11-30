<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/fonts/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<!-- Data Tables -->
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs4.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs4-custom.css') }}" />
<link href="{{ asset('assets/vendor/datatables/buttons.bs.css') }}" rel="stylesheet" />

<link href="{{ asset('assets/toastr/toastr.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>


<script type="text/javascript">
    function modalview(id) {
        var img = $('.img').val();
        //  alert(img);
        $('#adid').val(id);
        $('#img').val(img);
        //  alert(as);
    }

    function modalBulk(id) {
        $('#bulkid').val(id);
    }

    function modalview_app(id) {
        $('#id-app').val(id);
    }

    function modalstock(id) {
        $('#stid').val(id);
    }
</script>

<script>
    $(document).ready(function() {
        $("#chkSelectAll").on('click', function() {
            // alert('okk');
            this.checked ? $(".chkDel").prop("checked", true) : $(".chkDel").prop("checked", false);
        })
    })
</script>
