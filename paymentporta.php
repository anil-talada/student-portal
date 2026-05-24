<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Event Registration</title>

  <!-- REMIX ICON -->
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet" />

  <!-- GOOGLE FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Poppins", sans-serif;

      background:
        radial-gradient(circle at top left,
          rgba(255, 0, 0, 0.05),
          transparent 30%),
        radial-gradient(circle at bottom right,
          rgba(255, 0, 0, 0.05),
          transparent 30%),
        #050505;

      color: #fff;

      overflow-x: hidden;
    }

    /* ===================================================
           SECTION
        =================================================== */

    .registration-section {
      width: 100%;
      padding: 100px 7%;
    }

    .registration-container {
      max-width: 1200px;
      margin: auto;
    }

    /* ===================================================
           HEADER
        =================================================== */

    .section-header {
      text-align: center;
      margin-bottom: 60px;
    }

    .section-header span {
      color: #ff335f;

      font-size: 14px;

      letter-spacing: 2px;

      font-weight: 600;

      text-transform: uppercase;
    }

    .section-header h1 {
      font-size: 58px;
      margin-top: 18px;
      margin-bottom: 20px;
    }

    .section-header p {
      color: #bdbdbd;

      max-width: 750px;

      margin: auto;

      line-height: 1.9;

      font-size: 16px;
    }

    /* ===================================================
           TICKET CARDS
        =================================================== */

    .ticket-wrapper {
      display: flex;
      flex-direction: column;
      gap: 25px;

      margin-bottom: 55px;
    }

    .ticket-card {
      width: 100%;

      background: #1a1a1a;

      border: 1px solid rgba(255, 255, 255, 0.08);

      border-radius: 24px;

      padding: 35px;

      display: flex;
      align-items: center;
      justify-content: space-between;

      gap: 30px;

      cursor: pointer;

      transition: 0.4s ease;
    }

    .ticket-card:hover {
      transform: translateY(-5px);

      border-color: #ff335f;
    }

    .ticket-card.active {
      border: 2px solid #ff335f;

      background: linear-gradient(135deg,
          rgba(255, 51, 95, 0.1),
          rgba(255, 51, 95, 0.03));

      box-shadow: 0 0 30px rgba(255, 51, 95, 0.15);
    }

    .ticket-left h2 {
      font-size: 34px;
      margin-bottom: 10px;
    }

    .ticket-left p {
      color: #c4c4c4;
      margin-bottom: 20px;
      line-height: 1.7;
    }

    .ticket-features {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
    }

    .ticket-features span {
      background: rgba(255, 51, 95, 0.1);

      border: 1px solid rgba(255, 51, 95, 0.12);

      padding: 10px 15px;

      border-radius: 10px;

      color: #ddd;

      font-size: 14px;
    }

    .ticket-price {
      color: #ff335f;

      font-size: 52px;

      font-weight: 700;

      white-space: nowrap;
    }

    /* ===================================================
           FORM
        =================================================== */

    .registration-form {
      margin-top: 20px;
    }

    .form-grid {
      display: grid;

      grid-template-columns: repeat(2, 1fr);

      gap: 28px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group label {
      margin-bottom: 12px;

      font-size: 15px;

      font-weight: 500;
    }

    input,
    textarea,
    select {
      -webkit-appearance: none;
      appearance: none;
    }

    .form-control {
      width: 100%;

      min-height: 62px;

      background: #1d1d1d;

      border: 1px solid rgba(255, 255, 255, 0.08);

      border-radius: 16px;

      padding: 18px;

      color: #fff;

      font-size: 16px;

      outline: none;

      transition: 0.3s ease;
    }

    .form-control:focus {
      border-color: #ff335f;

      box-shadow: 0 0 15px rgba(255, 51, 95, 0.12);
    }

    textarea.form-control {
      min-height: 150px;

      resize: none;

      padding-top: 18px;
    }

    .full-width {
      grid-column: 1 / -1;
    }

    /* ===================================================
           ORDER SUMMARY
        =================================================== */

    .summary-box {
      margin-top: 50px;

      background: linear-gradient(135deg,
          rgba(255, 51, 95, 0.08),
          rgba(255, 51, 95, 0.03));

      border: 1px solid rgba(255, 51, 95, 0.2);

      border-radius: 24px;

      padding: 35px;
    }

    .summary-box h2 {
      font-size: 32px;
      margin-bottom: 30px;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;

      margin-bottom: 18px;

      color: #ddd;

      font-size: 16px;
    }

    .summary-divider {
      height: 1px;

      background: rgba(255, 255, 255, 0.1);

      margin: 28px 0;
    }

    .total-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .total-row h3 {
      font-size: 28px;
    }

    .total-price {
      color: #ff335f;

      font-size: 40px;

      font-weight: 700;
    }

    .summary-note {
      margin-top: 20px;

      color: #aaa;

      text-align: center;

      font-size: 14px;
    }

    /* ===================================================
           CHECKBOX
        =================================================== */

    .checkbox-group {
      margin-top: 35px;

      display: flex;
      flex-direction: column;

      gap: 20px;
    }

    .checkbox-item {
      display: flex;
      align-items: flex-start;

      gap: 12px;

      line-height: 1.8;

      color: #ddd;
    }

    .checkbox-item input {
      margin-top: 6px;
      accent-color: #ff335f;
    }

    .checkbox-item a {
      color: #ff335f;
      text-decoration: none;
    }

    /* ===================================================
           BUTTON
        =================================================== */

    .submit-btn {
      width: 100%;

      height: 65px;

      border: none;
      outline: none;

      margin-top: 40px;

      background: linear-gradient(135deg, #ff335f, #d61d48);

      color: #fff;

      border-radius: 16px;

      font-size: 18px;
      font-weight: 600;

      cursor: pointer;

      display: flex;
      align-items: center;
      justify-content: center;

      gap: 12px;

      transition: 0.4s ease;
    }

    .submit-btn:hover {
      transform: translateY(-4px);

      box-shadow: 0 15px 30px rgba(255, 51, 95, 0.25);
    }

    .success-message {
      max-width: 1200px;
      margin: 0 auto 30px;
      padding: 18px 24px;
      border-radius: 16px;
      background: rgba(51, 255, 153, 0.12);
      border: 1px solid rgba(51, 255, 153, 0.25);
      color: #d4ffdf;
      font-size: 16px;
      text-align: center;
    }

    /* ===================================================
           TABLET
        =================================================== */

    @media (max-width: 991px) {
      .registration-section {
        padding: 90px 5%;
      }

      .section-header h1 {
        font-size: 46px;
      }

      .ticket-card {
        flex-direction: column;
        align-items: flex-start;
      }

      .form-grid {
        grid-template-columns: 1fr;
      }

      .ticket-price {
        font-size: 42px;
      }
    }

    /* ===================================================
           MOBILE
        =================================================== */

    @media (max-width: 768px) {
      .registration-section {
        padding: 70px 5%;
      }

      .section-header {
        margin-bottom: 40px;
      }

      .section-header h1 {
        font-size: 34px;
        line-height: 1.3;
      }

      .section-header p {
        font-size: 15px;
      }

      .ticket-wrapper {
        gap: 18px;
      }

      .ticket-card {
        padding: 24px;

        border-radius: 20px;

        gap: 25px;
      }

      .ticket-left h2 {
        font-size: 24px;
      }

      .ticket-left p {
        font-size: 14px;
      }

      .ticket-features {
        gap: 10px;
      }

      .ticket-features span {
        font-size: 13px;

        padding: 9px 12px;
      }

      .ticket-price {
        font-size: 34px;
      }

      .form-grid {
        gap: 22px;
      }

      .form-group label {
        font-size: 14px;
      }

      .form-control {
        min-height: 58px;
        font-size: 16px;
      }

      textarea.form-control {
        min-height: 140px;
      }

      .summary-box {
        padding: 24px;
      }

      .summary-box h2 {
        font-size: 24px;
      }

      .summary-row {
        font-size: 15px;
      }

      .total-row h3 {
        font-size: 22px;
      }

      .total-price {
        font-size: 30px;
      }

      .checkbox-item {
        font-size: 14px;
      }

      .submit-btn {
        height: 60px;
        font-size: 16px;
      }
    }

    /* ===================================================
           SMALL MOBILE
        =================================================== */

    @media (max-width: 480px) {
      .registration-section {
        padding: 60px 4%;
      }

      .section-header h1 {
        font-size: 28px;
      }

      .ticket-card {
        padding: 18px;
      }

      .ticket-left h2 {
        font-size: 22px;
      }

      .ticket-features span {
        width: 100%;
      }

      .ticket-price {
        font-size: 30px;
      }

      .summary-box {
        padding: 20px;
      }

      .total-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
      }

      .total-price {
        font-size: 28px;
      }

      .submit-btn {
        font-size: 15px;
      }
    }
  </style>
</head>

<body>
  <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
    <div class="success-message">
      Registration successful! Your information has been saved.
    </div>
  <?php endif; ?>
  <section class="registration-section">
    <div class="registration-container">
      <!-- HEADER -->

      <div class="section-header">
        <span>REGISTER NOW</span>

        <h1>Conference Registration</h1>

        <p>
          Secure your seat for the upcoming conference and connect with
          professionals, innovators, researchers, and speakers from around the
          world.
        </p>
      </div>

      <!-- TICKET CARDS -->

      <div class="ticket-wrapper">
        <!-- VIP -->

        <div class="ticket-card" data-name="VIP Pass" data-price="399">
          <div class="ticket-left">
            <h2>VIP Pass</h2>

            <p>Premium experience with exclusive access</p>

            <div class="ticket-features">
              <span>✓ All conference sessions</span>

              <span>✓ VIP networking dinner</span>

              <span>✓ Premium welcome kit</span>

              <span>✓ Priority seating</span>

              <span>✓ Meet & greet with speakers</span>
            </div>
          </div>

          <div class="ticket-price">$399</div>
        </div>

        <!-- STUDENT -->

        <div
          class="ticket-card active"
          data-name="Student Pass"
          data-price="99">
          <div class="ticket-left">
            <h2>Student Pass</h2>

            <p>Special pricing for students with valid ID</p>

            <div class="ticket-features">
              <span>✓ All conference sessions</span>

              <span>✓ Student networking session</span>

              <span>✓ Digital resources</span>
            </div>
          </div>

          <div class="ticket-price">$99</div>
        </div>
      </div>

      <!-- FORM -->

      <form class="registration-form" action="pay.php" method="post" onsubmit="alert('FORM SUBMITTING')">
        <div class=" form-grid">
          <div class="form-group">
            <label>First Name *</label>
            <input
              type="text"
              class="form-control"
              name="first_name"
              required />
          </div>

          <div class="form-group">
            <label>Last Name *</label>
            <input
              type="text"
              class="form-control"
              name="last_name"
              required />
          </div>

          <div class="form-group">
            <label>Email Address *</label>
            <input type="email" class="form-control" name="email" required />
          </div>

          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phone" />
          </div>

          <div class="form-group">
            <label>Company/Organization</label>
            <input type="text" class="form-control" name="company" />
          </div>

          <div class="form-group">
            <label>Job Title</label>
            <input type="text" class="form-control" name="job_title" />
          </div>

          <div class="form-group full-width">
            <label>Number Of Tickets</label>

            <select class="form-control" id="ticketQuantity" name="quantity">
              <option value="1">1 Ticket</option>
              <option value="2">2 Tickets</option>
              <option value="3">3 Tickets</option>
              <option value="4">4 Tickets</option>
            </select>
          </div>

          <div class="form-group full-width">
            <label>Dietary Restrictions (Optional)</label>

            <textarea
              class="form-control"
              name="dietary"
              placeholder="Please specify any dietary restrictions or food allergies"></textarea>
          </div>

          <div class="form-group full-width">
            <label>Special Requests (Optional)</label>

            <textarea
              class="form-control"
              name="special_requests"
              placeholder="Any special accommodation requests or additional information"></textarea>
          </div>
        </div>

        <!-- SUMMARY -->

        <div class="summary-box">
          <h2>Order Summary</h2>

          <div class="summary-row">
            <span>Selected Ticket:</span>

            <span id="summaryTicket"> Student Pass </span>
          </div>

          <div class="summary-row">
            <span>Quantity:</span>

            <span id="summaryQuantity"> 1 </span>
          </div>

          <div class="summary-row">
            <span>Unit Price:</span>

            <span id="summaryPrice"> $99 </span>
          </div>

          <div class="summary-divider"></div>

          <div class="total-row">
            <h3>Total Amount:</h3>

            <div class="total-price" id="summaryTotal">$99</div>
          </div>

          <p class="summary-note">
            *All prices include applicable taxes and fees
          </p>
        </div>

        <input type="hidden" id="ticketTypeInput" name="ticket_type" value="Student Pass" />
        <input type="hidden" id="totalAmountInput" name="total_amount" value="99" />

        <!-- CHECKBOX -->

        <div class="checkbox-group">
          <label class="checkbox-item">
            <input type="checkbox" />

            <span>
              I agree to the
              <a href="#">Terms & Conditions</a>
              and
              <a href="#">Privacy Policy</a>
            </span>
          </label>

          <label class="checkbox-item">
            <input type="checkbox" />

            <span> Subscribe to newsletter and future updates </span>
          </label>
        </div>





        <!-- BUTTON -->

        <button type="submit" class="submit-btn">
          <i class="ri-bank-card-line"></i>

          Proceed To Payment
        </button>
      </form>
    </div>
  </section>

  <!-- ===================================================
     SCRIPT
=================================================== -->

  <script>
    const ticketCards = document.querySelectorAll(".ticket-card");

    const quantitySelect = document.getElementById("ticketQuantity");

    const summaryTicket = document.getElementById("summaryTicket");

    const summaryQuantity = document.getElementById("summaryQuantity");

    const summaryPrice = document.getElementById("summaryPrice");

    const summaryTotal = document.getElementById("summaryTotal");

    let currentTicket = "Student Pass";
    let currentPrice = 99;

    // SELECT TICKET

    ticketCards.forEach((card) => {
      card.addEventListener("click", () => {
        ticketCards.forEach((c) => c.classList.remove("active"));

        card.classList.add("active");

        currentTicket = card.dataset.name;

        currentPrice = parseInt(card.dataset.price);

        updateSummary();
      });
    });

    // UPDATE SUMMARY

    quantitySelect.addEventListener("change", updateSummary);

    function updateSummary() {
      const quantity = parseInt(quantitySelect.value);

      summaryTicket.innerText = currentTicket;

      summaryQuantity.innerText = quantity;

      summaryPrice.innerText = `$${currentPrice}`;

      summaryTotal.innerText = `$${currentPrice * quantity}`;

      document.getElementById("ticketTypeInput").value = currentTicket;

      document.getElementById("totalAmountInput").value =
        currentPrice * quantity;
    }

    updateSummary();
  </script>
</body>

</html>