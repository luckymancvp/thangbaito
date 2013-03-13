<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
            'db'=>array(
                'connectionString' => 'mysql:host=mysql17.000webhost.com;dbname=a9060554_amazon',
                'emulatePrepare' => true,
                'username' => 'a9060554_amazon',
                'password' => 'a9060554',
                'charset' => 'utf8',
            ),
		),
	)
);
