import { Link } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard() {
    const modules = [
        {
            title: 'Produksi Harian',
            description: 'Catat dan kelola data produksi telur harian',
            icon: '📊',
            href: '/production',
            color: 'bg-blue-50 border-blue-200 hover:bg-blue-100'
        },
        {
            title: 'Kesehatan Ayam',
            description: 'Kelola vaksinasi dan kesehatan ternak',
            icon: '🏥',
            href: '/health',
            color: 'bg-red-50 border-red-200 hover:bg-red-100'
        },
        {
            title: 'Manajemen Pakan',
            description: 'Monitor stok dan konsumsi pakan',
            icon: '🌾',
            href: '/feed',
            color: 'bg-yellow-50 border-yellow-200 hover:bg-yellow-100'
        },
        {
            title: 'Penjualan',
            description: 'Catat transaksi dan track pembayaran',
            icon: '💼',
            href: '/sales',
            color: 'bg-green-50 border-green-200 hover:bg-green-100'
        },
        {
            title: 'Pelanggan',
            description: 'Database dan riwayat pelanggan',
            icon: '👥',
            href: '/customers',
            color: 'bg-purple-50 border-purple-200 hover:bg-purple-100'
        },
        {
            title: 'Laporan',
            description: 'Analisa kinerja dan keuangan',
            icon: '📈',
            href: '/reports',
            color: 'bg-indigo-50 border-indigo-200 hover:bg-indigo-100'
        }
    ];

    const quickStats = [
        { label: 'Telur Hari Ini', value: '245', icon: '🥚', change: '+12%' },
        { label: 'Penjualan Bulan Ini', value: 'Rp 2.45M', icon: '💰', change: '+8%' },
        { label: 'Total Ayam Sehat', value: '850', icon: '🐓', change: '0%' },
    ];

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-6 p-6">
                {/* Welcome Header */}
                <div className="bg-gradient-to-r from-green-600 to-blue-600 rounded-xl p-6 text-white">
                    <h1 className="text-3xl font-bold mb-2">🐔 Selamat Datang di ChickenFarm Pro</h1>
                    <p className="text-green-100">Kelola peternakan ayam Anda dengan lebih efisien dan terorganisir</p>
                </div>

                {/* Quick Stats */}
                <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                    {quickStats.map((stat, index) => (
                        <div key={index} className="bg-white rounded-xl p-6 border shadow-sm">
                            <div className="flex items-center justify-between">
                                <div>
                                    <p className="text-sm text-gray-600">{stat.label}</p>
                                    <p className="text-2xl font-bold text-gray-900">{stat.value}</p>
                                    <p className="text-sm text-green-600">{stat.change}</p>
                                </div>
                                <div className="text-3xl">{stat.icon}</div>
                            </div>
                        </div>
                    ))}
                </div>

                {/* Farm Management Modules */}
                <div>
                    <h2 className="text-xl font-semibold text-gray-900 mb-4">Modul Manajemen Peternakan</h2>
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {modules.map((module, index) => (
                            <Link
                                key={index}
                                href={module.href}
                                className={`block p-6 rounded-xl border-2 transition-all duration-200 ${module.color}`}
                            >
                                <div className="flex items-start space-x-4">
                                    <div className="text-3xl">{module.icon}</div>
                                    <div>
                                        <h3 className="font-semibold text-gray-900 mb-2">{module.title}</h3>
                                        <p className="text-sm text-gray-600">{module.description}</p>
                                    </div>
                                </div>
                            </Link>
                        ))}
                    </div>
                </div>

                {/* Recent Activity */}
                <div className="bg-white rounded-xl p-6 border">
                    <h3 className="text-lg font-semibold text-gray-900 mb-4">📋 Aktivitas Terbaru</h3>
                    <div className="space-y-3">
                        <div className="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div className="flex items-center space-x-3">
                                <span className="text-blue-500">📊</span>
                                <span className="text-sm text-gray-700">Produksi telur hari ini: 245 butir</span>
                            </div>
                            <span className="text-xs text-gray-500">2 jam lalu</span>
                        </div>
                        <div className="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div className="flex items-center space-x-3">
                                <span className="text-green-500">💼</span>
                                <span className="text-sm text-gray-700">Penjualan baru: 50 telur ke Toko Sari</span>
                            </div>
                            <span className="text-xs text-gray-500">4 jam lalu</span>
                        </div>
                        <div className="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div className="flex items-center space-x-3">
                                <span className="text-yellow-500">⚠️</span>
                                <span className="text-sm text-gray-700">Stok pakan Layer rendah: 85kg tersisa</span>
                            </div>
                            <span className="text-xs text-gray-500">6 jam lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}