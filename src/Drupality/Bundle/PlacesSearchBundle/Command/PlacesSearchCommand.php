<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2014-10-25
 * Time: 18:34
 */

namespace Drupality\Bundle\PlacesSearchBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PlacesSearchCommand extends ContainerAwareCommand {

    CONST SEARCH_URL_PATTERN = 'https://maps.googleapis.com/maps/api/place/textsearch/%s';

    protected function configure()
    {
        $this
          ->setName('places:search')
          ->setDescription('Search places in Google Maps by term')
          ->addArgument('query', InputArgument::REQUIRED, 'Google Maps search query')
          ->addArgument('output_directory', InputArgument::REQUIRED, 'Temp subdirectory where search results will be stored')
          ->addOption('format', null, InputOption::VALUE_OPTIONAL, 'Expected format of search result')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $query = $input->getArgument('query');
        $format = $input->getOption('format') ?: 'json';

        $tmp_dir = sys_get_temp_dir();

        $output->writeln('Temp directory location: ' . $tmp_dir);

        $url = sprintf(self::SEARCH_URL_PATTERN, $format);

        $url .= '?' . http_build_query(array('query' =>  $query, 'key' => 'AIzaSyBjrrUBPuovmv150yVmiacEsEAv9luWMMY'));

        $output->writeln('Search URL: ' . $url);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . "/BuiltinObjectToken-EquifaxSecureCA.crt");

        $data = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        $parsed = $status == 200 ? json_decode($data, TRUE) : array();

        if (! empty($parsed) && $parsed['status'] == 'OK') {

            $filename = md5($query) . '.' . $format;
            $output_path = $tmp_dir . '/' . $input->getArgument('output_directory') . '/' . $filename;

            if (! file_exists($output_path)) {
                mkdir($output_path);
            }

            file_put_contents($output_path, $data);

            $output->writeln('Search status: ' . $parsed['status']);
            $output->writeln('Places found: ' . sizeof($parsed['results']));
            $output->writeln('Next page: ' . isset($parsed['next_page_token']) ? 'Yes' : 'No');
            $output->writeln('Results location: ' . $output_path);

        } else {
            $output->writeln('Places search failed');

            if (isset($parsed['status'])) {
                $output->writeln('Search status: ' . $parsed['status']);
            }
        }

    }


}