<?php
/**
 * This file contains the lists fields endpoint for MailWizzApi PHP-SDK.
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
 * MailWizzApi\Endpoint\ListFields handles all the API calls for handling the list custom fields.
 *
 * @author     Serban George Cristian <cristian.serban@mailwizz.com>
 * @package    MailWizzApi
 * @subpackage Endpoint
 * @since      1.0
 */
class ListFields extends Base {
    /**
     * Get fields from a certain mail list
     *
     * Note, the results returned by this endpoint can be cached.
     *
     * @param string $listUid
     * @return Response
     */
    public function getFields ($listUid) {
        $client = new Client(array(
                                 'method'      => Client::METHOD_GET,
                                 'url'         => $this->config->getApiUrl(sprintf('lists/%s/fields', $listUid)),
                                 'paramsGet'   => array(),
                                 'enableCache' => true,
                             ));

        return $response = $client->request();
    }
}