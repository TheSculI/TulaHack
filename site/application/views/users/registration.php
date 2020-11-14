<div class="container">
<div class="row mt-4">
	<div class="col-md-4 offset-md-4">
 
	
    <!-- Status message -->
    <?php  
        if(!empty($success_msg)){ 
            echo '<p class="status-msg success">'.$success_msg.'</p>'; 
        }elseif(!empty($error_msg)){ 
            echo '<p class="status-msg error">'.$error_msg.'</p>'; 
        } 
    ?>
	 
    <!-- Registration form -->
     
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="name" class="form-control " placeholder="Имя" value="<?php echo !empty($user['name'])?$user['name']:''; ?>" required>
                <?php echo form_error('name','<p class="help-block">','</p>'); ?>
            </div>
       
            <div class="form-group">
                <input type="email" name="mail" class="form-control " placeholder="EMAIL" value="<?php echo !empty($user['mail'])?$user['mail']:''; ?>" required>
                <?php echo form_error('mail','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control " placeholder="Пароль" required>
                <?php echo form_error('password','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <input type="password" name="conf_password" class="form-control " placeholder="Повторите пароль" required>
                <?php echo form_error('conf_password','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <input type="text" name="phone" class="form-control " placeholder="Номер телефона" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
                <?php echo form_error('phone','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <label>Пол: </label>
                <?php 
                if(!empty($user['gender']) && $user['gender'] == 'Female'){ 
                    $fcheck = 'checked="checked"'; 
                    $mcheck = ''; 
                }else{ 
                    $mcheck = 'checked="checked"'; 
                    $fcheck = ''; 
                } 
                ?><input type="hidden" name="status" value="1" >
                <div class="radio">
                    <label>
                        <input type="radio" name="gender" value="Male" <?php echo $mcheck; ?>>
						Мужчина
                    </label>
                    <label>
                        <input type="radio" name="gender" value="Female" <?php echo $fcheck; ?>>
                        Женщина
                    </label>
                </div>
            </div>
           
            <div class="send-button">
                <input type="submit"  class="btn btn-secondary" name="signupSubmit" value="CREATE ACCOUNT">
            </div>
        </form>
        <p>У Вас уже есть аккаунт? <a href="<?php echo base_url('users/login'); ?>">Быстрее заходи здесь!</a></p>
    </div>
    </div>
   
</div>