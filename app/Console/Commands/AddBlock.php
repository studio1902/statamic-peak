<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Statamic\Console\RunsInPlease;
use Statamic\Support\Arr;
use Symfony\Component\Yaml\Yaml;

class AddBlock extends Command
{
    use RunsInPlease;

    /**
    * The name of the console command.
    *
    * @var string
    */
    protected $name = 'peak:add-block';

     /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Add a page builder block.";

     /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        // Ask block human readeable name.
        $name = $this->ask('What should be the name for this block?');

        // Ask for filename.
        $filename = $this->ask('What should be the filename for this block?');

        // Check if yaml with filename already exists.
        if (file::exists(base_path("resources/fieldsets/$filename.yaml"))) {
            return $this->error("Fieldset 'resources/fieldsets/$filename.yaml' already exists.");
        }

        // Check if template with filename already exists.
        if (file::exists(base_path("resources/views/page_builder/_$filename.antlers.html"))) {
            return $this->error("Partial 'resources/views/page_builder/_$filename.antlers.html' already exists.");
        }

        // Ask for field instructions.
        $instructions = $this->ask('What should be the instructions for this block?');

        // Create fieldset.
        $yaml =
"title: $name
fields: []";

        File::put(base_path("resources/fieldsets/$filename.yaml"), $yaml);

        // Create partial.
        $html =
"{{#
	@name $name
	@desc The $name page builder block.
    @set page.page_builder.$filename
#}}

<section class=\"fluid-container grid md:grid-cols-12 gap-8\">
   Get out on top!
</section>
";

        File::put(base_path("resources/views/page_builder/_$filename.antlers.html"), $html);

        // Parse the page builder fieldset.
        $fieldset = Yaml::parseFile(base_path('resources/fieldsets/page_builder.yaml'));

        // Create an array for the new page builder block.
        $newSet = [
            'display' => $name,
            'instructions' => $instructions,
            'fields' => [
                [
                    'import' => $filename
                ]
            ]
        ];

        // Get existing page builder blocks.
        $existingSets = Arr::get($fieldset, 'fields.0.field.sets');

        // Add new block.
        $existingSets[$filename] = $newSet;

        // Order the blocks by alphabet.
        $existingSets = collect($existingSets)->sortBy(function ($value, $key) {
            return $key;
        })->all();

        // Merge the fieldset.
        Arr::set($fieldset, 'fields.0.field.sets', $existingSets);

        // Convert the array to YAML and save the page builder fieldset.
        File::put(base_path('resources/fieldsets/page_builder.yaml'), Yaml::dump($fieldset, 99, 2));

        // All done.
        $this->info('Peak page builder block added.');
    }
}
