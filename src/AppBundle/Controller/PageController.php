<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Page;
use AppBundle\Form\PageType;
use AppBundle\Form\PageFilterType;

/**
 * Page controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/page")
 */
class PageController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = [
        'yml' => 'AppBundle/Resources/config/Page.yml',
    ];

    /**
     * Lists all Page entities.
     *
     * @Route("/", name="page")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $this->config['filterType'] = PageFilterType::class;
        $response = parent::indexAction($request);

        return $response;
    }

    /**
     * Creates a new Page entity.
     *
     * @Route("/", name="page_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $this->config['newType'] = PageType::class;
        $response = parent::createAction($request);

        return $response;
    }

    /**
     * Displays a form to create a new Page entity.
     *
     * @Route("/new", name="page_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $this->config['newType'] = PageType::class;
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Page entity.
     *
     * @Route("/{id}", name="page_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Page entity.
     *
     * @Route("/{id}/edit", name="page_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $this->config['editType'] = PageType::class;
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Page entity.
     *
     * @Route("/{id}", name="page_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $this->config['editType'] = PageType::class;
        $response = parent::updateAction($request, $id);

        return $response;
    }

    /**
     * Deletes a Page entity.
     *
     * @Route("/{id}", name="page_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $response = parent::deleteAction($request, $id);

        return $response;
    }

    /**
     * Exporter Page.
     *
     * @Route("/exporter/{format}", name="page_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }

    /**
     * Autocomplete a Page entity.
     *
     * @Route("/autocomplete-forms/get-posts", name="Page_autocomplete_posts")
     */
    public function getAutocompletePost(Request $request)
    {
        $options = [
            'repository' => "AppBundle:Post",
            'field'      => "id",
        ];
        $response = parent::getAutocompleteFormsMwsAction($request, $options);

        return $response;
    }
}
