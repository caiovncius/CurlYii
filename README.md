# CurlYii
Simple Yii component to Curl. This Component permited you comunique with other Yii Framework.
For usage CurlYii component is very simple. Example:

``
$curl 			= new CurlYii( 'url_of_server');
$curl->action 	= 'module/Controller/action';
$curl->method 	= 'POST'; // GET is default
$curl->data 		= array('key' => 'value');
$curl->run();
´´
