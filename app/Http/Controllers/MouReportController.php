<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mou;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View; // Import the View facade
use Dompdf\Options;
use Dompdf\Dompdf;

class MouReportController extends Controller
{
    public function mouReport(){
        $mous = Mou::all();
     
        $notifications = Notification::all();
      return view('pages.admin.mou_report',compact('notifications','mous'));
    }
    public function mouReportpdf(Request $request)
    {
        $validated = $request->validate([
            'mou_title' => 'required|string',
            'status_tpc' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:contract_startDate',
        ]);
    
       
    
        // Increase maximum execution time
        ini_set('max_execution_time', 300); // 300 seconds = 5 minutes
    
        $startTime = microtime(true);
        
        // Fetch MOU data
        
        $mous = Mou::all();
        
    
      
    
        $fetchTime = microtime(true);
        Log::info('Data fetch time: ' . ($fetchTime - $startTime) . ' seconds');
        
        // Load the view and pass the MOU data
        $html = View::make('pages.admin.mou_report_pdf', compact('mous'))->render();
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
