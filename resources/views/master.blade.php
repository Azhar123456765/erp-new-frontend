@php

    $org = App\Models\Organization::all();
    foreach ($org as $key => $value) {
        $organization = $value->organization_name;
        $logo = $value->logo;
    }

@endphp
@include('inc.style')

<head>
    <title>
        @yield('title')
    </title>
</head>

<body
    class="{{ request()->is('finance*') ? 'sidebar-collapse' : '' }}  {{ request()->is('farm*', 's_med_invoice*', 'expense-voucher*', 'es_med_invoice*', 'p_med_invoice*', 'ep_med_invoice*', 'rp_med_invoice*', 'rs_med_invoice*', 'arp_med_invoice*', 'ars_med_invoice*', 'r_voucher*', 'er_voucher_id=*', 'payment-voucher*', 'edit-payment-voucher*') ? 'sidebar-collapse' : '' }}  layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset($logo) }}" alt="AdminLTELogo" height="60" width="60"
                style="border-radius: 50%;" />
        </div>

        @include('inc.navbar')
        @include('inc.sidebar')
        <div class="content-wrapper" style="min-height: 110vh !important;">
            @yield('content')
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block"><b>Version</b>&nbsp;0.1</div>
            <strong>Copyright &copy; 2023-2023
                <a href="https://www.psofts.online" class="text-success">Psoft</a>.</strong>
            All rights reserved.
            <aside class="control-sidebar control-sidebar-dark"></aside>
        </footer>
    </div>
    @include('inc.modals')
    @include('inc.script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.select-farm').select2({
            ajax: {
                url: '{{ route('select2.farm') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            };
                        })
                    };
                },
                cache: true
            },
            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
            allowClear: true,
            placeholder: '',
        });
        $('.select-farming-period').select2({
            ajax: {
                url: '{{ route('select2.farming_period') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.start_date + ' - ' + item.end_date,
                                id: item.id
                            };
                        })
                    };
                },
                cache: true
            },
            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
            allowClear: true,
            placeholder: '',
        });
        $('.select-head-account').select2({
            ajax: {
                url: '{{ route('select2.head_account') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });
        $('.select-account').select2({
            ajax: {
                url: '{{ route('select2.account') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.account_name,
                                id: item.id
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });
        $('.select-assets-account').select2({
            ajax: {
                url: '{{ route('select2.assets_account') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.account_name,
                                id: item.id
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });
        $('.select-liability-account').select2({
            ajax: {
                url: '{{ route('select2.liability_account') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.account_name,
                                id: item.id
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });
        $('.select-expense-account').select2({
            ajax: {
                url: '{{ route('select2.expense_account') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.account_name,
                                id: item.id
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });
        $('.select-warehouse').select2({
            ajax: {
                url: '{{ route('select2.warehouse') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.warehouse_name,
                                id: item.warehouse_id
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });

        $('.select-sales_officer').select2({
            ajax: {
                url: '{{ route('select2.sales_officer') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.sales_officer_name,
                                id: item.sales_officer_id
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });
        $('.select-product_category').select2({
            ajax: {
                url: '{{ route('select2.product_category') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.category_name,
                                id: item.product_category_id
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });

        $('.select-product_company').select2({
            ajax: {
                url: '{{ route('select2.product_company') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.company_name,
                                id: item.product_company_id
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });


        $('.select-buyer').select2({
            ajax: {
                url: '{{ route('select2.buyer') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.company_name,
                                id: item.buyer_id
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });


        $('.select-seller').select2({
            ajax: {
                url: '{{ route('select2.seller') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.company_name,
                                id: item.seller_id
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });


        $('.select-products').select2({
            ajax: {
                url: '{{ route('select2.products') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.product_name,
                                id: item.product_id,
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%'
        });

        $('.select-fin-products').select2({
            ajax: {
                url: '{{ route('select2.products') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.product_name,
                                id: item.product_id,
                                data_unit: item.unit,
                                data_stock: item.opening_quantity,
                                data_img: item.image,
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });

        $('.select-fin-products').on('select2:select', function(e) {
            let selectedItem = e.params.data;
            let selectedOption = $(this).find('option:selected');
            selectedOption.attr('data-unit', selectedItem.data_unit);
            selectedOption.attr('data-stock', selectedItem.data_stock);
            selectedOption.attr('data-img', selectedItem.data_img);
        });


        $('.select-seller-buyer').select2({
            ajax: {
                url: '{{ route('select2.seller-buyer') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            let ref = '';
                            if (item.comp_ref === "S") {
                                ref = " (SELLER)";
                            } else if (item.comp_ref === "B") {
                                ref = " (BUYER)";
                            }
                            return {
                                text: item.company_name + ref,
                                id: item.id + item.comp_ref
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });
        $('.select-seller-buyer-sec').select2({
            ajax: {
                url: '{{ route('select2.seller-buyer') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            let ref = '';
                            if (item.comp_ref === "S") {
                                ref = " (SELLER)";
                            } else if (item.comp_ref === "B") {
                                ref = " (BUYER)";
                            }
                            return {
                                text: item.company_name + ref,
                                id: item.id + item.comp_ref
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });


        $('.select-buyer-invoice-no').select2({
            ajax: {
                url: '{{ route('select2.buyer_invoice_no') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term,
                        id: $("#company").find('option:selected').val(),
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.unique_id_name,
                                id: item.unique_id_name
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });


        $('.select-seller-invoice-no').select2({
            ajax: {
                url: '{{ route('select2.seller_invoice_no') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term,
                        id: $("#company").find('option:selected').val(),
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.unique_id_name,
                                id: item.unique_id_name
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });
        $('.select-all-invoice-no').select2({
            ajax: {
                url: '{{ route('select2.all_invoice_no') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term,
                        id: $("#company").find('option:selected').val(),
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.unique_id_name,
                                id: item.unique_id_name
                            };
                        })
                    };
                },
                cache: true
            },

            theme: 'classic',
            width: '100%',
            allowClear: true,
            placeholder: '',
        });

        $("#company").on('change', function() {
            let invoice = $(".invoice_no").val('');
            let invoiceText = $(".invoice_no").text('');
        })
        // function companyInvoiceBuyer() {
        //     var company = $("#company").find('option:selected');
        //     var id = company.val()
        // $("#company").on('change', function() {

        //     let invoice = $("#invoice_no").val('');
        //     let invoiceText = $("#invoice_no").text('');

        //     let invoice2 = $("#invoice_no2").val('');
        //     let invoiceText2 = $("#invoice_no2").text('');
        // })
        //     $('.select-invoice-no').select2({
        //         ajax: {
        //             url: '{{ route('select2.buyer_invoice_no') }}',
        //             dataType: 'json',
        //             delay: 250,
        //             data: function(params) {
        //                 return {
        //                     q: params.term,
        //                     id: $("#company").find('option:selected').val(),
        //                 };
        //             },
        //             processResults: function(data) {
        //                 return {
        //                     results: $.map(data, function(item) {
        //                         return {
        //                             text: item.unique_id_name,
        //                             id: item.unique_id_name
        //                         };
        //                     })
        //                 };
        //             },
        //             cache: true
        //         },

        //         theme: 'classic',
        //         width: '100%',
        //         allowClear: true,
        //         placeholder: '',
        //     });
        // }

        // function companyInvoiceSeller() {
        //     var company = $("#company").find('option:selected');
        //     var id = company.val()
        //     $("#company").on('change', function() {

        //         let invoice = $("#invoice_no").val('');
        //         let invoiceText = $("#invoice_no").text('');

        //         let invoice2 = $("#invoice_no2").val('');
        //         let invoiceText2 = $("#invoice_no2").text('');
        //     })
        //     $('.select-invoice-no').select2({
        //         ajax: {
        //             url: '{{ route('select2.seller_invoice_no') }}',
        //             dataType: 'json',
        //             delay: 250,
        //             data: function(params) {
        //                 return {
        //                     q: params.term,
        //                     id: $("#company").find('option:selected').val(),
        //                 };
        //             },
        //             processResults: function(data) {
        //                 return {
        //                     results: $.map(data, function(item) {
        //                         return {
        //                             text: item.unique_id_name,
        //                             id: item.unique_id_name
        //                         };
        //                     })
        //                 };
        //             },
        //             cache: true
        //         },

        //         theme: 'classic',
        //         width: '100%',
        //         allowClear: true,
        //         placeholder: '',
        //     });
    </script>
</body>
