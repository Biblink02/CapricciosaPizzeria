<?php

namespace Tests\Feature;

use App\Models\Pdfmenu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PdfMenuTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_serves_the_latest_visible_menu_in_the_requested_language(): void
    {
        Storage::fake('public');
        foreach (['it.pdf', 'en-old.pdf', 'en-new.pdf', 'en-hidden.pdf'] as $file) {
            Storage::disk('public')->put($file, '%PDF-1.4');
        }

        $create = fn (string $lang, string $file, int $hours, bool $visible = true) => Pdfmenu::forceCreate([
            'name' => $file,
            'lang' => $lang,
            'pdf_url' => $file,
            'is_visible' => $visible,
            'updated_at' => now()->subHours($hours),
        ]);
        $create('it', 'it.pdf', 3);
        $create('en', 'en-old.pdf', 2);
        $create('en', 'en-new.pdf', 1);
        $create('en', 'en-hidden.pdf', 0, false);

        $response = $this->get('/menus/pdf/en')->assertOk();

        $this->assertSame(
            Storage::disk('public')->path('en-new.pdf'),
            $response->baseResponse->getFile()->getPathname(),
        );
    }

    public function test_missing_english_menu_falls_back_to_the_current_italian_menu(): void
    {
        Storage::fake('public');
        foreach (['it.pdf', 'it-new.pdf', 'en-hidden.pdf'] as $file) {
            Storage::disk('public')->put($file, '%PDF-1.4');
        }
        Pdfmenu::forceCreate([
            'name' => 'Italian menu', 'lang' => 'it', 'pdf_url' => 'it.pdf',
            'is_visible' => true, 'updated_at' => now()->subHour(),
        ]);
        Pdfmenu::create([
            'name' => 'Hidden English menu', 'lang' => 'en',
            'pdf_url' => 'en-hidden.pdf', 'is_visible' => false,
        ]);

        $response = $this->get('/menus/pdf/en')->assertOk();
        $this->assertSame(Storage::disk('public')->path('it.pdf'), $response->baseResponse->getFile()->getPathname());

        Pdfmenu::create([
            'name' => 'New Italian menu', 'lang' => 'it',
            'pdf_url' => 'it-new.pdf', 'is_visible' => true,
        ]);
        $response = $this->get('/menus/pdf/en')->assertOk();
        $this->assertSame(Storage::disk('public')->path('it-new.pdf'), $response->baseResponse->getFile()->getPathname());
    }

    public function test_a_missing_menu_returns_not_found(): void
    {
        $this->get('/menus/pdf/en')->assertNotFound();
    }

    public function test_an_unsupported_language_returns_not_found(): void
    {
        $this->get('/menus/pdf/invalid')->assertNotFound();
    }
}
