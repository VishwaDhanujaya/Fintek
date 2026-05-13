<?php
// data.php - Mock Database Array for Fintek
// All product data is sourced from the official Fintek product catalogue.

// =============================================================================
// CATEGORIES
// =============================================================================
$categories = [
    'digital_copiers' => [
        'id'          => 'digital_copiers',
        'name'        => 'Digital Copiers',
        'icon'        => 'assets/images/icon-copier.png',
        'description' => 'High-performance Sharp B&W and colour multifunctional copiers for any office size.'
    ],
    'cash_counters' => [
        'id'          => 'cash_counters',
        'name'        => 'Cash Counting Machines',
        'icon'        => 'assets/images/icon-cash.png',
        'description' => 'Fast, accurate Scancoin currency counting and authentication machines.'
    ],
    'franker_machines' => [
        'id'          => 'franker_machines',
        'name'        => 'Franker Machines',
        'icon'        => 'assets/images/icon-franker.png',
        'description' => 'Efficient postage meter and franking machines for high-volume mailing.'
    ],
    'pos_machines' => [
        'id'          => 'pos_machines',
        'name'        => 'POS Machines',
        'icon'        => 'assets/images/icon-pos.png',
        'description' => 'NCR point-of-sale terminals built for speed and reliability.'
    ],
];

