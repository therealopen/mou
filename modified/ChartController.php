<?php
namespace App\Http\Controllers;
use App\Models\User; // Ensure the User model is imported
use Illuminate\Support\Facades\DB; // Import the DB facade if needed
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        return view('dashboard.admin-dashboard');
    }

    public function chartData()
    {
        $usersPerMonth = DB::table('users')
            ->select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
            ->groupBy('month')
            ->pluck('count', 'month');

        $usersByGender = DB::table('users')
            ->select(DB::raw('COUNT(*) as count'), 'gender')
            ->groupBy('gender')
            ->pluck('count', 'gender');

        return response()->json([
            'usersPerMonth' => $usersPerMonth,
            'usersByGender' => $usersByGender,
        ]);
    }
}

