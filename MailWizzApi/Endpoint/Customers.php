<?php
/**
 * This file contains the customers endpoint for MailWizzApi PHP-SDK.
 *
 * @author    Serban George Cristian <cristian.serban@mailwizz.com>
 * @link      http://www.mailwizz.com/
 * @copyright 2013-2014 http://www.mailwizz.com/
 */
namespace MailWizzApi\Endpoint;

use MailWizzApi\Base;
use MailWizzApi\Http\Client;
use MailWizzApi\Http\Response;

/**
 * MailWizzApi\Endpoint\Customers handles all the API calls for customers.
 *
 * @author     Serban George Cristian <cristian.serban@mailwizz.com>
 * @package    MailWizzApi
 * @subpackage Endpoint
 * @since      1.0
 */
class Customers extends Base {
    /**
     * Create a new mail list for the customer
     *
     * The $data param must contain following indexed arrays:
     * -> customer
     * -> company
     *
     * @param array $data
     * @return Response
     */
    public function create (array $data) {
        if (isset($data['customer']['password'])) {
            $data['customer']['confirm_password'] = $data['customer']['password'];
        }

        if (isset($data['customer']['email'])) {
            $data['customer']['confirm_email'] = $data['customer']['email'];
        }

        if (empty($data['customer']['timezone'])) {
            $data['customer']['timezone'] = 'UTC';
        }

        $client = new Client(array(
                                 'method'     => Client::METHOD_POST,
                                 'url'        => $this->config->getApiUrl('customers'),
                                 'paramsPost' => $data,
                             ));

        return $response = $client->request();
    }
}