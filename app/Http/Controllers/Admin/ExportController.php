<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ExportController extends Controller
{
    public function exportCsv(Request $request)
    {
        $fileName = 'user.csv';
        $users = User::all();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Email Address', 'Phone Number', 'First Name');

        $callback = function () use ($users, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($users as $user) {
                $row['Email Address']  = $user->email;
                $row['Phone Number']    = $user->phone;
                $row['First Name']    = $user->name;
                fputcsv($file, array($row['Email Address'], $row['Phone Number'], $row['First Name']));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}
