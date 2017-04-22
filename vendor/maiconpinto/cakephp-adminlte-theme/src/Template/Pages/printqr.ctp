<?php include("qrcode.php");   ?> 
<style style="text/css">
        body{
             /*background: #f5e3c2;*/   
        }
        
        #content{
                margin:auto;
                text-align:center;
        }
        
        #wifilogo{
             padding-top:30%;   
        }
        
        #logo img{
            padding-top: 4%;
             width:43%;
        }
        
        #wifilogo img{
             width:100px;  
        }
        
        #qrcode img{
             width: 180px;
             padding-top: 30px;  
        }
        
         #qrcode p{
             font-size:12px;  
        }
        
        #wpa{
                padding-top:1%;
        }
        
        #wpa p{
                font-size:12px;
        }
        
        footer{
            display: none;
        }
                
        </style>
</head>
<div id="content">
        <div id="logo">
              
               <img src="<?php echo $this->Url->image("wifilogo.png");  ?>" border='0'>
        </div>

        <br>
        <div id="qrcode">

        <?php             

                $qr = new qrcode();
                
                $essid=$_GET["essid"];
                $key=$_GET["key"];
                $security=$_GET["security"];

                $qr->wifi($security, $essid, $key);
        ?>     
                
               <p><img src="<?php echo $qr->get_link() ?>" border='0'/></p>
            
               <br>
            
               <div id='wpa'>
                        <p><b><h2><?php echo "WIFI: $essid" ?></h2></b></p>
                        <p><b><h3><?php if ($security=="") echo "Open Wifi"; else echo  $security . ": " . $key ?></h3></b></p>
                </div>
                
        </div>
                
        

        <div id="wifilogo">
                
        </div>
       
</div>     

