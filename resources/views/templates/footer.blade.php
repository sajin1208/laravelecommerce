<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Footer</title>
    <style>
        .footer {
  width: 100%;
  background-color: #f8f8f8;
  padding: 30px 20px;
  color: #333;
  font-family: Arial, sans-serif;
  border-top: 1px solid #ddd;
  box-sizing: border-box;
}

.footer-content {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 0 auto;
  gap: 20px;
}

/* Left section */
.footer-left {
  flex: 1;
  min-width: 250px;
}

.footer-image img {
  display: block;
  margin-bottom: 10px;
}

.footer-image p {
  font-size: 14px;
  line-height: 1.5;
  color: #555;
}

.social {
  margin-top: 10px;
}

.social p {
  font-weight: bold;
  margin-bottom: 5px;
}

.social a {
  color: #007bff;
  text-decoration: none;
  font-size: 14px;
  margin-right: 5px;
}

.social a:hover {
  text-decoration: underline;
}

/* Middle section - vertical links */
.links {
  display: flex;
  flex-direction: column; /* vertical alignment */
  align-items: center;    /* center horizontally (optional) */
  gap: 10px;              /* spacing between links */
}

.links a {
  text-decoration: none;
  color: #333;
  font-weight: 500;
  font-size: 14px;
}

.links a:hover {
  color: #007bff;
}


.links a {
  color: #333;
  text-decoration: none;
  margin: 5px 0; /* vertical spacing */
  font-weight: 500;
}

.links a:hover {
  color: #007bff;
}

/* Right section */
.footer-right {
  flex: 1;
  min-width: 250px;
  text-align: right;
}

.contact p {
  margin: 4px 0;
  font-size: 14px;
}

/* Copyright */
.copyright {
  text-align: center;
  margin-top: 20px;
  font-size: 13px;
  color: #777;
  border-top: 1px solid #ddd;
  padding-top: 10px;
}

/* Responsive layout */
@media (max-width: 768px) {
  .footer-content {
    flex-direction: column;
    text-align: center;
  }

  .footer-right {
    text-align: center;
  }

  .social {
    text-align: center;
  }
}

        </style>
</head>
<body>
    <div class="footer">
        <div class="footer-content">

            <div class="footer-first">

                <div class="footer-image">
                <img src="/images/RPLL.jpg" alt="Logo" width="100">
                <p>My Laravel Application is your go-to destination </p>
                </div>

                <div class="social">
                <p>Follow us on:</p>
                <a href="#">Facebook</a> |
                <a href="#">Twitter</a> |
                <a href="#">Instagram</a>
                </div>

            </div>

             <div class="links">
                <a href="/">Home</a>
                <a href="/about">About</a>
                <a href="/products">Products</a>
                <a href="/contact">Contact</a>
            </div>

            <div class="contact">
            <p>Contact us:123456789</p>
            <p>Email:sdfg@gmail.com</p>
            </div>
    </div>
  <div class="copyright">
        <p>&copy; 2024 My Laravel Application. All rights reserved.</p>
        </div>
</body>
</html>