// =============================================================================
// PRODUCTS
// =============================================================================
$products = [

    // -------------------------------------------------------------------------
    // DIGITAL COPIERS
    // -------------------------------------------------------------------------
    [
        'id'         => 'BP-30M28',
        'name'       => 'Sharp BP-30M28',
        'category'   => 'digital_copiers',
        'price'      => 'Request Quote',
        'image'      => 'assets/images/bp-30m28.png',
        'short_desc' => 'Black & white multifunctional desktop copier. Up to 28 ppm (A4), 7-inch colour touch panel, 4 GB memory.',
        'is_new'     => true,
        'specs'      => [
            'General' => [
                'Type'                     => 'Desktop',
                'Engine speed'             => "A4 (8″ x 11″): Max. 35/31/28 ppm\nA3 (11″ x 17″): Max. 19/17/17 ppm",
                'Control panel display'    => '7.0 inch color LCD touchscreen',
                'Paper size'               => 'Max A3 (11″ x 17″), min. A6 (5″ x 8″)',
                'Paper capacity (80 g/m²)' => "Standard: 1,100 sheets (2×500-sheet tray and 100-sheet multi-bypass tray)\nMaximum: 2,100 sheets (1,100 sheets & optional 2,500-sheet tray)",
                'Paper weight'             => "Tray 1: 60–105 g/m² (16–28 lbs bond)\nTrays 2-5: 50–200 g/m² (16 lbs bond to 110 lbs index)\nMulti-bypass tray: 55–200 g/m²",
                'Warm-up time'             => "BP-30M35: 20 sec.\nBP-30M31/30M28: 19 sec.",
                'Memory'                   => "Standard: 4 GB (copy/print shared)\nOption: 512 GB SSD, 128 GB SSD",
                'Power requirements'       => 'Rated local AC voltage +10%, 50/60 Hz',
                'Power consumption'        => 'Max 1.45 kW (220–240 V), max 1.44 kW (110–127 V)',
                'Dimensions (W × D × H)'  => '620 × 614 × 830 mm (24″ × 24″ × 32″)',
                'Weight (approx.)'         => '49 kg (108.1 lbs)',
            ],
            'Copier' => [
                'Original paper size' => 'Max A3 (11″ × 17″)',
                'First copy time'     => "BP-30M35: 4.0 sec.\nBP-30M31/30M28: 4.3 sec.",
                'Continuous copy'     => 'Max 9,999 copies',
                'Resolution'          => "Scan: 600 × 600 dpi, 600 × 400 dpi\nPrint: 600 × 600 dpi",
                'Gradation'           => 'Equivalent to 256 levels',
                'Zoom range'          => '25% to 400% (25% to 200% using RSPF) in 1% increments',
                'Preset copy ratios'  => 'Metric: 10 ratios (5R/5E), Inch: 8 ratios (4R/4E)',
            ],
            'Scanner' => [
                'Scan method'      => "Push scan (via control panel)\nPull scan (TWAIN-compliant application)",
                'Scan speed'       => 'Color & B/W: Max. 60 originals/min.',
                'Resolution'       => "Push scan: 100, 150, 200, 300, 400, 600 dpi\nPull scan: 75, 100, 150, 200, 300, 400, 600 dpi\n50 dpi to 9,600 dpi via user setting",
                'File formats'     => 'TIFF, PDF, PDF/A, encrypted PDF, XPS, compact PDF, JPEG, searchable PDF, OOXML (pptx, xlsx, docx), text (TXT UTF-8), rich text (RTF)',
                'Scan destinations' => "Push scan to email / desktop / FTP server / network folder (SMB) / USB drive / local drive\nPull scan (TWAIN-compliant application)",
            ],
            'Printer' => [
                'Resolution'         => '1,200 × 600 dpi, 600 × 600 dpi',
                'Interface'          => 'USB 2.0 (host, high-speed), 10Base-T / 100Base-TX / 1000Base-T, wireless LAN (IEEE 802.11 b/g/n)',
                'Supported OS'       => 'Windows Server 2012/2012 R2/2016/2019, Windows 8.1/10, Mac OS 10.9–10.15, 11',
                'Network protocols'  => 'TCP/IP',
                'Printing protocols' => 'LPR, Raw TCP (port 9100), POP3 (email printing), HTTP, FTP, IPP, SMB, WSD',
                'Available fonts'    => 'Option: Adobe PostScript 3 — 80 fonts for PCL, 139 fonts for Adobe PostScript 3',
            ],
            'Facsimile' => [
                'Note'                     => 'Requires optional MX-FX15',
                'Compression method'       => 'MH / MR / MMR / JBIG',
                'Communication protocol'   => 'Super G3 / G3',
                'Transmission time'        => 'Less than 3 seconds',
                'Modem speed'              => '33,600 bps to 2,400 bps with automatic fallback',
                'Transmission resolution'  => 'From Standard (203.2 × 97.8 dpi) to Ultra Fine (406.4 × 391 dpi)',
                'Recording size'           => 'A3 to A5 (11″ × 17″ to 5″ × 8″)',
                'Memory'                   => '1 GB (built-in)',
                'Greyscale levels'         => 'Equivalent to 256 levels',
            ],
        ],
    ],

    [
        'id'         => 'BP-10C20Z',
        'name'       => 'Sharp BP-10C20Z',
        'category'   => 'digital_copiers',
        'price'      => 'Request Quote',
        'image'      => 'assets/images/bp-10c20z.png',
        'short_desc' => 'Colour multifunctional desktop copier. Up to 20 ppm (A4), 5-line LCD, 2 GB memory.',
        'is_new'     => true,
        'specs'      => [
            'General' => [
                'Type'                     => 'Desktop',
                'Engine speed'             => "A4 (8″ × 11″): Max. 25/20/20 ppm\nA3 (11″ × 17″): Max. 14/12/12 ppm",
                'Control panel display'    => '5-line LCD',
                'Paper size'               => 'Max A3W (12″ × 18″), min. A6 (5″ × 8″)',
                'Paper capacity (80 g/m²)' => "Standard: 350 sheets (250-sheet tray and 100-sheet multi bypass tray)\nMaximum: 1,850 sheets (350 sheets & optional 3 × 500-sheet tray)",
                'Paper weight'             => "Tray 1: 60–105 g/m² (16–28 lbs bond)\nTrays 2-4: 60–220 g/m² (16 lbs bond to 80 lbs cover)\nMulti bypass tray: 55–256 g/m² (13 lbs bond to 140 lbs index)",
                'Warm-up time'             => '29 sec.',
                'Memory'                   => '2 GB (copy/print shared)',
                'Power requirements'       => 'Rated local AC voltage 110%, 50/60 Hz',
                'Power consumption'        => 'Max 1.44 kW (110–120 V), max 1.84 kW (220–240 V)',
                'Dimensions (W × D × H)'  => '560 × 560 × 560 mm (22″ × 22″ × 22″)',
                'Weight (approx.)'         => 'BP-10C20: 52 kg (112.5 lbs) | BP-20C25/20C20: 47 kg (103.7 lbs)',
            ],
            'Copier' => [
                'Original paper size' => 'Max A3 (11″ × 17″)',
                'First copy time'     => 'Colour: 11.5 sec. | B/W: 8.0 sec.',
                'Continuous copy'     => 'Max 999 copies',
                'Resolution'          => "Scan: 600 × 600 dpi, 600 × 400 dpi\nPrint: 600 × 600 dpi",
                'Gradation'           => 'Equivalent to 256 levels',
                'Zoom range'          => '25% to 400% (25% to 200% using RSPF) in 1% increments',
                'Preset copy ratios'  => 'Metric: 10 ratios (5R/5E), Inch: 8 ratios (4R/4E)',
            ],
            'Scanner' => [
                'Scan method'       => "Push scan (via control panel)\nPull scan (TWAIN-compliant application)",
                'Scan speed'        => 'Color & B/W: Max. 37 originals/min.',
                'Resolution'        => "Push scan: 100, 150, 200, 300, 400, 600 dpi\nPull scan: 75, 100, 150, 200, 300, 400, 600 dpi\n50 dpi to 9,600 dpi via user setting",
                'File formats'      => 'TIFF, PDF, JPEG',
                'Scan destinations' => 'Scan to e-mail / desktop / FTP server / network folder (SMB) / USB drive',
            ],
            'Printer' => [
                'Resolution'         => '600 × 600 dpi',
                'Interface'          => 'USB 2.0 (host, high-speed), 10Base-T / 100Base-TX / 1000Base-T, wireless LAN (IEEE 802.11 b/g/n)',
                'Supported OS'       => 'Windows Server 2008/2008 R2/2012/2012 R2/2016/2019, Windows 7/8.1/10, Mac OS 10.6–10.15',
                'Network protocols'  => 'TCP/IP',
                'Printing protocols' => 'LPR, Raw TCP (port 9100), FTP, IPP, WSD',
                'Available fonts'    => '80 fonts for PCL, 136 fonts for PostScript 3 emulation',
            ],
            'Facsimile' => [
                'Note'                    => 'Requires optional BP-FX10',
                'Compression method'      => 'MH / MR / MMR / JBIG',
                'Communication protocol'  => 'Super G3 / G3',
                'Transmission time'       => 'Less than 3 seconds',
                'Modem speed'             => '33,600 bps to 2,400 bps with automatic fallback',
                'Transmission resolution' => 'From Standard (203.2 × 97.8 dpi) to Ultra Fine (406.4 × 391 dpi)',
                'Recording size'          => 'A3 to A5 (11″ × 17″ to 5″ × 8″)',
                'Memory'                  => '64 MB (built-in)',
                'Greyscale levels'        => 'Equivalent to 256 levels',
            ],
        ],
    ],

    // -------------------------------------------------------------------------
    // CASH COUNTERS
    // -------------------------------------------------------------------------
    [
        'id'         => 'scancoin-cc',
        'name'       => 'Scancoin Cash Counter',
        'category'   => 'cash_counters',
        'price'      => 'Request Quote',
        'image'      => 'assets/images/scancoin-cc.png',
        'short_desc' => 'Heavy-duty banknote counter with 500-note hopper capacity and speeds up to 1,500 notes/min.',
        'is_new'     => false,
        'specs'      => [
            'General' => [
                'Dimensions (W × D × H)' => '280 × 269 × 261 mm',
                'Weight'                 => '8 kg',
                'Hopper Capacity'        => '500 notes',
                'Stacker Capacity'       => 'Max. 200 notes',
                'Reject Capacity'        => 'Max. 70 notes',
                'Batch'                  => '1 – 999',
                'Counting Speed'         => '600 / 1,000 / 1,200 / 1,500 notes per minute',
                'Interface'              => '2 × RS232 / 2 × USB / LAN',
            ],
        ],
    ],

    // -------------------------------------------------------------------------
    // FRANKER MACHINES
    // -------------------------------------------------------------------------
    [
        'id'         => 'YFM1181',
        'name'       => 'YFM1181 Franker Machine',
        'category'   => 'franker_machines',
        'price'      => 'Request Quote',
        'image'      => 'assets/images/yfm1181.png',
        'short_desc' => 'High-speed franking machine. 3,300 envelopes per hour, Ink Jet printing, handles envelopes C6–C4 and A4.',
        'is_new'     => false,
        'specs'      => [
            'General' => [
                'Throughput'           => '3,300 envelopes per hour',
                'Print technology'     => 'Ink Jet',
                'Envelope size'        => 'C6 – C4, A4',
                'Mail pack thickness'  => '6 mm',
            ],
        ],
    ],

    // -------------------------------------------------------------------------
    // POS MACHINES
    // -------------------------------------------------------------------------
    [
        'id'         => 'NCR22',
        'name'       => 'NCR22 POS Machine',
        'category'   => 'pos_machines',
        'price'      => 'Request Quote',
        'image'      => 'assets/images/ncr22.png',
        'short_desc' => 'NCR point-of-sale terminal engineered for speed, reliability, and seamless retail integration.',
        'is_new'     => false,
        'specs'      => [
            'General' => [
                'Brand'  => 'NCR',
                'Model'  => 'NCR22',
                'Type'   => 'POS Terminal',
                'Status' => 'Contact us for full technical specifications and pricing.',
            ],
        ],
    ],

];
?>
