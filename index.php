﻿<?php
use EzzForms as Ezz;
include('./EzzForms/autoexec.php');

// Options
$towns = ['Towns'=>[123=>'Moskow',435=>'New York']];

// Form
$form = Ezz\form('exampleForm')
    ->action('./')
    ->method('POST')
    ->fields([
        Ezz\text('login')->def('%')->rules(['required minlen:3','regexp'=>['/[\w\-]+/i','Некорректный логин'] ])
        ,Ezz\password('password')->rules('required minlen:8')
        ,Ezz\password('password2')->rules(['required','equalto'=>['password','Пароли несовпадают'] ])
        ,Ezz\select('town')->def([14])->options($towns)->size(1)
        ,Ezz\checkbox('towns2')->def([435])->options($towns)
        ,Ezz\radio('towns3')->options($towns)
        ,Ezz\textarea('text')
//      ,Ezz\file('file2')
        ,Ezz\hidden('token')->def(md5(microtime(1)))
        ,Ezz\submit('Отправить')
    ]);

// Processing ...
if ( $form->isSubmit() ) {
    if (  $form->isValid() ) {
        $values = $form->getValues();
//        Ezz\pr( $values );
    }
}

$formHtml = $form->render();

// Form code
$html = str_replace('><', ">\n<", Ezz\escape( $formHtml ) );
Ezz\pr($html);

// Form render
echo '<hr />';
echo '<a href="./">Home</a>';
echo $formHtml;

// Form object inside
echo '<hr />';
Ezz\pr($form);
