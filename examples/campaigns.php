<?php
/**
 * This file contains examples for using the MailWizzApi PHP-SDK.
 *
 * @author Serban George Cristian <cristian.serban@mailwizz.com>
 * @link http://www.mailwizz.com/
 * @copyright 2013-2014 http://www.mailwizz.com/
 */
 
// require the setup which has registered the autoloader
use MailWizzApi\Endpoint\Campaigns;

require_once dirname(__FILE__) . '/setup.php';

// CREATE THE ENDPOINT
$endpoint = new Campaigns();

/*===================================================================================*/

// GET ALL ITEMS
$response = $endpoint->getCampaigns($pageNumber = 1, $perPage = 10);

// DISPLAY RESPONSE
echo '<pre>';
print_r($response->body);
echo '</pre>';

/*===================================================================================*/

// GET ONE ITEM
$response = $endpoint->getCampaign('CAMPAIGN-UNIQUE-ID');

// DISPLAY RESPONSE
echo '<pre>';
print_r($response->body);
echo '</pre>';

/*===================================================================================*/

// CREATE CAMPAIGN
$response = $endpoint->create(array(
    'name'          => 'My API Campaign', // required
    'from_name'     => 'John Doe', // required
    'from_email'    => 'john.doe@doe.com', // required
    'subject'       => 'Hey, i am testing the campaigns via API', // required
    'reply_to'      => 'john.doe@doe.com', // required
    'send_at'       => date('Y-m-d H:i:s', strtotime('+10 hours')), // required, this will use the timezone which customer selected
    'list_uid'      => 'LIST-UNIQUE-ID', // required
    'segment_uid'   => 'SEGMENT-UNIQUE-ID',// optional, only to narrow down
    
    // optional block, defaults are shown
    'options' => array(
        'url_tracking'      => 'no', // yes | no 
        'json_feed'         => 'no', // yes | no 
        'xml_feed'          => 'no', // yes | no  
        'plain_text_email'  => 'yes',// yes | no 
        'email_stats'       => null, // a valid email address where we should send the stats after campaign done
    ),
    
    // required block, archive or template_uid or content => required.
    'template' => array(
        //'archive'         => file_get_contents(dirname(__FILE__) . '/template-example.zip'),
        //'template_uid'    => 'TEMPLATE-UNIQUE-ID',
        'content'           => file_get_contents(dirname(__FILE__) . '/template-example.html'),
        'inline_css'        => 'no', // yes | no
        'plain_text'        => null, // leave empty to auto generate
        'auto_plain_text'   => 'yes', // yes | no
    ),
));

// DISPLAY RESPONSE
echo '<hr /><pre>';
print_r($response->body);
echo '</pre>';

/*===================================================================================*/

// UPDATE CAMPAIGN
$response = $endpoint->update('CAMPAIGN-UNIQUE-ID', array(
    'name'          => 'My API Campaign UPDATED', // optional at update
    'from_name'     => 'John Doe', // optional at update
    'from_email'    => 'john.doe@doe.com', // optional at update
    'subject'       => 'Hey, i am testing the campaigns via API', // optional at update
    'reply_to'      => 'john.doe@doe.com', // optional at update
    'send_at'       => date('Y-m-d H:i:s', strtotime('+1 hour')), //optional at update, this will use the timezone which customer selected
    'list_uid'      => 'LIST-UNIQUE-ID', // optional at update
    'segment_uid'   => 'SEGMENT-UNIQUE-ID',// optional, only to narrow down
    
    // optional block, defaults are shown
    'options' => array(
        'url_tracking'      => 'no', // yes | no 
        'json_feed'         => 'no', // yes | no 
        'xml_feed'          => 'no', // yes | no  
        'plain_text_email'  => 'yes',// yes | no 
        'email_stats'       => null, // a valid email address where we should send the stats after campaign done
    ),
    
    // optional block at update, archive or template_uid or content => required.
    'template' => array(
        //'archive'         => file_get_contents(dirname(__FILE__) . '/template-example.zip'),
        //'template_uid'    => 'TEMPLATE-UNIQUE-ID',
        'content'           => file_get_contents(dirname(__FILE__) . '/template-example.html'),
        'inline_css'        => 'no', // yes | no
        'plain_text'        => null, // leave empty to auto generate
        'auto_plain_text'   => 'yes', // yes | no
    ),
));

// DISPLAY RESPONSE
echo '<hr /><pre>';
print_r($response->body);
echo '</pre>';

/*===================================================================================*/

// Delete CAMPAIGN
$response = $endpoint->delete('CAMPAIGN-UNIQUE-ID');

// DISPLAY RESPONSE
echo '<hr /><pre>';
print_r($response->body);
echo '</pre>';