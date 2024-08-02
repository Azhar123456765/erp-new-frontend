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
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script src="validate/validin.js"></script>


<script>
    $(function() {
        $('form').validin();
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
    $(function() {
        //Add text editor
        $(".textarea").summernote();
    });
</script>



<script>
    function pdf(field) {

        var href = field;
        window.location.href = "/pdf" + href
    }

    // Check if the screen width is less than or equal to 767 pixels (common mobile breakpoint)
    if (window.innerWidth() <= 500) {
        // Select anchor elements with the class 'external-link' within aside elements
        var links = $('aside a');

        // Iterate through each link and set the target attribute to '_blank'
        links.each(function() {
            $(this).attr('target', '_blank');
        });
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

<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            timer: 3000
        });
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
<!--
@if (session()->get('not_found'))
<script>
    Swal.fire({
        icon: 'succes',
        title: "{{ session()->get('not_found') }}",
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000 // Automatically close after 3 seconds
    });
</script>
@endif -->

@if ($errors->all() != null)
    <script>
        Swal.fire({
            icon: 'warning',
            @foreach ($errors->all() as $error)
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
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });


    $(document).on('keydown', function(e) {
        if ((e.metaKey || e.ctrlKey) && (String.fromCharCode(e.which).toLowerCase() === 'm')) {
            $("#add-modal").modal('show');
            $("#login-modal").modal('show');
        }
    });

    $(document).on('keydown', function(e) {
        if ((e.metaKey || e.ctrlKey) && (String.fromCharCode(e.which).toLowerCase() === 'l')) {
            window.location.href = '/logout'
        }
    });


    // const elements = document.querySelectorAll('input, select');

    // let currentIndex = 2;

    // document.addEventListener('keydown', function(e) {
    //     if (e.key === 'Shift') {
    //         e.preventDefault();
    //         currentIndex = (currentIndex + 1) % elements.length;
    //         elements[currentIndex].focus();
    //     }
    // });

    $(document).ready(function() {

        $('input[name="date"]').focus();

    })


    // SELECT2
    // $(document).ready(function () {
    //     $('.select-account').select2({
    //         ajax: {
    //             url: '{{ route('select2.account') }}',
    //             dataType: 'json',
    //             delay: 250,
    //             data: function (params) {
    //                 return {
    //                     q: params.term
    //                 };
    //             },
    //             processResults: function (data) {
    //                 return {
    //                     results: $.map(data, function (item) {
    //                         return {
    //                             text: item.account_name,
    //                             id: item.account_id
    //                         };
    //                     })
    //                 };
    //             },
    //             cache: true
    //         },
    //         minimumInputLength: 2,
    //         theme: 'classic',
    //         width: '100%',
    //     });
    //     $('.select-warehouse').select2({
    //         ajax: {
    //             url: '{{ route('select2.warehouse') }}',
    //             dataType: 'json',
    //             delay: 250,
    //             data: function (params) {
    //                 return {
    //                     q: params.term
    //                 };
    //             },
    //             processResults: function (data) {
    //                 return {
    //                     results: $.map(data, function (item) {
    //                         return {
    //                             text: item.warehouse_name,
    //                             id: item.warehouse_id
    //                         };
    //                     })
    //                 };
    //             },
    //             cache: true
    //         },
    //         minimumInputLength: 2,
    //         theme: 'classic',
    //         width: '100%',
    //     });

    //     $('.select-sales_officer').select2({
    //         ajax: {
    //             url: '{{ route('select2.sales_officer') }}',
    //             dataType: 'json',
    //             delay: 250,
    //             data: function (params) {
    //                 return {
    //                     q: params.term
    //                 };
    //             },
    //             processResults: function (data) {
    //                 return {
    //                     results: $.map(data, function (item) {
    //                         return {
    //                             text: item.sales_officer_name,
    //                             id: item.sales_officer_id
    //                         };
    //                     })
    //                 };
    //             },
    //             cache: true
    //         },
    //         minimumInputLength: 2,
    //         theme: 'classic',
    //         width: '100%',
    //     });
    //     $('.select-product_category').select2({
    //         ajax: {
    //             url: '{{ route('select2.product_category') }}',
    //             dataType: 'json',
    //             delay: 250,
    //             data: function (params) {
    //                 return {
    //                     q: params.term
    //                 };
    //             },
    //             processResults: function (data) {
    //                 return {
    //                     results: $.map(data, function (item) {
    //                         return {
    //                             text: item.product_category_name,
    //                             id: item.product_category_id
    //                         };
    //                     })
    //                 };
    //             },
    //             error: function (jqXHR, textStatus, errorThrown) {
    //                 console.error('AJAX Error:', textStatus, errorThrown);
    //             }
    //         },
    //         minimumInputLength: 2,
    //         theme: 'classic',
    //         width: '100%'
    //     });


    //     $('.select-product_company').select2({
    //         ajax: {
    //             url: '{{ route('select2.product_company') }}',
    //             dataType: 'json',
    //             delay: 250,
    //             data: function (params) {
    //                 return {
    //                     q: params.term
    //                 };
    //             },
    //             processResults: function (data) {
    //                 return {
    //                     results: $.map(data, function (item) {
    //                         return {
    //                             text: item.product_company_name,
    //                             id: item.product_company_id
    //                         };
    //                     })
    //                 };
    //             },
    //             cache: true
    //         },
    //         minimumInputLength: 2,
    //         theme: 'classic',
    //         width: '100%',
    //     });


    //     $('.select-customer').select2({
    //         ajax: {
    //             url: '{{ route('select2.buyer') }}',
    //             dataType: 'json',
    //             delay: 250,
    //             data: function (params) {
    //                 return {
    //                     q: params.term
    //                 };
    //             },
    //             processResults: function (data) {
    //                 return {
    //                     results: $.map(data, function (item) {
    //                         return {
    //                             text: item.buyer_name,
    //                             id: item.buyer_id
    //                         };
    //                     })
    //                 };
    //             },
    //             cache: true
    //         },
    //         minimumInputLength: 2,
    //         theme: 'classic',
    //         width: '100%',
    //     });


    //     $('.select-seller').select2({
    //         ajax: {
    //             url: '{{ route('select2.seller') }}',
    //             dataType: 'json',
    //             delay: 250,
    //             data: function (params) {
    //                 return {
    //                     q: params.term
    //                 };
    //             },
    //             processResults: function (data) {
    //                 return {
    //                     results: $.map(data, function (item) {
    //                         return {
    //                             text: item.seller_name,
    //                             id: item.seller_id
    //                         };
    //                     })
    //                 };
    //             },
    //             cache: true
    //         },
    //         minimumInputLength: 2,
    //         theme: 'classic',
    //         width: '100%',
    //     });


    //     $('.select-product').select2({
    //         ajax: {
    //             url: '{{ route('select2.products') }}',
    //             dataType: 'json',
    //             delay: 250,
    //             data: function (params) {
    //                 return {
    //                     q: params.term
    //                 };
    //             },
    //             processResults: function (data) {
    //                 return {
    //                     results: $.map(data, function (item) {
    //                         return {
    //                             text: item.product_id,
    //                             id: item.product_name
    //                         };
    //                     })
    //                 };
    //             },
    //             cache: true
    //         },
    //         minimumInputLength: 2,
    //         theme: 'classic',
    //         width: '100%',
    //     });



    //     $('.select-seller-buyer').select2({
    //         ajax: {
    //             url: '{{ route('select2.seller-buyer') }}',
    //             dataType: 'json',
    //             delay: 250,
    //             data: function (params) {
    //                 return {
    //                     q: params.term
    //                 };
    //             },
    //             processResults: function (data) {
    //                 return {
    //                     results: $.map(data.returnData, function (item) {
    //                         return {
    //                             if(data.ref == 'S') {
    //                     alert(data.ref)
    //                     text: item.buyer_name + data.ref,
    //                         id: item.buyer_id + data.ref
    //                 }
    //                            else if(data.ref == 'B') {
    //         alert(data.ref)

    //         text: item.seller_name + data.ref,
    //             id: item.seller_id + data.ref
    //     }
    // };
    //                     })
    //                 };
    //             },
    // cache: true
    //         },
    // minimumInputLength: 2,
    //     theme: 'classic',
    //         width: '100%',
    //     });


    //     //     $('.select-account').select2({
    //     //         ajax: {
    //     //             url: 'https://api.example.com/data',  // Replace with your data URL
    //     //             dataType: 'json',
    //     //             delay: 250,  // Delay in milliseconds to reduce the number of requests
    //     //             data: function (params) {
    //     //                 return {
    //     //                     q: params.term,
    //     //                     page: params.page  // Pagination parameter
    //     //                 };
    //     //             },
    //     //             processResults: function (data, params) {
    //     //                 // Parse the results into the format expected by Select2
    //     //                 params.page = params.page || 1;

    //     //                 return {
    //     //                     results: data.items,  // Array of results
    //     //                     pagination: {
    //     //                         more: data.pagination.more  // Whether there are more results available
    //     //                     }
    //     //                 };
    //     //             },
    //     //             cache: true
    //     //         },
    //     //         placeholder: 'Search for an item',
    //     //         minimumInputLength: 1,  // Minimum number of characters required to trigger the search
    //     //     });
    //     // });

    // })
</script>

<script>
    $(document).change(function() {
        count();
        count2();
        per_unit();
        discount();
        discount2();
        total_amount();
        qty();
        per_unit2();
    })


    function seller123() {

        $(document).ready(function() {

            var selectedOption = $("#seller").find('option:selected');
            var debit = $('#debit');
            var credit = $('#credit');
            var id = selectedOption.val()
            $.ajax({
                url: '/get-previous-balance', // Replace with your Laravel route or endpoint
                method: 'GET',
                dataType: 'json',
                data: {
                    'id': id // Replace with the appropriate data you want to send
                },
                success: function(data) {
                    if (data >= 0) {
                        debit.val(data)
                    }
                },
                error: function(error) {
                    // Handle the error here, if necessary
                    console.error('Error:', error);
                },
            });
            count();
            count2();
            per_unit();
            discount();
            discount2();
            total_amount();
            qty();
            per_unit2();
        })

    }


    function handleKeyPress(event) {
        if (event.key === "Enter") {
            event.preventclassic(); // Prevent the classic behavior (e.g., form submission)
            const currentElement = event.target;
            const focusableElements = getFocusableElements();
            const currentIndex = focusableElements.indexOf(currentElement);
            const nextIndex = (currentIndex + 1) % focusableElements.length;
            focusableElements[nextIndex].focus();
        }
    }




    var counter = 1
    var countera = 0


    function addInvoice(one) {

        for (let i = 1; i <= counter; i++) {


            var clonedFields = `
            <div class="dup_invoice" onchange="addInvoice2(` + counter + `)">
        <div class="div  items">
                    <select name="item[]" id="item"  style="height: 28px" onchange="addInvoice2(` + counter +
                `)"  class=' clone_item ` + counter +
                ` '>
                   <option value="000">Chickens</option>
<option value="111">Chicks</option>
<option value="222">Feed</option>
                    </select>
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="text"style="text-align:center !important;"    id="rate_type` +
                counter + `" name="rate_type[]" />
                    <input onkeydown="handleKeyPress(event)" style="display: none "  id="previous_stock` + counter + `" name="previous_stock[]" />
                    <input onkeydown="handleKeyPress(event)" style="display: none "  id="avail_stock2` + counter +
                `" name="avail_stock[]" />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="text" id="vehicle_no" name="vehicle_no[]" />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="date" id="crate_type" name="crate_type[]" />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="crate_qty` +
                counter +
                `" name="crate_qty[]" required onchange='count2();  total_amount();'/>
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="hen_qty` +
                counter +
                `" name="hen_qty[]" onchange='qty(); per_unit();' />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="gross_weight" name="gross_weight[]" />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="actual_rate` +
                counter +
                `" name="actual_rate[]" onchange='discount2();  total_amount();'  />
                </div>

                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any"  value="0.00" id="feed_cut` +
                counter +
                `"name="feed_cut[]" onchange='discount();  total_amount();' />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="mor_cut` +
                counter +
                `" name="mor_cut[]" />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' onchange='count();  total_amount();' id="crate_cut` +
                counter + `" name="crate_cut[]"/>
                </div>


   <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;" step="any" value="0.00" onchange='count()' id="n_weight` + counter + `"
                         name="n_weight[]" />
                </div>
                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;" step="any" value="0.00" onchange='count()' id="rate_diff` +
                counter + `"
                         name="rate_diff[]" />
                </div>
                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;" step="any" value="0.00" onchange='count()' id="rate` + counter + `"
                         name="rate[]" />
                </div>
                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;" step="any" value="0.00" onchange='count()' id="amount` + counter + `"
                         name="amount[]" />
                </div>
                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;" step="any" value="0.00" id="pur_feed_cut` + counter + `"
                        name="pur_feed_cut[]" onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;" step="any" value="0.00" id="pur_mor_cut` + counter + `"
                        name="pur_mor_cut[]" />
                </div>

                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;" step="any" value="0.00" onchange='count()'
                        id="pur_crate_cut` + counter + `"  name="pur_crate_cut[]" />
                </div>



                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;" step="any" value="0.00" onchange='count()'
                        id="pur_n_weight` + counter + `"  name="pur_n_weight[]" />
                </div>
                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;" step="any" value="0.00" onchange='count()'
                        id="pur_rate_diff` + counter + `"  name="pur_rate_diff[]" />
                </div>
                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;" step="any" value="0.00" onchange='count()' id="pur_rate` + counter + `"
                         name="pur_rate[]" />
                </div>
                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;" step="any" value="0.00" onchange='count()' id="pur_amount` +
                counter + `"
                         name="pur_amount[]" />
                </div>
                
    </div>

  `;


        }


        let amount = $("amount").val()
        let narration = $("#sale_price").val()
        if (!$("amount").hasClass('check')) {



            $("amount").addClass("check")
            console.log(counter + "first");

            counter++
            countera++


            $(".invoice").append(clonedFields);

        }

        $(document).ready(function() {
            // Initialize Select2 for the desired select elements
            $('.select').select2({
                theme: 'classic',
                width: 'resolve',
            });
            $(".select2-container--open .select2-search__field").focus();

            var selectedOption = $("#item").find('option:selected');
            var unitInput = $('#unit');
            unitInput.val(selectedOption.data(
                'unit')); // Set the value of the unit input field to the data-unit value of the selected option


            var pInput = $('#pur_price');
            pInput.val(selectedOption.data('pur_price'));


            $('.avail_stock').css("display", "block")
            var stInput = $('#avail_stock');
            let s = selectedOption.data('stock');
            let t = selectedOption.data('name');
            let = st_val2 = '  ' + t + ',  ' + s;
            if (st_val2 != null) {

                console.log(st_val2);
                stInput.val(st_val2);
            }

            // var st = $('#avail_stock2');
            // st.val(selectedOption.data('stock'));
            // var pst = $('#previous_stock');
            // pst.val(selectedOption.data('stock'));

            $('#p-img').css("display", "block")
            var imgInput = $('#p-img');
            var imgSrc = selectedOption.data('img');
            imgInput.attr('src', imgSrc);

            $(".p-img").attr('href', imgSrc)
            // Initialize other select elements if necessary
        });
    }






    function addInvoice2(one) {

        for (let i = 1; i <= counter; i++) {


            var clonedFields = `
    <div class="dup_invoice" onchange="addInvoice2(` + counter + `)">
<div class="div  items">
            <select name="item[]" id="item"  style="height: 28px" onchange="addInvoice2(` + counter +
                `)"  class='clone_item` + counter +
                ` '>
         <option value="000">Chickens</option>
<option value="111">Chicks</option>
<option value="222">Feed</option>
            </select>
        </div>

        <div class="div">
            <input  onkeydown="handleKeyPress(event)"  type="text"style="text-align:center !important;"    id="rate_type` +
                counter + `" name="rate_type[]" />
            <input onkeydown="handleKeyPress(event)" style="display: none "  id="previous_stock` + counter + `" name="previous_stock[]" />
            <input onkeydown="handleKeyPress(event)" style="display: none "  id="avail_stock2` + counter +
                `" name="avail_stock[]" />
        </div>

        <div class="div">
            <input  onkeydown="handleKeyPress(event)"  type="text" id="vehicle_no" name="vehicle_no[]" />
        </div>

        <div class="div">
            <input  onkeydown="handleKeyPress(event)"  type="date" id="crate_type" name="crate_type[]" />
        </div>

        <div class="div">
            <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="crate_qty` +
                counter +
                `" name="crate_qty[]" required onchange='count2();  total_amount();'/>
        </div>

        <div class="div">
            <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="hen_qty` +
                counter +
                `" name="hen_qty[]" onchange='qty(); per_unit();' />
        </div>

        <div class="div">
            <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="gross_weight" name="gross_weight[]" />
        </div>

        <div class="div">
            <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="actual_rate` +
                counter +
                `" name="actual_rate[]" onchange='discount2();  total_amount();'  />
        </div>

        <div class="div">
            <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any"  value="0.00" id="feed_cut` +
                counter +
                `"name="feed_cut[]" onchange='discount();  total_amount();' />
        </div>

        <div class="div">
            <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="mor_cut` +
                counter +
                `" name="mor_cut[]" />
        </div>

        <div class="div">
            <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' onchange='count();  total_amount();' id="crate_cut` +
                counter + `" name="crate_cut[]"/>
        </div>
</div>

`;


        }


        counter = counter - 1
        let amount2 = $("amount" + counter).val()
        console.log('counter' + counter);
        let narration2 = $("#sale_price" + counter).val()
        if (!$("amount" + counter).hasClass('check')) {


            if (narration2 > 0) {

                $("amount" + countera).addClass("check")

                console.log(counter);
                console.log(countera);

                counter++
                countera++


                $(".invoice").append(clonedFields);

            }
        }
        var one = one
        counter = counter + 1

        $(document).ready(function() {
            // Initialize Select2 for the desired select elements
            $('.select').select2({
                theme: 'classic',

                width: 'resolve',
            });

            var selectedOption = $("#item").find('option:selected');
            var unitInput = $('#unit');
            unitInput.val(selectedOption.data(
                'unit')); // Set the value of the unit input field to the data-unit value of the selected option


            var pInput = $('#pur_price');
            pInput.val(selectedOption.data('pur_price'));




            var st = $('#avail_stock2');
            st.val(selectedOption.data('stock'));
            var pst = $('#previous_stock');
            pst.val(selectedOption.data('stock'));

            $('#p-img').css("display", "block")
            var imgInput = $('#p-img');
            var imgSrc = selectedOption.data('img');
            imgInput.attr('src', imgSrc);

            $(".p-img").attr('href', imgSrc)
            // Initialize other select elements if necessary


            var stInput = $('#avail_stock');
            var select = $(".clone_item" + one).find('option:selected');

            let s = select.data('stock');
            let t = select.data('name');
            var st_val2 = '  ' + t + ',  ' + s;
            if (st_val2 != null) {

                console.log(st_val2);
                stInput.val(st_val2);
            }


            for (let index = 1; index <= countera; index++) {

                var selectedOption2 = $(".clone_item" + index).find('option:selected');
                var unitInput = $('#unit' + index);
                unitInput.val(selectedOption2.data(
                    'unit'
                )); // Set the value of the unit input field to the data-unit value of the selected option
                var pInput = $('#pur_price' + index);
                pInput.val(selectedOption2.data(
                    'pur_price'
                )); // Set the value of the unit input field to the data-unit value of the selected option

                imgSrc = selectedOption2.data('img');
                imgInput.attr('src', imgSrc);
                $(".p-img").attr('href', imgSrc)

            }
        });

    }












    function per_unit() {

        let amount = $("#sale_qty").val();

        let sale = $("#sale_price").val();

        $("#exp_unit-notWorking").val(sale / amount);
    }


    function per_unit2() {
        for (let i = 1; i <= countera; i++) {

            let amount = $("#sale_qty" + i).val();

            let sale = $("#sale_price" + i).val();

            $("#exp_unit-notWorking" + i).val(sale / amount);
        }
    }






    function count() {

        let amount = $("#sale_price").val();
        let qty = $("#sale_qty").val()
        $("amount").val(amount * qty);




        let amount1 = parseFloat($("#dis_per").val());
        let amount2 = parseFloat($("#sale_price").val());


        let discountPercentage = amount1;
        let amount3 = amount2 - (amount2 * discountPercentage / 100);

        $("amount").val(amount3);
    }



    function count2() {

        for (let i = 1; i <= countera; i++) {



            let amount = parseFloat($("#sale_price" + i).val() * $("#sale_qty" + i).val());
            let qty = $("#sale_qty" + i).val()

            $("amount" + i).val(amount * $("#sale_qty" + i).val());


        }
    }






    function discount() {
        let amount1 = parseFloat($("#dis_per").val());
        let amount2 = parseFloat($("#sale_price").val());
        let qty = parseFloat($("#sale_qty").val())

        amount2 = amount2 * qty

        let discountPercentage = amount1;
        let amount = amount2 - (amount2 * discountPercentage / 100);


        $("#dis_amount").val(amount2 - amount);
        $("amount").val(amount);





        var total = parseInt($("#dis_amount").val())

        for (let i = 1; i <= countera; i++) {
            let amount1 = parseInt($("#dis_per" + i).val());
            total += amount1;
        }

        $("#dis_total").val(total);

    }



    function discount2() {

        for (let i = 1; i <= countera; i++) {



            let amount1 = parseFloat($("#dis_per" + i).val());
            let amount2 = parseFloat($("#sale_price" + i).val());

            let discountPercentage = amount1;
            let amount = amount2 - (amount2 * discountPercentage / 100);

            let total = amount2 - amount
            $("#dis_amount" + i).val($("#sale_qty" + i).val() * (amount2 - amount));
            $("amount" + i).val(amount * $("#sale_qty" + i).val());

            console.log(amount2 - amount + '   ' + i);

        }

        var total = parseInt($("#dis_amount").val())

        for (let i = 1; i <= countera; i++) {
            let amount1 = parseInt($("#dis_amount" + i).val());
            total += amount1;
        }

        $("#dis_total").val(total);


    }






    function total_amount() {

        var atotal = parseFloat($("amount").val());

        for (let i = 1; i <= countera; i++) {
            let amount1 = parseFloat($("amount" + i).val());
            atotal += amount1;
        }

        $("amount_total").val(atotal);

        let p = parseFloat($("#debit").val())
        let c = parseFloat($("#cartage").val())
        $("#grand_total").val(p + atotal + c);

        let g = $("#grand_total").val()


        let credit = parseFloat($("#credit").val())
        $("#balance_amount").val(parseFloat(g - credit));

    }

    $("#cartage").change(function() {

        $(document).ready(function() {


            var atotal = parseFloat($("amount").val());

            for (let i = 1; i <= countera; i++) {
                let amount1 = parseFloat($("amount" + i).val());
                atotal += amount1;
            }

            $("amount_total").val(atotal);

            let p = parseFloat($("#debit").val())
            let credit = parseFloat($("#credit").val())

            let c = parseFloat($("#cartage").val())

            $("#grand_total").val(parseFloat(p + atotal + c));

            let g = $("#grand_total").val()

            $("#balance_amount").val(parseFloat(g - credit));

        })

    })



    $(document).ready(function() {

        $('.item').change(function() {
            // Set the value of the unit input field to the data-unit value of the selected option

        });
        $('.clone_item').change(function() {

            for (let index = 1; index <= countera; index++) {
                var selectedOption = $(".clone_item" + index).find('option:selected');


                var unitInput = $('#unit' + index);
                unitInput.val(selectedOption.data(
                    'unit'
                )); // Set the value of the unit input field to the data-unit value of the selected option


                var pInput = $('#pur_price' + index);
                pInput.val(selectedOption.data(
                    'pur_price'
                )); // Set the value of the unit input field to the data-unit value of the selected option

            }
        })
    });





    function qty() {
        var total = parseInt($("#sale_qty").val())

        var sale = parseInt($("#sale_price").val())


        for (let i = 1; i <= countera; i++) {
            let amount1 = parseInt($("#sale_qty" + i).val());

            total += amount1;

        }


        $("#qty_total").val(total);
    }

    $("input").on('input', function() {
        total_calc();
    });

    function total_calc() {
        // GENERAL
        let actual_rate = +$("#actual_rate").val();
        let rate_diff = +$("#rate_diff").val();
        let rate = actual_rate - rate_diff;

        let pur_rate_diff = +$("#pur_rate_diff").val();
        let pur_rate = actual_rate - pur_rate_diff;

        let feed_cut = +$("#feed_cut").val();
        let mor_cut = +$("#mor_cut").val();
        let crate_cut = +$("#crate_cut").val();
        let gross_weight = +$("#gross_weight").val();
        let total_cut = feed_cut + mor_cut + crate_cut;
        let n_weight = gross_weight - total_cut;

        let pur_feed_cut = +$("#pur_feed_cut").val();
        let pur_mor_cut = +$("#pur_mor_cut").val();
        let pur_crate_cut = +$("#pur_crate_cut").val();
        let pur_total_cut = pur_feed_cut + pur_mor_cut + pur_crate_cut;
        let pur_n_weight = gross_weight - pur_total_cut;

        let hen_qty = +$("#hen_qty").val();
        let avg = gross_weight / hen_qty;

        let amount = n_weight * rate;
        let pur_amount = pur_n_weight * pur_rate;
        
        $("#rate").val(rate);
        $("#pur_rate").val(pur_rate);
        $("#n_weight").val(n_weight);
        $("#pur_n_weight").val(pur_n_weight);
        $("#avg").val(avg);
        $("#amount").val(amount);
        $("#pur_amount").val(pur_amount);

        // TOTAL


    }
</script>
