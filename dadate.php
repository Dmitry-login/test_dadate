<?php

require_once 'connection.php';


class Suggestions {
    private $url,
            $token;

    public function __construct($token, $url = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/') {
        $this->token = $token;
        $this->url = $url;
    }

    public function suggest($resource, $data) {
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => array(
                    'Content-type: application/json',
                    'Accept: application/json',
                    'Authorization: Token ' . $this->token,
                ),

                'content' => json_encode($data),
            ),
        );
        $context = stream_context_create($options);
        $result = file_get_contents($this->url . $resource, false, $context);
        return json_decode($result);
    }
}
$token = '7257be4b6caffb899cd7a6456c2797304c1f3b43';
$secret = '89f12874e5bfb5129ffdd7b77335136304abb313';
$dadata = new Suggestions($token);
if (isset($_POST["inn"])) {
    $query = $_POST['inn'];
}
$data = array(
    'query' => $query
);



$resp = $dadata->suggest("party", $data);


$INN = $resp->suggestions[0]->data->inn;
$title = $resp->suggestions[0]->value;
$adress = $resp->suggestions[0]->data->address->value;

//если совпадение, тогд выводим данные из БД
        $result = mysqli_query( $link, "SELECT `INN` FROM `INN` WHERE ( `INN` = $query)" );



        if (mysqli_num_rows( $result ) > 0){
            $sql1 = mysqli_query($link, "SELECT `INN`,`title`,`adress` FROM `INN` WHERE ( `INN` = $query)");
            while ($result = mysqli_fetch_array($sql1)) {


                echo "Название: {$result['title']}<br> ИНН: {$result['INN']} <br> Юр.адрес: {$result['adress']} <br>";
            }
        }
    //если совпадений нет, тогда выводим значения из dadate и записываем в БД


        if (isset($_POST["inn"])) {
            $sql = mysqli_query($link, "INSERT INTO `INN` (`INN`,`title`,`adress`)
                                                VALUES ('$INN','$title','$adress')");

        }
        else {
            print 'Название: ' . $resp->suggestions[0]->value . "<br/>\n";
            print 'ИНН: ' . $resp->suggestions[0]->data->inn . "<br/>\n";
            print 'Юр.адрес: ' . $resp->suggestions[0]->data->address->value . "<br/>\n";
    }

echo mysqli_num_rows( $result );





?>