<?php

namespace App\Http\Controllers;

use App\Exports\ParcellesExport;
use App\Imports\OspecifiquesImport;
use App\Imports\ParcellesImport;
use App\Imports\SensibilisationsImport;
use App\Imports\Ospecifique;
use App\Exports\SensibilisationsExport;
use App\Imports\VoiriesImport;
use App\Voirie;
use App\Parcelle_ztt;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use \Illuminate\Http\RedirectResponse;

class MyController extends Controller
{
    public function export()
    {
        return Excel::download(new ParcellesExport, 'users.xlsx');
    }

    public function fileImport(Request $request)
    {
        $array = Excel::toArray(new ParcellesImport, $request->file('file'));
        //dd($array);
        Excel::import( new ParcellesImport, $request->file('file'));
        return redirect('/')->with('success', 'All good!');

    }

    //SENSIBILISATION
    public function importSensibilisation(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');
        Excel::import(new SensibilisationsImport, $file);
        return redirect()->back()->with('success', 'All data successfully imported!');
    }

    public function exportSensibilisation()
    {
        return Excel::download(new SensibilisationsExport, 'contacts.xlsx');
    }

   //voiries
   public function VoiriesImport(Request $request)
   {
       $file = $request->file('file');
       Excel::import(new VoiriesImport, $file);
       return redirect()->back()->with('success', 'All data successfully imported!');

   }

    //objectifs spécifiques
    public function ObjectifsImport(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new OspecifiquesImport, $file);
        return redirect()->back()->with('success', 'All data successfully imported!');

    }
}
