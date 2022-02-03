<?php

declare(strict_types=1);

namespace PhpJasperLearn;

use PHPJasper\PHPJasper;

class ReportMaker
{
    public function compile(): void
    {
        $input = __DIR__ . '/../vendor/geekcom/phpjasper/examples/hello_world.jrxml';

        $jasper = new PHPJasper();
        $jasper->compile($input)->execute();
    }

    public function make()
    {
        $input = __DIR__ . '/../vendor/geekcom/phpjasper/examples/hello_world.jasper';
        $output = __DIR__ . '/../vendor/geekcom/phpjasper/examples';
        $options = [
            'format' => ['pdf', 'rtf']
        ];

        $jasper = new PHPJasper;

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();
    }

    public function param(): void
    {
        $input = __DIR__ . '/../vendor/geekcom/phpjasper/examples/hello_world_params.jrxml';

        $jasper = new PHPJasper;
        $output = $jasper->listParameters($input)->execute();

        foreach ($output as $parameter_description) {
            print $parameter_description . '<pre>';
        }
    }

    public function generateWithParans(): void
    {
//        $input = __DIR__ . '/../vendor/geekcom/phpjasper/examples/hello_world_params.jrxml';
//
//        $jasper = new PHPJasper();
//        $jasper->compile($input)->execute();

        $input = __DIR__ . '/../vendor/geekcom/phpjasper/examples/hello_world_params.jasper';
        $output = __DIR__ . '/../vendor/geekcom/phpjasper/examples';
        $options = [
            'format' => ['pdf', 'rtf'],
            'params' => [
                'myInt' => "62",
                "myDate" => (new \DateTime('2021-12-20'))->format('Y-m-d')
            ]
        ];

        $jasper = new PHPJasper;

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();
    }
}