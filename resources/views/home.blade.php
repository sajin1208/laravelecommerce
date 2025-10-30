<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us Anytime</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

  <style>
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: #fff;
      color: #1e1e1e;
    }

    .main-contact-section {
      padding: 80px 20px;
      max-width: 1000px;
      margin: 0 auto;
    }

    .main-contact-header {
      text-align: center;
      margin-bottom: 60px;
    }

    .main-contact-header h2 {
      font-size: 38px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .main-contact-header p {
      color: #6b7280;
      font-size: 16px;
      line-height: 1.6;
    }

    /* ✅ Force exactly two columns */
    .main-contact-list {
      display: flex;
      flex-wrap: wrap;
      gap: 40px 60px;
      justify-content: space-between;
    }

    .main-contact-item {
      display: flex;
      align-items: flex-start;
      gap: 18px;
      border-bottom: 1px solid #f0f0f0;
      padding-bottom: 18px;
      transition: all 0.3s ease;
      width: 45%; /* two columns */
      box-sizing: border-box;
    }

    .main-contact-item:hover {
      transform: translateX(5px);
    }

    .icon {
      width: 45px;
      height: 45px;
      background: #fff3e0;
      color: #AD8742;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
      transition: transform 0.3s ease;
    }

    .main-contact-item:hover .icon {
      transform: scale(1.1);
    }

    .main-contact-info h4 {
      font-size: 17px;
      font-weight: 600;
      margin: 0 0 4px;
      color: #1e1e1e;
    }

    .main-contact-info p {
      margin: 0;
      color: #6b7280;
      font-size: 15px;
      line-height: 1.5;
    }

    /* ✅ Responsive: single column for mobile */
    @media (max-width: 768px) {
      .main-contact-item {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <section class="main-contact-section">
    <div class="main-contact-header">
      <h2>Contact Us Anytime</h2>
      <p>We’re always available to assist you. Choose your preferred way to connect with us.</p>
    </div>

    <div class="main-contact-list">
      <div class="main-contact-item">
        <div class="icon"><i class="fas fa-envelope"></i></div>
        <div class="main-contact-info">
          <h4>Email</h4>
          <p>admissions@mymavenedu.com</p>
        </div>
      </div>

      <div class="main-contact-item">
        <div class="icon"><i class="fas fa-phone"></i></div>
        <div class="main-contact-info">
          <h4>Office Phone</h4>
          <p>+61 3 9602 5683</p>
        </div>
      </div>

      <div class="main-contact-item">
        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
        <div class="main-contact-info">
          <h4>Visit Us</h4>
          <p>Suite 1, Level 2, 85 Queen Street, Melbourne VIC 3000</p>
        </div>
      </div>

      <div class="main-contact-itwem">
        <div class="icon"><i class="fas fa-clock"></i></div>
        <div class="main-contact-info">
          <h4>Office Hours</h4>
          <p>Monday to Friday: 10am – 6pm</p>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
