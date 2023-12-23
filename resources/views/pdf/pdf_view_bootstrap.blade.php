<!DOCTYPE html>
<html>

<head>
    <title>PDF View</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        .back-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 12px;
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .back-button:hover {
            background-color: #45a049;
        }

        .print-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 12px;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .print-button:hover {
            background-color: #45a049;
        }

        iframe {
            width: 100%;
            height: calc(100% - 10px);
            /* Adjust the height to accommodate the back button */
        }
    </style>
</head>

<body>
    <!-- Add a styled back button to redirect to the previous page -->
    <a href="javascript:history.back()" class="back-button">Go Back</a>

    <!-- Embed the PDF content in an iframe or any suitable element -->
    <iframe srcdoc="{{ $pdf }}" id="pdfFrame" frameborder="0"></iframe>

    <button onclick="printIframe()" class="print-button">Print PDF</button>

    <script>
        function printIframe() {
            var iframe = document.getElementById('pdfFrame');
            var iframeWindow = iframe.contentWindow || iframe.contentDocument;
            iframeWindow.print();
        }
    </script>
</body>

</html>