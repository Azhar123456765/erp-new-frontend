<!DOCTYPE html>
<html>
<head>
    <title>PDF View</title>
    <style>
        /* Add CSS for page breaks */
        .page-break {
            page-break-after: always;
        }

        /* Add styles for pagination */
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="pagination">Page 1</div> <!-- First page -->

    <!-- Embed the PDF content in an iframe or any suitable element -->
    <iframe src="data:application/pdf;base64,{{ base64_encode($pdf) }}" height="600px" width="100%"></iframe>

    <div class="pagination">Page 2</div> <!-- Second page -->

    <!-- Add a styled back button to redirect to the previous page -->
    <a href="javascript:history.back()" class="back-button">Back</a>
</body>
</html>
