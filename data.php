<?php
// data.php - Mock Database Array for Fintek

$categories = [
    'photocopiers' => [
        'id' => 'photocopiers',
        'name' => 'Photocopiers',
        'icon' => 'assets/images/icon-copier.png',
        'description' => 'High-performance copiers for any office size.'
    ],
    'projectors' => [
        'id' => 'projectors',
        'name' => 'Projectors',
        'icon' => 'assets/images/icon-projector.png',
        'description' => 'Crystal clear presentations every time.'
    ],
    'cash_counters' => [
        'id' => 'cash_counters',
        'name' => 'Cash counting machine',
        'icon' => 'assets/images/icon-cash.png',
        'description' => 'Fast and accurate money counting machines.'
    ],
    'printers' => [
        'id' => 'printers',
        'name' => 'Printers',
        'icon' => 'assets/images/icon-printer.png',
        'description' => 'Efficient and reliable printing solutions.'
    ]
];

$products = [
    [
        'id' => 'BP-30M28',
        'name' => 'Sharp BP-30M28',
        'category' => 'photocopiers',
        'price' => 'Request Quote',
        'image' => 'assets/images/bp-30m28.png',
        'short_desc' => '28 ppm B&W multifunctional printer with seamless network integration.',
        'is_new' => true,
        'specs' => [
            'General' => [
                'Engine speed (B/W)' => '28 ppm (A4)',
                'Paper size: Min.-Max.' => 'A6 - A3',
                'Paper weight (g/m2)' => '55 - 200',
                'Paper capacity:Std (sheets)' => '1100',
                'Paper capacity: Max. (sheets)' => '2100',
                'Warm Up Time (sec.)' => '14',
                'Memory general min/max (MB)' => '4096',
                'Power requirements' => 'Rated local AC voltage ±10%, 50/60 Hz',
                'Power consumption (kW)' => '1.45',
                'Dimensions (mm)' => '620 x 614 x 830',
                'Weight (Kg)' => '49'
            ],
            'Copier' => [
                'Original paper size (Max.)' => 'A3',
                'First copy out time B/W (sec.)' => '4.3',
                'Continuous copy (Max. copies)' => '9999',
                'Resolution Scan B/W (dpi)' => '600 x 600, 600 x 400',
                'Resolution Print (dpi)' => '600 x 600',
                'Gradation (equivalent levels)' => '256',
                'Zoom range (%)' => '25 - 400',
                'Preset copy ratios' => '10'
            ],
            'Scanner' => [
                'Network Scanner (Standard / Option)' => 'Standard',
                'Scan method Push scan and Pull scan' => 'Yes',
                'Resolution push scan (dpi)' => '100, 150, 200, 300, 400, 600',
                'Resolution pull scan (dpi)' => '75, 100, 150, 200, 300, 400, 600, 50 - 9600',
                'File formats' => 'TIFF, PDF, PDF/A-1a, PDF/A-1b, encrypted PDF, compact PDF, JPEG, XPS'
            ],
            'Printer' => [
                'Resolution (dpi)' => '600 x 600',
                'Network Printer (Standard / Option)' => 'Standard',
                'Interface' => 'USB 2.0, 10Base-T/100Base-TX/1000Base-T',
                'Supported OS' => 'Windows, Mac OS',
                'Network protocols' => 'TCP/IP',
                'PDL Std/Opt' => 'Standard: PCL 6. Optional: Adobe PostScript 3'
            ]
        ]
    ],
    [
        'id' => 'BP-10C20Z',
        'name' => 'Sharp BP-10C20Z',
        'category' => 'photocopiers',
        'price' => 'Request Quote',
        'image' => 'assets/images/bp-10c20z.png',
        'short_desc' => 'Compact 20 ppm color MFP designed to enhance productivity.',
        'is_new' => true,
        'specs' => [
            'General' => [
                'Engine speed Colour' => '20 ppm (A4)',
                'Engine speed B/W' => '20 ppm (A4)',
                'Paper size: Min.-Max.' => 'A6 - A3',
                'Paper capacity:Std (sheets)' => '350',
                'Paper capacity: Max. (sheets)' => '1850',
                'Memory general min/max (MB)' => '2048'
            ],
            'Copier' => [
                'Original paper size (Max.)' => 'A3',
                'First copy out time Colour (sec.)' => '11.5',
                'First copy out time B/W (sec.)' => '8.0',
                'Continuous copy (Max. copies)' => '999',
                'Zoom range (%)' => '25 - 400'
            ],
            'Scanner' => [
                'Network Scanner (Standard / Option)' => 'Standard',
                'Resolution push scan (dpi)' => '100 - 600',
                'File formats' => 'TIFF, PDF, JPEG'
            ],
            'Printer' => [
                'Resolution (dpi)' => '600 x 600',
                'Interface' => 'USB 2.0, 10Base-T/100Base-TX/1000Base-T'
            ]
        ]
    ],
    [
        'id' => 'PG-LX2000',
        'name' => 'Sharp PG-LX2000',
        'category' => 'projectors',
        'price' => 'Request Quote',
        'image' => 'assets/images/pg-lx2000.png',
        'short_desc' => 'High brightness 4000 lumens projector with excellent color accuracy.',
        'is_new' => true,
        'specs' => [
            'General' => [
                'Brightness (Lumens)' => '4000',
                'Resolution' => 'XGA (1024 x 768)',
                'Contrast Ratio' => '2000:1',
                'Lamp Life (Hours)' => '5000 (Eco Mode)',
                'Weight (Kg)' => '3.5'
            ],
            'Connectivity' => [
                'HDMI Input' => '1',
                'VGA Input' => '2',
                'USB Port' => 'Yes (Type A & B)'
            ]
        ]
    ],
    [
        'id' => 'FC-800',
        'name' => 'Fintek FC-800 Cash Counter',
        'category' => 'cash_counters',
        'price' => 'Request Quote',
        'image' => 'assets/images/fc-800.png',
        'short_desc' => 'Heavy duty mixed bill value counter with UV/MG/IR detection.',
        'is_new' => true,
        'specs' => [
            'General' => [
                'Counting Speed' => '1000 bills/min',
                'Hopper Capacity' => '300 bills',
                'Stacker Capacity' => '200 bills',
                'Detection Types' => 'UV, MG, IR, MT',
                'Display' => 'LCD'
            ]
        ]
    ]
];
?>
