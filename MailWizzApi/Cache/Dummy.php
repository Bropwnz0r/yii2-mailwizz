<?php
/**
 * This file contains the MailWizzApi\Cache\Dummy cache class used in the MailWizzApi PHP-SDK.
 *
 * @author    Serban George Cristian <cristian.serban@mailwizz.com>
 * @link      http://www.mailwizz.com/
 * @copyright 2013-2014 http://www.mailwizz.com/
 */
namespace MailWizzApi\Cache;

/**
 * MailWizzApi\Cache\Dummy is used for testing purposes, when you use the sdk with cache but don't want to
 * really cache anything.
 *
 * @author     Serban George Cristian <cristian.serban@mailwizz.com>
 * @package    MailWizzApi
 * @subpackage Cache
 * @since      1.0
 */
class Dummy extends CacheAbstract {
    /**
     * Cache data by given key.
     *
     * This method implements {@link MailWizzApi\Cache\CacheAbstract::set()}.
     *
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    public function set ($key, $value) {
        return true;
    }

    /**
     * Get cached data by given key.
     *
     * This method implements {@link MailWizzApi\Cache\CacheAbstract::get()}.
     *
     * @param string $key
     * @return mixed
     */
    public function get ($key) {
        return null;
    }

    /**
     * Delete cached data by given key.
     *
     * This method implements {@link MailWizzApi\Cache\CacheAbstract::delete()}.
     *
     * @param string $key
     * @return bool
     */
    public function delete ($key) {
        return true;
    }

    /**
     * Delete all cached data.
     *
     * This method implements {@link MailWizzApi\Cache\CacheAbstract::flush()}.
     *
     * @return bool
     */
    public function flush () {
        return true;
    }
}