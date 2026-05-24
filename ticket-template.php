<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .ticket-container {

            width: 900px;
            height: 350px;

            border: 8px solid #ff4d4d;

            border-radius: 25px;

            overflow: hidden;

            position: relative;
        }

        .left-section {

            width: 68%;

            padding: 35px;

            float: left;
        }

        .right-section {

            width: 32%;

            float: right;

            text-align: center;

            border-left: 3px dashed #999;

            height: 100%;

            padding-top: 30px;
        }

        .event-title {

            font-size: 34px;

            font-weight: bold;

            margin-bottom: 10px;
        }

        .event-subtitle {

            color: #666;

            margin-bottom: 30px;
        }

        .event-details {

            font-size: 22px;

            margin-bottom: 25px;
        }

        .info {

            margin-top: 20px;

            font-size: 20px;

            line-height: 1.8;
        }

        .ticket-id {

            margin-top: 20px;

            font-size: 18px;

            font-weight: bold;
        }

        .qr-image {

            width: 180px;

            height: 180px;

            margin-top: 20px;
        }

        .footer {

            position: absolute;

            bottom: 20px;

            left: 30px;

            font-size: 12px;

            color: #777;
        }
    </style>
</head>

<body>

    <div class="ticket-container">

        <div class="left-section">

            <div class="event-title">
                ABSA TECH FEST 2026
            </div>

            <div class="event-subtitle">
                Innovation • Technology • Leadership
            </div>

            <div class="event-details">
                15 June 2026 | 10:00 AM
            </div>

            <div class="info">

                <strong>Name:</strong>
                <?php echo $first_name . " " . $last_name; ?>

                <br>

                <strong>Ticket Type:</strong>
                <?php echo $ticket_type; ?>

                <br>

                <strong>Venue:</strong>
                ABC Auditorium

            </div>

            <div class="ticket-id">

                Ticket ID:
                <?php echo $ticket_id; ?>

            </div>

        </div>

        <div class="right-section">

            <h3>ENTRY PASS</h3>

            <img class="qr-image" src="<?php echo $qrBase64; ?>">
        </div>

        <div class="footer">

            This ticket is non-transferable. Please carry valid ID card.

        </div>

    </div>

</body>

</html>