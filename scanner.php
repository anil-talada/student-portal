<!DOCTYPE html>
<html>

<head>

    <title>QR Scanner</title>

    <script src="https://unpkg.com/html5-qrcode"></script>

    <style>
        body {
            font-family: Arial;
            background: #111;
            color: white;
            text-align: center;
            padding: 30px;
        }

        #reader {
            width: 350px;
            margin: auto;
        }

        #result {

            margin-top: 30px;

            padding: 20px;

            border-radius: 15px;

            font-size: 24px;

            font-weight: bold;
        }

        .success {
            background: green;
        }

        .used {
            background: orange;
        }

        .invalid {
            background: red;
        }
    </style>

</head>

<body>

    <h1>Event Check-In Scanner</h1>

    <div id="reader"></div>

    <div id="result"></div>

    <script>
        let scanned = false;

        function onScanSuccess(decodedText) {

            if (scanned) {
                return;
            }

            scanned = true;

            html5QrCode.clear();

            fetch('verify-ticket.php', {

                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },

                    body: 'ticket=' + decodedText

                })

                .then(response => response.json())

                .then(data => {

                    const resultDiv = document.getElementById('result');

                    resultDiv.innerHTML = data.message;

                    resultDiv.className = data.status;

                    if (navigator.vibrate) {
                        navigator.vibrate(200);
                    }

                    setTimeout(() => {

                        scanned = false;

                        resultDiv.innerHTML = "";

                        html5QrCode.render(onScanSuccess);

                    }, 3000);

                });

        }

        const html5QrCode = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            }
        );

        html5QrCode.render(onScanSuccess);
    </script>

</body>

</html>