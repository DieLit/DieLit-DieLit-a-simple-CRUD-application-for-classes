<?php

use app\utils\Router;
use app\controllers\Info;

Router::myGet('/', 'main');


Router::myGet('/add','home');
Router::myPost('/Info',Info::class,' add',true,false);


Router::myGet('/edit','edit');
Router::myPost('/edit/Info', Info::class, 'editInfo', true, false);

Router::myPost('/delete/Info', Info::class,'deleteInfo', true ,false);


Router::myGet('/open', 'open');
Router::myPost('/open/Info', Info::class, 'openInfo', true, false );

Router::myGet('/auth', 'auth');
Router::myPost('/authorization', Info::class, "auth_user", true, false);

Router::myGet('/reg', 'registration');
Router::myPost('/registration' , Info::class, 'registration' , true, false);



Router::getContent();