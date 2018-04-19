<?php

class Email_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function register_mail($full_name, $email, $username, $plain_password) {

        $body = '<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TOD</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            @import url(//db.onlinewebfonts.com/c/c06bf2a56c3b0e45d52cd4548acd9ca7?family=DFPShaoNvW5-GB);
            @font-face {font-family: "DFPShaoNvW5-GB";
                        src: url("//db.onlinewebfonts.com/t/c06bf2a56c3b0e45d52cd4548acd9ca7.eot");
                        src: url("//db.onlinewebfonts.com/t/c06bf2a56c3b0e45d52cd4548acd9ca7.eot?#iefix") format("embedded-opentype"),
                            url("//db.onlinewebfonts.com/t/c06bf2a56c3b0e45d52cd4548acd9ca7.woff2") format("woff2"),
                            url("//db.onlinewebfonts.com/t/c06bf2a56c3b0e45d52cd4548acd9ca7.woff") format("woff"),
                            url("//db.onlinewebfonts.com/t/c06bf2a56c3b0e45d52cd4548acd9ca7.ttf") format("truetype"),
                            url("//db.onlinewebfonts.com/t/c06bf2a56c3b0e45d52cd4548acd9ca7.svg#DFPShaoNvW5-GB") format("svg");
            }

            *{
                padding : 0;
                margin : 0;
            }
            .header{
                padding-top : 20px;
                padding-left : 5px;
                padding-bottom : 20px;
                background-color : #3c8dbc;
                color : white;
                padding-right : 5px;
                padding-left : 30px;
                font-family : "DFPShaoNvW5-GB";
                text-align:center;
            }


            html,body {
                width : 100%;
                min-height : 100%;
            }
            .footer{
                width : 100%;
                background-color : #3c8dbc;
                padding-top : 10px;
                padding-bottom : 10px;
                color : white;
                text-align:  center;
            }
            .content{
                padding-left : 5%;
                padding-top :10px;
                margin-bottom : 30px;
            }

            .footer a:link{
                color : white;
                text-decoration : none;
                width : 100%;
            }
            .contacts{
                padding-left :30px;
                color : white;
                text-align: left;
            }
            #logo{
                width: 80px;

            }

            p {
                font-size : 1.25em;
            }

            .btn {
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                -ms-touch-action: manipulation;
                touch-action: manipulation;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 4px;
                background-color: #00c0ef;
                border-color: #00acd6;
                color : white;
            }

            th {
                text-align : left;
            }

        </style>
    </head>
    <body>
        <div class="header">

            <h1>Polygon Property</h1>

        </div>
        <div class="content">
            <h2>Dear ' . $full_name . ', </h2>
            <br/>
            <p>Your account is created. Your login info is stated below.</p>
            <br/>
            <table>
                <tr>
                    <th>Username</th>
                    <td>: ' . $username . '</td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>: ' . $plain_password . '</td>
                </tr>
            </table>
            <br/>
            <a href="' . base_url() . 'access/login"><button class ="btn btn-primary">Login Now</button></a>
            <br />
        </div>

        <div class="footer">

        </div>
    </body>
</html>
';

        $this->load->library('email');

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'polygonpropertynotifier@gmail.com',
            'smtp_pass' => 'ndwcwuovfhssfybx',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'newline' => "\r\n"
        );


        $this->email->initialize($config);

        $this->email->clear();

        $this->email->from('polygonpropertynotifier@gmail.com', "Polygon Property");
        $this->email->to($email);
        $this->email->reply_to('polygonpropertynotifier@gmail.com', "Polygon Property");

        $this->email->subject('Polygon Property Registration');

        $this->email->message($body);

        if ($this->email->send()) {
            
        } else {
            echo $this->email->print_debugger();
        }
    }

}