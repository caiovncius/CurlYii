<?php
/**
 * Component Curl
 * Simple Yii component to Curl. This Component permited you comunique with other Yii Framework.
 * For usage CurlYii component is very simple. Example:
 * 
 * $curl 			= new CurlYii( 'url_of_server');
 * $curl->action 	= 'module/Controller/action';
 * $curl->method 	= 'POST'; // GET is default
 * $curl->data 		= array('key' => 'value');
 * $curl->run();
 * 
 * @author  Caio Vncius <caio@vncius.com>
 */
class CurlYii extends CComponent
{
	public $url;
	public $action;
	public $redirect = false;
	public $output = true;
	public $method = 'GET';
	public $data;

	public function __construct( $url )
	{
		$this->url = $url;
	}


	public function run()
	{
		if(! empty( $this->action ))
			$cUrl = $this->url . '/index.php?r=' . $this->action;

		$curl = curl_init();
		// define a url
        curl_setopt($curl, CURLOPT_URL, $cUrl);

        if( $this->output == true)
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        else
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);

        if( $this->method == 'POST')
        	curl_setopt($curl, CURLOPT_POST, true);

        if(!empty( $this->data ))
            curl_setopt($curl, CURLOPT_POSTFIELDS, $this->data);

        $response = curl_exec($curl);

        curl_close($curl);

        print_r( $response );
	}
}