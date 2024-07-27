<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index(Request $request)
    {
        $query = Timesheet::with(['user', 'project']);

        if ($request->has('task_name')) {
            $query->where('task_name', 'like', "%{$request->task_name}%");
        }

        if ($request->has('date')) {
            $query->where('date', $request->date);
        }

        if ($request->has('hours')) {
            $query->where('hours', $request->hours);
        }

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('project_id')) {
            $query->where('project_id', $request->project_id);
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'date' => 'required|date',
            'hours' => 'required|integer',
            'project_id' => 'required|exists:projects,id'
        ]);

        $timesheet = Timesheet::create([
            'task_name' => $request->task_name,
            'date' => $request->date,
            'hours' => $request->hours,
            'user_id' => auth()->id(),
            'project_id' => $request->project_id
        ]);

        return response()->json($timesheet, 201);
    }

    public function show($id)
    {
        $timesheet = Timesheet::with(['user', 'project'])->findOrFail($id);
        return response()->json($timesheet);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task_name' => 'string|max:255',
            'date' => 'date',
            'hours' => 'integer',
            'project_id' => 'exists:projects,id'
        ]);

        $timesheet = Timesheet::findOrFail($id);
        $timesheet->update($request->all());
        return response()->json($timesheet);
    }

    public function destroy($id)
    {
        Timesheet::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
