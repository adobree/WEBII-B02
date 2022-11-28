<?php

function create_table($array, $table = true)
{
    $out = '';
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            // if (!isset($tableHeader)) {
            //     $tableHeader =
            //         '<th>' .
            //         implode('</th><th>', array_keys($value)) .
            //         '</th>';
            // }
            array_keys($value);
            $out .= '<tr>';
            $out .= create_table($value, false);
            $out .= '</tr>';
        } else {
            $out .= "<td class='td-2 td-2-s'> $value </td>";
        }
    }

    if ($table) {
        echo '<table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Név</th>
            <th scope="col">Email</th>
            <th scope="col">Nem</th>
            <th scope="col">Státusz</th>
            </tr>
        </thead>
        
        ' . $out . '</table>';
    } else {
        return $out;
    }
}

function get_request()
{
    $url = "https://gorest.co.in/public/v1/users?access-token=a217ccb49c3be7355cc0c0c12ad4d2e6f915c23094b2e67ed30ed8c092e745de";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $tabla = curl_exec($ch);
    curl_close($ch);
    $_POST['tabla'] = json_decode($tabla, JSON_PRETTY_PRINT);
    return $_POST['tabla'];
}

function post_request()
{
    $url = "https://gorest.co.in/public/v1/users?access-token=92fabe2ab81a95c5e8337986d66f6fd6f3c631bcf8620f9219fa6e6a45570764";
    $adatok = array(
        "name" => "cukraszda",
        "email" => "kang@cukraszda.hu",
        "gender" => "male",
        "status" => "active"
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($adatok));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $post = curl_exec($ch);
    curl_close($ch);
    echo '<h2 class="h2-rest">A bejegyzett adatok: ' . $post . '</h2>';
}

function print_out()
{
    $url = "https://gorest.co.in/public/v1/users/3234?access-token=92fabe2ab81a95c5e8337986d66f6fd6f3c631bcf8620f9219fa6e6a45570764";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $kiir = curl_exec($ch);
    curl_close($ch);
    echo '<h2 class="h2-rest">A bejegyzett adatok: ' . $kiir . '</h2>';
}

function put_request()
{
    $url = "https://gorest.co.in/public/v1/users/4867?access-token=92fabe2ab81a95c5e8337986d66f6fd6f3c631bcf8620f9219fa6e6a45570764";
    $adatok = array("name" => "kang");
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($adatok));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $put = curl_exec($ch);
    curl_close($ch);
}

function delete_request()
{
    $url = "https://gorest.co.in/public/v1/users/3228?access-token=92fabe2ab81a95c5e8337986d66f6fd6f3c631bcf8620f9219fa6e6a45570764";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $del = curl_exec($ch);
    curl_close($ch);
    echo '<h2 class="h2-rest">Az adatok törlődtek!</h2>';
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="hatter">
        <div class="uzenet">
            <h2 class="h2-web">Ingyenes Restful tesztelése</h2>
            <form class="buttons" method="post">
                <button type="submit" class="btn btn-primary" name="get">GET</button>
                <button type="submit" class="btn btn-primary" name="post">POST</button>
                <button type="submit" class="btn btn-primary" name="put">PUT</button>
                <button type="submit" class="btn btn-primary" name="delete">DELETE</button>
            </form>
        </div>
    </div>
</body>
<br><br>

<?php


if (isset($_POST['get'])) {
    get_request();
    create_table($_POST['tabla']['data']);
}
if (isset($_POST['post'])) {
    post_request();
}
if (isset($_POST['put'])) {
    put_request();
    print_out();
}
if (isset($_POST['delete'])) {
    delete_request();
}

?>





</html>