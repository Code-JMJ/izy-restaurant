<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CreateServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * For creation file.
     *
     * @var Filesystem
     */

    protected $filesystem;

    /**
     * Execute the console command.
     */

    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();
        $this->filesystem = $filesystem;
    }

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");

        if ($this->filesystem->exists($path)) {
            $this->error("The document {$name} already exists!");
            return;
        }

        $stub = $this->getStub();

        $stub = str_replace('{{name}}', $name, $stub);

        $this->filesystem->put($path, $stub);

        $this->info("Service {$name} created successfully at {$path}");
    }

    protected function getStub()
    {
        return <<<EOT
          <?php

          namespace App\Services;

          class {{name}}
          {
              private \$model;
              public function __construct(/*Model \$model*/)
              {
                  // \$this->model = \$model;
              }

          }
          EOT;
    }
}
