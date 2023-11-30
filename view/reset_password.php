<link rel="stylesheet" href="view/css/form.css">
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
</script>
<br>

<?php
 
$email = $_GET["email"];
$reset_token = $_GET["reset_token"];
 
$connection = mysqli_connect("localhost", "root", "", "dataduan1");
 
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
    //
}
else
{
    echo "Email does not exists";
}

$user = mysqli_fetch_object($result);
if ($user->reset_token == $reset_token)
{
    //
}
else
{
    echo "Recovery email has been expired";
}

if ($user->reset_token == $reset_token)
{
    ?>
    <div class="form_lo">
                    <p class="dk">ĐỔI MẬT KHẨU</p>
                    <form method="post" action="dao/new_password.php">
                        <div class="form_full">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
                            <div>
                                <label for="password">Mật khẩu mới</label>
                                <input type="password" name="new_password" placeholder="Nhập mật khẩu mới">
                                <div id="erremail"></div>
                            </div>
                            <!-- <div>
                                <label for="password_confirmation">Nhập lại mật khẩu mới</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu mới">
                            </div> -->
                            <div class="form_sm">
                                <input type="submit" name="" value="LƯU">
                            </div>
                        </div>
                    </form>
                </div>
    <?php
}
else
{
    echo "Recovery email has been expired";
}
