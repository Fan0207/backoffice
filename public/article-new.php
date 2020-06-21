<?php

// activation du système d'autoloading de Composer
require __DIR__.'/../vendor/autoload.php';

// instanciation du chargeur de templates
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../templates');

// instanciation du moteur de template
$twig = new \Twig\Environment($loader, [
    // activation du mode debug
    'debug' => true,
    // activation du mode de variables strictes
    'strict_variables' => true,
]);

// chargement de l'extension Twig_Extension_Debug
$twig->addExtension(new \Twig\Extension\DebugExtension());

$formData = [
    'name' => '',
    'description' => '',
    'price' => '',
    'quantity' => '',
];
$errors=[];
$messages=[];

if ($_POST){
    if(isset($_POST['name'])) {
        $formData['name'] = $_POST['name'];
    }
    if(isset($_POST['description'])) {
        $formData['description'] = $_POST['description'];
    }
    if(isset($_POST['price'])) {
        $formData['price'] = $_POST['price'];
    }
    if(isset($_POST['quantity'])) {
        $formData['quantity'] = $_POST['quantity'];
    }


    if (!isset($_POST['name']) || empty($_POST['name'])) {
        $errors['name'] = true;
        $messages['name'] = 'ce champ est obligatoire';
    }
    elseif (strlen($_POST['name']) < 2 || strlen($_POST['name']) > 100) {
        $errors['name'] = true;
        $messages['name'] = 'le nom doit comprendre entre 2 et 100 caratères';
    }


    if (!isset($_POST['description']) || empty($_POST['description'])) {
        $errors['description'] = true;
        $messages['description'] = 'ce champ est obligatoire';
    }
    elseif (strpos($_POST['description'], '<') 
        || strpos($_POST['description'], '>')
    ) {
        $errors['description'] = true;
        $messages['description'] = 'la description contient un caractère interdit < ou >';
    }


    if (!isset($_POST['price']) || empty($_POST['price'])) {
        $errors['price'] = true;
        $messages['price'] = 'ce champ est obligatoire';
    }
    elseif (!is_numeric($_POST['price']))
    {
        $errors['price'] = true;
        $messages['price'] = 'le prix doit être un nombre';
    }

    if (!isset($_POST['quantity']) || empty($_POST['quantity'])) {
        $errors['quantity'] = true;
        $messages['quantity'] = 'ce champ est obligatoire';
    }
    elseif(!is_int(0 + $_POST['quantity']))
    {
        $errors['quantity'] = true;
        $messages['quantity'] = 'la quantité doit être un nombre entier';
    }
    elseif ($_POST['quantity'] < 0)
    {
        $errors['quantity'] = true;
        $messages['quantity'] = 'la quantité doit être positive ou nulle';
    }
    
    if (!$errors) {
        $url = 'articles.php';
    
        header("Location: {$url}", true, 302);
        exit();
    }
}

echo $twig->render('article-new.html.twig', [
    'formData' => $formData,
    'errors' => $errors,
    'messages' => $messages,
]);

