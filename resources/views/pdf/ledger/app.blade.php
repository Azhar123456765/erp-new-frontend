<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css'>
    <link rel="stylesheet" href="./style.css">

    <style>
        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 200mm;
                height: 297mm;
                margin: 10px
            }

            /* ... the rest of the rules ... */
        }

        body {
            background: #EEE;
            /* font-size:0.9em !important; */
        }

        .bigfont {
            font-size: 3rem !important;
        }

        .invoice {
            width: 970px !important;
            margin: 50px auto;
        }

        .logo {
            float: left;
            padding-right: 10px;
            margin: 10px auto;
        }

        dt {
            float: left;
        }

        dd {
            float: left;
            clear: right;
        }

        .customercard {
            min-width: 98.5%;
        }

        .itemscard {
            min-width: 98.5%;
            margin-left: 0.5%;
        }

        .logo {
            max-width: 5rem;
            margin-top: -0.25rem;
        }

        .invDetails {
            margin-top: 0rem;
        }

        .pageTitle {
            margin-bottom: -1rem;
        }

        /* CUSTOME */
        th {
            background: #e2e2e2 !important;
        }

        .full-width tr th {
            font-weight: 1000 !important;
        }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container invoice">

        @yield('pdf_content')

        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
</body>

</html>
