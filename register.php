
<?
$users = [
    [
        'firstname' => 'Zanf',
        'lastname' => 'Gemin',
        'email' => 'email@em.cc',
        'password' => 'qw',
    ],
    [
        'firstname' => 'Mura',
        'lastname' => 'Kulo',
        'email' => 'smds@s.ru',
        'password' => 'qw',
    ],
    [
        'firstname' => 'Notu',
        'lastname' => 'Vurs',
        'email' => 'skdk@sd.com',
        'password' => 'qw',
    ],
];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    sleep(5);
    $current = file_get_contents('logs/logs.txt');    

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeat_password'];

    if(empty($email)) 
    {
        echo json_encode(
            [
            'error' => 'Все поля должны быть заполнены'
        ]);
        $current .= "Все поля должны быть заполнены\n";
        file_put_contents('logs/logs.txt', $current);
        die();
    }
    else if(empty($password)) 
    {
        echo json_encode(
            [
            'error' => 'Все поля должны быть заполнены'
        ]);
        $current .= "Все поля должны быть заполнены\n";
        file_put_contents('logs/logs.txt', $current);
        die();
    }
    else if(empty($repeatPassword)) 
    {
        echo json_encode(
            [
            'error' => 'Все поля должны быть заполнены'
        ]);
        $current .= "Все поля должны быть заполнены\n";
        file_put_contents('logs/logs.txt', $current);
        die();
    }
    else if($password != $repeatPassword)
    {
        echo json_encode(
            [
            'error' => 'Пароли не совпадают'
        ]);
        $current .= "Пароли не совпадают\n";
        file_put_contents('logs/logs.txt', $current);
        die();
    }

    $flag = false;
    for ($i = 0; $i < strlen($email); $i++) {
        if($email[$i] == '@') {
            $flag = true;
        }
    }
    if($flag == false) {
        echo json_encode(
            [
            'error' => 'Почта не валидна'
        ]);
        $current .= "Почта не валидна\n";
        file_put_contents('logs/logs.txt', $current);
        die();
    }

    foreach ($users as $user) {
        if ($user['email'] == $email) {
            echo json_encode(
                [
                'error' => 'Такая почта уже существует'
            ]);
            $current .= "Такая почта уже существует\n";
            file_put_contents('logs/logs.txt', $current);
            die();
        }
    }

    echo json_encode(
        [
        'success' => 'Вход успешно выполнен'
    ]);
    $current .= "Вход успешно выполнен\n";
    file_put_contents('logs/logs.txt', $current);
}

?>