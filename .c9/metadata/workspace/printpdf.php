{"filter":false,"title":"printpdf.php","tooltip":"/printpdf.php","undoManager":{"mark":9,"position":9,"stack":[[{"start":{"row":13,"column":0},"end":{"row":13,"column":2},"action":"insert","lines":["  "],"id":2}],[{"start":{"row":10,"column":29},"end":{"row":11,"column":0},"action":"insert","lines":["",""],"id":3},{"start":{"row":11,"column":0},"end":{"row":11,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":11,"column":2},"end":{"row":12,"column":0},"action":"insert","lines":["",""],"id":4},{"start":{"row":12,"column":0},"end":{"row":12,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":12,"column":2},"end":{"row":12,"column":4},"action":"insert","lines":["  "],"id":5}],[{"start":{"row":12,"column":2},"end":{"row":12,"column":4},"action":"remove","lines":["  "],"id":6}],[{"start":{"row":12,"column":2},"end":{"row":12,"column":69},"action":"insert","lines":["'mysql:host=127.0.0.1;dbname=c9;charset=utf8', $username, $password"],"id":7}],[{"start":{"row":12,"column":2},"end":{"row":12,"column":69},"action":"remove","lines":["'mysql:host=127.0.0.1;dbname=c9;charset=utf8', $username, $password"],"id":8}],[{"start":{"row":12,"column":2},"end":{"row":21,"column":87},"action":"insert","lines":["$servername = getenv('IP');","    $username = getenv('C9_USER');","    $password = \"\";","    $database = \"c9\";","    $dbport = 3306;","","    ","    ","","    $db = new PDO('mysql:host=127.0.0.1;dbname=c9;charset=utf8', $username, $password);"],"id":9}],[{"start":{"row":24,"column":17},"end":{"row":24,"column":77},"action":"remove","lines":["'mysql:host=localhost;dbname=www;charset=utf8', 'www', 'www'"],"id":10},{"start":{"row":24,"column":17},"end":{"row":24,"column":84},"action":"insert","lines":["'mysql:host=127.0.0.1;dbname=c9;charset=utf8', $username, $password"]}],[{"start":{"row":21,"column":4},"end":{"row":21,"column":87},"action":"remove","lines":["$db = new PDO('mysql:host=127.0.0.1;dbname=c9;charset=utf8', $username, $password);"],"id":11}]]},"ace":{"folds":[],"scrolltop":300,"scrollleft":0,"selection":{"start":{"row":62,"column":55},"end":{"row":62,"column":63},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":20,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1481638247432,"hash":"982007417a1de7502b80920df9c875c02079157b"}