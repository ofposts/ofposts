<?php

    function OF_Posts( $data ) {

        $request_headers = array();
        $request_headers [] = 'user-agent: '. $data [ 'user_agent' ];
        $request_headers [] = 'cookie: sess=' . $data [ 'sess' ] . ';auth_id=' . $data [ 'auth_id' ];
        $request_headers [] = 'x-bc: ' . $data [ 'xbc' ];
        $request_headers [] = 'app-token: 33d57ade8c02dbc5a333db99ff9ae26a';
        $request_headers [] = 'accept: application/json, text/plain, */*';
        $request_headers [] = 'user-id: ' . $data [ 'auth_id' ];

        $ch = curl_init( 'https://onlyfans.com/api2/v2/users/' . $data [ 'user_id' ] . '/posts?limit=10&order=publish_date_desc&skip_users=all&skip_users_dups=1&pinned=0&format=infinite' );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $request_headers );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

        $content = curl_exec( $ch );

        curl_close( $ch );

        return $content;

    }

    print OF_Posts( array(

        'user_id'=> '24604311', // https://onlyfans.com/onlyshams
        'sess'=> '', // need
        'auth_id'=> '', // need
        'user_agent'=> 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36 Edg/94.0.992.50',
        'xbc'=> '' // need

    ) );

?>
