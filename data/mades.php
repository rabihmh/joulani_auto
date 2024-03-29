<?php


return
    [
        'BMW' => [
            'image' => 'uploads/mades/bmw.png',
            'moulds' => [
                'i8',
                'M1',
                'i3',
                ['Series 1' => ['114', '113', '118', '120', '123', '125', '130', '135', '140']],
                ['Series 2' => ['214', '216', '218', '220', '225', '228', '230', '235', '240']],
                ['Series 3' => ['315', '316', '318', '320', '323', '324', '325', '328', '330', '335', '340', 'Active Hybrid 3']],
                ['Series 4' => ['418', '420', '425', '428', '430', '435', '440']],
                ['Series 5' => ['518', '520', '523', '524', '525', '528', '530', '535', '540', '550', 'Active Hybrid 5']],
                ['Series 6' => ['620', '628', '630', '633', '635', '640', '645', '650']],
                ['Series 7' => ['725', '728', '730', '732', '735', '740', '745', '750', '760', 'Active Hybrid 7']],
                ['Series 8' => ['830', '840', '850']],
                ['M Series' => ['1er M Coupe', 'M2', 'M3', 'M4', 'M5', 'M6', 'M7', 'M8', 'M850']],
                ['X Series' => ['Active Hybrid X6', 'X1', 'X2', 'X2 M', 'X3', 'X3 M', 'X4', 'X4 M', 'X5', 'X5 M', 'X6', 'X6 M', 'X7', 'X7 M']],
                ['Z Series' => ['Z1', 'Z3', 'Z3 M', 'Z4', 'Z4 M', 'Z8']],
            ],
        ],
        'Mercedes' => [
            'image' => 'uploads/mades/benz.png',
            'moulds' => [
                ['A-Class' => ['A 180', 'A 200', 'A 250', 'AMG A 35', 'AMG A 45']],
                ['B-Class' => ['B 180', 'B 200', 'B 220', 'AMG B 35']],
                ['C-Class' => ['C 180', 'C 200', 'C 300', 'C 43 AMG', 'C 63 AMG']],
                ['E-Class' => ['E 200', 'E 300', 'E 400', 'E 43 AMG', 'E 53 AMG', 'E 63 AMG']],
                ['S-Class' => ['S 350', 'S 400', 'S 450', 'S 500', 'S 560', 'S 63 AMG', 'S 65 AMG']],
                ['CLA-Class' => ['CLA 180', 'CLA 200', 'CLA 250', 'CLA 35 AMG', 'CLA 45 AMG']],
                ['CLS-Class' => ['CLS 350', 'CLS 400', 'CLS 450', 'CLS 500', 'AMG CLS 53', 'AMG CLS 63']],
                ['GLA-Class' => ['GLA 180', 'GLA 200', 'GLA 220', 'GLA 250', 'AMG GLA 35', 'AMG GLA 45']],
                ['GLB-Class' => ['GLB 200', 'GLB 250', 'AMG GLB 35', 'AMG GLB 45']],
                ['GLC-Class' => ['GLC 200', 'GLC 300', 'GLC 43 AMG', 'GLC 63 AMG']],
                ['GLE-Class' => ['GLE 350', 'GLE 400', 'GLE 450', 'GLE 500', 'GLE 53 AMG', 'GLE 63 AMG']],
                ['GLS-Class' => ['GLS 400', 'GLS 450', 'GLS 500', 'GLS 580', 'AMG GLS 63']],
                'SLS-Class',
                'SL-Class',
                'AMG GT',
                'V-Class',
            ],
        ],
        'Volkswagen' => [
            'image' => 'uploads/mades/volkswagen.png',
            'moulds' => [
                ['Polo' => ['Polo', 'Polo GTI']],
                ['Golf' => ['Golf', 'Golf GTI', 'Golf R']],
                ['Passat' => ['Passat', 'Passat CC', 'Passat R-Line', 'Passat Alltrack']],
                ['Arteon' => ['Arteon', 'Arteon R-Line', 'Arteon Shooting Brake', 'Arteon Shooting Brake R-Line']],
                ['Tiguan' => ['Tiguan', 'Tiguan Allspace', 'Tiguan R-Line']],
                ['Touareg' => ['Touareg', 'Touareg R-Line']],
                ['Caddy' => ['Caddy', 'Caddy Maxi', 'Caddy Alltrack', 'Caddy Beach']],
                ['Amarok' => ['Amarok', 'Amarok Canyon']],
                ['Transporter' => ['Transporter', 'Transporter Kombi', 'Transporter Shuttle', 'Transporter Caravelle', 'Transporter California', 'Transporter Panamericana']],
                'Caravelle',
                'Multivan',
                'California',
                'Grand California',
                'ID.3',
                'ID.4',
                'e-Golf',
                'e-Up!',
            ],
        ],
        'Opel' => [
            'image' => 'uploads/mades/opel.png',
            'moulds' => [
                'Adam',
                'Agila',
                'Ampera',
                ['Astra' => ['Astra Hatchback', 'Astra Saloon', 'Astra Sports Tourer', 'Astra GTC']],
                ['Corsa' => ['Corsa Hatchback', 'Corsa Saloon', 'Corsa-e']],
                'Crossland',
                'Grandland',
                ['Insignia' => ['Insignia Hatchback', 'Insignia Saloon', 'Insignia Sports Tourer']],
                'Karl',
                'Meriva',
                'Mokka',
                'Movano',
                'Vivaro',
                'Zafira',
            ],
        ],

        'Renault' => [
            'image' => 'uploads/mades/renault.png',
            'moulds' => [
                ['Clio' => ['Clio Hatchback', 'Clio Estate']],
                ['Captur' => ['Captur', 'Captur E-Tech Plug-In']],
                ['Kadjar' => ['Kadjar', 'Kadjar E-Tech Plug-In']],
                ['Megane' => ['Megane Hatchback', 'Megane Estate', 'Megane R.S.']],
                ['Zoe' => ['Zoe', 'Zoe Van', 'Zoe E-Tech']],
                ['Scenic' => ['Scenic', 'Grand Scenic']],
                'Talisman',
                'Koleos',
                'Twingo',
                'Arkana',
                'Kangoo',
                'Master',
                'Trafic',
                'Fluence',
                'Espace',
                'Alpine A110',
            ],
        ],
        'Audi' => [
            'image' => 'uploads/mades/audi.png',
            'moulds' => [
                'A1',
                'A3',
                'A4',
                'A5',
                'A6',
                'A7',
                'A8',
                ['Q Series' => ['Q2', 'Q3', 'Q5', 'Q7', 'Q8']],
                ['R Series' => ['R8', 'RS3', 'RS4', 'RS5', 'RS6']],
                'S3',
                'S4',
                'S5',
                'S6',
                'S7',
                'S8',
                'TT',
                'E-Tron',
            ],
        ],
        'Honda' => [
            'image' => 'uploads/mades/honda.png',
            'moulds' => [
                'Accord',
                'Civic',
                'CR-V',
                'HR-V',
                'Pilot',
                'Odyssey',
                'City',
                'Fit',
                'Insight',
                'Ridgeline',
                'Clarity',
            ],
        ],

        'Hyundai' => [
            'image' => 'uploads/mades/hyundai.png',
            'moulds' => [
                'Elantra',
                'Sonata',
                'Tucson',
                'Santa Fe',
                'Kona',
                'Veloster',
                'Ioniq',
                'Accent',
                'Genesis',
                'Venue',
            ],
        ],

        'Toyota' => [
            'image' => 'uploads/mades/toyota.png',
            'moulds' => [
                'Corolla',
                'Camry',
                'Prius',
                'RAV4',
                'Highlander',
                '4Runner',
                'Land Cruiser',
                'Sienna',
                'Tacoma',
                'Tundra',
                'Supra',
                'Yaris',
            ],
        ],

        'Nissan' => [
            'image' => 'uploads/mades/nissan.png',
            'moulds' => [
                'Altima',
                'Maxima',
                'Sentra',
                'Versa',
                'Rogue',
                'Murano',
                'Pathfinder',
                'Armada',
                'Frontier',
                'Titan',
                '370Z',
                'GT-R',
            ],
        ],

        'Mazda' => [
            'image' => 'uploads/mades/mazda.png',
            'moulds' => [
                'Mazda2',
                'Mazda3',
                'Mazda6',
                'MX-5 Miata',
                'CX-3',
                'CX-30',
                'CX-5',
                'CX-9',
            ],
        ],

        'Ford' => [
            'image' => 'uploads/mades/ford.png',
            'moulds' => [
                'Fiesta',
                'Focus',
                'Fusion',
                'Mustang',
                'Escape',
                'Edge',
                'Explorer',
                'Expedition',
                'Ranger',
                'F-150',
                'Bronco',
            ],
        ],

        'Chevrolet' => [
            'image' => 'uploads/mades/chevrolet.png',
            'moulds' => [
                'Spark',
                'Cruze',
                'Malibu',
                'Impala',
                'Camaro',
                'Corvette',
                'Trax',
                'Equinox',
                'Blazer',
                'Traverse',
                'Tahoe',
                'Suburban',
                'Silverado',
            ],
        ],

        'Volvo' => [
            'image' => 'uploads/mades/volvo.png',
            'moulds' => [
                'XC40',
                'XC60',
                'XC90',
                'S60',
                'S90',
                'V60',
                'V90',
                'V40',
                'V50',
                'V70',
                'C30',
                'C70',
                'Polestar',
            ],
        ],

        'Peugeot' => [
            'image' => 'uploads/mades/peugeot.png',
            'moulds' => [
                '208',
                '308',
                '508',
                '2008',
                '3008',
                '5008',
                '108',
                '2008 GT',
                '3008 GT',
                '508 GT',
                'Traveller',
                'Rifter',
                'Boxer',
                'Expert',
            ],
        ],
        'Fiat' => [
            'image' => 'uploads/mades/fiat.png',
            'moulds' => [
                '500',
                'Panda',
                'Tipo',
                'Punto',
                'Doblo',
                '500X',
                '500L',
                '124 Spider',
                '500e',
            ],
        ],

        'Infiniti' => [
            'image' => 'uploads/mades/infiniti.png',
            'moulds' => [
                'Q50',
                'Q60',
                'Q70',
                'QX50',
                'QX60',
                'QX80',
                'QX30',
                'QX70',
            ],
        ],

        'Porsche' => [
            'image' => 'uploads/mades/porsche.png',
            'moulds' => [
                '911',
                'Cayenne',
                'Panamera',
                'Macan',
                'Taycan',
                '718',
            ],
        ],

        'Skoda' => [
            'image' => 'uploads/mades/skoda.png',
            'moulds' => [
                'Octavia',
                'Superb',
                'Kodiaq',
                'Karoq',
                'Scala',
                'Fabia',
                'Rapid',
                'Citigo',
            ],
        ],

        'Suzuki' => [
            'image' => 'uploads/mades/suzuki.png',
            'moulds' => [
                'Swift',
                'Vitara',
                'SX4',
                'Celerio',
                'Baleno',
                'Jimny',
                'Ignis',
                'S-Cross',
            ],
        ],

        'Kia' => [
            'image' => 'uploads/mades/kia.png',
            'moulds' => [
                'Picanto',
                'Rio',
                'Ceed',
                'Sportage',
                'Sorento',
                'Stonic',
                'Niro',
                'Optima',
                'Soul',
                'Proceed',
                'Carnival',
            ],
        ],

        'Jeep' => [
            'image' => 'uploads/mades/jeep.png',
            'moulds' => [
                'Renegade',
                'Compass',
                'Cherokee',
                'Grand Cherokee',
                'Wrangler',
                'Gladiator',
            ],
        ],

        'Cadillac' => [
            'image' => 'uploads/mades/cadillac.png',
            'moulds' => [
                'CT4',
                'CT5',
                'CT6',
                'XT4',
                'XT5',
                'XT6',
                'Escalade',
            ],
        ],

    ];
