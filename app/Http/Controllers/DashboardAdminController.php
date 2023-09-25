<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class DashboardAdminController extends Controller
{
    public function index(Request $request) {
        try {
            if (!$request->has('from') || !$request->has('to')) {
                $from = Date('Y-m', strtotime('01-01-2023'));        
                $to = Date('Y-m', strtotime('31-01-2023'));        
                $data = DB::table('checkouts')
                            ->selectRaw("count(invoice) as total, date_format(created_at, '%b %Y') as period")
                            ->whereRaw("date_format(created_at, '%Y-%m') between ? AND ?", [$from, $to])
                            ->groupBy('period')
                            ->get();

                $orderChartData = [
                    'totals' => $data->pluck('total')->toArray(),
                    'periods' => $data->pluck('period')->toArray()
                ];

                return $data;

                return view('admin.dashboard', compact('orderChartData'));
            }

            $from = Date('Y-m', strtotime($request->query('from')));        
            $to = Date('Y-m', strtotime($request->query('to')));        
            $data = DB::table('checkouts')
                        ->selectRaw("count(invoice) as total, date_format(created_at, '%b %Y') as period")
                        ->whereRaw("date_format(created_at, '%Y-%m') between ? AND ?", [$from, $to])
                        ->groupBy('period')
                        ->get();

            $orderChartData = [
                'totals' => $data->pluck('total')->toArray(),
                'periods' => $data->pluck('period')->toArray()
            ];

            return view('admin.dashboard', compact('orderChartData'));
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage(),
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500); 
        } 
    }
}
