<?php
/**
 * @package  Training\Console
 * @author Wojciech Przybylski <wprzybylski@divante.pl>
 * @copyright 2018 Divante Sp. z o.o.
 * @license See LICENSE_DIVANTE.txt for license details.
 */

namespace Training\Activities\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Magento\Customer\Model\CustomerFactory;

/**
 * Class TrainingCommand
 *
 * @package Training\Console\Console\Command
 */
class TrainingCommand extends Command
{
    protected $customerFactory;

    /**
     * TrainingCommand constructor.
     *
     * @param CustomerFactory $customerFactory
     */
    public function __construct(
        CustomerFactory $customerFactory
    )
    {
        parent::__construct($name = null);
        $this->customerFactory = $customerFactory;
    }

    /**
     * Configure command
     */
    protected function configure()
    {
        $this->setName('training:list_customer')->setDescription('I will show you customers.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $customerCollection = $this->getCustomerCollection();

        foreach ($customerCollection as $customer) {
            echo $customer->getName() . ' email: ' . $customer->getEmail() . ' <br/>';
        }

        $output->writeln('Customers collection end.');
    }

    /**
     * @return mixed
     */
    protected function getCustomerCollection() {
        return $this->customerFactory->create()->getCollection()
                ->addAttributeToSelect('firstname')
                ->addAttributeToSelect('email')
                ->load();
    }
}
