<?php
class ScenarioGenerator
{
    public function generate($nrDeletes, $nrUpdates, $nrInserts, DataSetGenerator $generator)
    {
        $customers = $generator->generate();

    }
}
