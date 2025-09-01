import React from 'react';
import { Head } from '@inertiajs/react';
import { AppShell } from './app-shell';
import { AppHeader } from './app-header';
import { AppSidebar } from './app-sidebar';
import { AppContent } from './app-content';
import { Breadcrumbs } from './breadcrumbs';
import { type BreadcrumbItem } from '@/types';

interface AppLayoutProps {
    children: React.ReactNode;
    title?: string;
    breadcrumbs?: BreadcrumbItem[];
}

export default function AppLayout({ children, title, breadcrumbs }: AppLayoutProps) {
    return (
        <AppShell variant="sidebar">
            {title && <Head title={title} />}
            <AppSidebar />
            <main className="flex flex-1 flex-col overflow-hidden">
                <AppHeader />
                <AppContent>
                    {breadcrumbs && breadcrumbs.length > 0 && (
                        <div className="mb-4">
                            <Breadcrumbs breadcrumbs={breadcrumbs} />
                        </div>
                    )}
                    {children}
                </AppContent>
            </main>
        </AppShell>
    );
}