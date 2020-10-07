/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
var app = {
    // Application Constructor
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
    },

    // deviceready Event Handler
    //
    // Bind any cordova events here. Common events are:
    // 'pause', 'resume', etc.
    onDeviceReady: function() {
        this.receivedEvent('deviceready');

        window.plugins.PushbotsPlugin.initialize(
            "5f7e2912af032a585a23ce77",
            {
                "android":{
                    "sender_id":"916270730867",
                    "fcm_app_id":"1:916270730867:android:c0c0eff6cdddc42ce92406",
                    "web_api_key":"AIzaSyDYAMrrTFlIABN_9whg7z7IbCZqspMEje4",
                    "project_id":"better-notifications-a7272"
                }
            }
        );
        //app.send_data();
    },

    send_data: function(){
        window.plugins.PushbotsPlugin.on("user:ids", function(data){
            console.log("token" + data.token);
            token = data.token;
            $.ajax({
                "url": "http://192.168.0.19/better-notifications-pushbot/server.php",
                "data": {"tk": token},
                success: function(data){
                    console.log(data);
                }
            })
            //document.getElementById("token").value = data.token;
            //alert(data.token);
        });
    },

    // Update DOM on a Received Event
    receivedEvent: function(id) {
        var parentElement = document.getElementById(id);
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');

        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    }
};

app.initialize();