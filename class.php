<?
Class CWacsAntiBot
{
	function Get($params = Array())
	{
		if(function_exists('curl_init') && function_exists('json_encode') && function_exists('json_decode') && count($params) > 0)
		{
			$params['api'] = '2.0.0';

			$ch = curl_init('http://ws.wacs24.com/su/v2/'.$params['method']);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			$err = curl_error($ch);
			curl_close($ch);

			$result = json_decode($result, true);
		}

		return $result['status'];
	}
}
?>
