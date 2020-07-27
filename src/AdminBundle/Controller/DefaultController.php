<?php
/**
 * Created by PhpStorm.
 * User: muamar-ali
 * Date: 7/27/20
 * Time: 7:32 PM
 */

namespace App\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 *
 * @package App\AdminBundle\Controller
 */
class DefaultController
{
    /**
     * Index.
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        return new Response('Default Controller');
    }
}