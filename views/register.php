<h1>Rejestracja</h1>

<?php

use impresja\impresja\form\Form;

$form =  Form::begin('', 'post');
?>
<div class="row">
    <div class="col"><?php echo  $form->inputField($model, 'firstname', 'Imię'); ?></div>
    <div class="col"><?php echo $form->inputField($model, 'lastname', 'Nazwisko'); ?></div>
</div>
<?php echo $form->inputField($model, 'email', 'Email')->emailField(); ?>
<div class="row">
    <div class="col"><?php echo $form->inputField($model, 'password', 'Hasło')->passwordField(); ?></div>
    <div class="col"><?php echo $form->inputField($model, 'confirmPassword', 'Powtórz hasło')->passwordField(); ?></div>
</div>
<button type="submit" class="btn btn-primary">Zapisz</button>
<?php Form::end();
