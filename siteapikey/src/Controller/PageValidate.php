<?php

/**
 * @file
 * Contains \Drupal\siteapikey\Controller\PageValidate
 */
namespace Drupal\siteapikey\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provides route responses for the Example module
 */
class PageValidate extends ControllerBase
{

    // To validate node with Site API key and node id
    public function jsonrepnode($key, $nid)
    {
        $output = array(
          'status' => false,
          'data' => '',
        );
        $path = \Drupal::request()->getpathInfo();
        $arg  = explode('/', $path);
        if (empty($arg[2]) == false) {
            $key = $arg[2];
            $siteapikey = \Drupal::config('siteapikey.settings')->get('siteapikey');
            if ($key != $siteapikey) {
                $output['data'] = 'Access Denied';
                //Return Json response
				return new JsonResponse($output);
            }
        }
        $nid = $arg[3];
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);
        if (empty($node) == true) {
            //To check it is a node
            $output['data'] = 'not a node';
            $output['status'] = false;
        } else {
            $serializer = \Drupal::service('serializer');
            //serialize the output value
            $data = $serializer->serialize($node, 'json', ['plugin_id' => 'entity']);
            $output['data'] = $data;
            $output['status'] = true;
        }
        return new JsonResponse($output);
    }
}