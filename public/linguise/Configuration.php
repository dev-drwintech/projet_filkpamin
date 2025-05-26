<?php
namespace Linguise\Script;

use Linguise\Script\Core\Request;
use Linguise\Script\Core\Response;

if (!defined('LINGUISE_SCRIPT_TRANSLATION')) die();

class Configuration {
    /** Mandatory configuration **/
    public static $token = 'mKAJLMzwEDdxDJsQ5zT6hcSE7kJUStNw'; //Replace the token by the one found in your Linguise dashboard

    /** Basic configuration **/
    /*
     * Update the CMS value according to your CMS
     * Available CMS are: laravel, prestashop, magento
     */
    public static $cms = 'laravel';

    public $cache_enabled = true;
    public $cache_max_size = 500; // In megabyte

    /** Advanced configuration **/
    public static $server_ip = null;
    public static $server_port = 443;
    public static $debug = false;
    public static $data_dir = null;
    public static $base_dir = null;
    public static $dl_certificates = false;

    /** Advanced database configuration **/
    /*
     *  In case you don't want to use Sqlite, you can use MySQL
     *  To do so, you need to fill the following variables
     *  Linguise will create the tables for you
     */
    public static $db_host = '';
    public static $db_user = '';
    public static $db_password = '';
    public static $db_name = '';
    public static $db_prefix = '';
    // If your database use SSL connection, set this into MYSQLI_CLIENT_SSL
    // https://www.php.net/manual/en/mysqli.constants.php
    public static $db_flags = 0;

    /** Development configuration */
    public static $port = 443;
    public static $host = 'translate.linguise.com';
    public static $update_url = 'https://www.linguise.com/files/php-script-update.json';

    public static function onAfterMakeRequest()
    {
        if (\Linguise\Script\Core\Configuration::getInstance()->get('cms') === 'prestashop' && !empty($_POST['action']) && !empty($_POST['id_product'])) {
            // This is a cart request, let's just return the response
            Response::getInstance()->end();
        }

        if (\Linguise\Script\Core\Configuration::getInstance()->get('cms') === 'opencart') {
            $request = Request::getInstance();
            $response = Response::getInstance();
    
            $content = $response->getContent();

            $base_dir = $request->getBaseUrl();
            $language_dir = $request->getBaseUrl();
            $language = $request->getLanguage();
            // Endswith /
            if (substr($base_dir, -1) === '/') {
                // Trim the last /
                $base_dir = substr($base_dir, 0, -1);
            }
            if (substr($language_dir, -1) === '/') {
                // Trim the last /
                $language_dir = substr($language_dir, 0, -1);
            }
    
            $base_dir = preg_quote($base_dir, '/');
            $base_dir .= '(\/[\w\.\-]+\/?)';
            $language_dir = $language_dir . '/' . $language . '/';

            $prefixed_data = [
                'data-oc-load',
                'formaction',
            ];

            foreach ($prefixed_data as $prefix) {
                $matcher = '/' . $prefix . '="' . $base_dir . '/i';
                $replacer = $prefix . '="' . $language_dir;
                $content = preg_replace($matcher, $replacer, $content);
            }
            $response->setContent($content);
        }
    }

    protected static function replaceRedirectUrls($json_data, $language)
    {
        $request = Request::getInstance();
        $base_dir = $request->getBaseUrl();
        $language_dir = $request->getBaseUrl();
        // Endswith /
        if (substr($base_dir, -1) === '/') {
            // Trim the last /
            $base_dir = substr($base_dir, 0, -1);
        }
        if (substr($language_dir, -1) === '/') {
            // Trim the last /
            $language_dir = substr($language_dir, 0, -1);
        }

        $base_dir = preg_quote($base_dir, '/');
        $base_dir .= '(\/(?!.*\/).*)?$';
        $language_dir .= $language_dir . '/' . $language . '$1';

        // make a regex matcher from $base_dir, escape it
        $matcher = '/^' . $base_dir . '/i';

        if (is_array($json_data) || is_object($json_data)) {
            foreach ($json_data as $key => $value) {
                if ($key === 'redirect' && is_string($value)) {
                    $result = preg_replace($matcher, $language_dir, $value, 1);
                    if (!empty($result)) {
                        $json_data[$key] = $result;
                    }
                } else {
                    $json_data[$key] = self::replaceRedirectUrls($value, $language);
                }
            }
        }
        
        return $json_data;
    }

    public static function onJsonResponse()
    {
        if (\Linguise\Script\Core\Configuration::getInstance()->get('cms') === 'opencart') {
            $request = Request::getInstance();
            $response = Response::getInstance();
    
            $content = $response->getContent();
            $language = $request->getLanguage();

            $json_content = json_decode($content, true);
            if ($json_content !== null) {
                $repl_json = self::replaceRedirectUrls($json_content, $language);
    
                $response->setContent(json_encode($repl_json));
            }
        }
    }
}
