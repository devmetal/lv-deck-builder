<?php

namespace Tests\Feature;

use App\Jobs\ProcessImportedCard;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ImportCardsTest extends TestCase
{
    use RefreshDatabase;

    public function test_upload_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/import/cards');

        $response->assertStatus(200);
    }

    public function test_can_upload_csv_and_make_import_jobs()
    {
        Queue::fake();

        $user = User::factory()->create();

        $csv = ['scry_id', '1', '2', '3'];

        $file = UploadedFile::fake()
            ->createWithContent('ids.csv', implode(PHP_EOL, $csv));

        $response = $this
            ->actingAs($user)
            ->post('/import/cards/upload', [
                'file' => $file,
            ]);

        $response->assertRedirect('/import/cards/status');

        Queue::assertPushed(ProcessImportedCard::class, 3);
    }
}
