<?php

$events = [];
$list_events = [
    'Conferência PHPRS 2017',
    'Workshop Segurança para aplicações web',
    'Workshop Middlewares e PSR-7',
    'Workshop Desenvolvimento de temas WordPress',
    'Workshop Docker para desenvolvedores'
];
$description = "participou do(a) _event,\ncumprindo um total de _hours horas de\n palestras e demais atividades ofertadas\n no dia _date.";

foreach ($list_events as $key => $str_event) {
    $hours = 8;
    $date = '13 de maio de 2017';

    if(strpos($str_event, 'Workshop') !== false) {
        $hours = 3;
        $date = '12 de maio de 2017';
    }

    $subs = array('_event', '_hours', '_date');
    $values = array($str_event, $hours, $date);
    $new_description = str_replace($subs, $values, $description);

    $events[$str_event] = [
        'id' => $key+1,
        'name' => $str_event,
        'description' => $new_description,
        'attendee' => []
    ];
}

$id = 0;
if (($handle = fopen('participant.csv', 'r')) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
        $id ++;
        $name = $data[0];
        $email = $data[1];
        $type_inscription = $data[2];

        $guy = [
            'id' => $id,
            'name' => $name,
            'file' => '',
            'type' => 'attendee',
            'bg_file' => '',
            'data' => "{$hours} hours",
            'email' => $email
        ];
        $events[$type_inscription]['attendee'][] = $guy;
    }
    fclose($handle);

    $fp = fopen('participant-2017.json', 'w');
    $new_events = array_values($events);
    arsort($new_events);
    fwrite($fp, json_encode(['event'=>$new_events]));
    fclose($fp);
    echo 'json criado';
}
