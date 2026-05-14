<?php
// includes/ProductCatalog.php

require_once __DIR__ . '/Category.php';
require_once __DIR__ . '/Product.php';

/**
 * ProductCatalog acts as the central data repository for the Fintek site.
 * It holds all category and product data (no database required) and
 * exposes clean query methods for the view layer.
 *
 * Usage:
 *   $catalog    = new ProductCatalog();
 *   $products   = $catalog->getAllProducts();
 *   $categories = $catalog->getAllCategories();
 *   $product    = $catalog->getProductById('BP-30M28');
 *   $filtered   = $catalog->getProductsByCategory('digital_copiers');
 *   $featured   = $catalog->getFeaturedProducts(4);
 */
class ProductCatalog
{
    /** @var Category[] */
    private array $categories = [];

    /** @var Product[] */
    private array $products = [];

    public function __construct()
    {
        $this->seedCategories();
        $this->seedProducts();
    }

    // =========================================================================
    // PUBLIC QUERY METHODS
    // =========================================================================

    /**
     * Returns all categories as an associative array keyed by category ID.
     * @return Category[]
     */
    public function getAllCategories(): array
    {
        return $this->categories;
    }

    /**
     * Returns a single Category by ID, or null if not found.
     */
    public function getCategoryById(string $id): ?Category
    {
        return $this->categories[$id] ?? null;
    }

    /**
     * Returns all products.
     * @return Product[]
     */
    public function getAllProducts(): array
    {
        return $this->products;
    }

    /**
     * Returns a single Product by ID, or null if not found.
     */
    public function getProductById(string $id): ?Product
    {
        foreach ($this->products as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }
        return null;
    }

    /**
     * Returns all products belonging to a given category ID.
     * @return Product[]
     */
    public function getProductsByCategory(string $categoryId): array
    {
        return array_filter(
            $this->products,
            fn(Product $p) => $p->getCategoryId() === $categoryId
        );
    }

    /**
     * Returns up to $limit products, typically the newest/most featured.
     * @return Product[]
     */
    public function getFeaturedProducts(int $limit = 4): array
    {
        return array_slice($this->products, 0, $limit);
    }

    // =========================================================================
    // PRIVATE SEED METHODS
    // =========================================================================

    private function seedCategories(): void
    {
        $data = [
            [
                'id' => 'digital_copiers',
                'name' => 'Digital Copiers',
                'icon' => 'copy',
                'description' => 'High-performance Sharp B&W and colour multifunctional copiers for any office size.',
            ],
            [
                'id' => 'projectors',
                'name' => 'Projectors',
                'icon' => 'projector',
                'description' => 'High-quality Vivitek projectors for presentations and cinema experiences.',
            ],
            [
                'id' => 'cash_counters',
                'name' => 'Cash Counter',
                'icon' => 'banknote',
                'description' => 'Fast, accurate currency counting and authentication machines.',
            ],
            [
                'id' => 'franker_machines',
                'name' => 'Franker Machine',
                'icon' => 'printer',
                'description' => 'Professional franking solutions for high-volume office needs.',
            ],
            [
                'id' => 'pos_machines',
                'name' => 'POS machine',
                'icon' => 'layout',
                'description' => 'NCR point-of-sale terminals built for speed and reliability.',
            ],
        ];

        foreach ($data as $d) {
            $this->categories[$d['id']] = new Category(
                $d['id'],
                $d['name'],
                $d['icon'],
                $d['description']
            );
        }
    }

