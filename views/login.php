<h1>Logowanie</h1>

<?php

use impresja\impresja\form\Form;

$form =  Form::begin('', 'post');
?>
<div class="row">
    <div class="col"><?php echo $form->inputField($model, 'email', 'Email')->emailField(); ?></div>
    <div class="col"><?php echo $form->inputField($model, 'password', 'Hasło')->passwordField(); ?></div>
</div>
<button type="submit" class="btn btn-primary">Wyślij</button>
<?php Form::end();
