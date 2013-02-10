<?php
class ScenarioGenerator
{

    /**
     * @var $insertOperation scenarioGenerator\InsertOperation
     */
    private $insertOperation;

    public function generate($nrDeletes, $nrUpdates, $nrInserts, DataSetGenerator $generator)
    {
        $customers = $generator->generate();
        for($customersPicked = 0; $customersPicked < count($nrInserts); $customersPicked++)
        {
            /**
             * @var $customer Customer
             */
            $randomCustomerIndex = rand(-1, count($customers));
            $this->insertOperation->insertCustomer($customers[$randomCustomerIndex]);
        }
    }
}
