<?php

namespace app\modules\v1\controllers;

class EmotesController extends ApiController {
    public function actionHome() {
		$emotes = [
	        [
	          	'id'=> 1,
	          	'name' => 'Okayga',
	          	'description' => 'FeelsOkayMan + Pepega.',
	          	'image' => '@/assets/images/Okayga.png',
	        ],
	        [
	          	'id' => 2,
	          	'name' => 'PeepoClown',
	          	'description' => 'Because twitch viewers are often clowns.',
	          	'image' => '@/assets/images/PeepoClown.png',
	        ],
	        [
	          	'id' => 3,
	          	'name' => 'forsenCD',
	          	'description' => 'D OMEGALUL C emote.',
	          	'image' => '@/assets/images/forsenCD.jpg',
	        ],
	        [
	          	'id' => 4,
	          	'name' => 'FeelsAmazingMan',
	          	'description' => 'When you are totally happy.',
	          	'image'=> '@/assets/images/FeelsAmazingMan.png',
	        ],
	        [
	          	'id' => 5,
	          	'name' => 'Pepega',
	          	'description' => 'Absolute retardness.',
	          	'image' => '@/assets/images/Pepega.png',
	        ],
	        [
	          	'id' => 6,
	          	'name' => 'forsenE',
	          	'description' => 'The face of Twitch.',
	          	'image' => '@/assets/images/forsenE.jpg',
	        ],
	        [
	          	'id' => 7,
	          	'name' => 'KKomrade',
	          	'description' => 'Fellow russians emote',
	          	'image' => '@/assets/images/KKomrade.png',
	        ],
	        [
	          	'id' => 7,
	          	'name' => '5Head',
	          	'description' => 'Intellectual.',
	          	'image' => '@/assets/images/5Head.png',
	        ]
	    ];
      
        return $emotes;
    }
}