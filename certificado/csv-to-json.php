<?php

$id = 0;
$events = [
    '2ª Conferência PHPRS' => [],
    'Workshop Segurança para aplicações web' => [],
    'Workshop Middlewares e PSR-7' => [],
    'Workshop Desenvolvimento de temas WordPress' => [],
    'Workshop Docker para desenvolvedores' => []
];
$participants = [];

$description = "participou do _event,\ncumprindo um total de _hours horas de\n palestras e demais atividades ofertadas\n no dia _date.";

if (($handle = fopen('participant.csv', 'r')) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
        $id ++;
        $name = $data[0];
        $email = $data[1];
        $type_inscription = $data[2];

        $hours = 8;
        $date = '13 de maio de 2017';

        if(strpos($type_inscription, 'Workshop')) {
            $hours = 3;
            $date = '12 de maio de 2017';
        }

        $subs = array('_event', '_hours', '_date');
        $values = array($type_inscription, $hours, $date);
        $new_description = str_replace($subs, $values, $description);

        $guy = [
            'id' => $id,
            'name' => $type_inscription,
            'description' => $new_description,
            'attendee' => [
                'id' => 1,
                'name' => $name,
                'file' => '',
                'type' => 'attendee',
                'bg_file' => '',
                'data' => "{$hours} hours",
                'email' => $email
            ]
        ];
        $events[$type_inscription][] = $guy;
    }
    fclose($handle);

    $participants['event'] = $events;

    $fp = fopen('participant-2017.json', 'w');
    fwrite($fp, json_encode($participants));
    fclose($fp);
    echo 'json criado';
}
