<?php

namespace App\Console\Commands;

use App\Actions\Helpers\ImageConverterHelper;
use App\Models\Event;
use App\Models\Supplier;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ConvertToWebpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert-to-webp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert all images of the Event and Supplier models to webp';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Recupera tutti gli eventi e fornitori che hanno una immagine da convertire
        $events = Event::where('img_url', 'not like', '%.webp')->get();
        $suppliers = Supplier::where('img_url', 'not like', '%.webp')->get();
        Log::info($events);
        Log::info($suppliers);

        // Converte le immagini degli eventi
        $this->info('Converting Event images to webp...');
        foreach ($events as $event) {
            $this->line("Converting event image for: '{$event->name}'");
            $newImgUrl = ImageConverterHelper::convertToWebp($event->img_url);
            $event->update(['img_url' => $newImgUrl]);
            $this->line("New image for event '{$event->name}' is: '{$event->img_url}'");
        }

        // Converte le immagini dei fornitori
        $this->info('Converting Supplier images to webp...');
        foreach ($suppliers as $supplier) {
            $this->line("Converting supplier image for: '{$supplier->name}'");
            $newImgUrl = ImageConverterHelper::convertToWebp($supplier->img_url);
            $supplier->update(['img_url' => $newImgUrl]);
            $this->line("New image for supplier '{$supplier->name}' is: '{$supplier->img_url}'");
        }

        $this->info('Image conversion to webp completed.');
    }
}
