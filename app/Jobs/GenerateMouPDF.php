<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Mou;

class GenerateMouPDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $mou;

    /**
     * Create a new job instance.
     */
    public function __construct(Mou $mou)
    {
        $this->mou = $mou;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         // Setup Dompdf options
         $options = new Options();
         $options->set('isHtml5ParserEnabled', true);
         $options->set('isPhpEnabled', true);
         $options->set('isRemoteEnabled', true);
 
         // Instantiate Dompdf with the configured options
         $dompdf = new Dompdf($options);
 
         // Load the view and pass the MOU data
         $html = View::make('pages.admin.pdf_preview_mou', ['mou' => $this->mou])->render();
 
         // Load HTML content
         $dompdf->loadHtml($html);
 
         // Set paper size and orientation (optional)
         $dompdf->setPaper('A4', 'landscape');
 
         // Render PDF
         $dompdf->render();
 
         // Save the PDF to a file or storage
         $output = $dompdf->output();
         Storage::put('public/mou_report_' . $this->mou->id . '.pdf', $output);
    }
}
