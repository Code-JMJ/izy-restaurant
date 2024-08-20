<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CreateRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

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
        $path = app_path("Repositories/{$name}.php");

        if ($this->filesystem->exists($path)) {
            $this->error("The document {$name} already exists!");
            return;
        }

        $stub = $this->getStub();

        $stub = str_replace('{{name}}', $name, $stub);

        $this->filesystem->put($path, $stub);

        $this->info("Repository {$name} created successfully at {$path}");
    }
    protected function getStub()
    {
        return <<<EOT
         <?php

         namespace App\Repositories;

         class {{name}} extends BaseRepository
         {
             public function __construct(/*NameModel \$model*/)
             {
                 // parent::__construct(\$model);
             }

         }
         EOT;
    }
}
