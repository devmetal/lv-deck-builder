<?php

namespace Tests\Feature;

use App\Jobs\ProcessImportedCard;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ImportCardsTest extends TestCase
{
    use RefreshDatabase;

    private function get_csv_file(array $from): UploadedFile
    {
        return UploadedFile::fake()
            ->createWithContent('ids.csv', implode(PHP_EOL, $from));
    }

    public function test_upload_screen_can_be_rendered()
    {
        /** @var Authenticatable */
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/import/cards');

        $response->assertStatus(200);
    }

    public function test_can_upload_csv_and_make_import_jobs()
    {
        Queue::fake();

        /** @var Authenticatable */
        $user = User::factory()->create();

        $file = $this->get_csv_file(['scry_id', '1', '2', '3']);

        $response = $this
            ->actingAs($user)
            ->post('/import/cards/upload', [
                'file' => $file,
            ]);

        $response->assertRedirect('/import/cards/status');

        Queue::assertPushed(ProcessImportedCard::class, 3);
    }

    public function test_validation_error_when_file_missing()
    {
        Queue::fake();

        /** @var Authenticatable */
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/import/cards/upload');

        $response->assertInvalid(['file']);
    }

    public function test_validation_error_when_file_is_not_csv()
    {
        Queue::fake();

        /** @var Authenticatable */
        $user = User::factory()->create();

        $file = UploadedFile::fake()->image('wrong.png');

        $response = $this
            ->actingAs($user)
            ->post('/import/cards/upload', [
                'file' => $file,
            ]);

        $response->assertInvalid(['file']);
    }

    public function test_validation_error_when_csv_does_not_contain_lines_enough()
    {
        Queue::fake();

        /** @var Authenticatable */
        $user = User::factory()->create();

        $file = $this->get_csv_file(['scry_id']);

        $response = $this
            ->actingAs($user)
            ->post('/import/cards/upload', [
                'file' => $file,
            ]);

        $response->assertInvalid(['file']);
    }

    public function test_validation_error_when_csv_does_not_contain_scry_id_header()
    {
        Queue::fake();

        /** @var Authenticatable */
        $user = User::factory()->create();

        $file = $this->get_csv_file(['1', '2', '3']);

        $response = $this
            ->actingAs($user)
            ->post('/import/cards/upload', [
                'file' => $file,
            ]);

        $response->assertInvalid(['file']);
    }
}
