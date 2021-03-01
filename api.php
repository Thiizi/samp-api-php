<?php
	error_reporting(false);
	set_time_limit(18000);
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json; charset=utf-8');
	require_once('SAMPQueryAPI.php');

	if(!isset($_GET['ip']))
	{
		$json = array('error' => true, 'message' => 'Endereço de IP do servidor não inserido.');
		exit(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
	}

	$data = explode(':', $_GET['ip']);
	if(!isset($data[1])) $data[1] = 7777;

	if(!filter_var($data[1], FILTER_VALIDATE_INT) || strlen($data[1]) < 4)
	{
		$json = array('error' => true, 'message' => 'Porta do servidor inválida.');
		exit(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
	}

	try
	{
		$json = array('error' => false, 'message' => null);
		$query = new SampQueryAPI($data[0], $data[1]);

		if($query->isOnline())
		{
			$json['message'] = 'success';
			$json['info'] 	 = $query->getinfo();
			$json['rules']	 = $query->getRules();

			if($json['info']['players'] > 0 && $json['info']['players'] < 100)
			{
				$json['players'] = $query->getBasicPlayers();
			}
			else
			{
				$json['players'] = array();
			}

			if($json['info'] == -1)
			{
				$json = array('error' => true, 'message' => 'Ocorreu um erro, recarregue a página e tente novamente.');
			}
		}
		else
		{
			$json = array('error' => true, 'message' => 'Não foi possível estabelecer conexão com o servidor.');
		}
	}
	catch (Exception $e)
	{
		$json = array('error' => true, 'message' => $e);	
	}

	print(json_encode($json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
?>
