<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Exports\VisitorsExport;
use Maatwebsite\Excel\Facades\Excel;

class VisitorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|digits:10',
            'email' => 'required|email|max:150',
            'purpose' => 'required|in:interview,meeting,maintenance,other',
            'birth_year' => 'required|date|date_format:Y-m-d|before_or_equal:today|after_or_equal:1950-01-01',
        ]);

        Visitor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'purpose' => strtolower($request->purpose),
            'person_to_meet' => $request->person_to_meet,
            'department' => strtolower($request->department),
            'id_type' => strtolower($request->id_type),
            'id_number' => $request->id_number,
            'birth_year' => $request->birth_year,
        ]);

        return redirect()->back()->with('success', 'Visitor registered Succesfully');
    }

    public function index(Request $request)
    {
        $visitors = Visitor::orderBy('visted_at', 'desc')->paginate(10);
        $query = Visitor::query();

        // 🔍 Search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('mobile', 'like', '%' . $request->search . '%');
            });
        }

        // 📅 Date filter
        if ($request->date) {
            $query->whereDate('visted_at', $request->date);
        }

        // 🏢 Department
        if ($request->department) {
            $query->where('department', $request->department);
        }

        // 📌 Status
        if ($request->status) {
            $query->where('approval_status', $request->status);
        }

        // 🎯 Purpose
        if ($request->purpose) {
            $query->where('purpose', $request->purpose);
        }

        $visitors = $query->orderBy('visted_at', 'desc')
            ->paginate(10)
            ->withQueryString(); // keep filters when paginating

        return view('visitorsManagement', compact('visitors'));
    }

    public function updateStatus(Request $request, Visitor $visitor)
    {

        $request->validate([
            'approval_status' => 'required|in:approved,pending,rejected'
        ]);

        $visitor->update([
            'approval_status' => $request->approval_status
        ]);

        return response()->json([
            'success' => true
        ]);

    }

    public function dashboard()
    {
        $visitors = Visitor::orderBy('visted_at', 'desc')
            ->take(10) // latest 10
            ->get();

        $totalVisitors = Visitor::count();
        $approved = Visitor::where('approval_status', 'approved')->count();
        $pending = Visitor::where('approval_status', 'pending')->count();
        $rejected = Visitor::where('approval_status', 'rejected')->count();

        return view('dashboard', compact(
            'visitors',
            'totalVisitors',
            'approved',
            'pending',
            'rejected'
        ));
    }

    public function exportExcel(Request $request)
{
    $request->validate([
        'from' => 'required|date',
        'to'   => 'required|date|after_or_equal:from',
    ]);

    $filename = 'visitors_' . $request->from . '_to_' . $request->to . '.xlsx';

    return Excel::download(
        new VisitorsExport($request->from, $request->to),
        $filename
    );
}

}
