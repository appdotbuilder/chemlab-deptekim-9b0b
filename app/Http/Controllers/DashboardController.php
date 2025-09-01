<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Loan;
use App\Models\Notification;
use App\Models\PasswordHelpTicket;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $dashboardData = [];

        // Common stats for all users
        $dashboardData['notifications'] = Notification::where('user_id', $user->id)
            ->where('is_read', false)
            ->latest()
            ->take(5)
            ->get();

        $dashboardData['myActiveLoans'] = Loan::with(['equipment.lab'])
            ->where('user_id', $user->id)
            ->whereIn('status', ['disetujui_laboran', 'diambil'])
            ->latest()
            ->get();

        // Role-specific dashboard data
        switch ($user->role) {
            case 'admin':
                $dashboardData = array_merge($dashboardData, $this->getAdminStats());
                break;
                
            case 'kepala_lab':
                $dashboardData = array_merge($dashboardData, $this->getKepalaLabStats($user));
                break;
                
            case 'laboran':
                $dashboardData = array_merge($dashboardData, $this->getLaboranStats($user));
                break;
                
            case 'dosen':
            case 'mahasiswa':
                $dashboardData = array_merge($dashboardData, $this->getStudentDosenStats($user));
                break;
        }

        return Inertia::render('dashboard', $dashboardData);
    }

    /**
     * Get admin-specific statistics.
     */
    protected function getAdminStats(): array
    {
        return [
            'totalUsers' => User::count(),
            'pendingVerifications' => User::where('status', 'menunggu_verifikasi')->count(),
            'totalEquipment' => Equipment::count(),
            'totalLoans' => Loan::count(),
            'activeLoans' => Loan::whereIn('status', ['disetujui_laboran', 'diambil'])->count(),
            'overdueLoans' => Loan::where('status', 'diambil')
                ->where('requested_end', '<', now())
                ->count(),
            'pendingPasswordTickets' => PasswordHelpTicket::whereIn('status', ['open', 'in_progress'])->count(),
            'recentLoans' => Loan::with(['user', 'equipment.lab'])
                ->latest()
                ->take(10)
                ->get(),
            'pendingUsers' => User::where('status', 'menunggu_verifikasi')
                ->latest()
                ->take(10)
                ->get(),
        ];
    }

    /**
     * Get kepala lab specific statistics.
     */
    protected function getKepalaLabStats(User $user): array
    {
        return [
            'labEquipment' => Equipment::where('lab_id', $user->lab_id)->count(),
            'labActiveLoans' => Loan::whereHas('equipment', function ($query) use ($user) {
                $query->where('lab_id', $user->lab_id);
            })->whereIn('status', ['disetujui_laboran', 'diambil'])->count(),
            'labOverdueLoans' => Loan::whereHas('equipment', function ($query) use ($user) {
                $query->where('lab_id', $user->lab_id);
            })->where('status', 'diambil')
              ->where('requested_end', '<', now())
              ->count(),
            'recentLabLoans' => Loan::with(['user', 'equipment'])
                ->whereHas('equipment', function ($query) use ($user) {
                    $query->where('lab_id', $user->lab_id);
                })
                ->latest()
                ->take(10)
                ->get(),
        ];
    }

    /**
     * Get laboran specific statistics.
     */
    protected function getLaboranStats(User $user): array
    {
        return [
            'pendingApprovals' => Loan::whereHas('equipment', function ($query) use ($user) {
                $query->where('lab_id', $user->lab_id);
            })->where('status', 'diajukan')->count(),
            'labEquipment' => Equipment::where('lab_id', $user->lab_id)->count(),
            'availableEquipment' => Equipment::where('lab_id', $user->lab_id)
                ->where('status', 'available')
                ->count(),
            'maintenanceEquipment' => Equipment::where('lab_id', $user->lab_id)
                ->where('status', 'maintenance')
                ->count(),
            'pendingLoans' => Loan::with(['user', 'equipment'])
                ->whereHas('equipment', function ($query) use ($user) {
                    $query->where('lab_id', $user->lab_id);
                })
                ->where('status', 'diajukan')
                ->latest()
                ->get(),
        ];
    }

    /**
     * Get student/dosen specific statistics.
     */
    protected function getStudentDosenStats(User $user): array
    {
        return [
            'totalLoans' => Loan::where('user_id', $user->id)->count(),
            'completedLoans' => Loan::where('user_id', $user->id)
                ->where('status', 'dikembalikan')
                ->count(),
            'availableEquipment' => Equipment::where('status', 'available')
                ->where('is_active', true)
                ->count(),
            'recentEquipment' => Equipment::with('lab')
                ->where('status', 'available')
                ->where('is_active', true)
                ->latest()
                ->take(6)
                ->get(),
        ];
    }
}