import React from 'react';
import { usePage } from '@inertiajs/react';
import AppLayout from '@/components/app-layout';
import { type BreadcrumbItem, type SharedData } from '@/types';
import { Head } from '@inertiajs/react';

interface Props {
    notifications?: Array<{
        id: number;
        title: string;
        message: string;
        type: string;
        created_at: string;
    }>;
    myActiveLoans?: Array<{
        id: number;
        loan_number: string;
        status: string;
        equipment: {
            name: string;
            lab: {
                name: string;
            };
        };
        requested_end: string;
    }>;
    totalUsers?: number;
    pendingVerifications?: number;
    totalEquipment?: number;
    totalLoans?: number;
    activeLoans?: number;
    overdueLoans?: number;
    pendingPasswordTickets?: number;
    pendingApprovals?: number;
    availableEquipment?: number;
    maintenanceEquipment?: number;
    completedLoans?: number;
    recentEquipment?: Array<{
        id: number;
        name: string;
        category: string;
        lab: {
            name: string;
        };
    }>;
    [key: string]: unknown;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard({
    notifications = [],
    myActiveLoans = [],
    totalUsers,
    pendingVerifications,
    totalEquipment,
    activeLoans,
    pendingApprovals,
    availableEquipment,
    maintenanceEquipment,
    completedLoans,
    recentEquipment = []
}: Props) {
    const { auth } = usePage<SharedData>().props;
    const user = auth.user;

    const getGreeting = () => {
        const hour = new Date().getHours();
        if (hour < 12) return 'Selamat Pagi';
        if (hour < 15) return 'Selamat Siang';
        if (hour < 18) return 'Selamat Sore';
        return 'Selamat Malam';
    };

    const getRoleDisplayName = (role: string | undefined) => {
        if (!role) return '';
        
        const roleNames = {
            admin: 'Administrator',
            kepala_lab: 'Kepala Laboratorium',
            laboran: 'Laboran',
            dosen: 'Dosen',
            mahasiswa: 'Mahasiswa'
        };
        return roleNames[role as keyof typeof roleNames] || role;
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="p-6 space-y-6">
                {/* Welcome Header */}
                <div className="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl p-6 text-white">
                    <h1 className="text-2xl font-bold mb-2">
                        {getGreeting()}, {user?.name}! 👋
                    </h1>
                    <p className="text-blue-100">
                        {getRoleDisplayName(user?.role as string)} - ChemLab Deptekim
                    </p>
                    {user?.status === 'menunggu_verifikasi' && (
                        <div className="mt-4 bg-yellow-500/20 border border-yellow-400/30 rounded-lg p-3">
                            <p className="text-yellow-100 text-sm">
                                ⚠️ Akun Anda masih menunggu verifikasi. Hubungi admin/laboran untuk aktivasi.
                            </p>
                        </div>
                    )}
                </div>

                {/* Quick Stats Grid */}
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    {/* Admin Stats */}
                    {user?.role === 'admin' && (
                        <>
                            <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-gray-600 text-sm dark:text-gray-400">Total Pengguna</p>
                                        <p className="text-2xl font-bold text-gray-900 dark:text-white">{totalUsers}</p>
                                    </div>
                                    <div className="text-blue-500 text-2xl">👥</div>
                                </div>
                            </div>
                            <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-gray-600 text-sm dark:text-gray-400">Menunggu Verifikasi</p>
                                        <p className="text-2xl font-bold text-yellow-600">{pendingVerifications}</p>
                                    </div>
                                    <div className="text-yellow-500 text-2xl">⏳</div>
                                </div>
                            </div>
                            <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                                <div>
                                    <p className="text-gray-600 text-sm dark:text-gray-400">Total Alat</p>
                                    <p className="text-2xl font-bold text-gray-900 dark:text-white">{totalEquipment}</p>
                                </div>
                                <div className="text-green-500 text-2xl">🔬</div>
                            </div>
                            <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-gray-600 text-sm dark:text-gray-400">Peminjaman Aktif</p>
                                        <p className="text-2xl font-bold text-blue-600">{activeLoans}</p>
                                    </div>
                                    <div className="text-blue-500 text-2xl">📋</div>
                                </div>
                            </div>
                        </>
                    )}

                    {/* Laboran Stats */}
                    {user?.role === 'laboran' && (
                        <>
                            <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-gray-600 text-sm dark:text-gray-400">Perlu Persetujuan</p>
                                        <p className="text-2xl font-bold text-red-600">{pendingApprovals}</p>
                                    </div>
                                    <div className="text-red-500 text-2xl">⚡</div>
                                </div>
                            </div>
                            <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-gray-600 text-sm dark:text-gray-400">Alat Tersedia</p>
                                        <p className="text-2xl font-bold text-green-600">{availableEquipment}</p>
                                    </div>
                                    <div className="text-green-500 text-2xl">✅</div>
                                </div>
                            </div>
                            <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-gray-600 text-sm dark:text-gray-400">Dalam Maintenance</p>
                                        <p className="text-2xl font-bold text-yellow-600">{maintenanceEquipment}</p>
                                    </div>
                                    <div className="text-yellow-500 text-2xl">🔧</div>
                                </div>
                            </div>
                        </>
                    )}

                    {/* Student/Dosen Stats */}
                    {(user?.role === 'mahasiswa' || user?.role === 'dosen') && (
                        <>
                            <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-gray-600 text-sm dark:text-gray-400">Peminjaman Aktif</p>
                                        <p className="text-2xl font-bold text-blue-600">{myActiveLoans.length}</p>
                                    </div>
                                    <div className="text-blue-500 text-2xl">📋</div>
                                </div>
                            </div>
                            <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-gray-600 text-sm dark:text-gray-400">Total Selesai</p>
                                        <p className="text-2xl font-bold text-green-600">{completedLoans}</p>
                                    </div>
                                    <div className="text-green-500 text-2xl">✅</div>
                                </div>
                            </div>
                            <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <p className="text-gray-600 text-sm dark:text-gray-400">Alat Tersedia</p>
                                        <p className="text-2xl font-bold text-gray-900 dark:text-white">{availableEquipment}</p>
                                    </div>
                                    <div className="text-gray-500 text-2xl">🔬</div>
                                </div>
                            </div>
                        </>
                    )}
                </div>

                <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {/* Active Loans */}
                    {myActiveLoans.length > 0 && (
                        <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                            <h3 className="text-lg font-semibold mb-4 text-gray-900 dark:text-white">
                                📋 Peminjaman Aktif
                            </h3>
                            <div className="space-y-3">
                                {myActiveLoans.map((loan) => (
                                    <div key={loan.id} className="border rounded-lg p-3 dark:border-gray-700">
                                        <div className="flex justify-between items-start mb-2">
                                            <h4 className="font-medium text-gray-900 dark:text-white">
                                                {loan.equipment.name}
                                            </h4>
                                            <span className={`px-2 py-1 rounded text-xs font-medium ${
                                                loan.status === 'disetujui_laboran' 
                                                    ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200'
                                                    : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                            }`}>
                                                {loan.status === 'disetujui_laboran' ? 'Disetujui' : 'Diambil'}
                                            </span>
                                        </div>
                                        <p className="text-sm text-gray-600 dark:text-gray-400">
                                            📍 {loan.equipment.lab.name}
                                        </p>
                                        <p className="text-sm text-gray-600 dark:text-gray-400">
                                            🕐 Kembali: {new Date(loan.requested_end).toLocaleDateString('id-ID')}
                                        </p>
                                    </div>
                                ))}
                            </div>
                        </div>
                    )}

                    {/* Recent Notifications */}
                    <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                        <h3 className="text-lg font-semibold mb-4 text-gray-900 dark:text-white">
                            🔔 Notifikasi Terbaru
                        </h3>
                        {notifications.length > 0 ? (
                            <div className="space-y-3">
                                {notifications.map((notification) => (
                                    <div key={notification.id} className="border rounded-lg p-3 dark:border-gray-700">
                                        <h4 className="font-medium text-gray-900 dark:text-white mb-1">
                                            {notification.title}
                                        </h4>
                                        <p className="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                            {notification.message}
                                        </p>
                                        <p className="text-xs text-gray-500 dark:text-gray-500">
                                            {new Date(notification.created_at).toLocaleDateString('id-ID')}
                                        </p>
                                    </div>
                                ))}
                            </div>
                        ) : (
                            <p className="text-gray-500 text-center py-4 dark:text-gray-400">
                                Tidak ada notifikasi baru
                            </p>
                        )}
                    </div>
                </div>

                {/* Recent Equipment for Students/Dosen */}
                {(user?.role === 'mahasiswa' || user?.role === 'dosen') && recentEquipment.length > 0 && (
                    <div className="bg-white rounded-xl p-6 shadow-sm border dark:bg-gray-800">
                        <h3 className="text-lg font-semibold mb-4 text-gray-900 dark:text-white">
                            🔬 Alat Tersedia
                        </h3>
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            {recentEquipment.map((equipment) => (
                                <div key={equipment.id} className="border rounded-lg p-4 hover:bg-gray-50 transition-colors dark:border-gray-700 dark:hover:bg-gray-700">
                                    <h4 className="font-medium text-gray-900 dark:text-white mb-2">
                                        {equipment.name}
                                    </h4>
                                    <p className="text-sm text-gray-600 dark:text-gray-400 mb-1">
                                        📂 {equipment.category}
                                    </p>
                                    <p className="text-sm text-gray-600 dark:text-gray-400">
                                        📍 {equipment.lab.name}
                                    </p>
                                </div>
                            ))}
                        </div>
                    </div>
                )}
            </div>
        </AppLayout>
    );
}