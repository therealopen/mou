<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Consultant;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View; // Import the View facade
use Dompdf\Options;
use Dompdf\Dompdf;

class ContractReportController extends Controller
{
    public function contractReport(){
        $contracts = Contract::all();
        $consultants = Consultant::all();
        $notifications = Notification::all();
      return view('pages.admin.contract_report',compact('consultants','notifications','contracts'));
    }
 
    public function generatecontractPDF(Request $request)
    {
        $validated = $request->validate([
            'contract_name' => 'required|string',
            'status_tpc' => 'required|string',
            'contract_startDate' => 'required|date',
            'contract_endDate' => 'required|date|after_or_equal:contract_startDate',
        ]);
    
       
    
        // Increase maximum execution time
        ini_set('max_execution_time', 300); // 300 seconds = 5 minutes
    
        $startTime = microtime(true);
        
        // Fetch MOU data
        
        $contracts = Contract::where('contract_name', $validated['contract_name'])
        ->where('status_tpc', $validated['status_tpc'])
        ->whereBetween('contract_startDate', [$validated['contract_startDate'], $validated['contract_endDate']])
        ->get();
        
    
      
    
        $fetchTime = microtime(true);
        Log::info('Data fetch time: ' . ($fetchTime - $startTime) . ' seconds');
        
        // Load the view and pass the MOU data
        $html = View::make('pages.admin.contract_pdf_report', compact('contracts'))->render();
        $renderTime = microtime(true);
        Log::info('View render time: ' . ($renderTime - $fetchTime) . ' seconds');
    
        // Setup Dompdf options
        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', FALSE); // Enable loading of remote assets
    
        // Instantiate Dompdf with the configured options
        $dompdf = new \Dompdf\Dompdf($options);
    
        // Load HTML content
        $dompdf->loadHtml($html);
        $loadHtmlTime = microtime(true);
        Log::info('Load HTML time: ' . ($loadHtmlTime - $renderTime) . ' seconds');
    
        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'landscape');
    
        // Render PDF (first buffer)
        $dompdf->render();
        $renderPdfTime = microtime(true);
        Log::info('Render PDF time: ' . ($renderPdfTime - $loadHtmlTime) . ' seconds');
    
        // Output PDF to browser
        $outputTime = microtime(true);
        Log::info('Output time: ' . ($outputTime - $renderPdfTime) . ' seconds');
        Log::info('Total time: ' . ($outputTime - $startTime) . ' seconds');
    
        return $dompdf->stream('mou_report.pdf', ["Attachment" => false]);
    }
}
