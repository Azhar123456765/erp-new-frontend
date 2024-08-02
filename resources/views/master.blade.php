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
    class="{{ request()->is('farm*','s_med_invoice*', 'es_med_invoice*', 'p_med_invoice*', 'ep_med_invoice*', 'rp_med_invoice*', 'rs_med_invoice*', 'arp_med_invoice*', 'ars_med_invoice*', 'r_voucher*', 'er_voucher_id=*', 'p_voucher*', 'ep_voucher_id=*') ? 'sidebar-collapse' : 'sidebar-mini' }}  layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ $logo }}" alt="AdminLTELogo" height="60" width="60"
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
                                id: item.account_id
                            };
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 2,
            theme: 'classic',
            width: '100%',
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
            minimumInputLength: 2,
            theme: 'classic',
            width: '100%',
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
            minimumInputLength: 2,
            theme: 'classic',
            width: '100%',
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
            minimumInputLength: 2,
            theme: 'classic',
            width: '100%',
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
            minimumInputLength: 2,
            theme: 'classic',
            width: '100%',
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
            minimumInputLength: 2,
            theme: 'classic',
            width: '100%',
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
            minimumInputLength: 2,
            theme: 'classic',
            width: '100%',
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
            minimumInputLength: 2,
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
            minimumInputLength: 2,
            theme: 'classic',
            width: '100%'
        });

        $('.select-fin-products').on('select2:select', function(e) {
            let selectedItem = e.params.data;
            let selectedOption = $(this).find('option:selected');
            selectedOption.attr('data-unit', selectedItem.data_unit);
            selectedOption.attr('data-stock', selectedItem.data_stock);
            selectedOption.attr('data-img', selectedItem.data_img);
        });


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
        //     cache: true
        //         },
        //     minimumInputLength: 2,
        //         theme: 'classic',
        //             width: '100%',
        //     });
    </script>
</body>
