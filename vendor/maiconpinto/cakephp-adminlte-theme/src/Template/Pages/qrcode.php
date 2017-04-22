<?php  
/*************************************************************  
 * This script is developed by Arturs Sosins aka ar2rsawseen, http://webcodingeasy.com  
 * Fee free to distribute and modify code, but keep reference to its creator  
 *  
 * This class generate QR [Quick Response] codes with proper metadata for mobile  phones  
 * using google chart api http://chart.apis.google.com  
 * Here are sources with free QR code reading software for mobile phones:  
 * http://reader.kaywa.com/  
 * http://www.quickmark.com.tw/En/basic/download.asp  
 * http://code.google.com/p/zxing/  
 *  
 * For more information, examples and online documentation visit:   
 * http://webcodingeasy.com/PHP-classes/QR-code-generator-class  
 **************************************************************/  
class qrcode  
{  
    private $data;  
      
    //creating code with link mtadata  
    public function link($url){  
        if (preg_match('/^http:\/\//', $url) || preg_match('/^https:\/\//', $url))   
        {  
            $this->data = $url;  
        }  
        else  
        {  
            $this->data = "http://".$url;  
        }  
    }  
      
    //creating code with bookmark metadata  
    public function bookmark($title, $url){  
        $this->data = "MEBKM:TITLE:".$title.";URL:".$url.";;";  
    }  
      
    //creating text qr code  
    public function text($text){  
        $this->data = $text;  
    }  
      
    //creatng code with sms metadata  
    public function sms($phone, $text){  
        $this->data = "SMSTO:".$phone.":".$text;  
    }  
      
    //creating code with phone   
    public function phone_number($phone){  
        $this->data = "TEL:".$phone;  
    }  
      
    //creating code with mecard metadata  
    public function contact_info($name, $address, $phone, $email){  
        $this->data = "MECARD:N:".$name.";ADR:".$address.";TEL:".$phone.";EMAIL:".$email.";;";  
    }  
      
    //creating code wth email metadata  
    public function email($email, $subject, $message){  
        $this->data = "MATMSG:TO:".$email.";SUB:".$subject.";BODY:".$message.";;";  
    }  
      
    //creating code with geo location metadata  
    public function geo($lat, $lon, $height){  
        $this->data = "GEO:".$lat.",".$lon.",".$height;  
    }  
      
    //creating code with wifi configuration metadata  
    public function wifi($type, $ssid, $pass){  
        $this->data = "WIFI:T:".$type.";S:".$ssid.";P:".$pass.";;";  
    }  
      
    //creating code with i-appli activating meta data  
    public function iappli($adf, $cmd, $param){  
        $param_str = "";  
        foreach($param as $val)  
        {  
            $param_str .= "PARAM:".$val["name"].",".$val["value"].";";  
        }  
        $this->data = "LAPL:ADFURL:".$adf.";CMD:".$cmd.";".$param_str.";";  
    }  
      
    //creating code with gif or jpg image, or smf or MFi of ToruCa files as content  
    public function content($type, $size, $content){  
        $this->data = "CNTS:TYPE:".$type.";LNG:".$size.";BODY:".$content.";;";  
    }  
      
    //getting image  
    public function get_image($size = 150, $EC_level = 'L', $margin = '0'){  
        $ch = curl_init();  
        $this->data = urlencode($this->data);   
        curl_setopt($ch, CURLOPT_URL, 'http://chart.apis.google.com/chart');  
        curl_setopt($ch, CURLOPT_POST, true);  
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'chs='.$size.'x'.$size.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$this->data);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt($ch, CURLOPT_HEADER, false);  
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);  

        $response = curl_exec($ch);  
        curl_close($ch);  
        return $response;  
    }  
      
    //getting link for image  
    public function get_link($size = 150, $EC_level = 'L', $margin = '0'){  
        $this->data = urlencode($this->data);   
        return 'http://chart.apis.google.com/chart?chs='.$size.'x'.$size.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$this->data;  
    }  
      
    //forcing image download 
    public function download_image($file){ 
        header('Content-Disposition: attachment; filename=QRcode.png'); 
        header('Content-Type: image/png'); 
        echo $file; 
    } 
	
	//save image to server
    public function save_image($file, $path = "./QRcode.png"){ 
        file_put_contents($path, $file);
    } 
}  
?>