import React from 'react';
import { Link } from '@inertiajs/react';

interface Sale {
    id: number;
    sale_date: string;
    quantity_eggs: number;
    total_amount: string;
    customer?: {
        name: string;
    };
}

interface HealthAlert {
    id: number;
    next_due_date: string;
    type: string;
    treatment_name: string;
    chicken: {
        breed: string;
    };
}

interface Stats {
    todayEggs: number;
    weeklyEggs: number;
    monthlySales: string;
    totalChickens: number;
    totalCustomers: number;
    lowStockAlerts: number;
}

interface Props {
    stats: Stats;
    recentSales: Sale[];
    healthAlerts: HealthAlert[];
    [key: string]: unknown;
}

export default function Welcome({ stats, recentSales, healthAlerts }: Props) {
    const formatCurrency = (amount: string | number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        }).format(typeof amount === 'string' ? parseFloat(amount) : amount);
    };

    const formatDate = (dateString: string) => {
        return new Date(dateString).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'short',
            year: 'numeric',
        });
    };

    return (
        <div className="min-h-screen bg-gradient-to-br from-green-50 to-blue-50">
            {/* Header */}
            <header className="bg-white shadow-sm border-b">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center py-6">
                        <div className="flex items-center space-x-3">
                            <div className="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                                <span className="text-2xl">🐔</span>
                            </div>
                            <div>
                                <h1 className="text-2xl font-bold text-gray-900">ChickenFarm Pro</h1>
                                <p className="text-sm text-gray-600">Sistem Manajemen Peternakan Ayur</p>
                            </div>
                        </div>
                        <div className="flex space-x-3">
                            <Link
                                href="/login"
                                className="px-4 py-2 text-green-600 hover:text-green-700 font-medium transition-colors"
                            >
                                Masuk
                            </Link>
                            <Link
                                href="/register"
                                className="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors shadow-sm"
                            >
                                Daftar Gratis
                            </Link>
                        </div>
                    </div>
                </div>
            </header>

            {/* Hero Section */}
            <section className="py-12">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-12">
                        <h2 className="text-4xl font-bold text-gray-900 mb-4">
                            🥚 Kelola Peternakan Ayam dengan Mudah
                        </h2>
                        <p className="text-xl text-gray-600 max-w-3xl mx-auto">
                            Sistem lengkap untuk mengelola produksi telur harian, kesehatan ayam, stok pakan, 
                            penjualan, dan data pelanggan dalam satu platform modern.
                        </p>
                    </div>

                    {/* Stats Overview */}
                    <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 mb-12">
                        <div className="bg-white rounded-xl p-6 shadow-sm border text-center">
                            <div className="text-3xl mb-2">📊</div>
                            <div className="text-2xl font-bold text-gray-900">{stats.todayEggs}</div>
                            <div className="text-sm text-gray-600">Telur Hari Ini</div>
                        </div>
                        <div className="bg-white rounded-xl p-6 shadow-sm border text-center">
                            <div className="text-3xl mb-2">🗓️</div>
                            <div className="text-2xl font-bold text-gray-900">{stats.weeklyEggs}</div>
                            <div className="text-sm text-gray-600">Telur Minggu Ini</div>
                        </div>
                        <div className="bg-white rounded-xl p-6 shadow-sm border text-center">
                            <div className="text-3xl mb-2">💰</div>
                            <div className="text-lg font-bold text-gray-900">{formatCurrency(stats.monthlySales)}</div>
                            <div className="text-sm text-gray-600">Penjualan Bulan Ini</div>
                        </div>
                        <div className="bg-white rounded-xl p-6 shadow-sm border text-center">
                            <div className="text-3xl mb-2">🐓</div>
                            <div className="text-2xl font-bold text-gray-900">{stats.totalChickens}</div>
                            <div className="text-sm text-gray-600">Total Ayam</div>
                        </div>
                        <div className="bg-white rounded-xl p-6 shadow-sm border text-center">
                            <div className="text-3xl mb-2">👥</div>
                            <div className="text-2xl font-bold text-gray-900">{stats.totalCustomers}</div>
                            <div className="text-sm text-gray-600">Pelanggan</div>
                        </div>
                        <div className="bg-white rounded-xl p-6 shadow-sm border text-center">
                            <div className="text-3xl mb-2">⚠️</div>
                            <div className="text-2xl font-bold text-red-600">{stats.lowStockAlerts}</div>
                            <div className="text-sm text-gray-600">Alert Pakan</div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Features Section */}
            <section className="py-12 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-12">
                        <h3 className="text-3xl font-bold text-gray-900 mb-4">Fitur Lengkap untuk Peternakan Modern</h3>
                        <p className="text-lg text-gray-600">Semua yang Anda butuhkan untuk mengelola peternakan ayam dengan efisien</p>
                    </div>
                    
                    <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div className="text-center p-6">
                            <div className="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span className="text-3xl">📝</span>
                            </div>
                            <h4 className="text-xl font-semibold text-gray-900 mb-2">Produksi Harian</h4>
                            <p className="text-gray-600">Catat produksi telur harian, kualitas telur, dan tingkat kematian dengan mudah</p>
                        </div>
                        
                        <div className="text-center p-6">
                            <div className="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span className="text-3xl">🏥</span>
                            </div>
                            <h4 className="text-xl font-semibold text-gray-900 mb-2">Kesehatan Ayam</h4>
                            <p className="text-gray-600">Kelola vaksinasi, pengobatan, dan jadwal perawatan kesehatan ayam</p>
                        </div>
                        
                        <div className="text-center p-6">
                            <div className="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span className="text-3xl">🌾</span>
                            </div>
                            <h4 className="text-xl font-semibold text-gray-900 mb-2">Manajemen Pakan</h4>
                            <p className="text-gray-600">Pantau stok pakan, catat pembelian dan penggunaan, dengan alert otomatis</p>
                        </div>
                        
                        <div className="text-center p-6">
                            <div className="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span className="text-3xl">💼</span>
                            </div>
                            <h4 className="text-xl font-semibold text-gray-900 mb-2">Penjualan</h4>
                            <p className="text-gray-600">Catat transaksi penjualan, track pembayaran, dan analisa performa</p>
                        </div>
                        
                        <div className="text-center p-6">
                            <div className="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span className="text-3xl">👥</span>
                            </div>
                            <h4 className="text-xl font-semibold text-gray-900 mb-2">Database Pelanggan</h4>
                            <p className="text-gray-600">Kelola informasi pelanggan, riwayat pembelian, dan preferensi</p>
                        </div>
                        
                        <div className="text-center p-6">
                            <div className="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span className="text-3xl">📊</span>
                            </div>
                            <h4 className="text-xl font-semibold text-gray-900 mb-2">Laporan & Analisa</h4>
                            <p className="text-gray-600">Dashboard komprehensif dengan grafik dan laporan keuangan</p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Recent Activity */}
            <section className="py-12 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid lg:grid-cols-2 gap-8">
                        {/* Recent Sales */}
                        <div className="bg-white rounded-xl shadow-sm border p-6">
                            <div className="flex items-center justify-between mb-4">
                                <h4 className="text-lg font-semibold text-gray-900">🛒 Penjualan Terbaru</h4>
                                <Link href="/sales" className="text-green-600 hover:text-green-700 text-sm font-medium">
                                    Lihat Semua
                                </Link>
                            </div>
                            <div className="space-y-3">
                                {recentSales.length > 0 ? recentSales.map((sale) => (
                                    <div key={sale.id} className="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                        <div>
                                            <div className="font-medium text-gray-900">
                                                {sale.customer?.name || 'Pelanggan Walk-in'}
                                            </div>
                                            <div className="text-sm text-gray-600">
                                                {sale.quantity_eggs} telur • {formatDate(sale.sale_date)}
                                            </div>
                                        </div>
                                        <div className="font-semibold text-green-600">
                                            {formatCurrency(sale.total_amount)}
                                        </div>
                                    </div>
                                )) : (
                                    <p className="text-gray-500 text-center py-4">Belum ada penjualan hari ini</p>
                                )}
                            </div>
                        </div>

                        {/* Health Alerts */}
                        <div className="bg-white rounded-xl shadow-sm border p-6">
                            <div className="flex items-center justify-between mb-4">
                                <h4 className="text-lg font-semibold text-gray-900">🏥 Jadwal Kesehatan</h4>
                                <Link href="/health" className="text-green-600 hover:text-green-700 text-sm font-medium">
                                    Lihat Semua
                                </Link>
                            </div>
                            <div className="space-y-3">
                                {healthAlerts.length > 0 ? healthAlerts.map((alert) => (
                                    <div key={alert.id} className="flex justify-between items-center p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <div>
                                            <div className="font-medium text-gray-900">
                                                {alert.treatment_name}
                                            </div>
                                            <div className="text-sm text-gray-600">
                                                {alert.chicken.breed} • {alert.type}
                                            </div>
                                        </div>
                                        <div className="text-sm font-medium text-yellow-700">
                                            {formatDate(alert.next_due_date)}
                                        </div>
                                    </div>
                                )) : (
                                    <p className="text-gray-500 text-center py-4">Tidak ada jadwal kesehatan mendatang</p>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* CTA Section */}
            <section className="py-16 bg-green-600">
                <div className="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                    <h3 className="text-3xl font-bold text-white mb-4">
                        Siap Memulai Digitalisasi Peternakan Anda?
                    </h3>
                    <p className="text-xl text-green-100 mb-8">
                        Bergabunglah dengan ribuan peternak yang telah meningkatkan produktivitas dengan ChickenFarm Pro
                    </p>
                    <div className="flex flex-col sm:flex-row gap-4 justify-center">
                        <Link
                            href="/register"
                            className="px-8 py-3 bg-white text-green-600 rounded-lg font-semibold hover:bg-gray-50 transition-colors shadow-lg"
                        >
                            🚀 Mulai Gratis Sekarang
                        </Link>
                        <Link
                            href="/login"
                            className="px-8 py-3 border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-green-600 transition-colors"
                        >
                            Masuk ke Akun
                        </Link>
                    </div>
                </div>
            </section>

            {/* Footer */}
            <footer className="bg-gray-900 text-white py-8">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center">
                        <div className="flex items-center justify-center space-x-2 mb-4">
                            <span className="text-2xl">🐔</span>
                            <span className="text-xl font-bold">ChickenFarm Pro</span>
                        </div>
                        <p className="text-gray-400 mb-4">
                            Solusi terpadu untuk manajemen peternakan ayar modern
                        </p>
                        <p className="text-sm text-gray-500">
                            © 2024 ChickenFarm Pro. Dibuat untuk UMKM Indonesia.
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    );
}