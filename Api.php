<?php 
/**
* SosyoSMM Api Class
* @author Savaş Can ALTUN <savascanaltun@gmail.com>
* @link http://savascanaltun.com.tr
* @link http://sosyosepet.xyz
* @since 18.05.2019 
* @version 1.0
*/
class Api{

    /**
    * @var string
    */
    public $api_url = ""; // Api URL 

    /**
    * @var string
    */
    public $api_key = "";  // Api Key
	
    /**
    * Ordey Function
    * @param string
    * @return json
    */
    public function order($data) { 
        $post = array_merge(array('key' => $this->api_key, 'action' => 'add'), $data);
        return json_decode($this->connect($post));
    }

    /**
    * Status Function
    * @param int
    * @return json
    */
    public function status($order_id) { 
        return json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'status',
            'order' => $order_id
        )));
    }

    /**
    * Services Function
    * @param int
    * @return json
    */
    public function services() { 
        return json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'services',
        )));
    }

    /**
    * Balance Function
    * @param int
    * @return json
    */
    public function balance() { 
        return json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'balance',
        )));
    }

    /**
    * Curl connect Function
    * @param array
    * @return string
    */
    private function connect($post) {
        $_post = Array();
        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name.'='.urlencode($value);
            }
        }

        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
    }
}
