<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');

$channelAccessToken = 'oVIkAyMxE1K0MkgJOxgjS6TnckFdyDm1JcACNLYj3ZkYMKWiriaMmt5E1MuSdmrkn/e/Is9RWHH+ee5vSSTnm0TqZeuhTOsrNOvGnttlZqqVWY0xOdWLxH2nCWZqyBxvGXAeppmxewf86iMXAbtnHwdB04t89/1O/w1cDnyilFU=';
$channelSecret = '071a6ef607c75ad387344551955a9a21';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                'type' => 'text',
                                'text' => "ばぶー"
                                //'text' => $message['text']
                            ]
                        ]
                    ]);
                    break;
                default:
                    error_log('Unsupported message type: ' . $message['type']);
                    break;
            }
            break;
        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
};
