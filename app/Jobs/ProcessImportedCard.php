<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\CardImporterService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessImportedCard implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private string $externalCardId,
        private User $user,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(
        CardImporterService $importer
    ): void {
        $importer->importExternalCardToUser($this->externalCardId, $this->user->id);
    }
}
