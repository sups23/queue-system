<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdatePriorities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:priorities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the priorities of all appointements.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = now()->toDateString();

        $paid = \App\Models\App::where('date', $date)
                                            ->where('status', 'Paid')
                                            ->get();

        $unpaid = \App\Models\App::where('date', $date)
                                    ->where('status', 'Unpaid')
                                    ->where('expected_time', '<=', now()->addMinutes(15))
                                    ->get();

        foreach ($paid as $app) {
            $priority = $app->priority;
            $app->update(['priority' => $priority + 1]);
        }                            

        foreach ($unpaid as $app) {
            $app->update(['priority' => -1]);
        }

        return Command::SUCCESS;
    }
}
