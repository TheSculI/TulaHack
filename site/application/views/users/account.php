<div class="container">
    <h2 class="text-center">Добро пожаловать <?php echo $user['name']; ?>!</h2>
    <div class="regisFrm">
        <p><b>Имя: </b><?php echo $user['name']; ?></p>
        <p><b>Email: </b><?php echo $user['mail']; ?></p>
        <p><b>Номер телефона: </b><?php echo $user['phone']; ?></p>
        <p><b>Пол: </b><?php echo $user['gender']; ?></p>
    </div>
</div>