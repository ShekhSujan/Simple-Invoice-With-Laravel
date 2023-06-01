<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/slimscroll/slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/vendor/slimscroll/custom-scrollbar.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>


<script>
    function readURLa(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imgload').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function() {
        readURLa(this);
    });
</script>
<script>
    function readURLb(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imgload2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp2").change(function() {
        readURLb(this);
    });
</script>
<script>
    function readURLc(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imgload3').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp3").change(function() {
        readURLc(this);
    });
</script>
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>

{!! Toastr::message() !!}
