
<link rel="stylesheet" href="view/css/lienhe.css">

<p class="tdlienhe">LIÊN HỆ</p>
    <form class="lienhe" action="PHPMailer/mail.php" method="post">
        <div class="input">
            <label for="name">Tên:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="message">Lời nhắn:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>
        
            <input type="submit" value="Gửi">
        </div>
    </form>

