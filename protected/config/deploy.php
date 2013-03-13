<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
            'db'=>array(
                'connectionString' => 'mysql:host=mysql.1freehosting.com;dbname=u520138716_ama',
                'emulatePrepare' => true,
                'username' => 'u520138716_ama',
                'password' => 'thangbaito2013',
                'charset' => 'utf8',
            ),
		),
	)
);
