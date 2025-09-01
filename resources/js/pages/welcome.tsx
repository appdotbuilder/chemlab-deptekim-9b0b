import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="🏗️ Equipment & Loan Management System">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="flex min-h-screen flex-col items-center bg-gradient-to-br from-blue-50 to-indigo-100 p-6 text-gray-900 lg:justify-center lg:p-8 dark:from-gray-900 dark:to-gray-800 dark:text-white">
                <header className="mb-6 w-full max-w-[335px] text-sm lg:max-w-6xl">
                    <nav className="flex items-center justify-end gap-4">
                        {auth.user ? (
                            <div className="flex items-center gap-4">
                                <Link
                                    href={route('dashboard')}
                                    className="inline-block rounded-lg border border-blue-200 bg-blue-50 px-5 py-2 text-sm font-medium text-blue-700 hover:bg-blue-100 dark:border-blue-800 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800"
                                >
                                    📊 Dashboard
                                </Link>
                                <Link
                                    href="/equipment"
                                    className="inline-block rounded-lg border border-green-200 bg-green-50 px-5 py-2 text-sm font-medium text-green-700 hover:bg-green-100 dark:border-green-800 dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800"
                                >
                                    🔧 Equipment
                                </Link>
                            </div>
                        ) : (
                            <>
                                <Link
                                    href={route('login')}
                                    className="inline-block rounded-lg border border-transparent px-5 py-2 text-sm font-medium text-gray-700 hover:bg-white hover:shadow-sm dark:text-gray-300 dark:hover:bg-gray-800"
                                >
                                    🔐 Log in
                                </Link>
                                <Link
                                    href="/register/student"
                                    className="inline-block rounded-lg border border-blue-200 bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700 dark:border-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600"
                                >
                                    ✨ Register Student
                                </Link>
                            </>
                        )}
                    </nav>
                </header>
                
                <div className="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow">
                    <main className="flex w-full max-w-[335px] flex-col lg:max-w-6xl lg:flex-row lg:gap-12">
                        <div className="flex-1 rounded-2xl bg-white p-8 text-center shadow-xl lg:p-12 dark:bg-gray-800">
                            <div className="mb-6 text-6xl">🏗️</div>
                            <h1 className="mb-6 text-4xl font-bold text-gray-900 lg:text-5xl dark:text-white">
                                ChemLab Equipment Manager
                            </h1>
                            <p className="mb-8 text-lg text-gray-600 lg:text-xl dark:text-gray-300">
                                Complete equipment and loan management system for Departemen Teknik Kimia FTUI
                            </p>
                            
                            <div className="mb-8 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                                <div className="rounded-lg bg-blue-50 p-4 dark:bg-blue-900/20">
                                    <div className="mb-2 text-2xl">🔧</div>
                                    <h3 className="font-semibold text-blue-900 dark:text-blue-300">Equipment Tracking</h3>
                                    <p className="text-sm text-blue-700 dark:text-blue-400">Monitor and manage lab equipment inventory</p>
                                </div>
                                <div className="rounded-lg bg-green-50 p-4 dark:bg-green-900/20">
                                    <div className="mb-2 text-2xl">📋</div>
                                    <h3 className="font-semibold text-green-900 dark:text-green-300">Loan Management</h3>
                                    <p className="text-sm text-green-700 dark:text-green-400">Easy borrowing and return process</p>
                                </div>
                                <div className="rounded-lg bg-purple-50 p-4 dark:bg-purple-900/20">
                                    <div className="mb-2 text-2xl">📊</div>
                                    <h3 className="font-semibold text-purple-900 dark:text-purple-300">Analytics Dashboard</h3>
                                    <p className="text-sm text-purple-700 dark:text-purple-400">Usage statistics and reports</p>
                                </div>
                                <div className="rounded-lg bg-yellow-50 p-4 dark:bg-yellow-900/20">
                                    <div className="mb-2 text-2xl">📄</div>
                                    <h3 className="font-semibold text-yellow-900 dark:text-yellow-300">JSA Upload</h3>
                                    <p className="text-sm text-yellow-700 dark:text-yellow-400">Job Safety Analysis document management</p>
                                </div>
                                <div className="rounded-lg bg-red-50 p-4 dark:bg-red-900/20">
                                    <div className="mb-2 text-2xl">⏰</div>
                                    <h3 className="font-semibold text-red-900 dark:text-red-300">Smart Scheduling</h3>
                                    <p className="text-sm text-red-700 dark:text-red-400">Date/time picker with availability checking</p>
                                </div>
                                <div className="rounded-lg bg-indigo-50 p-4 dark:bg-indigo-900/20">
                                    <div className="mb-2 text-2xl">🎓</div>
                                    <h3 className="font-semibold text-indigo-900 dark:text-indigo-300">Student Portal</h3>
                                    <p className="text-sm text-indigo-700 dark:text-indigo-400">Dedicated interface for student users</p>
                                </div>
                            </div>

                            {!auth.user && (
                                <div className="flex flex-col gap-4 sm:flex-row sm:justify-center">
                                    <Link
                                        href={route('login')}
                                        className="inline-flex items-center justify-center rounded-lg bg-blue-600 px-8 py-3 text-base font-medium text-white hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600"
                                    >
                                        🔐 Login to Dashboard
                                    </Link>
                                    <Link
                                        href="/register/student"
                                        className="inline-flex items-center justify-center rounded-lg border border-blue-600 px-8 py-3 text-base font-medium text-blue-600 hover:bg-blue-50 dark:border-blue-400 dark:text-blue-400 dark:hover:bg-blue-900/20"
                                    >
                                        ✨ Register as Student
                                    </Link>
                                </div>
                            )}

                            <div className="mt-8 rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                                <h4 className="mb-2 font-semibold text-gray-900 dark:text-white">🚀 Quick Start Guide:</h4>
                                <ol className="text-left text-sm text-gray-700 dark:text-gray-300">
                                    <li>1. Register as a student → Get verified</li>
                                    <li>2. Browse available equipment → Create loan request</li>
                                    <li>3. Upload JSA (PDF) → Get approval</li>
                                    <li>4. Pick up equipment → Use safely → Return on time</li>
                                </ol>
                            </div>

                            <footer className="mt-8 text-sm text-gray-500 dark:text-gray-400">
                                <p className="mb-2">🏛️ Departemen Teknik Kimia FTUI</p>
                                <p>For academic and research purposes • Professional lab management</p>
                            </footer>
                        </div>
                    </main>
                </div>
            </div>
        </>
    );
}