
<script>
    function pdf(field) {

        var href = field;
        window.location.href = "/pdf" + href
    }



    function accountData() {
        var company = $("#head_account").find('option:selected');
        var id = company.data('id')

        $("#head_account").on('change', function() {

            let invoice = $("#gen-led-account").find('option:selected').val('');
            let invoiceText = $("#gen-led-account").find('option:selected').text('');

        })

        console.log('it is id ' + id);
        $(document).ready(function() {
            $('#gen-led-account').select2({
                ajax: {
                    url: '/get-data/account',
                    dataType: 'json',
                    data: {
                        'id': id
                    },
                    delay: 250,
                    processResults: function(data) {

                        // console.log(data.data);          
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.account_id,
                                    text: item.account_name
                                };
                            })
                        }

                    },
                    cache: true
                },
            });
        });

    }
</script>
<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
</script>
<!-- Main JS-->
<script src="js/main.js"></script>

<!-- Latest compiled and minified CSS -->

<!-- Latest compiled and minified JavaScript -->

<script>
    function user_check_access() {


        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });


        // Get the form data

        // Send an AJAX request
        $.ajax({
            url: '/user-access', // Replace with your Laravel route or endpoint
            method: 'POST',
            success: function(response) {
                // Handle the response
                console.log(response);
                if (response == false) {
                    window.location.href = '/'
                } else {

                }

            },
            error: function(error) {
                // Handle the error
            },
        });
    }


    $(document).click(function() {

        user_check_access();
    })
    $(document).change(function() {

        user_check_access();
    })
    $(document).focus(function() {

        user_check_access();
    })
</script>