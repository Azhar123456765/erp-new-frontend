<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>


<script src="{{ asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('../../plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../../plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('../../plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('../../plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('../../dist/js/adminlte.min2167.js?v=3.2.0') }}"></script>

<script src="{{ asset('../../dist/js/demo.js') }}"></script>





<script src="select2/select2.min.js"></script>


<script>
  $(function () {
    $("#example1")
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      })
      .buttons()
      .container()
      .appendTo("#example1_wrapper .col-md-6:eq(0)");
    $("#example2").DataTable({
      paging: true,
      lengthChange: false,
      searching: false,
      ordering: true,
      info: true,
      autoWidth: false,
      responsive: true,
    });
  });
</script>





    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>


    <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").summernote();
      });
    </script>



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




<style>
    /* styles.css */
    .loader-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .loader {
        border: 4px solid #f3f3f3;
        border-top: 4px solid green;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
<script src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js') }}"></script>
@if (session('message') != '')
<script>
    Swal.fire({
        icon: 'success',
        title: "{{ session('message') }}",
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000 // Automatically close after 3 seconds
    });
    $('.select').select2({
        theme: 'default',
        width: 'resolve',
        searching: 'true'
    });
$('#mySelect2').on('select2:open', function () {
      $('.select2-search__field').focus();
    });
    // Swal.fire({
    //     icon: 'success',
    //     title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //   })    
</script>

@endif

@if (session('something_error') != '')
<script>
    Swal.fire({
        icon: 'warning',
        title: "{{ session('message') }}",
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000 // Automatically close after 3 seconds
    });
</script>
@endif
@if($errors->all() != null)
<script>
    Swal.fire({
        icon: 'warning',
        @foreach($errors-> all() as $error)
        title: "{{ $error }}",
        @endforeach
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000 // Automatically close after 3 seconds
    });
</script>
@endif

<script>
       function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});


$(document).on('keydown', function ( e ) {
    if ((e.metaKey || e.ctrlKey) && ( String.fromCharCode(e.which).toLowerCase() === 'm') ) {
		$("#add-modal").modal('show');
		$("#login-modal").modal('show');
    }
});

$(document).on('keydown', function ( e ) {
    if ((e.metaKey || e.ctrlKey) && ( String.fromCharCode(e.which).toLowerCase() === 'l') ) {
        window.location.href = '/logout'
    }
});



const elements = document.querySelectorAll('input, select');

let currentIndex = 0;

document.addEventListener('keydown', function(e) {
    if (e.key === 'Control') {
        e.preventDefault();
        currentIndex = (currentIndex + 1) % elements.length;
        elements[currentIndex].focus();
    }
});
</script>