    private function seedProducts(): void
    {
        $data = [

            // -----------------------------------------------------------------
            // DIGITAL COPIERS
            // -----------------------------------------------------------------
            [
                'id' => 'BP-30M28',
                'name' => 'Sharp BP-30M28',
                'category' => 'digital_copiers',
                'price' => 'Request Quote',
                'image' => 'assets/images/Products/bp-30M28.jpg',
                'short_desc' => 'Black & white multifunctional desktop copier. Up to 28 ppm (A4), 7-inch colour touch panel, 4 GB memory.',
                'is_new' => true,
                'brochure' => 'assets/pdf/BP-30M35_30M31_30M28_BRO_S.pdf',
                'specs' => [
                    'General' => [
                        'Type' => 'Desktop',
                        'Engine speed' => "A4 (8″ × 11″): Max. 35/31/28 ppm\nA3 (11″ × 17″): Max. 19/17/17 ppm",
                        'Control panel display' => '7.0 inch color LCD touchscreen',
                        'Paper size' => 'Max A3 (11″ × 17″), min. A6 (5″ × 8″)',
                        'Paper capacity (80 g/m²)' => "Standard: 1,100 sheets (2×500-sheet tray and 100-sheet multi-bypass tray)\nMaximum: 2,100 sheets (1,100 sheets & optional 2,500-sheet tray)",
                        'Paper weight' => "Tray 1: 60–105 g/m² (16–28 lbs bond)\nTrays 2-5: 50–200 g/m²\nMulti-bypass tray: 55–200 g/m²",
                        'Warm-up time' => "BP-30M35: 20 sec.\nBP-30M31/30M28: 19 sec.",
                        'Memory' => "Standard: 4 GB (copy/print shared)\nOption: 512 GB SSD, 128 GB SSD",
                        'Power requirements' => 'Rated local AC voltage +10%, 50/60 Hz',
                        'Power consumption' => 'Max 1.45 kW (220–240 V), max 1.44 kW (110–127 V)',
                        'Dimensions (W × D × H)' => '620 × 614 × 830 mm (24″ × 24″ × 32″)',
                        'Weight (approx.)' => '49 kg (108.1 lbs)',
                    ],
                    'Copier' => [
                        'Original paper size' => 'Max A3 (11″ × 17″)',
                        'First copy time' => "BP-30M35: 4.0 sec.\nBP-30M31/30M28: 4.3 sec.",
                        'Continuous copy' => 'Max 9,999 copies',
                        'Resolution' => "Scan: 600 × 600 dpi, 600 × 400 dpi\nPrint: 600 × 600 dpi",
                        'Gradation' => 'Equivalent to 256 levels',
                        'Zoom range' => '25% to 400% (25% to 200% using RSPF) in 1% increments',
                        'Preset copy ratios' => 'Metric: 10 ratios (5R/5E), Inch: 8 ratios (4R/4E)',
                    ],
                    'Scanner' => [
                        'Scan method' => "Push scan (via control panel)\nPull scan (TWAIN-compliant application)",
                        'Scan speed' => 'Color & B/W: Max. 60 originals/min.',
                        'Resolution' => "Push scan: 100, 150, 200, 300, 400, 600 dpi\nPull scan: 75, 100, 150, 200, 300, 400, 600 dpi\n50 dpi to 9,600 dpi via user setting",
                        'File formats' => 'TIFF, PDF, PDF/A, encrypted PDF, XPS, compact PDF, JPEG, searchable PDF, OOXML (pptx, xlsx, docx), text (TXT UTF-8), rich text (RTF)',
                        'Scan destinations' => "Push scan to email / desktop / FTP server / network folder (SMB) / USB drive / local drive\nPull scan (TWAIN-compliant application)",
                    ],
                    'Printer' => [
                        'Resolution' => '1,200 × 600 dpi, 600 × 600 dpi',
                        'Interface' => 'USB 2.0 (host, high-speed), 10Base-T / 100Base-TX / 1000Base-T, wireless LAN (IEEE 802.11 b/g/n)',
                        'Supported OS' => 'Windows Server 2012/2012 R2/2016/2019, Windows 8.1/10, Mac OS 10.9–10.15, 11',
                        'Network protocols' => 'TCP/IP',
                        'Printing protocols' => 'LPR, Raw TCP (port 9100), POP3 (email printing), HTTP, FTP, IPP, SMB, WSD',
                        'Available fonts' => 'Option: Adobe PostScript 3 — 80 fonts for PCL, 139 fonts for Adobe PostScript 3',
                    ],
                    'Facsimile' => [
                        'Note' => 'Requires optional MX-FX15',
                        'Compression method' => 'MH / MR / MMR / JBIG',
                        'Communication protocol' => 'Super G3 / G3',
                        'Transmission time' => 'Less than 3 seconds',
                        'Modem speed' => '33,600 bps to 2,400 bps with automatic fallback',
                        'Transmission resolution' => 'From Standard (203.2 × 97.8 dpi) to Ultra Fine (406.4 × 391 dpi)',
                        'Recording size' => 'A3 to A5 (11″ × 17″ to 5″ × 8″)',
                        'Memory' => '1 GB (built-in)',
                        'Greyscale levels' => 'Equivalent to 256 levels',
                    ],
                ],
            ],

            [
                'id' => 'BP-10C20Z',
                'name' => 'Sharp BP-10C20Z',
                'category' => 'digital_copiers',
                'price' => 'Request Quote',
                'image' => 'assets/images/Products/bp-10c20z.jpg',
                'short_desc' => 'Colour multifunctional desktop copier. Up to 20 ppm (A4), 5-line LCD, 2 GB memory.',
                'is_new' => true,
                'brochure' => 'assets/pdf/BP-20C25_20C20_10C20_BRO_S.pdf',
                'specs' => [
                    'General' => [
                        'Type' => 'Desktop',
                        'Engine speed' => "A4 (8″ × 11″): Max. 25/20/20 ppm\nA3 (11″ × 17″): Max. 14/12/12 ppm",
                        'Control panel display' => '5-line LCD',
                        'Paper size' => 'Max A3W (12″ × 18″), min. A6 (5″ × 8″)',
                        'Paper capacity (80 g/m²)' => "Standard: 350 sheets (250-sheet tray and 100-sheet multi bypass tray)\nMaximum: 1,850 sheets (350 sheets & optional 3 × 500-sheet tray)",
                        'Paper weight' => "Tray 1: 60–105 g/m²\nTrays 2-4: 60–220 g/m²\nMulti bypass tray: 55–256 g/m²",
                        'Warm-up time' => '29 sec.',
                        'Memory' => '2 GB (copy/print shared)',
                        'Power requirements' => 'Rated local AC voltage 110%, 50/60 Hz',
                        'Power consumption' => 'Max 1.44 kW (110–120 V), max 1.84 kW (220–240 V)',
                        'Dimensions (W × D × H)' => '560 × 560 × 560 mm (22″ × 22″ × 22″)',
                        'Weight (approx.)' => 'BP-10C20: 52 kg (112.5 lbs) | BP-20C25/20C20: 47 kg (103.7 lbs)',
                    ],
                    'Copier' => [
                        'Original paper size' => 'Max A3 (11″ × 17″)',
                        'First copy time' => 'Colour: 11.5 sec. | B/W: 8.0 sec.',
                        'Continuous copy' => 'Max 999 copies',
                        'Resolution' => "Scan: 600 × 600 dpi, 600 × 400 dpi\nPrint: 600 × 600 dpi",
                        'Gradation' => 'Equivalent to 256 levels',
                        'Zoom range' => '25% to 400% (25% to 200% using RSPF) in 1% increments',
                        'Preset copy ratios' => 'Metric: 10 ratios (5R/5E), Inch: 8 ratios (4R/4E)',
                    ],
                    'Scanner' => [
                        'Scan method' => "Push scan (via control panel)\nPull scan (TWAIN-compliant application)",
                        'Scan speed' => 'Color & B/W: Max. 37 originals/min.',
                        'Resolution' => "Push scan: 100, 150, 200, 300, 400, 600 dpi\nPull scan: 75, 100, 150, 200, 300, 400, 600 dpi\n50 dpi to 9,600 dpi via user setting",
                        'File formats' => 'TIFF, PDF, JPEG',
                        'Scan destinations' => 'Scan to e-mail / desktop / FTP server / network folder (SMB) / USB drive',
                    ],
                    'Printer' => [
                        'Resolution' => '600 × 600 dpi',
                        'Interface' => 'USB 2.0 (host, high-speed), 10Base-T / 100Base-TX / 1000Base-T, wireless LAN (IEEE 802.11 b/g/n)',
                        'Supported OS' => 'Windows Server 2008/2008 R2/2012/2012 R2/2016/2019, Windows 7/8.1/10, Mac OS 10.6–10.15',
                        'Network protocols' => 'TCP/IP',
                        'Printing protocols' => 'LPR, Raw TCP (port 9100), FTP, IPP, WSD',
                        'Available fonts' => '80 fonts for PCL, 136 fonts for PostScript 3 emulation',
                    ],
                    'Facsimile' => [
                        'Note' => 'Requires optional BP-FX10',
                        'Compression method' => 'MH / MR / MMR / JBIG',
                        'Communication protocol' => 'Super G3 / G3',
                        'Transmission time' => 'Less than 3 seconds',
                        'Modem speed' => '33,600 bps to 2,400 bps with automatic fallback',
                        'Transmission resolution' => 'From Standard (203.2 × 97.8 dpi) to Ultra Fine (406.4 × 391 dpi)',
                        'Recording size' => 'A3 to A5 (11″ × 17″ to 5″ × 8″)',
                        'Memory' => '64 MB (built-in)',
                        'Greyscale levels' => 'Equivalent to 256 levels',
                    ],
                ],
            ],

            // -----------------------------------------------------------------
            // CASH COUNTERS
            // -----------------------------------------------------------------
            [
                'id' => 'scancoin-cc',
                'name' => 'MIB 9',
                'category' => 'cash_counters',
                'price' => 'Request Quote',
                'image' => 'assets/images/Products/mib-9.jpg',
                'short_desc' => 'Heavy-duty banknote counter with 500-note hopper and speeds up to 1,500 notes/min.',
                'is_new' => false,
                'specs' => [
                    'General' => [
                        'Dimensions (W × D × H)' => '280 × 269 × 261 mm',
                        'Weight' => '8 kg',
                        'Hopper Capacity' => '500 notes',
                        'Stacker Capacity' => 'Max. 200 notes',
                        'Reject Capacity' => 'Max. 70 notes',
                        'Batch' => '1 – 999',
                        'Counting Speed' => '600 / 1,000 / 1,200 / 1,500 notes per minute',
                        'Interface' => '2 × RS232 / 2 × USB / LAN',
                    ],
                ],
            ],
            [
                'id' => 'sc-303-313',
                'name' => 'SC 303/313 Coin Counter',
                'category' => 'cash_counters',
                'price' => 'Request Quote',
                'image' => 'assets/images/Products/sc-303-313.jpg',
                'short_desc' => 'Universal coin counters that count, verify and bag coins or tokens at high speed.',
                'is_new' => false,
                'specs' => [
                    'SC 313 Model' => [
                        'Dimensions (W × D × H)' => '260 × 370 × 335 mm',
                        'Weight' => '11.6 kg',
                        'Counting Speed' => 'Up to 2,700 coins per minute',
                        'Hopper Capacity' => '3,000 cc (3 litres)',
                        'Coin Diameter Range' => '14–34 mm',
                        'Coin Thickness Range' => '10–14 mm',
                        'Power Consumption' => '55 W',
                    ],
                    'SC 303 Model' => [
                        'Dimensions (W × D × H)' => '220 × 370 × 165 mm',
                        'Weight' => '8.4 kg',
                        'Counting Speed' => 'Up to 2,700 coins per minute',
                        'Coin Diameter Range' => '14–34 mm',
                        'Coin Thickness Range' => '10–34 mm',
                        'Power Consumption' => '40 W',
                    ],
                    'Accessories & Options' => [
                        'Adapters' => 'CA 1 Coin adapter, H1 Insert holder',
                        'Guides' => 'BGS1 Bag guide with shelf, BG1 Bag guide without shelf',
                        'Other' => 'Tubing inserts, BA3 Bagging attachment, HEI Hopper extension (SC 313)',
                    ],
                ],
            ],

            // -----------------------------------------------------------------
            // FRANKER MACHINES
            // -----------------------------------------------------------------
            [
                'id' => 'YFM1181',
                'name' => 'YFM1181 Franker Machine',
                'category' => 'franker_machines',
                'price' => 'Request Quote',
                'image' => 'assets/images/Products/yfm1181.jpg',
                'short_desc' => 'High-speed franking machine. 3,300 envelopes/hour, Ink Jet, handles C6–C4 and A4 envelopes.',
                'is_new' => false,
                'specs' => [
                    'General' => [
                        'Throughput' => '3,300 envelopes per hour',
                        'Print technology' => 'Ink Jet',
                        'Envelope size' => 'C6 – C4, A4',
                        'Mail pack thickness' => '6 mm',
                    ],
                ],
            ],

            // -----------------------------------------------------------------
            // POS MACHINES
            // -----------------------------------------------------------------
            [
                'id' => 'NCR22',
                'name' => 'NCR22 POS Machine',
                'category' => 'pos_machines',
                'price' => 'Request Quote',
                'image' => 'assets/images/Products/ncr22.jpg',
                'short_desc' => 'NCR point-of-sale terminal engineered for speed, reliability, and seamless retail integration.',
                'is_new' => false,
                'specs' => [
                    'General' => [
                        'Brand' => 'NCR',
                        'Model' => 'NCR22',
                        'Type' => 'POS Terminal',
                        'Status' => 'Contact us for full technical specifications and pricing.',
                    ],
                ],
            ],
        ];

        foreach ($data as $d) {
            $this->products[] = new Product(
                $d['id'],
                $d['name'],
                $d['category'],
                $d['price'],
                $d['image'],
                $d['short_desc'],
                $d['is_new'] ?? false,
                $d['brochure'] ?? null,
                $d['specs'] ?? []
            );
        }
    }
}
