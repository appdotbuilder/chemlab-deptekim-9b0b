<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Lab;
use App\Models\LandingPageContent;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ChemLabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create labs
        $labs = [
            [
                'name' => 'Laboratorium Operasi Teknik Kimia',
                'description' => 'Laboratorium untuk praktikum operasi unit dan proses teknik kimia',
                'location' => 'Gedung Departemen Teknik Kimia FTUI, Lantai 2',
                'capacity' => 30,
                'operating_hours' => [
                    'monday' => ['08:00', '17:00'],
                    'tuesday' => ['08:00', '17:00'],
                    'wednesday' => ['08:00', '17:00'],
                    'thursday' => ['08:00', '17:00'],
                    'friday' => ['08:00', '17:00'],
                    'saturday' => ['08:00', '12:00'],
                    'sunday' => null,
                ],
                'contact_phone' => '(021) 7270032',
                'contact_email' => 'lab.operasi@che.ui.ac.id',
                'sop' => 'Standard Operating Procedures untuk keselamatan kerja di laboratorium',
                'rules' => 'Wajib menggunakan APD, dilarang makan/minum, ikuti prosedur keselamatan',
                'is_active' => true,
            ],
            [
                'name' => 'Laboratorium Analisis Instrumental',
                'description' => 'Laboratorium untuk analisis menggunakan instrumen analitik modern',
                'location' => 'Gedung Departemen Teknik Kimia FTUI, Lantai 3',
                'capacity' => 20,
                'operating_hours' => [
                    'monday' => ['08:00', '17:00'],
                    'tuesday' => ['08:00', '17:00'],
                    'wednesday' => ['08:00', '17:00'],
                    'thursday' => ['08:00', '17:00'],
                    'friday' => ['08:00', '17:00'],
                    'saturday' => null,
                    'sunday' => null,
                ],
                'contact_phone' => '(021) 7270033',
                'contact_email' => 'lab.analisis@che.ui.ac.id',
                'sop' => 'Prosedur khusus untuk penggunaan instrumen analitik',
                'rules' => 'Hanya operator terlatih yang boleh mengoperasikan instrumen',
                'is_active' => true,
            ],
            [
                'name' => 'Laboratorium Fisika Kimia',
                'description' => 'Laboratorium untuk eksperimen fisika kimia dan termodinamika',
                'location' => 'Gedung Departemen Teknik Kimia FTUI, Lantai 1',
                'capacity' => 25,
                'operating_hours' => [
                    'monday' => ['08:00', '16:00'],
                    'tuesday' => ['08:00', '16:00'],
                    'wednesday' => ['08:00', '16:00'],
                    'thursday' => ['08:00', '16:00'],
                    'friday' => ['08:00', '16:00'],
                    'saturday' => null,
                    'sunday' => null,
                ],
                'contact_phone' => '(021) 7270034',
                'contact_email' => 'lab.fisika@che.ui.ac.id',
                'sop' => 'Prosedur keselamatan untuk eksperimen fisika kimia',
                'rules' => 'Perhatikan suhu dan tekanan kerja, gunakan pelindung mata',
                'is_active' => true,
            ]
        ];

        foreach ($labs as $labData) {
            $lab = Lab::create($labData);
            
            // Create laboran for each lab
            User::create([
                'name' => 'Laboran ' . $lab->name,
                'email' => 'laboran' . $lab->id . '@che.ui.ac.id',
                'role' => 'laboran',
                'lab_id' => $lab->id,
                'staff_id' => '2024' . str_pad((string)$lab->id, 3, '0', STR_PAD_LEFT),
                'status' => 'active',
                'must_change_password' => false,
                'email_verified_at' => now(),
                'password' => Hash::make('laboran123'),
            ]);

            // Create kepala lab
            User::create([
                'name' => 'Kepala ' . $lab->name,
                'email' => 'kalab' . $lab->id . '@che.ui.ac.id',
                'role' => 'kepala_lab',
                'lab_id' => $lab->id,
                'staff_id' => '1024' . str_pad((string)$lab->id, 3, '0', STR_PAD_LEFT),
                'status' => 'active',
                'must_change_password' => false,
                'email_verified_at' => now(),
                'password' => Hash::make('kalab123'),
            ]);
        }

        // Create admin user
        User::create([
            'name' => 'Administrator ChemLab',
            'email' => 'admin@che.ui.ac.id',
            'role' => 'admin',
            'lab_id' => null,
            'staff_id' => '000001',
            'status' => 'active',
            'must_change_password' => false,
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
        ]);

        // Create sample dosen
        User::create([
            'name' => 'Prof. Dr. Ahmad Dosen',
            'email' => 'ahmad.dosen@che.ui.ac.id',
            'role' => 'dosen',
            'lab_id' => 1,
            'staff_id' => '195001011980031001',
            'status' => 'active',
            'must_change_password' => false,
            'email_verified_at' => now(),
            'password' => Hash::make('dosen123'),
        ]);

        // Create sample mahasiswa
        User::create([
            'name' => 'Budi Mahasiswa',
            'email' => 'budi.mahasiswa@ui.ac.id',
            'role' => 'mahasiswa',
            'lab_id' => 1,
            'student_id' => '2106123456',
            'status' => 'active',
            'must_change_password' => false,
            'email_verified_at' => now(),
            'password' => Hash::make('mahasiswa123'),
        ]);

        // Create unverified mahasiswa
        User::create([
            'name' => 'Siti Belum Verifikasi',
            'email' => 'siti.belum@ui.ac.id',
            'role' => 'mahasiswa',
            'lab_id' => null,
            'student_id' => '2106654321',
            'status' => 'menunggu_verifikasi',
            'must_change_password' => false,
            'email_verified_at' => now(),
            'password' => Hash::make('mahasiswa123'),
        ]);

        // Create equipment for each lab
        $this->createEquipment();

        // Create landing page content
        $this->createLandingPageContent();
    }

    /**
     * Create sample equipment.
     */
    protected function createEquipment(): void
    {
        $labs = Lab::all();

        $equipmentData = [
            // Lab 1 - Operasi Teknik Kimia
            [
                'lab_id' => 1,
                'name' => 'Distillation Column',
                'code' => 'DC-001',
                'category' => 'Separation',
                'description' => 'Kolom distilasi untuk pemisahan campuran liquid',
                'specifications' => [
                    'height' => '2 meters',
                    'diameter' => '15 cm',
                    'material' => 'Stainless Steel 316',
                    'max_temperature' => '200°C',
                    'max_pressure' => '5 bar'
                ],
                'brand' => 'ChemTech',
                'model' => 'DC-2000',
                'serial_number' => 'CT2024001',
                'purchase_year' => 2023,
                'purchase_price' => 150000000.00,
                'condition' => 'excellent',
                'status' => 'available',
                'location' => 'Room 201-A',
                'max_loan_duration' => 7,
                'min_competency_level' => 'intermediate',
                'sop' => 'Prosedur operasi kolom distilasi harus mengikuti safety protocol...',
                'maintenance_schedule' => [
                    'frequency' => 'monthly',
                    'next_date' => '2024-02-15',
                    'type' => 'preventive'
                ],
                'is_active' => true,
            ],
            [
                'lab_id' => 1,
                'name' => 'Heat Exchanger Shell & Tube',
                'code' => 'HE-002',
                'category' => 'Heat Transfer',
                'description' => 'Heat exchanger tipe shell and tube untuk transfer panas',
                'specifications' => [
                    'heat_transfer_area' => '2 m²',
                    'max_temperature' => '150°C',
                    'max_pressure' => '10 bar',
                    'material' => 'Carbon Steel'
                ],
                'brand' => 'Thermotech',
                'model' => 'ST-150',
                'serial_number' => 'TT2023002',
                'purchase_year' => 2022,
                'purchase_price' => 75000000.00,
                'condition' => 'good',
                'status' => 'available',
                'location' => 'Room 201-B',
                'max_loan_duration' => 5,
                'min_competency_level' => 'basic',
                'sop' => 'Pastikan sistem cooling water aktif sebelum operasi...',
                'maintenance_schedule' => [
                    'frequency' => 'quarterly',
                    'next_date' => '2024-03-01',
                    'type' => 'cleaning'
                ],
                'is_active' => true,
            ],
            
            // Lab 2 - Analisis Instrumental
            [
                'lab_id' => 2,
                'name' => 'Gas Chromatography-Mass Spectrometry',
                'code' => 'GCMS-001',
                'category' => 'Analytical',
                'description' => 'GCMS untuk analisis kualitatif dan kuantitatif senyawa organik',
                'specifications' => [
                    'detector' => 'Mass Spectrometer',
                    'column_type' => 'Capillary DB-5',
                    'temperature_range' => '50-350°C',
                    'carrier_gas' => 'Helium',
                    'sensitivity' => 'fg level'
                ],
                'brand' => 'Agilent',
                'model' => '7890B-5977B',
                'serial_number' => 'AG2024001',
                'purchase_year' => 2024,
                'purchase_price' => 2500000000.00,
                'condition' => 'excellent',
                'status' => 'available',
                'location' => 'Room 301-A',
                'max_loan_duration' => 3,
                'min_competency_level' => 'advanced',
                'sop' => 'Hanya operator bersertifikat yang diizinkan mengoperasikan GCMS...',
                'maintenance_schedule' => [
                    'frequency' => 'monthly',
                    'next_date' => '2024-02-10',
                    'type' => 'calibration'
                ],
                'is_active' => true,
            ],
            [
                'lab_id' => 2,
                'name' => 'High Performance Liquid Chromatography',
                'code' => 'HPLC-001',
                'category' => 'Analytical',
                'description' => 'HPLC untuk analisis senyawa yang tidak mudah menguap',
                'specifications' => [
                    'detector' => 'UV-Vis, Fluorescence',
                    'flow_rate' => '0.1-10 mL/min',
                    'pressure_range' => '0-600 bar',
                    'column_types' => 'C18, C8, NH2'
                ],
                'brand' => 'Waters',
                'model' => 'Alliance e2695',
                'serial_number' => 'WT2023001',
                'purchase_year' => 2023,
                'purchase_price' => 800000000.00,
                'condition' => 'excellent',
                'status' => 'available',
                'location' => 'Room 301-B',
                'max_loan_duration' => 5,
                'min_competency_level' => 'intermediate',
                'sop' => 'Pastikan mobile phase sudah disiapkan dan degassing sebelum analisis...',
                'maintenance_schedule' => [
                    'frequency' => 'monthly',
                    'next_date' => '2024-02-20',
                    'type' => 'preventive'
                ],
                'is_active' => true,
            ],
            
            // Lab 3 - Fisika Kimia
            [
                'lab_id' => 3,
                'name' => 'Differential Scanning Calorimeter',
                'code' => 'DSC-001',
                'category' => 'Thermal',
                'description' => 'DSC untuk analisis termal material dan senyawa kimia',
                'specifications' => [
                    'temperature_range' => '-180 to 725°C',
                    'heating_rate' => '0.1-200°C/min',
                    'atmosphere' => 'Nitrogen, Air, Oxygen',
                    'sample_size' => '0.5-20 mg'
                ],
                'brand' => 'PerkinElmer',
                'model' => 'DSC 8500',
                'serial_number' => 'PE2024001',
                'purchase_year' => 2024,
                'purchase_price' => 1200000000.00,
                'condition' => 'excellent',
                'status' => 'available',
                'location' => 'Room 101-A',
                'max_loan_duration' => 3,
                'min_competency_level' => 'advanced',
                'sop' => 'Kalibrasi suhu dan enthalpy sebelum penggunaan...',
                'maintenance_schedule' => [
                    'frequency' => 'quarterly',
                    'next_date' => '2024-04-01',
                    'type' => 'calibration'
                ],
                'is_active' => true,
            ],
            [
                'lab_id' => 3,
                'name' => 'Rheometer',
                'code' => 'RH-001',
                'category' => 'Rheology',
                'description' => 'Rheometer untuk pengukuran sifat reologi material',
                'specifications' => [
                    'torque_range' => '0.1 μNm - 200 mNm',
                    'temperature_range' => '-40 to 200°C',
                    'geometry' => 'Cone-plate, Parallel-plate',
                    'frequency_range' => '10⁻⁶ to 100 Hz'
                ],
                'brand' => 'Anton Paar',
                'model' => 'MCR 302',
                'serial_number' => 'AP2023001',
                'purchase_year' => 2023,
                'purchase_price' => 900000000.00,
                'condition' => 'good',
                'status' => 'available',
                'location' => 'Room 101-B',
                'max_loan_duration' => 7,
                'min_competency_level' => 'intermediate',
                'sop' => 'Periksa geometry dan gap setting sebelum pengukuran...',
                'maintenance_schedule' => [
                    'frequency' => 'monthly',
                    'next_date' => '2024-02-25',
                    'type' => 'cleaning'
                ],
                'is_active' => true,
            ]
        ];

        foreach ($equipmentData as $equipment) {
            Equipment::create($equipment);
        }
    }

    /**
     * Create landing page content.
     */
    protected function createLandingPageContent(): void
    {
        $admin = User::where('role', 'admin')->first();

        $contents = [
            [
                'key' => 'hero_title',
                'title' => 'Hero Title',
                'content' => 'ChemLab Deptekim - Sistem Manajemen Laboratorium Modern',
                'updated_by' => $admin->id,
            ],
            [
                'key' => 'hero_subtitle',
                'title' => 'Hero Subtitle',
                'content' => 'Platform terintegrasi untuk peminjaman alat, manajemen inventaris, dan operasional laboratorium Departemen Teknik Kimia FTUI',
                'updated_by' => $admin->id,
            ],
            [
                'key' => 'about_description',
                'title' => 'About Description',
                'content' => 'ChemLab Deptekim adalah sistem manajemen laboratorium berbasis web yang dirancang khusus untuk mendukung kegiatan pendidikan dan penelitian di Departemen Teknik Kimia FTUI. Sistem ini menyediakan solusi terintegrasi untuk peminjaman dan pengembalian alat laboratorium, manajemen inventaris, penjadwalan, pemeliharaan, dan pelaporan.',
                'updated_by' => $admin->id,
            ],
            [
                'key' => 'contact_info',
                'title' => 'Contact Information',
                'content' => 'Departemen Teknik Kimia FTUI\nKampus UI Depok, Jawa Barat 16424\nTelepon: (021) 7270032\nEmail: chemlab@che.ui.ac.id',
                'updated_by' => $admin->id,
            ]
        ];

        foreach ($contents as $content) {
            LandingPageContent::create($content);
        }
    }
}