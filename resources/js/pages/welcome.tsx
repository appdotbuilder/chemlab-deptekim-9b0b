import React from 'react';
import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

interface Props {
    stats?: {
        total_equipment: number;
        available_equipment: number;
        total_labs: number;
        active_loans: number;
    };
    recentEquipment?: Array<{
        id: number;
        name: string;
        category: string;
        status: string;
        lab: {
            name: string;
        };
    }>;
    labs?: Array<{
        id: number;
        name: string;
        location: string;
    }>;
    landingContent?: Record<string, string>;
    [key: string]: unknown;
}

export default function Welcome({ stats, recentEquipment }: Props) {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="ChemLab Deptekim - Sistem Manajemen Laboratorium">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-blue-900">
                {/* Header */}
                <header className="relative z-10 bg-white/90 backdrop-blur-sm border-b border-gray-200 dark:bg-gray-900/90 dark:border-gray-700">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="flex justify-between items-center py-4">
                            <div className="flex items-center space-x-3">
                                <div className="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center">
                                    <span className="text-white font-bold text-lg">🧪</span>
                                </div>
                                <div>
                                    <h1 className="text-xl font-bold text-gray-900 dark:text-white">ChemLab Deptekim</h1>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">Departemen Teknik Kimia FTUI</p>
                                </div>
                            </div>
                            <nav className="flex items-center space-x-4">
                                {auth.user ? (
                                    <Link
                                        href={route('dashboard')}
                                        className="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium"
                                    >
                                        Dashboard
                                    </Link>
                                ) : (
                                    <div className="flex items-center space-x-3">
                                        <Link
                                            href={route('login')}
                                            className="text-gray-700 hover:text-blue-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors dark:text-gray-300 dark:hover:text-blue-400 dark:hover:bg-gray-700"
                                        >
                                            Masuk
                                        </Link>
                                        <Link
                                            href={route('register')}
                                            className="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium"
                                        >
                                            Daftar Mahasiswa
                                        </Link>
                                    </div>
                                )}
                            </nav>
                        </div>
                    </div>
                </header>

                {/* Hero Section */}
                <section className="relative py-20 px-4 sm:px-6 lg:px-8">
                    <div className="max-w-7xl mx-auto">
                        <div className="text-center">
                            <div className="inline-flex items-center space-x-2 bg-blue-100 text-blue-800 px-4 py-2 rounded-full mb-8 dark:bg-blue-900 dark:text-blue-200">
                                <span>🔬</span>
                                <span className="font-medium">Sistem Terintegrasi Laboratorium</span>
                            </div>
                            <h1 className="text-4xl sm:text-6xl font-bold text-gray-900 mb-6 dark:text-white">
                                <span className="block">Kelola Lab</span>
                                <span className="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                                    Lebih Efisien
                                </span>
                            </h1>
                            <p className="text-xl text-gray-600 mb-12 max-w-3xl mx-auto dark:text-gray-300">
                                Platform terintegrasi untuk peminjaman & pengembalian alat laboratorium, 
                                manajemen inventaris, penjadwalan, dan pelaporan untuk Departemen Teknik Kimia FTUI.
                            </p>
                            
                            {/* CTA Buttons */}
                            <div className="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                                {auth.user ? (
                                    <Link
                                        href={route('dashboard')}
                                        className="bg-blue-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-blue-700 transition-colors inline-flex items-center justify-center space-x-2"
                                    >
                                        <span>📊</span>
                                        <span>Buka Dashboard</span>
                                    </Link>
                                ) : (
                                    <>
                                        <Link
                                            href={route('login')}
                                            className="bg-blue-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-blue-700 transition-colors inline-flex items-center justify-center space-x-2"
                                        >
                                            <span>🔑</span>
                                            <span>Masuk Sistem</span>
                                        </Link>
                                        <Link
                                            href={route('register')}
                                            className="bg-white text-blue-600 border-2 border-blue-600 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-blue-50 transition-colors inline-flex items-center justify-center space-x-2 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-400 dark:hover:bg-gray-700"
                                        >
                                            <span>👨‍🎓</span>
                                            <span>Daftar Mahasiswa</span>
                                        </Link>
                                    </>
                                )}
                            </div>
                        </div>

                        {/* Stats Grid */}
                        {stats && (
                            <div className="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                                <div className="bg-white/80 backdrop-blur-sm rounded-xl p-6 text-center border border-gray-200 dark:bg-gray-800/80 dark:border-gray-700">
                                    <div className="text-3xl font-bold text-blue-600 mb-2">{stats.total_equipment}</div>
                                    <div className="text-gray-600 font-medium dark:text-gray-400">Total Alat</div>
                                </div>
                                <div className="bg-white/80 backdrop-blur-sm rounded-xl p-6 text-center border border-gray-200 dark:bg-gray-800/80 dark:border-gray-700">
                                    <div className="text-3xl font-bold text-green-600 mb-2">{stats.available_equipment}</div>
                                    <div className="text-gray-600 font-medium dark:text-gray-400">Tersedia</div>
                                </div>
                                <div className="bg-white/80 backdrop-blur-sm rounded-xl p-6 text-center border border-gray-200 dark:bg-gray-800/80 dark:border-gray-700">
                                    <div className="text-3xl font-bold text-purple-600 mb-2">{stats.total_labs}</div>
                                    <div className="text-gray-600 font-medium dark:text-gray-400">Lab Aktif</div>
                                </div>
                                <div className="bg-white/80 backdrop-blur-sm rounded-xl p-6 text-center border border-gray-200 dark:bg-gray-800/80 dark:border-gray-700">
                                    <div className="text-3xl font-bold text-orange-600 mb-2">{stats.active_loans}</div>
                                    <div className="text-gray-600 font-medium dark:text-gray-400">Peminjaman Aktif</div>
                                </div>
                            </div>
                        )}
                    </div>
                </section>

                {/* Features Grid */}
                <section className="py-16 px-4 sm:px-6 lg:px-8 bg-white/50 dark:bg-gray-900/50">
                    <div className="max-w-7xl mx-auto">
                        <div className="text-center mb-12">
                            <h2 className="text-3xl font-bold text-gray-900 mb-4 dark:text-white">Fitur Unggulan</h2>
                            <p className="text-gray-600 dark:text-gray-400">Semua yang Anda butuhkan untuk mengelola laboratorium modern</p>
                        </div>
                        
                        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                            <div className="bg-white rounded-xl p-6 shadow-lg border border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                                <div className="text-4xl mb-4">📋</div>
                                <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">Peminjaman Digital</h3>
                                <p className="text-gray-600 dark:text-gray-400">
                                    Sistem pengajuan peminjaman online dengan approval workflow dan upload JSA
                                </p>
                            </div>
                            
                            <div className="bg-white rounded-xl p-6 shadow-lg border border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                                <div className="text-4xl mb-4">📦</div>
                                <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">Manajemen Inventaris</h3>
                                <p className="text-gray-600 dark:text-gray-400">
                                    Katalog alat lengkap dengan spesifikasi, status, dan riwayat pemeliharaan
                                </p>
                            </div>
                            
                            <div className="bg-white rounded-xl p-6 shadow-lg border border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                                <div className="text-4xl mb-4">👥</div>
                                <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">Role-Based Access</h3>
                                <p className="text-gray-600 dark:text-gray-400">
                                    Kontrol akses berbasis peran: Admin, Laboran, Dosen, dan Mahasiswa
                                </p>
                            </div>
                            
                            <div className="bg-white rounded-xl p-6 shadow-lg border border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                                <div className="text-4xl mb-4">📅</div>
                                <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">Penjadwalan Real-time</h3>
                                <p className="text-gray-600 dark:text-gray-400">
                                    Kalender ketersediaan alat dan sistem reservasi terintegrasi
                                </p>
                            </div>
                            
                            <div className="bg-white rounded-xl p-6 shadow-lg border border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                                <div className="text-4xl mb-4">🔧</div>
                                <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">Maintenance Tracking</h3>
                                <p className="text-gray-600 dark:text-gray-400">
                                    Jadwal pemeliharaan otomatis dan tracking riwayat perawatan alat
                                </p>
                            </div>
                            
                            <div className="bg-white rounded-xl p-6 shadow-lg border border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                                <div className="text-4xl mb-4">📊</div>
                                <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">Laporan & Analytics</h3>
                                <p className="text-gray-600 dark:text-gray-400">
                                    Dashboard analytics dan laporan utilisasi dengan ekspor Excel/PDF
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                {/* Recent Equipment */}
                {recentEquipment && recentEquipment.length > 0 && (
                    <section className="py-16 px-4 sm:px-6 lg:px-8">
                        <div className="max-w-7xl mx-auto">
                            <div className="text-center mb-12">
                                <h2 className="text-3xl font-bold text-gray-900 mb-4 dark:text-white">Alat Tersedia</h2>
                                <p className="text-gray-600 dark:text-gray-400">Peralatan laboratorium yang dapat dipinjam</p>
                            </div>
                            
                            <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                                {recentEquipment.map((equipment) => (
                                    <div key={equipment.id} className="bg-white rounded-xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow dark:bg-gray-800 dark:border-gray-700">
                                        <div className="flex justify-between items-start mb-4">
                                            <span className="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full dark:bg-green-900 dark:text-green-200">
                                                {equipment.status}
                                            </span>
                                            <span className="text-gray-500 text-sm dark:text-gray-400">{equipment.category}</span>
                                        </div>
                                        <h3 className="font-bold text-lg mb-2 text-gray-900 dark:text-white">{equipment.name}</h3>
                                        <p className="text-gray-600 text-sm dark:text-gray-400">
                                            📍 {equipment.lab.name}
                                        </p>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </section>
                )}

                {/* Footer */}
                <footer className="bg-gray-900 text-white py-12 px-4 sm:px-6 lg:px-8">
                    <div className="max-w-7xl mx-auto text-center">
                        <div className="mb-8">
                            <div className="flex items-center justify-center space-x-3 mb-4">
                                <div className="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                                    <span className="text-white font-bold">🧪</span>
                                </div>
                                <span className="text-xl font-bold">ChemLab Deptekim</span>
                            </div>
                            <p className="text-gray-400">
                                Sistem Manajemen Laboratorium Terintegrasi<br />
                                Departemen Teknik Kimia, Fakultas Teknik, Universitas Indonesia
                            </p>
                        </div>
                        
                        <div className="flex flex-wrap justify-center gap-6 text-sm text-gray-400">
                            <span>📧 chemlab@che.ui.ac.id</span>
                            <span>📞 (021) 7270032</span>
                            <span>📍 Kampus UI Depok, Jawa Barat 16424</span>
                        </div>
                        
                        <div className="mt-8 pt-8 border-t border-gray-800 text-sm text-gray-400">
                            © 2024 ChemLab Deptekim. All rights reserved.
                        </div>
                    </div>
                </footer>
            </div>
        </>
    );
}