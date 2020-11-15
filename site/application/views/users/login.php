<div class="container">
<h2 class="text-center">Войдите в свой аккаунт</h2>
<div class="row">
	<div class="col-md-4 offset-md-4">
  
	
    <!-- Status message -->
    <?php  
        if(!empty($success_msg)){ 
            echo '<p class="status-msg success">'.$success_msg.'</p>'; 
        }elseif(!empty($error_msg)){ 
            echo '<p class="status-msg error">'.$error_msg.'</p>'; 
        } 
    ?>
	 
    <!-- Login form -->
    <div class="regisFrm">
        <form action="" method="post">
            <div class="form-group">
                <input type="email" class="form-control " name="mail" placeholder="Введите Ваш EMAIL" required="">
                <?php echo form_error('mail','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control " name="password" placeholder="Введите Ваш пароль" required="">
                <?php echo form_error('password','<p class="help-block">','</p>'); ?>
            </div>
            <div class="send-button">
                <input type="submit"  name="loginSubmit" class="btn btn-secondary" value="Войти">
            </div>
        </form>
        <p>У вас нет аккаунта? <a href="<?php echo base_url('users/registration'); ?>">Зарегистрируйтесь!</a></p>
    </div>
    </div>
    </div>
</div>