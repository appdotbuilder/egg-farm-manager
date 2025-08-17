import React from 'react';
import { Link } from '@inertiajs/react';
import { AppShell } from '@/components/app-shell';

interface Customer {
    id: number;
    name: string;
    phone?: string;
    email?: string;
    type: 'retail' | 'wholesale' | 'restaurant';
    sales_count: number;
}

interface PaginationLink {
    url: string | null;
    label: string;
    active: boolean;
}

interface Props {
    customers: {
        data: Customer[];
        links: PaginationLink[];
        meta: {
            current_page: number;
            last_page: number;
            total: number;
        };
    };
    [key: string]: unknown;
}

export default function CustomersIndex({ customers }: Props) {
    const getTypeLabel = (type: string) => {
        const types = {
            retail: { label: 'Retail', emoji: '🛍️', color: 'bg-blue-100 text-blue-800' },
            wholesale: { label: 'Grosir', emoji: '📦', color: 'bg-green-100 text-green-800' },
            restaurant: { label: 'Restoran', emoji: '🍽️', color: 'bg-purple-100 text-purple-800' }
        };
        return types[type as keyof typeof types] || types.retail;
    };

    return (
        <AppShell>
            <div className="space-y-6">
                <div className="flex justify-between items-center">
                    <div>
                        <h1 className="text-2xl font-bold text-gray-900">👥 Pelanggan</h1>
                        <p className="text-gray-600">Kelola database pelanggan</p>
                    </div>
                    <Link
                        href="/customers/create"
                        className="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors"
                    >
                        + Tambah Pelanggan
                    </Link>
                </div>

                <div className="bg-white rounded-lg shadow-sm border">
                    <div className="overflow-x-auto">
                        <table className="w-full">
                            <thead className="bg-gray-50 border-b">
                                <tr>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Nama</th>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Kontak</th>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Tipe</th>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Total Transaksi</th>
                                    <th className="text-left px-6 py-3 text-sm font-medium text-gray-900">Aksi</th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-200">
                                {customers.data.map((customer) => {
                                    const typeInfo = getTypeLabel(customer.type);
                                    return (
                                        <tr key={customer.id} className="hover:bg-gray-50">
                                            <td className="px-6 py-4">
                                                <div className="font-medium text-gray-900">{customer.name}</div>
                                            </td>
                                            <td className="px-6 py-4 text-sm text-gray-600">
                                                <div>
                                                    {customer.phone && (
                                                        <div className="flex items-center">
                                                            📱 {customer.phone}
                                                        </div>
                                                    )}
                                                    {customer.email && (
                                                        <div className="flex items-center mt-1">
                                                            ✉️ {customer.email}
                                                        </div>
                                                    )}
                                                </div>
                                            </td>
                                            <td className="px-6 py-4">
                                                <span className={`inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${typeInfo.color}`}>
                                                    {typeInfo.emoji} {typeInfo.label}
                                                </span>
                                            </td>
                                            <td className="px-6 py-4 text-sm font-medium text-gray-900">
                                                {customer.sales_count} transaksi
                                            </td>
                                            <td className="px-6 py-4 text-sm">
                                                <div className="flex space-x-2">
                                                    <Link
                                                        href={`/customers/${customer.id}`}
                                                        className="text-blue-600 hover:text-blue-800 font-medium"
                                                    >
                                                        Lihat
                                                    </Link>
                                                    <Link
                                                        href={`/customers/${customer.id}/edit`}
                                                        className="text-green-600 hover:text-green-800 font-medium"
                                                    >
                                                        Edit
                                                    </Link>
                                                </div>
                                            </td>
                                        </tr>
                                    );
                                })}
                            </tbody>
                        </table>
                    </div>

                    {customers.data.length === 0 && (
                        <div className="text-center py-12">
                            <div className="text-6xl mb-4">👥</div>
                            <h3 className="text-lg font-medium text-gray-900 mb-2">Belum ada pelanggan</h3>
                            <p className="text-gray-600 mb-6">Mulai tambahkan pelanggan untuk mengelola penjualan dengan lebih baik</p>
                            <Link
                                href="/customers/create"
                                className="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-medium transition-colors"
                            >
                                Tambah Pelanggan Pertama
                            </Link>
                        </div>
                    )}
                </div>

                {/* Pagination */}
                {customers.links && customers.links.length > 3 && (
                    <div className="flex justify-center">
                        <nav className="flex space-x-2">
                            {customers.links.map((link, index: number) => (
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