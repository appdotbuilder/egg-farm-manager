import React from 'react';
import { Link } from '@inertiajs/react';
import { AppShell } from '@/components/app-shell';

interface Production {
    id: number;
    production_date: string;
    total_eggs: number;
    good_eggs: number;
    broken_eggs: number;
    small_eggs: number;
    mortality_count: number;
    notes?: string;
}

interface PaginationLink {
    url: string | null;
    label: string;
    active: boolean;
}

interface Props {
    productions: {
        data: Production[];
        links: PaginationLink[];
        meta: {
            current_page: number;
            last_page: number;
            total: number;
        };
    };
    [key: string]: unknown;
}

export default function ProductionIndex({ productions }: Props) {
    const formatDate = (dateString: string) => {
        return new Date(dateString).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric',
        });
    };

    return (
        <AppShell>
            <div className="space-y-6">
                <div className="flex justify-between items-center">
                    <div>
                        <h1 className="text-2xl font-bold text-gray-900">📊 Produksi Harian</h1>
                        <p className="text-gray-600">Kelola data produksi telur harian</p>
                    </div>
                    <Link
                        href="/production/create"
                        className="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors"
                    >
                        + Tambah Produksi
                    </Link>
                </div>

                <div className="bg-white rounded-lg shadow-sm border">
                    <div className="overflow-x-auto">
                        <table className="w-full">
                            <thead className="bg-gray-50 border-b">
                                <tr>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Tanggal</th>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Total Telur</th>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Telur Baik</th>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Telur Rusak</th>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Telur Kecil</th>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Kematian</th>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Aksi</th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-200">
                                {productions.data.map((production) => (
                                    <tr key={production.id} className="hover:bg-gray-50">
                                        <td className="px-6 py-4 text-sm text-gray-900">
                                            {formatDate(production.production_date)}
                                        </td>
                                        <td className="px-6 py-4 text-sm font-semibold text-gray-900">
                                            {production.total_eggs}
                                        </td>
                                        <td className="px-6 py-4 text-sm text-green-600">
                                            {production.good_eggs}
                                        </td>
                                        <td className="px-6 py-4 text-sm text-red-600">
                                            {production.broken_eggs}
                                        </td>
                                        <td className="px-6 py-4 text-sm text-yellow-600">
                                            {production.small_eggs}
                                        </td>
                                        <td className="px-6 py-4 text-sm text-red-700">
                                            {production.mortality_count}
                                        </td>
                                        <td className="px-6 py-4 text-sm">
                                            <div className="flex space-x-2">
                                                <Link
                                                    href={`/production/${production.id}`}
                                                    className="text-blue-600 hover:text-blue-800 font-medium"
                                                >
                                                    Lihat
                                                </Link>
                                                <Link
                                                    href={`/production/${production.id}/edit`}
                                                    className="text-green-600 hover:text-green-800 font-medium"
                                                >
                                                    Edit
                                                </Link>
                                            </div>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>

                    {productions.data.length === 0 && (
                        <div className="text-center py-12">
                            <div className="text-6xl mb-4">📊</div>
                            <h3 className="text-lg font-medium text-gray-900 mb-2">Belum ada data produksi</h3>
                            <p className="text-gray-600 mb-6">Mulai catat produksi harian untuk melacak performa peternakan</p>
                            <Link
                                href="/production/create"
                                className="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-medium transition-colors"
                            >
                                Tambah Produksi Pertama
                            </Link>
                        </div>
                    )}
                </div>

                {/* Pagination if needed */}
                {productions.links && productions.links.length > 3 && (
                    <div className="flex justify-center">
                        <nav className="flex space-x-2">
                            {productions.links.map((link, index: number) => (
                                <Link
                                    key={index}
                                    href={link.url || ''}
                                    className={`px-3 py-2 rounded text-sm ${
                                        link.active
                                            ? 'bg-green-600 text-white'
                                            : 'bg-white text-gray-700 border hover:bg-gray-50'
                                    }`}
                                    dangerouslySetInnerHTML={{ __html: link.label }}
                                />
                            ))}
                        </nav>
                    </div>
                )}
            </div>
        </AppShell>
    );
}